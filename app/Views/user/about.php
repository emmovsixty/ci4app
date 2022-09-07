<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1>About me!</h1>
      <h3>Alamat</h3>
      <?php foreach ($alamat as $al) : ?>
        <ul>
          <li>kabupaten : <?= $al['Kabupaten'] ?></li>
          <li>Kecamatan : <?= $al['Kecamatan'] ?></li>
          <li>desa : <?= $al['Desa'] ?></li>
        </ul>
      <?php endforeach; ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>