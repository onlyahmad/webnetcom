<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {
	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('layanan_model');
	}
	// Main page - Layanan
	public function index()
	{
		$konfigurasi=$this->konfigurasi_model->listing();
			// Listing layanan dengan paginition
		$this->load->library('pagination');

		$config['base_url'] = base_url('layanan/index/');
		$config['total_rows'] = count($this->layanan_model->total());
		$config['per_page'] = 3;
		$config['uri_segment']=3;
		// Limit dan start
		$limit= $config['per_page'];
		$start=($this->uri->segment(3))?($this->uri->segment(3)):0;

		$this->pagination->initialize($config);
// end limit dan start
		$layanan=$this->layanan_model->layanan($limit,$start);
		$data=array('title' =>'Layanan - '.$konfigurasi->namaweb ,
			'deskripsi'=>'Layanan - '.$konfigurasi->namaweb ,
			'keywords'=>'Layanan - '.$konfigurasi->namaweb ,
			'paginasi'=>$this->pagination->create_links(),
			'layanan'=>$layanan,
			'limit'=>$limit,
			'total'=>$config['total_rows'],
					'isi'	=>'layanan/list'
					 );
		$this->load->view('layout/wrapper',$data,FALSE);
	}

	// Detail page - Layanan
	public function read($slug_layanan)
	{
		$konfigurasi=$this->konfigurasi_model->listing();
		$layanan=$this->layanan_model->read($slug_layanan);
		$data=array('title' =>$layanan->judul_layanan ,
			'deskripsi'=>$layanan->judul_layanan.','.$layanan->keywords ,
			'keywords'=>$layanan->judul_layanan.','.$layanan->keywords,
			'layanan'=>$layanan,
					'isi'	=>'layanan/read'
					 );
		$this->load->view('layout/wrapper',$data,FALSE);
	}
}
