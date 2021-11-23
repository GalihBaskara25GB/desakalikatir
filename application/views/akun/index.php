<div class="container-fluid">
    <!-- <button class="btn btn-outline-primary btn-lg"><i class="fas fa-plus"></i> Tambah</button> -->
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <i class="fas fa-fw fa-user-alt mr-1"></i> Data Akun
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status Akun</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tabelakun as $akn) : ?>
                            <tr>
                                <td><?= $akn['id'] ?></td>
                                <td><?= $akn['nama'] ?></td>
                                <td><?= $akn['email'] ?></td>
                                <td><?php if ($akn['role_id'] == 1) {
                                        echo 'Admin';
                                    } elseif ($akn['role_id'] == 2) {
                                        echo 'Member';
                                    } ?>
                                </td>
                                <td><?php if ($akn['role_id'] == 1) {
                                        echo '  ';
                                    } elseif ($akn['role_id'] == 2) {
                                        if ($akn['is_active'] == 1) {
                                            echo 'Telah diverifikasi';
                                        } else {
                                            echo 'Belum diverifikasi';
                                        }
                                    } ?>
                                </td>
                                <td>
                                    <?php if ($akn['role_id'] == 1) {
                                        echo ' ';
                                    } elseif ($akn['role_id'] == 2) {
                                        echo '<button type="button" class="btn btn-outline-primary"><i class="fas fa-check"></i></i> Verifikasi</button>';
                                        echo '<a type="button" class="btn btn-outline-danger ml-1"><i class="fas fa-trash"></i></i> Delete</a>';
                                    } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>