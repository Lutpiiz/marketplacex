<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace X</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/image/—Pngtree—glitch distorted letter x broken_6007985.png">
</head>

<body style="padding-top: 30px;">
    <!-- main content -->
    <div class="login-card" data-aos="zoom-out">
        <div class="row">
            <div class="col-md-4 login-img">
                <img src="./assets/image/—Pngtree—glitch distorted letter x broken_6007985.png" class="img-fluid" alt="x-dark.jpg">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="mb-3">Registrasi</h2>
                    <div>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="nama_customer" class="form-control" value="<?php echo set_value("nama_customer") ?>" placeholder="Enter your name">
                                <div class="text-danger small">
                                    <?php echo form_error("nama_customer") ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email_customer" class="form-control" value="<?php echo set_value("email_customer") ?>" placeholder="Enter your email">
                                <div class="text-danger small">
                                    <?php echo form_error("email_customer") ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo set_value("password") ?>" placeholder="Enter your password">
                                <div class="text-danger small">
                                    <?php echo form_error("password") ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">No. Telepon</label>
                                <input type="number" name="no_telepon" class="form-control" value="<?php echo set_value("no_telepon") ?>" placeholder="Enter your phone number">
                                <div class="text-danger small">
                                    <?php echo form_error("no_telepon") ?>
                                </div>
                            </div>
                            <div>
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" placeholder="Enter your address"><?php echo set_value("alamat") ?></textarea>
                                <div class="text-danger small">
                                    <?php echo form_error("alamat") ?>
                                </div>
                            </div>
                            <div class="login-button">
                                <button type="submit" class="btn text-white button-submit">Register</button>
                            </div>
                            <p class="text-center mt-3">Sudah memiliki akun? <a href="<?php echo base_url('/') ?>" style="text-decoration: none;">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php if ($this->session->flashdata('pesan_sukses')): ?>
        <script>
            swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses'); ?>", "success");
        </script>
    <?php endif ?>
    <?php if ($this->session->flashdata('pesan_gagal')): ?>
        <script>
            swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal'); ?>", "error");
        </script>
    <?php endif ?>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>