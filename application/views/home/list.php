<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
       
        <div class="carousel-inner">
           <?php $i=1; foreach($slider as $slider) {?>
          <div class="carousel-item <?php if($i==1){echo 'active';}?>">
            <img class="first-slide" src="<?php echo base_url('assets/upload/image/'.$slider->gambar) ?>" alt="<?php echo $slider->judul_galeri ?>">
            <div class="container">
              <div class="carousel-caption col-md-6 text-left">
                <h1><?php echo $slider->judul_galeri ?></h1>
                <p><?php echo strip_tags($slider->isi_galeri) ?></p>
                <p><a class="btn btn-lg btn-primary" href="<?php echo $slider->website  ?>" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
         <?php $i++; } ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
<!-- Marketing -->
  <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <?php foreach($layanan as $layanan) { ?>
          <div class="col-lg-4">
            <img class="rounded-circle" src="<?php echo base_url('assets/upload/image/thumbs/'.$layanan->gambar) ?>" alt="<?php echo $layanan->judul_layanan ?>" width="140" height="140">
            <h2><?php echo $layanan->judul_layanan ?></h2>
            <p><?php echo character_limiter($layanan->isi_layanan,200 )?></p>
            <p><a class="btn btn-success" href="<?php echo base_url('layanan/read/'.$layanan->slug_layanan) ?>" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        
          <?php } ?>
        </div><!-- /.row -->
    </div>
      <!-- album -->
      <div class="album py-5 bg-light">
        <div class="container">
        <h1>SELAMAT DATANG DI WEBSITE KAMI</h1>


          <div class="row">
            <?php foreach ($berita as $berita) { ?>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" alt="Card image cap">
                	<h2><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>"><?php echo $berita->judul_berita ?></a></h2>
                <div class="card-body">
                  <p class="card-text">
                    <?php echo character_limiter(strip_tags($berita->isi_berita),200) ?>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                 <p class="text-right"><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye">Detail...</i></a></p>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
              <?php } ?>
              <div class="clearfix"></div>
          </div>
        </div>
      </div>

<hr> 