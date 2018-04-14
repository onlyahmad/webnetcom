<!-- Marketing -->
  <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row judul">
            <div class="col-md-12 text-center">
          <h1><?php echo $title; ?></h1>
          </div>
        </div>
        <br>
        <div class="row">
          <?php foreach ($layanan as $layanan) {?>
          <div class="col-lg-4">
            <img class="rounded-circle" src="<?php echo base_url('assets/upload/image/thumbs/'.$layanan->gambar) ?>" alt="<?php echo $layanan->judul_layanan ?>" width="140" height="140">
            <h2><?php echo $layanan->judul_layanan ?></h2>
            <p><?php echo strip_tags(character_limiter($layanan->isi_layanan),200) ?></p>
            <p><a class="btn btn-success" href="<?php echo base_url('layanan/read/'.$layanan->slug_layanan)?>" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
         <?php } ?>
        </div><!-- /.row -->
        <div class="row">
            <?php if(isset($paginasi)&&$total>$limit){?>
                 <div class="paginasi col-md-12 text-center">
            <?php  echo $paginasi; ?>
                 <div class="clearfix"></div>
                 </div>
            <?php } ?>
        </div>
    </div>
      <!-- album -->
   
          </div>
        </div>
      </div>
