<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>
<div class="row justify-content-center mt-5">
    <div class="col-6">
        <h2>Form Ubah Data buku</h2>
        <form action="/book/update/<?= $buku['id'] ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="slug" id="slug" value="<?= $buku['slug'] ?>">
            <input type="hidden" name="old_sampul" value="<?= $buku['sampul'] ?>">
            <div class=" mb-3">
                <label for="inputJudul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" id="inputJudul" aria-describedby="judulHelp" name="judul" value="<?= $buku['judul'] ?>" autofocus>
                <!-- Tampil error jika input kosong -->
                <div class="invalid-feedback">
                    <?= $validation->getError('judul') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPenulis" class="form-label">Penulis</label>
                <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : '' ?>" id="inputPenulis" name="penulis" value="<?= $buku['penulis'] ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('penulis') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPenerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="inputPenerbit" name="penerbit" value="<?= $buku['penerbit'] ?>">
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