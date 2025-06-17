<!-- main content -->
<div class="container" data-aos="fade-up">
  <h1 class="text-center">Product List</h1>

  <div class="row align-items-stretch">
    <?php foreach ($produk as $key => $value) :  ?>
      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 py-3">
        <a href="<?php echo base_url('product/detail/' . $value['id_produk']) ?>" style="text-decoration: none;">
          <div class="card h-100 shadow-lg d-flex flex-column">

            <img src="<?php echo base_url('assets/produk/' . $value['foto_produk']) ?>" class="card-img-top fit-image pt-1" alt="...">
            <div class="card-body d-flex flex-column justify-content-between">
              <div>
                <span class="text-center d-block"><?php echo $value['nama_produk'] ?> <?php echo $value['ram'] ?>/<?php echo $value['storage'] ?></span>
                <span class="text-center d-block"><i class="fa-solid fa-star " style="color: orange;"></i>4.5</span>
              </div>
              <div class="mt-auto">
                <hr>
                <span class="text-center d-block">Rp. <?php echo number_format($value['harga'], 0, ',', '.') ?></span>
              </div>
            </div>

          </div>
        </a>

      </div>
    <?php endforeach ?>
  </div>
</div>