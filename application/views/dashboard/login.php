<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dashboard Admin Pasar Raya</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/app.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/pages/auth.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="<?= base_url(); ?>"><h2>Pasar Raya</h2></a>
            </div>
            <h3>Log in.</h3>

            <form action="<?php echo base_url(). 'login/process' ?>" method="post">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Username" name="username" id="username" required autofocus>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" id="password" required>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5 btn-login" name="login" id="btnlogin">Log in</button>
            </form>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
        </div>
    </div>
</div>

    </div>


    <script src="<?= base_url('assets'); ?>/vendors/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets'); ?>/vendors/fontawesome/all.min.js"></script>
    <script src="<?= base_url('assets'); ?>/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('assets'); ?>/js/bootstrap.bundle.min.js"></script>
    
    <script src="<?= base_url('assets'); ?>/js/extensions/sweetalert2.js"></script>
    <script src="<?= base_url('assets'); ?>/vendors/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="<?= base_url('assets'); ?>/js/mazer.js"></script>
    <script src="<?= base_url('assets'); ?>/js/customnotif.js"></script>
    <script type="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.14/dist/sweetalert2.all.min.js"></script>
</body>

</html>
