<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Pasar Raya</title>
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/bootstrap.css">
        
        <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/iconly/bold.css">

        <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/app.css">

        <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/fontawesome/all.min.css">
        <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/sweetalert2/sweetalert2.min.css">
        <style>
            
            table.table td
            {
                padding: 15px 8px;
            }
            .fontawesome-icons .the-icon svg
            {
                font-size: 24px;
            }
        </style>

        <link rel="shortcut icon" href="<?= base_url('assets'); ?>/images/favicon.svg" type="image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    </head>
    <body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="<?= base_url(); ?>">Pasar Raya</a>
                            <h6 class="text-muted mb-0">
                                <?=$this->fungsi->user_login()->nama?>
                            </h6>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <?php if($this->fungsi->user_login()->level == 1) : ?>
                        <li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'], 'dashboard') !== false) echo 'active'; ?>">
                            <a href="<?= base_url(); ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'], 'produk') !== false) echo 'active'; ?>">
                            <a href="<?= base_url('produk'); ?>" class='sidebar-link'>
                                <i class="bi bi-basket-fill"></i>
                                <span>Produk</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'], 'pelanggan') !== false) echo 'active'; ?>">
                            <a href="<?= base_url('pelanggan'); ?>" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Pelanggan</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'], 'transaksi') !== false) echo 'active'; ?>">
                            <a href="<?= base_url('transaksi'); ?>" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Transaksi</span>
                            </a>
                        </li>
                        <?php else : ?>
                        <li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'], 'transaksi') !== false) echo 'active'; ?>">
                            <a href="<?= base_url('transaksi'); ?>" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Transaksi</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <hr>
                        <li class="sidebar-item">
                            <div class="sidebar-link">
                                <span>User - @<?=$this->fungsi->user_login()->username?></span>
                            </div>
                        </li>
                        <hr>
                        <li class="sidebar-item">
                            <a href="<?php echo base_url(). 'login/logout' ?>" class='sidebar-link'>
                                <i class="bi bi-door-open-fill"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <!---<div class="page-heading">
                <h3>Selamat Datang Admin</h3>
            </div>-->
            <div class="page-content">
                

                            
                        