<div class="container">
    <h5>Tambah Customer</h5>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="">Nama Customer</label>
            <input type="text" name="nama_customer" class="form-control" value="<?php echo set_value("nama_customer") ?>">
            <span class="text-danger small">
                <?php echo form_error("nama_customer") ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email_customer" class="form-control" value="<?php echo set_value("email_customer") ?>">
            <span class="text-danger small">
                <?php echo form_error("email_customer") ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo set_value("password") ?>">
            <span class="text-danger small">
                <?php echo form_error("password") ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="">No. Telepon</label>
            <input type="number" name="no_telepon" class="form-control" value="<?php echo set_value("no_telepon") ?>">
            <span class="text-danger small">
                <?php echo form_error("no_telepon") ?>
            </span>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
			<textarea class="form-control" name="alamat"><?php echo set_value("alamat") ?></textarea>
			<span class="text-danger small">
                <?php echo form_error("alamat") ?>
            </span>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>