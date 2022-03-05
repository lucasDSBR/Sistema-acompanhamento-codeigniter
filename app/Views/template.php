<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='<?=base_url() . '/css/style.css' ?>'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
</head>
<body>
<div class="header">
<h2>Acompanhamento TradUnilab</h2>
    <div class="menu">
        <p>username</p>
        <p><a href="/dashboard" class="header-sair">Inicio</a></p>
        <p><?= session('user')['nivel'] ? "<a href='/aprovar' class='header-sair'>Aprovar Usuarios</a>" : '' ?></p>
        <p><a href="/logout" class="header-sair">Sair</a></p>
    </div>
</div>
<div class="container mt-4">
    <?php if (session()->has('success')): ?>
        <div class="alert alert-success">
            <?=session()->getFlashdata('success');?>
        </div>
    <?php endif ?>
    <?php if (session()->has('danger')): ?>
        <div class="alert alert-danger">
            <?=session()->getFlashdata('danger');?>
        </div>
    <?php endif ?>
    <?php $this->renderSection('content'); ?>
</div>

</body>
</html>