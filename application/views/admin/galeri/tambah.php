<?php  
// Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');
// error upload
if(isset($error_upload)){
	echo '<div class="alert alert-warning">'.$error_upload.'</div';
}
// Attribut
$attribut='class="alert alert-info"';
// form open
echo form_open_multipart(base_url('admin/galeri/tambah'),$attribut);
?>
<div class="col-md-8">
	<div class="form-group form-group-lg">
		<label>Judul Galeri</label>
		<input type="text" name="judul_galeri" class="form-control" placeholder="Judul Galeri" value="<?php echo set_value('judul_galeri') ?>" required>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group form-group-lg">
		<label>Posisi Galeri</label>
		<select name="posisi_galeri" class="form-control">
			<option value="Galeri">Galeri</option>
			<option value="Homepage">Homepage Slider</option>
		</select>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Ling/URL galeri</label>
		<input type="url" name="website" class="form-control" placeholder="<?php echo base_url() ?> " value="<?php echo set_value('website') ?>" required>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Upload Gambar</label>
		<input type="file" name="gambar" class="form-control" required>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group ">
		<label>Isi Galeri</label>
		<textarea name="isi_galeri" class="form-control" placeholder="Isi Galeri"><?php echo set_value('keywords') ?></textarea>
	</div>
	
	<div class="form-group text-right">
		<button type="submit" name="sabmit" class="btn btn-success btn-lg">
		<i class="fa fa-save"></i>Simpan</button>
		<button type="reset" name="reset" class="btn btn-default btn-lg">
		<i class="fa fa-times"></i>Reset</button>
	</div>
</div>
<div class="clearfix"></div>
<?php 
// form close
echo form_close();
 ?>