<!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-newspaper"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Berita</span>
              <span class="info-box-number"><?php echo count($berita)  ?> <small> berita</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-image"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Galeri</span>
              <span class="info-box-number"><?php echo count($galeri)  ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">User</span>
              <span class="info-box-number"><?php echo count($user)  ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Layanan</span>
              <span class="info-box-number"><?php echo count($layanan)  ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    <?php 
// notifikasi
  if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';

  }
   ?>
   <p>
     <a href="<?php echo base_url('admin/berita/tambah') ?>" title="Tambah Berita Baru" class="btn btn-success">
       <i class="fa fa-plus"></i>Tambah Baru
     </a>
   </p>

  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Gambar</th>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Jenis - Status</th>
                  
                  <th>Penulis</th>
                  <th>Tanggal</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1;foreach ($berita as $berita) { ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" width="60" class="img img-thumbnail"></td>
                 
                  <td><?php echo $berita->judul_berita ?>
                  </td>
                  <td><?php echo $berita->nama_kategori ?>
                  </td>
                  <td><?php echo $berita->jenis_berita ?> - <?php echo $berita->status_berita ?> </td>
                  <td> <?php echo $berita->nama ?></td>
                  <td><?php echo $berita->tanggal_post ?></td>
                  <td>
                    <a href="<?php echo base_url('admin/berita/edit/'.$berita->id_berita) ?>" title="Edit berita" class="btn btn-warning btn-xs">
                      <i class="fa fa-edit">Edit</i>
                    </a>
                  
                  </td>
                </tr>
                <?php $i++;} ?>
</tbody>
</table>
