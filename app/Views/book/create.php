<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>
<div class="row justify-content-center mt-5">
    <div class="col-6">
        <h2>Form Tambah Data buku</h2>
        <form action="/book/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class=" mb-3">
                <label for="inputJudul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" id="inputJudul" aria-describedby="judulHelp" name="judul" value="<?= old('judul') ?>" autofocus>
                <!-- Tampil error jika input kosong -->
                <div class="invalid-feedback">
                    <?= $validation->getError('judul') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPenulis" class="form-label">Penulis</label>
                <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : '' ?>" id="inputPenulis" name="penulis" value="<?= old('penulis') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('penulis') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPenerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="inputPenerbit" name="penerbit" value="<?= old('penerbit') ?>">
            </div>
            <div class="mb-3">
                <label for="sampul" class="form-label">Sampul</label>
                <input class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : '' ?>" type="file" id="sampul" name="sampul" value="<?= old('sampul') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('sampul') ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php $this->endSection(); ?>