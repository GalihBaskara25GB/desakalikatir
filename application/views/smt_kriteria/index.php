<div class="container-fluid">
    <a class="btn btn-outline-primary btn-lg" href="<?= base_url() ?>proses_smart"><i class="fas fa-plus"></i> Lanjutkan Proses</a>
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <i class="fas fa-fw fa-user-alt mr-1"></i> Pembobotan Kriteria
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="user" method="POST" action="<?= base_url('smt_kriteria/update'); ?>">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Kriteria</th>
                                <th>Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($smt_kriteria as $k) : ?>
                                <input type="hidden" value="<?= $k['id_kriteria'] ?>" name="kriteria[<?= $k['id_kriteria'] ?>][id_kriteria]" requred>
                                <input type="hidden" value="<?= $k['kriteria'] ?>" name="kriteria[<?= $k['id_kriteria'] ?>][kriteria]" requred>
                                <tr>
                                    <td><?= $k['kriteria'] ?></td>
                                    <td><input type="number" value="<?= $k['bobot'] ?>" name="kriteria[<?= $k['id_kriteria'] ?>][bobot]" requred></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="row mx-auto">
                        <button type="submit" class="btn btn-sm btn-info col-4 ml-auto">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>