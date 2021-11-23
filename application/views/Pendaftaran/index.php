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
                        <form class="user">
                            <div class="form-group">
                                <p class="pl-3">Nama Lengkap</p>
                                <input type="text" class="form-control form-control-user" id="nama" name="nama">
                            </div>
                            <div class="form-group">
                                <p class="pl-3">NIK</p>
                                <input type="number" class="form-control form-control-user" id="nik" name="nik">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="pl-3">Tempat Lahir</p>
                                    <input type="text" class="form-control form-control-user" id="lahir" name="lahir">
                                </div>
                                <div class="col-sm-6">
                                    <p class="pl-2">Tanggal Lahir</p>
                                    <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="pl-3">Usia</p>
                                <input type="number" class="form-control form-control-user" id="usia" name="usia">
                            </div>
                            <p class="pl-3">Jenis Kelamin</p>
                            <div class="form-group row">
                                <div class="pl-4">
                                    <input type="radio" id="pria" name="jk" value="pria">
                                    <label for="pria">Pria</label>
                                </div>
                                <div class="pl-5">
                                    <input type="radio" id="wanita" name="jk" value="wanita">
                                    <label for="wanita">Wanita</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="pl-3">Status</p>
                                <div class="form-group row">
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
                            </div>
                            <div class="form-group">
                                <p class="pl-3 mt-3">Alamat</p>
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat">
                            </div>
                            <div class="form-group">
                                <p class="pl-3">No. Telepon</p>
                                <input type="number" class="form-control form-control-user" id="no_tlp" name="no_tlp">
                            </div>
                            <div class="form-group">
                                <p class="pl-3">Email</p>
                                <input type="text" class="form-control form-control-user" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <p class="pl-3 mt-3">Pekerjaan</p>
                                <input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan">
                            </div>
                            <div class="form-group">
                                <p>Riwayat Penyakit</p>
                                <select class="custom-select" id="penyakit" name="penyakit">
                                    <option value=" ">-------Pilih Riwayat Penyakit-------</option>
                                    <option value="tidak_ada">Tidak Ada</option>
                                    <option value="diabetes">Diabetes</option>
                                    <option value="sesak_nafas">Sesak Nafas</option>
                                </select>
                            </div>
                            <p class="pl-3">Pernah terpapar atau belum?</p>
                            <div class="form-group row">
                                <div class="pl-4">
                                    <input type="radio" id="pernah" name="terpapar" value="pernah">
                                    <label for="pernah">Pernah</label>
                                </div>
                                <div class="pl-5">
                                    <input type="radio" id="belum" name="terpapar" value="belum">
                                    <label for="belum">Belum</label>
                                </div>
                            </div>
                            <p class="pl-3">Sudah menerima vaksin?</p>
                            <div class="form-group row">
                                <div class="pl-4">
                                    <input type="radio" id="sudah" name="vaksin" value="sudah">
                                    <label for="sudah">Sudah</label>
                                </div>
                                <div class="pl-5">
                                    <input type="radio" id="belum" name="vaksin" value="belum">
                                    <label for="belum">Belum</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Daftar Vaksin
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>