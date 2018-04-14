 <!-- album -->
      <div class="album py-5 bg-light">
        <div class="container">
        	<div class="row judul">
        		<div class="col-md-12 text-center">
        	<h1>Profil Kami</h1>
        	</div>
        </div>
        <div class="row artikel">
        	
         	<div class="col-md-5">
         		<!-- map dari google  -->
                <?php echo $konfigurasi->map ?>
         	</div>
         	<div class="col-md-7">
         		<p>
         		<strong><?php echo $konfigurasi->namaweb ?></strong>
         		<br><?php echo nl2br($konfigurasi->alamat) ?>
                <br><i class="fa fa-phone"><?php echo $konfigurasi->telepon ?></i>
                <br><i class="fa fa-envelope"> <?php echo $konfigurasi->email ?></i>
         		<br><i class="fa fa-globe"></i>  
                <?php echo $konfigurasi->website ?>
         		</p>
         		<hr>
         		<p>Anda dapat mengubingi kami melalui formulir di bawah ini:</p>
         		<form action="" method="post" accept-charset="utf-8" class="alert alert-success">
         			<div class="row">
         			<div class="col-md-6">
         				<div class="form-group">
         					<label>Nama Anda</label>
         					<input type="text" name="nama" placeholder="Nama" class="form-control" required>
         				</div>
         			</div>
         			<div class="col-md-6">
         				<div class="form-group">
         					<label>Email Anda</label>
         					<input type="email" name="email" placeholder="Masukkan Email" class="form-control" required>
         				</div>
         			</div>
         			<div class="col-md-12">
         				<div class="form-group">
         					<label>Pesan Anda</label>
         					<textarea name="pesan" class="form-control" placeholder="Pesan Anda" required></textarea>
         				</div>
         			</div>
         			<div class="form-group"></div>
         			<input type="submit" name="submit" class="btn btn-success btn-lg" placeholder="">
         			</div>
         		</form>
         	</div>
         	