<div class="container">
    <h5>Tambah Layanan</h5>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="">Nama Layanan</label>
            <input type="text" name="nama_layanan" class="form-control" value="<?php echo set_value("nama_layanan") ?>">
            <span class="text-danger small">
                <?php echo form_error("nama_layanan") ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="">Deskripsi Layanan</label>
            <input type="text" name="deskripsi_layanan" class="form-control" value="<?php echo set_value("deskripsi_layanan") ?>">
            <span class="text-danger small">
                <?php echo form_error("deskripsi_layanan") ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="">Harga Layanan</label>
            <input type="number" name="harga_layanan" class="form-control" value="<?php echo set_value("harga_layanan") ?>">
            <span class="text-danger small">
                <?php echo form_error("harga_layanan") ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="">Estimasi Layanan</label>
            <input type="number" name="estimasi_layanan" class="form-control" value="<?php echo set_value("estimasi_layanan") ?>">
            <span class="text-danger small">
                <?php echo form_error("estimasi_layanan") ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="">Foto Layanan</label>
            <input type="file" name="foto_layanan" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>