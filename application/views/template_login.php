<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login - Harco Elektronik Service</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>auth.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
</head>

<body>
    <div class="lowin">
        <div class="lowin-brand">
            <img src="<?= base_url('assets/img/') ?>kodinger.jpg" alt="logo">
        </div>
        <div class="lowin-wrapper">
            <?= $contents ?>

            <footer class="lowin-footer">
                Design By <a href="http://fb.me/itskodinger">@itskodinger</a>
            </footer>
        </div>
        <script src="<?= base_url() ?>assets/modules/jquery.min.js"></script>

        <script src="<?= base_url() ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
        <script>
            Auth.init({
                // login_url: '#login',
                forgot_url: '#forgot'
            });
        </script>
</body>

</html>