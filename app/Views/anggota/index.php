<?= $this->extend('layout/header')?>
<?=$this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Daftar Anggota</h1>
            <form action="/anggota/cari" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Masukkan Pencarian Data Anggota" name="cari">
                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
            </div>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            </form>
                <?php endif; ?>
            <a href="/anggota/tambah" class="btn btn-primary">Tambah Data Anggota</a>
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1 + (2* ($current-1));
                    foreach ($anggota as $b):
                    ?>
                    <tr>
                    <th scope="row"><?=$i++ ?></th>
                    <td><?=$b['nama'];?></td>
                    <td><a href="/anggota/<?=$b['id_anggota']; ?>" class="btn btn-success">Detail</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
                <?= $pager->links('anggota', 'page_anggota');?>
    <?= $this->endSection();?>