 <!-- album -->
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row judul">
            <div class="col-md-12 text-center">
          <h1><?php echo $title; ?></h1>
          </div>
        </div>
        <div class="row artikel">
          
          <div class="col-md-4">
            <p><img src="<?php echo base_url('assets/upload/image/'.$layanan->gambar) ?>" alt="<?php echo $title ?>" class="img img-thumbnail img-responsive"></p>
          </div>

          <div class="col-md-8">
            <p><strong>Harga mulai dari:Rp . <?php echo number_format($layanan->harga,'0',',','.') ?></strong></p>

          <?php echo $layanan->isi_layanan ?>  
          </div>
          <div class="clearfix"></div>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
        </div>
      </div>
    </div>
      </div>
        </div>
      </div>
          