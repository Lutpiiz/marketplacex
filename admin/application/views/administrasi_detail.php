<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h5>Detail Customer</h5>
            <table class="table table-bordered">
                <tr>
                    <td>Nama Customer</td>
                    <td><?php echo $customer['nama_customer']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $customer['email_customer']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?php echo $customer['alamat']; ?></td>
                </tr>
                <tr>
                    <td>No. Telepon</td>
                    <td><?php echo $customer['no_telepon']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Daftar</td>
                    <td><?php echo $customer['tanggal_daftar']; ?></td>
                </tr>
            </table>
            <div>
                <a href="#" onclick="confirmDelete(<?php echo $customer['id_customer']; ?>)" class="btn btn-danger">Hapus</a>
            </div>
        </div>
        <div class="col-md-8">
            <h5>Riwayat Pesanan</h5>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pesanan as $key => $value): ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $value['tanggal_pesan']; ?></td>
                        <td><?php echo $value['total_transaksi']; ?></td>
                        <td><?php echo $value['status_transaksi']; ?></td>
                        <td>
                            <a href="<?php echo base_url("transaksi/detail/" . $value["id_transaksi"]); ?>" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id_customer) {
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
                window.location.href = "<?php echo base_url('Administrasi/delete/'); ?>" + id_customer;
            }
        });
    }

    // Menampilkan notifikasi setelah penghapusan
    <?php if ($this->session->flashdata('success')): ?>
    Swal.fire({
        title: 'Berhasil!',
        text: '<?php echo $this->session->flashdata('success'); ?>',
        icon: 'success',
        confirmButtonText: 'OK'
    });
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
    Swal.fire({
        title: 'Gagal!',
        text: '<?php echo $this->session->flashdata('error'); ?>',
        icon: 'error',
        confirmButtonText: 'OK'
    });
    <?php endif; ?>
</script>
