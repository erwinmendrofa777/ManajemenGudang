<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mini Warehouse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger">
                <ul><?php foreach (session()->getFlashdata('errors') as $e) : ?><li><?= esc($e) ?></li><?php endforeach ?></ul>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>