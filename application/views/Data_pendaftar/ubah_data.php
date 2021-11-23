<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Update Data Vaksin</h1>
                        </div>
                        <form class="user" method="POST" action="<?= base_url(); ?>data_pendaftar/ubah/<?= $vaksin['id_vaksin'] ?>">
                            <input type="hidden" name="id_vaksin" value="<?= $vaksin['id_vaksin']; ?>">
                            <div class="form-group">
                                <p class="pl-3">Nama Lengkap</p>
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $vaksin['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <p class="pl-3">NIK</p>
                                <input type="number" class="form-control form-control-user" id="nik" name="nik" value="<?= $vaksin['nik']; ?>">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="pl-3">Tempat Lahir</p>
                                    <input type="text" class="form-control form-control-user" id="lahir" name="lahir" value="<?= $vaksin['tempat_lahir']; ?>">
                                </div>
                                <div class="col-sm-6">
                                    <p class="pl-2">Tanggal Lahir</p>
                                    <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" value="<?= $vaksin['tgl_lahir']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="pl-3">Usia</p>
                                <input type="number" class="form-control form-control-user" id="usia" name="usia" value="<?= $vaksin['usia']; ?>">
                            </div>
                            <p class="pl-3">Jenis Kelamin</p>
                            <div class="form-group row">
                                <div class="pl-4">
                                    <input type="radio" id="pria" name="jk" value="pria" <?php if ($vaksin['jk'] == 'pria') { ?> checked=checked <?php } ?>>
                                    <label for="pria">Pria</label>
                                </div>
                                <div class="pl-5">
                                    <input type="radio" id="wanita" name="jk" value="wanita" <?php if ($vaksin['jk'] == 'wanita') { ?> checked=checked <?php } ?>>
                                    <label for="wanita">Wanita</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="pl-3">Status</p>
                                <div class="form-group row">
                                    <div class="pl-4">
                                        <input type="radio" id="kawin" name="status" value="kawin" <?php if ($vaksin['status'] == 'kawin') { ?> checked=checked <?php } ?>>
                                        <label for="kawin">Kawin</label>
                                    </div>
                                    <div class="pl-5">
                                        <input type="radio" id="belum_kawin" name="status" value="belum_kawin" <?php if ($vaksin['status'] == 'belum_kawin') { ?> checked=checked <?php } ?>>
                                        <label for="belum_kawin">Belum Kawin</label>
                                    </div>
                                    <div class="pl-5">
                                        <input type="radio" id="cerai_hidup" name="status" value="cerai_hidup" <?php if ($vaksin['status'] == 'cerai_hidup') { ?> checked=checked <?php } ?>>
                                        <label for="cerai_hidup">Cerai Hidup</label>
                                    </div>
                                    <div class="pl-5">
                                        <input type="radio" id="cerai_mati" name="status" value="cerai_mati" <?php if ($vaksin['status'] == 'cerai_mati') { ?> checked=checked <?php } ?>>
                                        <label for="cerai_mati">Cerai Mati</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="pl-3 mt-3">Alamat</p>
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $vaksin['alamat']; ?>">
                            </div>
                            <div class="form-group">
                                <p class="pl-3">No. Telepon</p>
                                <input type="number" class="form-control form-control-user" id="no_tlp" name="no_tlp" value="<?= $vaksin['no_tlp']; ?>">
                            </div>
                            <div class="form-group">
                                <p class="pl-3">Email</p>
                                <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= $vaksin['email']; ?>">
                            </div>
                            <div class="form-group">
                                <p class="pl-3 mt-3">Pekerjaan</p>
                                <input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan" value="<?= $vaksin['pekerjaan']; ?>">
                            </div>
                            <div class="form-group">
                                <p class="pl-3">Riwayat Penyakit</p>
                                <select class="custom-select" id="penyakit" name="penyakit">
                                    <?php foreach ($penyakit as $p) : ?>
                                        <?php if ($p == $vaksin['penyakit']) : ?>
                                            <option value="<?= $p; ?>" selected><?= $p; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $p; ?>"><?= $p; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <p class="pl-3">Pernah terpapar atau belum?</p>
                            <div class="form-group row">
                                <div class="pl-4">
                                    <input type="radio" id="pernah" name="terpapar" value="pernah" <?php if ($vaksin['terpapar'] == 'pernah') { ?> checked=checked <?php } ?>>
                                    <label for="pernah">Pernah</label>
                                </div>
                                <div class="pl-5">
                                    <input type="radio" id="belum" name="terpapar" value="belum" <?php if ($vaksin['terpapar'] == 'belum') { ?> checked=checked <?php } ?>>
                                    <label for="belum">Belum</label>
                                </div>
                            </div>
                            <p class="pl-3">Sudah menerima vaksin?</p>
                            <div class="form-group row">
                                <div class="pl-4">
                                    <input type="radio" id="sudah" name="vaksin" value="sudah" <?php if ($vaksin['vaksin'] == 'sudah') { ?> checked=checked <?php } ?>>
                                    <label for="sudah">Sudah</label>
                                </div>
                                <div class="pl-5">
                                    <input type="radio" id="belum" name="vaksin" value="belum" <?php if ($vaksin['vaksin'] == 'belum') { ?> checked=checked <?php } ?>>
                                    <label for="belum">Belum</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Update Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>