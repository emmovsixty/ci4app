<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>
<div class="container mt-2">

    <!-- alert -->
    <h1>Daftar Buku</h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= session()->getFlashdata('pesan') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif ?>


    <div class="row float-end">
        <div class="col">
            <a href="/book/create" class="btn-sm btn-primary">Tambah Buku</a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><img src="/img/<?= $row['sampul']; ?>" alt="'ini gambar" class="sampul"></td>
                            <td>
                                <h5><?= $row['judul'] ?></h5>
                            </td>
                            <td><a href="/book/<?= $row['slug']; ?>" class="detail btn-sm btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>