<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="nav mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Post</li>
            </ol>
        </nav>
    </div>

    <h1>Post</h1>
    <a href="<?= base_url('/tambahpost'); ?>" class="btn btn-success">Create Post</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Username</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($post as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['title']; ?></td>
                    <td><?= $row['content']; ?></td>
                    <td><?= $row['date']; ?></td>
                    <td>
                        <a href="/detail/<?= $row['idpost']; ?>">Detail</a>
                        <a href="/edit/<?= $row['idpost']; ?>">Edit</a>
                        <a href="/edit">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php $this->endSection(); ?>