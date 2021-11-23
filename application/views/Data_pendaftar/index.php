<div class="container-fluid">
    <a class="btn btn-outline-primary btn-lg" href="<?= base_url() ?>data_pendaftar/tambah"><i class="fas fa-plus"></i> Tambah</a>
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <i class="fas fa-fw fa-user-alt mr-1"></i> Data Pendaftar Vaksin
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                            <th>Alamat</th>
                            <th>No. Telpon</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vaksin as $vksn) : ?>
                            <tr>
                                <td><?= $vksn['nama'] ?></td>
                                <td><?= $vksn['jk'] ?></td>
                                <td><?= $vksn['usia'] ?></td>
                                <td><?= $vksn['alamat'] ?></td>
                                <td><?= $vksn['no_tlp'] ?></td>
                                <td>
                                    <a type="button" class="btn btn-outline-success" href="<?= base_url(); ?>data_pendaftar/ubah/<?= $vksn['id_vaksin'] ?>"><i class="fas fa-pen"></i></i> Update</a>
                                    <a type="button" class="btn btn-outline-danger" href="<?= base_url(); ?>data_pendaftar/hapus/<?= $vksn['id_vaksin'] ?>" onclick="return confirm('Apakah anda yakin?');"><i class="fas fa-trash"></i></i> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>