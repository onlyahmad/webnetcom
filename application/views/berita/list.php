<div class="album py-5 bg-light">
	<div class="container">
		<div class="row judul">
			<div class="col-md-12 text-center">
				<h1>Berita</h1>
			</div>
			
		</div>
		<div class="row">
      <div></div>
      <?php foreach ($berita as $berita ) {?>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" alt="<?php echo $berita->judul_berita ?>">
                	<h2><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>"><?php echo $berita->judul_berita ?></a></h2>
                <div class="card-body">
                  <p class="card-text"><?php echo strip_tags(character_limiter($berita->isi_berita),200) ?></p>
                  <p>
               <a class="btn btn-success" href="<?php echo base_url('berita/read') ?>" role="button">
                <i class="fa fa-eye"></i>View &raquo;</a></p>
                   
                </div>

              </div>
            </div>
              <?php } ?>
           
           <div class="clearfix"></div>
          </div>
          <div class="row">
           
              <?php if(isset($paginasi)&&$total>$limit){?>
                 <div class="paginasi col-md-12 text-center">
                
             <?php  echo $paginasi; ?>
              <div class="clearfix"></div>
            </div>
            <?php } ?>
          </div>
</div>