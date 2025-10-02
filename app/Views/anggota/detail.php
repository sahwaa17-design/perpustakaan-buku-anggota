<?= $this->extend('layout/header')?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg border-0 rounded-3">
                <div class="row g-0">

                    <!-- Detail Anggota -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nama: <?= $anggota['nama']; ?></h5>
                            <p class="card-text">Alamat: <?= $anggota['alamat']; ?></p>
                            <p class="card-text">Telepon: <?= $anggota['telepon']; ?></p>
                            <a href="/anggota/ubah/<?= $anggota['id_anggota'];?>" class="btn btn-warning">Ubah</a>

                                <form action="/anggota/<?= $anggota['id_anggota']; ?>" method="post" class="d-inline">
                                    <?= csrf_field();?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ini?')">Hapus</button>
                                </form>
                             <br><br>                          
                            </div>

                            <div class="mt-3">
                                <a href="/anggota" class="text-decoration-none"> Kembali ke Daftar Anggota</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection();?>