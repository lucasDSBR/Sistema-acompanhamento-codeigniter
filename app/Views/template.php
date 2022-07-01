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
        <p><?= isset(session('user')['nivel']) ? "<a href='/dashboard' class='header-btn'>Inicio</a>" : '' ?></p>
        <p><?= isset(session('user')['nivel']) ? "<a href='/aprovar' class='header-btn'>Aprovar Usuarios</a>" : '' ?></p>
        <p><?= isset(session('user')['nivel']) ? "<a href='/revisarTraduzir' class='header-btn'>Revisar/Traduzir</a>" : '' ?></p>
        <p><?= isset(session('user')['nivel']) ? "<a href='/logout' class='header-btn'>Sair</a>" : '' ?></p>
    </div>
</div>
<div class="container mt-4">

    <?php if (session()->has('alert')): ?>
        <?php $alert = session()->getFlashdata('alert'); ?>
        <div class="alert alert-<?=key($alert) ?? 'success'?>">
            <?= $alert[key($alert)] ?? '';?>
        </div>
    <?php endif ?>

    <?php $this->renderSection('content'); ?>
</div>

</body>
</html>