<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="nav mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Akun</li>
            </ol>
        </nav>
    </div>

    <h1>Account</h1>
    <a href="<?= base_url('/tambahakun'); ?>" class="btn btn-success">Create Account</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Name</th>
                <th>Role</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($post as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['role']; ?></td>
                    <td>
                        <a href="<?= base_url('detail/'); ?><?= $row['username']; ?>">Detail</a>
                        <a href="<?= base_url('edit/'); ?><?= $row['username']; ?>">Edit</a>
                        <a href="/edit">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php $this->endSection(); ?>