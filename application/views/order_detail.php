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
            <?php if ($transaksi['status_transaksi'] == 'selesai'): ?>
                <form method="post">
                    <div class="container">
                        <h4 class="mb-3">Beri Ulasan</h4>
                        <?php $belumdiisi = 0; ?>
                        <?php foreach ($transaksi_detail as $k => $v): ?>
                            <?php if (empty($v['jumlah_rating'])): ?>
                                <?php $belumdiisi++; ?>
                                <div class="mb-2">
                                    <h6><?php echo $v['nama_beli'] ?></h6>
                                    <p class="stars" k="<?php echo $k ?>">
                                        <span k="<?php echo $k ?>">
                                            <a k="<?php echo $k ?>" class="star-1" href="#">1</a>
                                            <a k="<?php echo $k ?>" class="star-2" href="#">2</a>
                                            <a k="<?php echo $k ?>" class="star-3" href="#">3</a>
                                            <a k="<?php echo $k ?>" class="star-4" href="#">4</a>
                                            <a k="<?php echo $k ?>" class="star-5" href="#">5</a>
                                        </span>
                                    </p>
                                    <input type="hidden" name="id_transaksi_detail[]" value="<?php echo $v['id_transaksi_detail'] ?>">
                                    <input type="hidden" class="jrt" name="jumlah_rating[]" k="<?php echo $k ?>">
                                    <textarea class="form-control" name="ulasan_rating[]"></textarea>
                                </div>
                                <hr>
                            <?php endif ?>

                            <?php if (!empty($v['jumlah_rating'])): ?>
                                <h6><?php echo $v['nama_beli'] ?></h6>
                                <?php foreach (range(1, $v['jumlah_rating']) as $kuy => $jum): ?>
                                    <i class="bi bi-star-fill text-warning"></i>
                                <?php endforeach ?>
                                <div class="bg-light small text-muted">
                                    <?php echo $v['ulasan_rating']; ?>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>

                        <?php if ($belumdiisi > 0): ?>
                            <button class="btn btn-primary">Kirim</button>
                        <?php endif ?>

                    </div>
                </form>
            <?php endif ?>

            <script>
                $('.stars a').on('click', function(e) {
                    e.preventDefault();
                    k = $(this).attr('k');
                    $('.stars span[k="' + k + '"], .stars a[k="' + k + '"]').removeClass('active');

                    $(this).addClass('active');
                    $('.stars span[k="' + k + '"]').addClass('active');
                    $('.jrt[k="' + k + '"]').val($(this).text());

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
<?php endif ?> -->