<?= $this->extend('layout') ?>
<?= $this->section('content') ?> 
<?php
if (session()->getFlashData('success')) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>

<div class="row">
    <?php foreach ($products as $key => $item) : ?>         
        <div class="col-lg-4 col-md-6 mb-4"> <div class="card h-100">
            <?= form_open('keranjang') ?>
                <?php
                echo form_hidden('id', $item['id']);
                echo form_hidden('nama', $item['nama']);
                echo form_hidden('harga', $item['harga']);
                echo form_hidden('foto', $item['foto']);
                ?>

                <div class="card-body text-center pt-3">
                    <img src="<?= base_url() . "img/" . $item['foto'] ?>" alt="<?= $item['nama'] ?>" class="img-fluid mb-3" style="max-height: 200px; object-fit: contain;">
                    <h5 class="card-title mb-1" style="padding: 0; font-size: 1.1rem;"><?= $item['nama'] ?><br><?php echo number_to_currency($item['harga'], 'IDR') ?></h5>
                    <button type="submit" class="btn btn-info rounded-pill">Beli</button>
                    <p class="card-text text-danger fw-bold">Rp <?= number_format($item['harga'], 0, ',', '.') ?></p>
                </div>
            </div>

            <?= form_close() ?>
        </div> 
    <?php endforeach ?> 
</div>

<?= $this->endSection() ?>