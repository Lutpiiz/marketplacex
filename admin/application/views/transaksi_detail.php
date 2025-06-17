<?php
function badge($status)
{
    switch ($status) {
        case 'dipesan':
            return 'bg-secondary';
        case 'dibayar':
            return 'bg-warning';
        case 'diproses':
            return 'bg-primary';
        case 'selesai':
            return 'bg-success';
        case 'dibatalkan':
            return 'bg-danger';
        default:
            return 'bg-secondary';
    }
}
?>

<div class="container">
    <div class="row mb-5">
        <div class="col-md-3 col-6">
            <h5>Transaksi</h5>
            <p>ID : <?php echo $transaksi['id_transaksi'] ?></p>
            <p><?php echo date('d F Y H:i', strtotime($transaksi['tanggal_pesan'])) ?></p>
            <span class="badge <?php echo badge($transaksi['status_transaksi']); ?> fs-6">
                <?php echo ucfirst($transaksi['status_transaksi']); ?>
            </span>
        </div>
        <div class="col-md-3 col-6">
            <h5>Pemesan</h5>
            <p><?php echo $transaksi['nama_pemesan'] ?> <?php echo $transaksi['no_telepon'] ?></p>
            <p><a href="<?php echo $transaksi['link_alamat'] ?>"><?php echo $transaksi['link_alamat'] ?></a></p>
            <p><?php echo $transaksi['patokan'] ?></p>
        </div>
        <!-- <div class="col-md-3"></div> -->
        <div class="col-md-6">
            <?php if (in_array($transaksi['status_transaksi'], ['dipesan', 'dibayar', 'diproses'])) : ?>
                <div class="d-flex justify-content-end">
                    <a href="#" onclick="confirmCancel(<?php echo $transaksi['id_transaksi']; ?>)" class="btn btn-danger">Batalkan Pesanan</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <h5>Pesanan</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $transaksi['nama_layanan'] ?></td>
                <td>Rp. <?php echo number_format($transaksi['harga_layanan'], 0, ',', '.') ?></td>
                <td><?php echo number_format($transaksi['jumlah_pesan']) ?></td>
                <td>Rp. <?php echo number_format($transaksi['total_transaksi'], 0, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>
    <?php if ($transaksi['status_transaksi'] == 'dipesan') : ?>
        <div class="alert alert-warning text-center mt-4">
            Menunggu customer untuk membayar
        </div>

    <?php elseif ($transaksi['status_transaksi'] == 'dibayar') : ?>
        <div class="d-flex justify-content-end">
            <a href="#" onclick="confirmProses(<?php echo $transaksi['id_transaksi']; ?>)" class="btn btn-primary">Proses Pesanan</a>
        </div>

    <?php elseif ($transaksi['status_transaksi'] == 'diproses') : ?>
        <div class="d-flex justify-content-end">
            <a href="#" onclick="confirmSelesai(<?php echo $transaksi['id_transaksi']; ?>)" class="btn btn-success">Selesaikan Pesanan</a>
        </div>

    <?php elseif ($transaksi['status_transaksi'] == 'selesai') : ?>
        <div class="alert alert-success text-center mt-4">
            Pesanan telah selesai
        </div>

    <?php elseif ($transaksi['status_transaksi'] == 'dibatalkan') : ?>
        <div class="alert alert-danger text-center mt-4">
            Pesanan dibatalkan
        </div>
    <?php endif; ?>

</div>

<script>
    function confirmCancel(id_transaksi) {
        Swal.fire({
            title: 'Yakin ingin membatalkan?',
            text: "Pesanan yang dibatalkan tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, batalkan!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo base_url('transaksi/batal/'); ?>" + id_transaksi;
            }
        });
    }

    function confirmProses(id_transaksi) {
        Swal.fire({
            title: 'Proses pesanan?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, proses!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo base_url('transaksi/proses/'); ?>" + id_transaksi;
            }
        });
    }

    function confirmSelesai(id_transaksi) {
        Swal.fire({
            title: 'Selesaikan pesanan?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, selesaikan!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo base_url('transaksi/selesai/'); ?>" + id_transaksi;
            }
        });
    }
</script>