<?= $this->extend('layout/header')?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg border-0 rounded-3">
                <div class="row g-0">
                    <!-- Sampul Buku -->
                    <div class="col-md-4 d-flex align-items-center justify-content-center p-2">
                        <img src="/img/<?= esc($buku['sampul']); ?>" 
                             class="img-fluid rounded" 
                             alt="<?= esc($buku['judul']); ?>">
                    </div>

                    <!-- Detail Buku -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title fw-bold mb-2"><?= esc($buku['judul']); ?></h4>
                            <p class="mb-1"><strong>Pengarang:</strong> <?= esc($buku['pengarang']); ?></p>
                            <p class="mb-1"><strong>Penerbit:</strong> <?= esc($buku['penerbit']); ?></p>
                            <p class="mb-3"><strong>Tahun Terbit:</strong> <?= esc($buku['tahun_terbit']); ?></p>
                            <a href="/buku/ubah/<?= $buku['id_buku'];?>" class="btn btn-warning">Ubah</a>

                                <form action="/buku/<?= $buku['id_buku']; ?>" method="post" class="d-inline">
                                    <?= csrf_field();?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ini?')">Hapus</button>
                                </form>
                             <br><br>                          
                            </div>

                            <div class="mt-3">
                                <a href="/buku" class="text-decoration-none"> Kembali ke Daftar Buku</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection();?>