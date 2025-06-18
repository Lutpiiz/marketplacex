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
    <h4 class="mt-5">Rekomendasi Produk Serupa</h4>
    <div class="row">
      <?php foreach ($rekomendasi as $p) : ?>
        <div class="col-md-3 mb-3">
          <div class="card h-100">
            <img src="<?php echo base_url('assets/produk/' . $p['foto_produk']) ?>" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title"><?php echo $p['nama_produk']; ?></h5>
              <p class="card-text">Rp. <?php echo number_format($p['harga'], 0, ',', '.'); ?></p>
              <p class="text-muted mb-2" style="font-size: 14px;">Similarity: <?php echo number_format($p['similarity'], 4); ?></p>
              <a href="<?php echo base_url('product/detail/' . $p['id_produk']); ?>" class="btn btn-primary">Lihat</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>


  </div>



</div>