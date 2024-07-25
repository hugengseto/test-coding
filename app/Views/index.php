<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <?php foreach ($post as $row) : ?>
        <div class="konten mt-5">
            <h1><?= $row['title']; ?></h1>
            <p><?= session('username'); ?> <?= $row['date']; ?></p>

            <div class="col-md-6">
                <p>
                    <?= $row['content']; ?>
                </p>
            </div>
            <hr>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>