<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="nav mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('/akun'); ?>">Akun</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Account</li>
            </ol>
        </nav>
    </div>

    <h1>Create Account</h1>
    <div class="form">
        <form action="<?= base_url('/aksi_tambah_akun'); ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                <?php if (session('errors') && isset(session('errors')['username'])) : ?>
                    <span class="help-block"><?= esc(session('errors')['username']); ?></span>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password">
                <?php if (session('errors') && isset(session('errors')['password'])) : ?>
                    <span class="help-block"><?= esc(session('errors')['password']); ?></span>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" name="Name">
                <?php if (session('errors') && isset(session('errors')['Name'])) : ?>
                    <span class="help-block"><?= esc(session('errors')['Name']); ?></span>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" aria-label="Default select example" name="role">
                    <option value="admin">Admin</option>
                    <option value="author">Autho</option>
                </select>
                <?php if (session('errors') && isset(session('errors')['role'])) : ?>
                    <span class="help-block"><?= esc(session('errors')['role']); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>

        <?php $this->endSection(); ?>