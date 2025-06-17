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

<!-- main content -->
<h1 class="text-center" data-aos="fade-up">Order Detail</h1>
<div class="container detail-order p-4" data-aos="fade-up">
    <div class="row">
        <div class="row col-lg-6">
            <h5 class="col-sm-4 col-6">Nomor Pesanan</h5>
            <h5 class="col-sm-8 col-6"> : <?php echo $transaksi['id_transaksi'] ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="row col-lg-6">
            <h5 class="col-sm-4 col-6">Tanggal Pesan</h5>
            <h5 class="col-sm-8 col-6"> : <?php echo date('d F Y', strtotime($transaksi["tanggal_pesan"])) ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo date('H:i', strtotime($transaksi["tanggal_pesan"])) ?> WIB</h5>
        </div>
        <div class="row col-lg-6">
            <h5 class="text-end pe-0">Status Transaksi : <span class="badge <?php echo badge($transaksi['status_transaksi']); ?> fs-6"><?php echo ucfirst($transaksi['status_transaksi']) ?></span></h5>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-borderless table-striped table-light text-center">
            <thead>
                <tr>
                    <th scope="col">Produk</th>
                    <th scope="col">Nama Layanan</th>
                    <th scope="col">Harga Layanan</th>
                    <th scope="col">Jumlah Pesanan</th>
                    <th scope="col">Total Pesanan</th>
                    <th scope="col">Metode Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <td><img src="<?php echo base_url('assets/layanan/' . $transaksi['foto_layanan']) ?>" alt="" class="fit-detail-image"></td>
                <td><?php echo $transaksi['nama_layanan'] ?></td>
                <td>Rp. <?php echo number_format($transaksi['harga_layanan'], 0, ',', '.') ?></td>
                <td><?php echo $transaksi['jumlah_pesan'] ?></td>
                <td>Rp. <?php echo number_format($transaksi['total_transaksi'], 0, ',', '.') ?></td>
                <td><?php echo $transaksi['metode_pembayaran'] ?></td>
            </tbody>
        </table>
        <div class="bg-light p-4">
            <table>
                <tr>
                    <td>Nama Customer</td>
                    <td> : <?php echo $transaksi['nama_pemesan'] ?></td>
                </tr>
                <tr>
                    <td>Alamat Customer</td>
                    <td> : <?php echo $transaksi['link_alamat'] ?></td>
                </tr>
                <tr>
                    <td>Patokan</td>
                    <td> : <?php echo $transaksi['patokan'] ?></td>
                </tr>
            </table>



        </div>
        <?php if (!empty($snapToken)) :  ?>
            <div class="d-flex justify-content-end">
                <button href="" class="btn btn-danger mt-4 d-flex w-25 justify-content-center" id="pay-button">Bayar Sekarang</button>
            </div>
        <?php endif ?>

        <?php if (!empty($cekmidtrans)) :  ?>
            <div class="mt-5">
                <h3 class="text-center">Detail Pembayaran</h3>
                <table class="table table-borderless table-striped table-light text-center">
                    <thead>
                        <tr>
                            <th scope="col">Total Tagihan</th>
                            <th scope="col">Tipe Pembayaran</th>
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col">Nomor VA</th>
                            <th scope="col">Waktu Transaksi</th>
                            <th scope="col">Batas Akhir Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>Rp. <?php echo number_format($cekmidtrans['gross_amount'], 0, ',', '.') ?></td>
                        <td><?php echo $cekmidtrans['payment_type'] ?></td>
                        <td><?php echo $cekmidtrans['transaction_status'] ?>
                            <?php if ($cekmidtrans['transaction_status'] == 'pending'): ?><br>
                                Segera lakukan pembayaran sebelum waktu habis
                            <?php endif ?></td>
                        <td><?php echo $cekmidtrans['va_numbers'][0]['va_number'] ?></td>
                        <td><?php echo $cekmidtrans['transaction_time'] ?></td>
                        <td><?php echo $cekmidtrans['expiry_time'] ?></td>
                    </tbody>
                </table>
            </div>
        <?php endif ?>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-aY7QR4HTaPMu9-CR"></script>
<?php if (!empty($snapToken)) :  ?>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            snap.pay('<?php echo $snapToken ?>', {
                onSuccess: function(result) {
                    window.location.href = "<?php echo base_url('order/detail/' . $transaksi['id_transaksi']) ?>";
                },
                onPending: function(result) {
                    window.location.href = "<?php echo base_url('order/detail/' . $transaksi['id_transaksi']) ?>";
                },
                onError: function(result) {
                    window.location.href = "<?php echo base_url('order/detail/' . $transaksi['id_transaksi']) ?>";
                }
            });
        };
    </script>
<?php endif ?>