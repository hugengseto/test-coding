<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="nav mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </nav>
    </div>

    <div class="form">
        <form action="<?= base_url('aksi_login'); ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                <?php if (session('errors') && isset(session('errors')['username'])) : ?>
                    <span class="help-block"><?= esc(session('errors')['username']); ?></span>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <?php if (session('errors') && isset(session('errors')['password'])) : ?>
                    <span class="help-block"><?= esc(session('errors')['password']); ?></span>
                <?php endif; ?>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>