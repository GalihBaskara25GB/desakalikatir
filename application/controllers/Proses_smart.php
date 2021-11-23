<?php
class Proses_smart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vaksin_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Proses Metode Smart';
        $data['vaksin'] = $this->Vaksin_model->getalldata();
        $data['akun'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view('proses_smart/index', $data);
        $this->load->view('templates/footer');
    }

    public function smart()
    {
        //Pengambilan nilai kriteria
        //-- query untuk mendapatkan semua data kriteria di tabel smt_kriteria
        $sql = 'SELECT * FROM smt_kriteria';
        $result = $db->query($sql);
        //-- menyiapkan variable penampung berupa array
        $kriteria=array();
        //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
        while ($row = $result->fetch_assoc()) {
            $kriteria[$row['id_kriteria']]=array($row['kriteria'],$row['bobot'],$row['tipe']);
        }

        //Pengambilan nilai alternatif
        $sql = 'SELECT * FROM smt_alternatif';
        $result = $db->query($sql);
        //-- menyiapkan variable penampung berupa array
        $alternatif=array();
        //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
        while($row=$result->fetch_assoc()) {
            $alternatif[$row['id_alternatif']]=$row['alternatif'];
        }

        //Pengambilan nilai peniaian
        //-- query untuk mendapatkan semua data sample penilaian di tabel smt_data
        $sql = 'SELECT * FROM smt_data ORDER BY id_alternatif,id_kriteria';
        $result = $db->query($sql);
        //-- menyiapkan variable penampung berupa array
        $sample=array();
        //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
        while($row=$result->fetch_assoc()) {
            //-- jika array $sample[$row['id_alternatif']] belum ada maka buat baru
            //-- $row['id_alternatif'] adalah id kandidat/alternatif
            if (!isset($sample[$row['id_alternatif']])) {
                $sample[$row['id_alternatif']] = array();
            }
            //modif here boyyyyy
            $sample[$row['id_alternatif']][$row['id_kriteria']] = $row['nilai'];
        }

        //Normalisasi bobot kriteria
        $bobot=array();
        foreach($kriteria as $k=>$vk){
            $bobot[$k]=$vk[1];
        }
        //-- menghitung nilai total bobot
        $jml_bobot=array_sum($bobot);
        //-- inisialisasi variabel array w (bobot ternormalisasi)
        $w=array();
        //-- normalisasi bobot
        foreach($bobot as $k=>$b){
            $w[$k]=$b/$jml_bobot;
        }

        // Perhitungan nilai utility
        //-- inisialisasi variabel array tranpose_d untuk menyimpan data tranpose dari data sample
        $tranpose_d=array();
        foreach($alternatif as $a=>$v){
            foreach($kriteria as $k=>$v_k){
                if(!isset($tranpose_d[$k]))$tranpose_d[$k]=array();
                $tranpose_d[$k][$a]=$sample[$a][$k];
            }
        }
        //-- inisialisasi variabel array c_max dan c_min 
        $c_max=array();
        $c_min=array();
        //-- mencari nilai max dan min utk tiap-tiap kriteria
        foreach($kriteria as $k=>$v){
            $c_max[$k]=max($tranpose_d[$k]);
            $c_min[$k]=min($tranpose_d[$k]);
        }
        //-- inisialisasi variabel array U
        $U=array();
        //-- menghitung nilai utility utk masing-masing alternatif dan kriteria
        foreach($kriteria as $k=>$v){
            foreach($alternatif as $a=>$a_v){
                if(!isset($U[$a])) $U[$a]=array();
                if($kriteria[$k]['tipe']=='max'){
                    //-- perhitungan nilai utility untuk benefit criteria
                    $U[$a][$k]=($sample[$a][$k]-$c_min[$k])/($c_max[$k]-$c_min[$k]);
                }else{
                    //-- perhitungan nilai utility untuk cost criteria
                    $U[$a][$k]=($c_max[$k]-$sample[$a][$k])/($c_max[$k]-$c_min[$k]);
                }
            }
        }

        //Perhitungan nilai akhir
        //-- inisialisasi variabel array V
        $V=array();
        //-- melakukan iterasi utk setiap alternatif 
        foreach($U as $a=>$a_u){
            $V[$a]=0;
            //-- perhitungan nilai Preferensi V untuk tiap-tiap kriteria
            foreach($a_u as $k=>$u){
                $V[$a]+=$u*$w[$k];
            }
        }

        //Perangkingan
        //--mengurutkan data secara descending dengan tetap mempertahankan key/index array-nya 
        arsort($V); 
        //-- mendapatkan key/index item array yang pertama 
        $index=key($V); 
        //-- menampilkan hasil akhir: 
        echo "Hasilnya adalah alternatif <b>{$alternatif[$index]}</b> "; 
        echo "dengan nilai akhir <b>{$V[$index]}</b> yang terpilih"; 
    }

    private function convertValue($dataPendaftar)
    {
        $konversi=array();
        foreach ($dataPendaftar as $key) {
            
            //konversi kriteria usia
            if($key->usia < 14) {
                $konversi[$key->id_vaksin]['usia'] = 6;
            } elseif ($key->usia >= 14 && $key->usia < 50) {
                $konversi[$key->id_vaksin]['usia'] = 3;
            } else {
                $konversi[$key->id_vaksin]['usia'] = 9;
            }

            //konversi kriteria alamat
            if(strpos($key->alamat, 'kalikatir')) {
                $konversi[$key->id_vaksin]['alamat'] = 10;
            } else {
                $konversi[$key->id_vaksin]['alamat'] = 1;
            }

            //konversi kriteria status
            switch ($key->status) {
                case 'kawin':
                    $konversi[$key->id_vaksin]['status'] = 10;
                    break;
                
                default:
                    $konversi[$key->id_vaksin]['status'] = 5;
                    break;
            }

            //konversi kriteria pekerjaan
            switch ($key->pekerjaan) {
                case 'guru':
                    $konversi[$key->id_vaksin]['pekerjaan'] = 8;
                    break;
                case 'dokter':
                case 'tenaga_medis':
                    $konversi[$key->id_vaksin]['pekerjaan'] = 10;
                    break;
                default:
                    $konversi[$key->id_vaksin]['pekerjaan'] = 5;
                    break;
            }

            //konversi kriteria riwayat penyakit
            switch ($key->penyakit) {
                case 'diabetes':
                    $konversi[$key->id_vaksin]['penyakit'] = 2;
                    break;
                case 'sesak_nafas':
                    $konversi[$key->id_vaksin]['penyakit'] = 5;
                    break;
                default:
                    $konversi[$key->id_vaksin]['penyakit'] = 10;
                    break;
            }

            //konversi kriteria pernah terpapar
            $konversi[$key->id_vaksin]['terpapar'] = 5;
            if($key->terpapar == 'belum') 
                $konversi[$key->id_vaksin]['terpapar'] = 10;

            //konversi kriteria sudah menerima vaksin
            $konversi[$key->id_vaksin]['vaksin'] = 5;
            if($key->vaksin == 'belum') 
                $konversi[$key->id_vaksin]['vaksin'] = 10;
        }

        return $konversi;
    }
    
}
