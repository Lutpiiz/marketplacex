<div class="container">
    <h5>Data Layanan</h5>
    <table class="table table-bordered" id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Layanan</th>
                <th>Deskripsi Layanan</th>
                <th>Harga Layanan</th>
                <th>Estimasi Layanan</th>
                <th>Foto Layanan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($layanan as $k => $v): ?>
                <tr>
                    <td><?php echo $k + 1; ?></td>
                    <td><?php echo $v['nama_layanan']; ?></td>
                    <td><?php echo $v['deskripsi_layanan']; ?></td>
                    <td>Rp. <?php echo number_format($v['harga_layanan'], 0, ',', '.'); ?></td>
                    <td><?php echo $v['estimasi_layanan']; ?> hari</td>
                    <td>
                        <img src="<?php echo $this->config->item("url_layanan") . $v['foto_layanan'] ?>" alt="" width="200">
                    </td>
                    <td>
                        <a href="<?php echo base_url("layanan/edit/" . $v["id_layanan"]) ?>" class="btn btn-warning">Edit</a>
                        <a href="#!" onclick="confirmDelete(<?php echo $v['id_layanan']; ?>)" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
    <a href="<?php echo base_url("layanan/tambah") ?>" class="btn btn-primary">Tambah Data</a>
</div>

<script>
    function confirmDelete(id_layanan) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo base_url('layanan/hapus/'); ?>" + id_layanan;
            }
        });
    }
    F
</script>