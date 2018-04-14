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
echo form_open_multipart(base_url('admin/layanan/tambah'),$attribut);
?>
<div class="col-md-8">
	<div class="form-group form-group-lg">
		<label>Judul Layanan</label>
		<input type="text" name="judul_layanan" class="form-control" placeholder="Judul Layanan" value="<?php echo set_value('judul_layanan') ?>" required>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group form-group-lg">
		<label>Status Layanan</label>
		<select name="status_layanan" class="form-control">
			<option value="Publish">Publish</option>
			<option value="Draft">Draft</option>
		</select>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Harga Layanan</label>
		<input type="number" name="harga" class="form-control" placeholder="Harga Layanan " value="<?php echo set_value('harga') ?>" required>
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
		<label>Isi Layanan</label>
		<textarea name="isi_layanan" class="form-control" placeholder="Isi Layanan"><?php echo set_value('keywords') ?></textarea>
	</div>
	<div class="form-group ">
		<label>Keyword layanan (untuk SEO Google)</label>
		<textarea name="keywords" class="form-control" placeholder="Keywords Layanan"><?php echo set_value('isi_layanan') ?></textarea>
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