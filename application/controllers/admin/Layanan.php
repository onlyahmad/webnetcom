<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {
// Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('layanan_model');
		
	}
	public function index()
	{
		$layanan =$this->layanan_model->listing();
		$data=array('title' => 'Data Layanan ('.count($layanan).')',
			'layanan' =>$layanan,
			'isi' =>'admin/layanan/list'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	// Tambah Layanan
	public function tambah()
	{

		

		// validasi
		$valid=$this->form_validation;
		$valid->set_rules('judul_layanan','Judul layanan','required',
			array('required' => '%s harus diisi'));
		$valid->set_rules('isi_layanan','Isi layanan','required',
			array('required' => '%s harus diisi'));

		if ($valid->run()) {
			   $config['upload_path']          = './assets/upload/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('gambar')){

			// End validasi
		
	
		$data=array('title' => 'Tambah Layanan',
			
			'error_upload'=> $this->upload->display_errors(),
			'isi' =>'admin/layanan/tambah'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
	}else{
		// proses manipulasi gambar
		$upload_data=array('uploads'=>$this->upload->data());
		// Gambar asli disimpan di folder assets/upload/image
		// lalu gambar asli di copy untuk versi mini size ke folder assets/upload/image/thumbs
				$config['image_library'] = 'gd2';
		$config['source_image'] = './assets/upload/image/'.$upload_data['uploads']['file_name'];
		// gambar versi kecilpindahkan
		$config['new_image']= './assets/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = 200;
		$config['height']       = 200;
		$config['thumb_marker']='';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();


		$i=$this->input;
		$data = array('id_user' =>$this->session->userdata('id_user'),
					  
					  'slug_layanan' =>url_title($this->input->post('judul_layanan'), 'dash', TRUE),
			  	      'judul_layanan' =>$i->post('judul_layanan'),
					  'isi_layanan' =>$i->post('isi_layanan'),
				  		'harga' => $i->post('harga'),
					  	'gambar' => $upload_data['uploads']['file_name'],
					  	'status_layanan'=>$i->post('status_layanan'),
					  	'keywords'=>$i->post('keywords'),
				  		'tanggal_post' =>date('Y-m-d H:i:s')
					  );
		$this->layanan_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambah');
		redirect(base_url('admin/layanan'),'refresh');
	}}
	// End masuk database

		$data=array('title' => 'Tambah Layanan',
			
			'isi' =>'admin/layanan/tambah'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit Layanan

	public function edit($id_layanan)
	{
		$layanan=$this->layanan_model->detail($id_layanan);


		// validasi
		$valid=$this->form_validation;
		$valid->set_rules('judul_layanan','Judul layanan','required',
			array('required' => '%s harus diisi'));
		$valid->set_rules('isi_layanan','Isi layanan','required',
			array('required' => '%s harus diisi'));

		if ($valid->run()) {
			// Kalau tidak ganti gambar
			if(!empty($FILES['gambar']['name'])){
			   $config['upload_path']          = './assets/upload/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('gambar')){

			// End validasi
		
	
		$data=array('title' => 'Edit Layanan',
			
			'layanan' =>$layanan,
			'error_upload'=> $this->upload->display_errors(),
			'isi' =>'admin/layanan/edit'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
	}else{
		// proses manipulasi gambar
		$upload_data=array('uploads'=>$this->upload->data());
		// Gambar asli disimpan di folder assets/upload/image
		// lalu gambar asli di copy untuk versi mini size ke folder assets/upload/image/thumbs
				$config['image_library'] = 'gd2';
		$config['source_image'] = './assets/upload/image/'.$upload_data['uploads']['file_name'];
		// gambar versi kecilpindahkan
		$config['new_image']= './assets/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = 200;
		$config['height']       = 200;
		$config['thumb_marker']='';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();


		$i=$this->input;

		// hapus gambar lama jika ada upload gambar baru

		if($layanan->gambar != ""){
			unlink('./assets/upload/image/'.$layanan->gambar);
			unlink('./assets/upload/image/thumbs/'.$layanan->gambar);
			
		}
		// end hapus gambar
		$data = array('id_layanan' =>$id_layanan,
			'id_user' =>$this->session->userdata('id_user'),
					  
					  'slug_layanan' =>url_title($this->input->post('judul_layanan'), 'dash', TRUE),
			  	      'judul_layanan' =>$i->post('judul_layanan'),
					  'isi_layanan' =>$i->post('isi_layanan'),
				  		'harga' => $i->post('harga'),
					  	'gambar' => $upload_data['uploads']['file_name'],
					  	'status_layanan'=>$i->post('status_layanan'),
					  	'keywords'=>$i->post('keywords')
				  		
					  );
		$this->layanan_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('admin/layanan'),'refresh');
	}}else{
// update layanan tanpa ganti gambar baru
		$i=$this->input;

		$data = array('id_layanan' =>$id_layanan,
			'id_user' =>$this->session->userdata('id_user'),
					  
					  'slug_layanan' =>url_title($this->input->post('judul_layanan'), 'dash', TRUE),
			  	      'judul_layanan' =>$i->post('judul_layanan'),
					  'isi_layanan' =>$i->post('isi_layanan'),
				  		'harga' => $i->post('harga'),
					  
					  	'status_layanan'=>$i->post('status_layanan'),
					  	'keywords'=>$i->post('keywords')
				  		
					  );
		$this->layanan_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('admin/layanan'),'refresh');
	}}
	// End masuk database

		$data=array('title' => 'Edit Layanan',
			
			'layanan'=>$layanan,
			'isi' =>'admin/layanan/edit'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete layanan
	public function delete($id_layanan)
	{
		// proteksi delete
		$this->check_login->check();

		$layanan=$this->layanan_model->detail($id_layanan);
		// Hapus gambar
		if($layanan->gambar != ""){
			unlink('./assets/upload/image/'.$layanan->gambar);
			unlink('./assets/upload/image/thumbs/'.$layanan->gambar);
			
		}
		// end hapus gambar
		$data= array('id_layanan' => $layanan->id_layanan);
		$this->layanan_model->delete($data);
		$this->session->flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/layanan'),'refresh');

	}

}

/* End of file Layanan.php */
/* Location: ./application/controllers/admin/Layanan.php */