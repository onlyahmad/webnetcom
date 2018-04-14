<?php 

// site dari konfigurasi
$site_info=$this->konfigurasi_model->listing();

// menu berita
$menu_berita=$this->konfigurasi_model->menu_berita();
$menu_layanan=$this->konfigurasi_model->menu_layanan();
$menu_profil=$this->konfigurasi_model->menu_profil();
 ?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary" id="top">
 <div class="container">
      <a  class="navbar-brand" href="<?php echo base_url() ?>"><?php echo $site_info->namaweb ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"  >
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
            </li>

            <!-- Berita -->
            <li class="nav-item dropdown">
         
    <a  class="nav-link dropdown-toggle"  data-toggle="dropdown" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">Berita</a>
    <div class="dropdown-menu">
    <?php foreach ($menu_berita as $menu_berita) { ?>
      <a class="dropdown-item" href="<?php echo base_url('berita/kategori/'.$menu_berita->slug_kategori) ?>"><?php echo $menu_berita->nama_kategori; ?></a>

    <?php } ?>
        
     
      <a class="dropdown-item" href="<?php echo base_url('berita') ?>">Index berita</a> 
  
  </div><!-- /btn-group -->
            </li>
            <!-- layanan -->
            <li class="nav-item dropdown">
         
    <a  class="nav-link dropdown-toggle"  data-toggle="dropdown" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">Layanan</a>
    <div class="dropdown-menu">
    <?php foreach ($menu_layanan as $menu_layanan) { ?>
      <a class="dropdown-item" href="<?php echo base_url('layanan/read/'.$menu_layanan->slug_layanan) ?>"><?php echo $menu_layanan->judul_layanan; ?></a>

    <?php } ?>
       
  <a class="dropdown-item" href="<?php echo base_url('layanan') ?>">Index layanan</a> 
  </div><!-- /btn-group -->
            </li>
              <!-- Profile -->
            <li class="nav-item dropdown">
         
    <a  class="nav-link dropdown-toggle"  data-toggle="dropdown" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">Profile</a>
    <div class="dropdown-menu">
    <?php foreach ($menu_profil as $menu_profil) { ?>
      <a class="dropdown-item" href="<?php echo base_url('berita/read/'.$menu_profil->slug_berita) ?>"><?php echo $menu_profil->judul_berita; ?></a>

    <?php } ?>
       
 
  </div><!-- /btn-group -->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('contact') ?>">Contact</a>
            </li>
           
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
    </div>
 </nav>