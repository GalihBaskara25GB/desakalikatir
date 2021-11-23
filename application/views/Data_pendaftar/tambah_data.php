<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Pendaftaran Vaksin</h1>
                        </div>
                        <form class="user" method="POST" action="<?= base_url('data_pendaftar/tambah'); ?>">
                            <div class="form-group">
                                <p class="pl-3">Nama Lengkap</p>
                                <input type="text" class="form-control form-control-user" id="nama" name="nama">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <p class="pl-3">NIK</p>
                                <input type="number" class="form-control form-control-user" id="nik" name="nik">
                                <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="pl-3">Tempat Lahir</p>
                                    <input type="text" class="form-control form-control-user" id="lahir" name="lahir">
                                    <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <p class="pl-2">Tanggal Lahir</p>
                                    <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir">
                                    <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="pl-3">Usia</p>
                                <input type="number" class="form-control form-control-user" id="usia" name="usia">
                                <?= form_error('usia', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="grid">
                                <p class="pl-3">Jenis Kelamin</p>
                                <div class="row">
                                    <div class="pl-4">
                                        <input type="radio" id="pria" name="jk" value="pria">
                                        <label for="pria">Pria</label>
                                    </div>
                                    <div class="pl-5">
                                        <input type="radio" id="wanita" name="jk" value="wanita">
                                        <label for="wanita">Wanita</label>
                                    </div>
                                </div>
                                <div class="from-group-row">
                                    <?= form_error('jk', '<small class="text-danger pl-3 mb-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="grid mt-3">
                                <p class="pl-3">Status</p>
                                <div class="row">
                                    <div class="pl-4">
                                        <input type="radio" id="kawin" name="status" value="kawin">
                                        <label for="kawin">Kawin</label>
                                    </div>
                                    <div class="pl-5">
                                        <input type="radio" id="belum_kawin" name="status" value="belum_kawin">
                                        <label for="belum_kawin">Belum Kawin</label>
                                    </div>
                                    <div class="pl-5">
                                        <input type="radio" id="cerai_hidup" name="status" value="cerai_hidup">
                                        <label for="cerai_hidup">Cerai Hidup</label>
                                    </div>
                                    <div class="pl-5">
                                        <input type="radio" id="cerai_mati" name="status" value="cerai_mati">
                                        <label for="cerai_mati">Cerai Mati</label>
                                    </div>
                                </div>
                                <div class="from-group-row">
                                    <?= form_error('status', '<small class="text-danger pl-3 mb-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="pl-3 mt-3">Alamat</p>
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <p class="pl-3">No. Telepon</p>
                                <input type="number" class="form-control form-control-user" id="no_tlp" name="no_tlp">
                                <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <p class="pl-3">Email</p>
                                <input type="text" class="form-control form-control-user" id="email" name="email">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <p class="pl-3 mt-3">Pekerjaan</p>
                                <input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan">
                                <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <p class="pl-3">Riwayat Penyakit</p>
                                <select class="custom-select" id="penyakit" name="penyakit">
                                    <option value=" ">-------Pilih Riwayat Penyakit-------</option>
                                    <option value="tidak_ada">Tidak Ada</option>
                                    <option value="diabetes">Diabetes</option>
                                    <option value="sesak_nafas">Sesak Nafas</option>
                                </select>
                            </div>
                            <div class="grid">
                                <p class="pl-3">Pernah terpapar atau belum?</p>
                                <div class="row">
                                    <div class="pl-4">
                                        <input type="radio" id="pernah" name="terpapar" value="pernah">
                                        <label for="pernah">Pernah</label>
                                    </div>
                                    <div class="pl-5">
                                        <input type="radio" id="belum" name="terpapar" value="belum">
                                        <label for="belum">Belum</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <?= form_error('terpapar', '<small class="text-danger pl-4 mb-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="grid mt-2">
                                <p class="pl-3">Sudah menerima vaksin?</p>
                                <div class="row">
                                    <div class="pl-4">
                                        <input type="radio" id="sudah" name="vaksin" value="sudah">
                                        <label for="sudah">Sudah</label>
                                    </div>
                                    <div class="pl-5">
                                        <input type="radio" id="belum" name="vaksin" value="belum">
                                        <label for="belum">Belum</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <?= form_error('vaksin', '<small class="text-danger pl-4 mb-3">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block mt-1">
                                Daftar Vaksin
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>