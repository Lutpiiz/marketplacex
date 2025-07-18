<!-- <?php
echo '<pre>';
print_r($rekomendasi_hybrid);
echo '</pre>';
?> -->
<!-- main content -->
<div class="form-order" data-aos="zoom-in">

  <!-- Detail Produk -->
  <div>
    <div class="row">
      <div class="col-6">
        <img src="<?php echo base_url('assets/produk/' . $detail_produk['foto_produk']) ?>" alt="" class="img-fluid">
      </div>
      <div class="col-6">
        <h3 class="card-title"><?php echo $detail_produk['nama_produk']; ?></h3>

        <div class="container mt-4">
          <!-- Baris 1 -->
          <div class="row row-border-bottom row-border-top">
            <div class="col-3 p-3 text-center">Brand</div>
            <div class="col-3 p-3 text-center"><?php echo $detail_produk['brand']; ?></div>
            <div class="col-3 p-3 text-center">Tahun Rilis</div>
            <div class="col-3 p-3 text-center"><?php echo $detail_produk['tahun_rilis']; ?></div>
          </div>

          <!-- Baris 2 -->
          <div class="row row-border-bottom">
            <div class="col-3 p-3 text-center">Processor</div>
            <div class="col-3 p-3 text-center"><?php echo $detail_produk['processor']; ?></div>
            <div class="col-3 p-3 text-center">Baterai</div>
            <div class="col-3 p-3 text-center"><?php echo $detail_produk['baterai']; ?> mAh</div>
          </div>

          <!-- Baris 3 -->
          <div class="row row-border-bottom">
            <div class="col-3 p-3 text-center">RAM</div>
            <div class="col-3 p-3 text-center"><?php echo $detail_produk['ram']; ?> GB</div>
            <div class="col-3 p-3 text-center">OS</div>
            <div class="col-3 p-3 text-center"><?php echo $detail_produk['os']; ?></div>
          </div>

          <!-- Baris 4 -->
          <div class="row row-border-bottom">
            <div class="col-3 p-3 text-center">Memori</div>
            <div class="col-3 p-3 text-center"><?php echo $detail_produk['storage']; ?> GB</div>
            <div class="col-3 p-3 text-center">Jaringan</div>
            <div class="col-3 p-3 text-center"><?php echo $detail_produk['jaringan']; ?></div>
          </div>

          <!-- Baris 5 -->
          <div class="row row-border-bottom">
            <div class="col-3 p-3 text-center">Resolusi</div>
            <div class="col-3 p-3 text-center"><?php echo $detail_produk['resolusi_layar']; ?> pixel</div>
            <div class="col-3 p-3 text-center">Kamera Depan</div>
            <div class="col-3 p-3 text-center"><?php echo $detail_produk['kamera_depan']; ?></div>
          </div>

          <!-- Baris 6 -->
          <div class="row row-border-bottom">
            <div class="col-3 p-3 text-center">Layar</div>
            <div class="col-3 p-3 text-center"><?php echo $detail_produk['ukuran_layar']; ?> in <?php echo $detail_produk['tipe_layar']; ?></div>
            <div class="col-3 p-3 text-center">Kamera Belakang</div>
            <div class="col-3 p-3 text-center"><?php echo $detail_produk['kamera_belakang']; ?></div>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <h3 class="mt-4">Rp. <?php echo number_format($detail_produk['harga'], 0, ',', '.') ?></h3>
          </div>
          <div class="col-6">
            <div class="login-button">

              <!-- Form beli -->
              <form method="post" action="<?php echo base_url('product/pesan'); ?>">
                <input type="hidden" name="id_produk" value="<?php echo $detail_produk['id_produk']; ?>">
                <button type="submit" class="btn text-white button-buy">Beli Sekarang</button>
              </form>

            </div>
          </div>
        </div>

      </div>
    </div>

    <hr>
    <?php if (!empty($rekomendasi_hybrid)) : ?>
      <h4 class="mt-5">Rekomendasi Berdasarkan Collaborative Filtering</h4>
      <div class="row align-items-stretch">
        <?php foreach ($rekomendasi_hybrid as $key => $value) : ?>
          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 py-3">
            <a href="<?php echo base_url('product/detail/' . $value['id_produk']) ?>" style="text-decoration: none;">
              <div class="card h-100 shadow-lg d-flex flex-column">

                <span class="text-center" style="font-size: 14px;">Predicted Rating: <?php echo number_format($value['cf_score'], 1) ?></span>
                <span class="text-center" style="font-size: 14px;">CF Normalized: <?php echo number_format(($value['cf_score'] / 5), 3) ?></span>
                <span class="text-center" style="font-size: 14px;">Similarity: <?php echo number_format($value['similarity'], 5) ?></span>
                <span class="text-center" style="font-size: 14px;">Hybrid Score: <?php echo number_format($value['hybrid_score'], 5) ?></span>

                <img src="<?php echo base_url('assets/produk/' . $value['foto_produk']) ?>" class="card-img-top fit-image pt-1" alt="...">
                <div class="card-body d-flex flex-column justify-content-between">
                  <span class="d-block"><?php echo $value['nama_produk'] ?> <?php echo $value['ram'] ?>/<?php echo $value['storage'] ?></span>
                  <div class="mt-auto">
                    <span class="d-block mt-2"><i class="fa-solid fa-star" style="color: gold;"></i><?php echo isset($value['rata_rating']) ? number_format($value['rata_rating'], 1) : '0.0' ?> | <?php echo $value['jumlah_jual'] ?> Terjual</span>
                    <hr class="mt-1">
                    <span class="d-block">Rp. <?php echo number_format($value['harga'], 0, ',', '.') ?></span>
                  </div>
                </div>

              </div>
            </a>
          </div>
        <?php endforeach ?>
      </div>
    <?php else : ?>
      <p class="text-muted">Belum ada rekomendasi berdasarkan rating pengguna lain.</p>
    <?php endif ?>


  </div>

</div>