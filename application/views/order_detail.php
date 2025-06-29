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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .stars a {
        display: inline-block;
        padding-right: 4px;
        text-decoration: none;
        margin: 0;
    }

    .stars a:after {
        position: relative;
        font-size: 18px;
        font-family: 'FontAwesome', serif;
        display: block;
        content: "\f005";
        color: #9e9e9e;
    }

    span {
        font-size: 0;
        /* trick to remove inline-element's margin */
    }

    .stars a:hover~a:after {
        color: #9e9e9e !important;
    }

    span.active a.active~a:after {
        color: #9e9e9e;
    }

    span:hover a:after {
        color: gold !important;
    }

    span.active a:after,
    .stars a.active:after {
        color: gold;
    }
</style>


<!-- main content -->
<h1 class="text-center" data-aos="fade-up">Order Detail</h1>
<div class="container detail-order p-4" data-aos="fade-up">
    <div class="row">
        <div class="row col-lg-6">
            <h5 class="col-sm-4 col-6">Kode Transaksi</h5>
            <h5 class="col-sm-8 col-6"> : <?php echo $transaksi['kode_transaksi'] ?></h5>
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
                    <th scope="col">Foto Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Produk</th>
                </tr>
            </thead>
            <tbody>
                <td><img src="<?php echo base_url('assets/produk/' . $transaksi['foto_produk']) ?>" alt="" class="fit-detail-image"></td>
                <td><?php echo $transaksi['nama_produk'] ?></td>
                <td>Rp. <?php echo number_format($transaksi['total_transaksi'], 0, ',', '.') ?></td>
            </tbody>
        </table>
        <div class="bg-light p-4">
            <form action="" method="post">
                <h3>Beri Ulasan</h3>
                <p class="stars">
                    <span>
                        <a class="star-1" href="#">1</a>
                        <a class="star-2" href="#">2</a>
                        <a class="star-3" href="#">3</a>
                        <a class="star-4" href="#">4</a>
                        <a class="star-5" href="#">5</a>
                    </span>
                </p>
                <input type="hidden" class="nilai_rating" name="nilai_rating">
                <input type="hidden" name="id_produk" value="<?php echo $transaksi['id_produk'] ?>">
                <input type="hidden" name="id_transaksi" value="<?php echo $transaksi['id_transaksi'] ?>">
                <textarea name="isi_rating" class="form-control"></textarea>
                <button class="btn orange mt-3 text-white">Kirim Ulasan</button>
            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $('.stars a').on('click', function(e) {
                    e.preventDefault();
                    $('.stars span, .stars a').removeClass('active');

                    $(this).addClass('active');
                    $('.stars span').addClass('active');
                    // alert($(this).text());
                    $('.nilai_rating').val($(this).text());
                });
            </script>
        </div>





        <!-- <?php if (!empty($snapToken)) :  ?>
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
        <?php endif ?> -->
    </div>
</div>

<!-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-aY7QR4HTaPMu9-CR"></script>
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
<?php endif ?> -->