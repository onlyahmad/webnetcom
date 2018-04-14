<?php 
// site dari konfigurasi
$site_info=$this->konfigurasi_model->listing();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $site_info->namaweb ?></title>
	<link rel="shortcut icon"  href="<?php echo base_url('assets/upload/image/thumbs/'.$site_info->icon) ?>">
	<!-- Description -->
	<meta name="description" content="<?php echo $site_info->deskripsi ?>">
	<meta name="keywords" content="<?php echo $site_info->namaweb.' , '.$site_info->keywords ?>"> 
	<meta name="author" content="<?php echo $site_info->namaweb ?>">
	<!-- CSS bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/css/bootstrap.min.css">
	<!-- CSS buatan sendiri -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/fontawesome/css/font-awesome.min.css">
</head>
<body>