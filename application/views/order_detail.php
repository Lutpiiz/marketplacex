<!-- ganti warna badge status transaksi -->
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

<!-- css buat bintang rating -->
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

    .rating {
        font-size: 0;
    }

    .stars a:hover~a:after {
        color: #9e9e9e !important;
    }

    .rating.active a.active~a:after {
        color: #9e9e9e;
    }

    .rating:hover a:after {
        color: gold !important;
    }

    .rating.active a:after,
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

        <?php if ($transaksi['status_transaksi'] == 'selesai' && empty($transaksi['nilai_rating'])) :  ?>
            <div class="bg-light p-4">
                <form action="" method="post">
                    <h3>Beri Ulasan</h3>
                    <p class="stars">
                        <span class="rating">
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
                
                <script>
                    $('.stars a').on('click', function(e) {
                        e.preventDefault();
                        $('.stars .rating, .stars a').removeClass('active');

                        $(this).addClass('active');
                        $('.stars .rating').addClass('active');
                        $('.nilai_rating').val($(this).text());
                    });
                </script>
            </div>
        <?php endif ?>

        <?php if (!empty($transaksi['nilai_rating'])) :  ?>
            <div class="bg-light p-4">
                <h3>Ulasan Anda</h3>
                <p class="stars text-warning">
                    <?php
                    $nilai = (int) $transaksi['nilai_rating'];
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $nilai) {
                            echo '<i class="fa-solid fa-star"></i>';
                        } else {
                            echo '<i class="fa-regular fa-star"></i>';
                        }
                    }
                    ?>
                </p>
                <p><?php echo $transaksi['isi_rating'] ?></p>
            </div>
        <?php endif ?>
    </div>
</div>