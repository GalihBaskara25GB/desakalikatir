<?php
class Proses_smart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Smt_kriteria_model');
        $this->load->model('Vaksin_model');
        $this->load->model('Rangking_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['perhitungan'] = $this->smart();
        if($data['perhitungan'] == FALSE) {
            $data['perhitungan'] = array('resultView' => 'Bobot belum diisi, silahkan isi dahulu!', 
                                        'resultArray' => array());
        }
        $data['judul'] = 'Proses Metode Smart';
        $data['rangking'] = $this->Rangking_model->getalldata();
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
        // $sql = 'SELECT * FROM smt_kriteria';
        // $result = $db->query($sql);
        //-- menyiapkan variable penampung berupa array
        $kriteria=array();
        //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
        // while ($row = $result->fetch_assoc()) {
        //     $kriteria[$row['id_kriteria']]=array($row['kriteria'],$row['bobot'],$row['tipe']);
        // }
        $resultView = '';
        $thKriteria = '';

        $resultView .= "<h4>Bobot Kriteria</h4><table class='table table-striped w-100'>";
        $resultView .= "<tr>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                            <th>Tipe</th>
                        </tr>";
        foreach ($this->Smt_kriteria_model->getalldata() as $k) {
            $kriteria[$k['kriteria']]=array($k['kriteria'],$k['bobot'],$k['tipe']);
            $resultView .= "<tr>
                                <th>$k[kriteria]</th>
                                <th>$k[bobot]</th>
                                <th>$k[tipe]</th>
                            </tr>";
            $thKriteria .= "<th>$k[kriteria]</th>";
        }
        $resultView .= "</table><hr>";

        if(empty($kriteria)) return false;
        //Pengambilan nilai alternatif
        // $sql = 'SELECT * FROM smt_alternatif';
        // $result = $db->query($sql);
        //-- menyiapkan variable penampung berupa array
        $alternatif=array();
        //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
        // while($row=$result->fetch_assoc()) {
        //     $alternatif[$row['id_alternatif']]=$row['alternatif'];
        // }
        $dataAlternatif = $this->Vaksin_model->getalldata();
        foreach ($dataAlternatif as $k) {
            $alternatif[$k['id_vaksin']]=$k['nama'];
        }

        //Pengambilan nilai peniaian
        //-- query untuk mendapatkan semua data sample penilaian di tabel smt_data
        // $sql = 'SELECT * FROM smt_data ORDER BY id_alternatif,id_kriteria';
        // $result = $db->query($sql);
        //-- menyiapkan variable penampung berupa array
        $sample=array();
        $resultView .= "<h4>Data Alternatif Pendaftar</h4><table class='table table-striped w-100'>";
        $resultView .= "<tr><th>Alternatif</th>$thKriteria</tr>";
        //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
        $konversiAlternatif = $this->convertValue($dataAlternatif);
        foreach ($konversiAlternatif as $key => $value) {
            $resultView .= "<tr><td>$alternatif[$key]</td>";
            if (!isset($sample[$key])) {
                $sample[$key] = array();
            }
            //modif here boyyyyy
            foreach ($value as $nmKriteria => $nilai) {
                $sample[$key][$nmKriteria] = $nilai;
                $resultView .= "<td>$nilai</td>";
            }
            $resultView .= "</tr>";
        }
        $resultView .= "</table><hr>";

        // while($row=$result->fetch_assoc()) {
        //     //-- jika array $sample[$row['id_alternatif']] belum ada maka buat baru
        //     //-- $row['id_alternatif'] adalah id kandidat/alternatif
        //     if (!isset($sample[$row['id_alternatif']])) {
        //         $sample[$row['id_alternatif']] = array();
        //     }
        //     //modif here boyyyyy
        //     $sample[$row['id_alternatif']][$row['id_kriteria']] = $row['nilai'];
        // }

        //Normalisasi bobot kriteria
        $bobot=array();
        foreach($kriteria as $k=>$vk){
            $bobot[$k]=$vk[1];
        }
        //-- menghitung nilai total bobot
        $jml_bobot=array_sum($bobot);
        //-- inisialisasi variabel array w (bobot ternormalisasi)
        $w=array();
        $resultView .= "<h4>Normalisasi Bobot Kriteria</h4><table class='table table-striped w-100'>";
        $resultView .= "<tr><th>Kriteria</th><th>Bobot</th></tr>";
        //-- normalisasi bobot
        foreach($bobot as $k=>$b){
            $w[$k]=$b/$jml_bobot;
            $resultView .= "<tr><td>".$kriteria[$k][0]."</td><td>$w[$k]</td></tr>";
        }
        $resultView .= "</table><hr>";

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
        $resultView .= "<h4>Nilai Max dan Min Kriteria</h4><table class='table table-striped w-100'>";
        $resultView .= "<tr><th>Kriteria</th><th>C Max</th><th>C Min</th></tr>";
        //-- mencari nilai max dan min utk tiap-tiap kriteria
        foreach($kriteria as $k=>$v){
            $c_max[$k]=max($tranpose_d[$k]);
            $c_min[$k]=min($tranpose_d[$k]);
            $resultView .= "<tr><td>".$kriteria[$k][0]."</td><td>$c_max[$k]</td><td>$c_min[$k]</td></tr>";
        }
        $resultView .= "</table><hr>";

        //-- inisialisasi variabel array U
        $U=array();
        //-- menghitung nilai utility utk masing-masing alternatif dan kriteria
        $resultView .= '<h4>Nilai Utility</h4><div id="accordion">';
        foreach($kriteria as $k=>$v){
            $resultView .= '<div class="card">
                                <div class="card-header" id="heading'.$k.'">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse'.$k.'" aria-expanded="true" aria-controls="collapse'.$k.'">
                                     Utility Kriteria '.$kriteria[$k][0].'
                                    </button>
                                </h5>
                                </div>
                            
                                <div id="collapse'.$k.'" class="collapse" aria-labelledby="heading'.$k.'" data-parent="#accordion">
                                <div class="card-body">';
                                
            $resultView .= "<h4>Nilai Utility Kriteria $v[0]</h4><table class='table table-striped w-100'>";
            $resultView .= "<tr><th>Alternatif</th><th>Nilai Utility</th></tr>";
            foreach($alternatif as $a=>$a_v){
                if(!isset($U[$a])) $U[$a]=array();
                if($kriteria[$k][2]=='max'){
                    //-- perhitungan nilai utility untuk benefit criteria
                    $U[$a][$k]=($sample[$a][$k]-$c_min[$k])/($c_max[$k]-$c_min[$k] == 0 ? 1 : $c_max[$k]-$c_min[$k]);
                }else{
                    //-- perhitungan nilai utility untuk cost criteria
                    $U[$a][$k]=($c_max[$k]-$sample[$a][$k])/($c_max[$k]-$c_min[$k] == 0 ? 1 : $c_max[$k]-$c_min[$k]);
                }
                $resultView .= "<tr><td>$a_v</td><td>".$U[$a][$k]."</td></tr>";

            }
            $resultView .= "</table>
                                    </div>
                                </div>
                            </div>";
        }
        $resultView .= '</div><hr>';

        //Perhitungan nilai akhir
        //-- inisialisasi variabel array V
        $V=array();
        $insertData = array();
        //-- melakukan iterasi utk setiap alternatif
        $resultView .= "<h4>Nilai Preferensi</h4><table class='table table-striped w-100'>";
        $resultView .= "<tr><th>Alternatif</th><th>Nilai Preverensi (V)</th></tr>"; 
        foreach($U as $a=>$a_u){
            $V[$a]=0;
            //-- perhitungan nilai Preferensi V untuk tiap-tiap kriteria
            foreach($a_u as $k=>$u){
                $V[$a]+=$u*$w[$k];
            }
            array_push($insertData, array(
                                            'id_vaksin' => $a,
                                            'nilai_preferensi' => $V[$a]));
            $resultView .= "<tr><td>$a</td><td>$V[$a]</td></tr>"; 

        }
        $resultView .= "</table><hr>";

        $this->Rangking_model->tambahdata($insertData);

        //Perangkingan
        //--mengurutkan data secara descending dengan tetap mempertahankan key/index array-nya 
        arsort($V); 
        //-- mendapatkan key/index item array yang pertama 
        // $index=key($V); 
        // //-- menampilkan hasil akhir: 
        // echo "Hasilnya adalah alternatif <b>{$alternatif[$index]}</b> "; 
        // echo "dengan nilai akhir <b>{$V[$index]}</b> yang terpilih";
        // echo '<hr><hr>';
        // print_r($V); 
        // die();
        return array(
            'resultView' =>$resultView,
            'resultArray' => $V
        );
    }

    private function convertValue($dataPendaftar)
    {
        $konversi=array();
        foreach ($dataPendaftar as $key) {
            //konversi kriteria usia
            if($key['usia'] < 14) {
                $konversi[$key['id_vaksin']]['usia'] = 6;
            } elseif ($key['usia'] >= 14 && $key['usia'] < 50) {
                $konversi[$key['id_vaksin']]['usia'] = 3;
            } else {
                $konversi[$key['id_vaksin']]['usia'] = 9;
            }

            //konversi kriteria alamat
            if(strpos($key['alamat'], 'kalikatir')) {
                $konversi[$key['id_vaksin']]['alamat'] = 10;
            } else {
                $konversi[$key['id_vaksin']]['alamat'] = 1;
            }

            //konversi kriteria status
            switch ($key['status']) {
                case 'kawin':
                    $konversi[$key['id_vaksin']]['status'] = 10;
                    break;
                case 'belum_kawin':
                    $konversi[$key['id_vaksin']]['status'] = 8;
                    break;
                default:
                    $konversi[$key['id_vaksin']]['status'] = 5;
                    break;
            }

            //konversi kriteria pekerjaan
            switch ($key['pekerjaan']) {
                case 'guru':
                    $konversi[$key['id_vaksin']]['pekerjaan'] = 8;
                    break;
                case 'dokter':
                case 'tenaga_medis':
                    $konversi[$key['id_vaksin']]['pekerjaan'] = 10;
                    break;
                default:
                    $konversi[$key['id_vaksin']]['pekerjaan'] = 5;
                    break;
            }

            //konversi kriteria riwayat penyakit
            switch ($key['penyakit']) {
                case 'diabetes':
                    $konversi[$key['id_vaksin']]['penyakit'] = 2;
                    break;
                case 'sesak_nafas':
                    $konversi[$key['id_vaksin']]['penyakit'] = 5;
                    break;
                default:
                    $konversi[$key['id_vaksin']]['penyakit'] = 10;
                    break;
            }

            //konversi kriteria pernah terpapar
            $konversi[$key['id_vaksin']]['terpapar'] = 5;
            if($key['terpapar'] == 'belum') 
                $konversi[$key['id_vaksin']]['terpapar'] = 10;

            //konversi kriteria sudah menerima vaksin
            $konversi[$key['id_vaksin']]['vaksin'] = 5;
            if($key['vaksin'] == 'belum') 
                $konversi[$key['id_vaksin']]['vaksin'] = 10;
        }

        return $konversi;
    }
    
}
