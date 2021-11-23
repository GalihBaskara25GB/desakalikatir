<div class="container-fluid">
    <a class="btn btn-outline-primary btn-sm" href="<?= base_url() ?>smt_kriteria"><i class="fas fa-plus"></i> Halaman Bobot Kriteria</a>
    <br><br>
    <div id="accordion2">
        <div class="card shadow mb-4 mt-3 col-12 px-0">
            <div class="card-header mx-0 px-0" id="headingOne2">
                <h5 class="mb-0">
                    <button class="btn btn-info btn-sm ml-4" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                    Detail Perhitungan
                    </button>
                </h5>
            </div>

            <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2" data-parent="#accordion2">
                <div class="card-body text-capitalize">
                    <?= $perhitungan['resultView'] ?>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <i class="fas fa-fw fa-user-alt mr-1"></i> Perangkingan Menggunakan Metode SMART
        </div>
        <div class="card-body">
            <div class="table-responsive">
                
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Rangking</th>
                            <th>Nama Pendaftar</th>
                            <th>Nilai Preferensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($rangking as $k) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $k['nama'] ?></td>
                                <td><?= $k['nilai_preferensi'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>