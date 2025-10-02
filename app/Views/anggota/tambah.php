<?= $this->extend('layout/header')?>
<?=$this->section('content'); ?>
<div class="container">
    <div class="col">
        <h3 class="mt-2">Form Tambah Anggota</h3>
        <form action="/anggota/simpan" method="post" class="mt-4" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="form-group row">
                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" 
                           name="nama" autofocus
                           value="<?= old('nama'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="alamat" value="<?= old('alamat'); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputTelepon" class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="telepon" value="<?= old('telepon'); ?>">
                </div>
            </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>


 <?= $this->endSection();?>