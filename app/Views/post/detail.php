<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="nav mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('/post'); ?>">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $post['title']; ?></li>
            </ol>
        </nav>
    </div>

    <h1>Detail Post</h1>
    <div class="form">
        <form action="<?= base_url('/aksi_tambah_post'); ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <?php if (session('errors') && isset(session('errors')['title'])) : ?>
                    <span class="help-block"><?= esc(session('errors')['title']); ?></span>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <input type="text" class="form-control" id="content" name="content">
                <?php if (session('errors') && isset(session('errors')['content'])) : ?>
                    <span class="help-block"><?= esc(session('errors')['content']); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>

        <?php $this->endSection(); ?>