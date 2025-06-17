<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin ADL Shoes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/image/logo_adlshoes.png">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-3" style="background-color: #0A3981;">
        <div class="container">
            <a href="" class="navbar-brand">ADL Shoes</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="naff">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url("home") ?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("administrasi") ?>" class="nav-link">Administrasi</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("transaksi") ?>" class="nav-link">Transaksi</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("layanan") ?>" class="nav-link">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("laporan") ?>" class="nav-link">Laporan</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url("akun") ?>" class="nav-link">
                            Admin <?php echo $this->session->userdata("nama_admin") ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("logout") ?>" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
