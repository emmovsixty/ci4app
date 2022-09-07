<?php $this->extend('layout/template') ?>

<?php $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3">
                <img src="/img/<?= $detail['sampul'] ?>" class="sampul-card card-img-top mt-3" alt="<?= $alt ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $detail['judul'] ?></h5>
                    <p class="card-text">Penulis : <?= $detail['penulis'] ?></p>
                    <p class="card-text">Penerbit : <small class="text-muted"><?= $detail['penerbit'] ?></small></p>
                </div>
            </div>

            <!-- delete button -->
            <?= csrf_field() ?>
            <form action="/book/delete/<?= $detail['id'] ?>" method="post" class="d-inline">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger" onclick="return confirm('yakin menghapus buku <?= $detail['judul'] ?>');">hapus</button>
            </form>

            <!-- edit button -->
            <a href="/book/edit/<?= $detail['slug'] ?>" class="btn btn-warning">Edit</a>

            <!-- back button -->
            <h5 class="float-end"><a href="/book">Kembali</a></h5>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>