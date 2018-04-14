<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	// load data konfigurasi
	public function __construct()
	{
		parent::__construct();
		// proteksi
		if($this->session->userdata('akses_level')!="Admin")
		{
			$this->session->set_flashdata('sukses','Hak akses Anda tidak mencukupi');
			redirect(base_url('admin/dasbor'),'refresh');
		}
		$this->load->model('konfigurasi_model');
	}

// konfigurasi umum
	public function index()
	{
		$konfigurasi=$this->konfigurasi_model->listing();

// validasi
		$this->form_validation->set_rules('namaweb','Nama Web','required',
			array('required' => '%s harus diisi'
			));
		if($this->form_validation->run()===FALSE){
			// end validasi
		$data = array('title' => 'konfigurasi website',
			'konfigurasi' =>$konfigurasi,
			'isi' => 'admin/konfigurasi/list');
$this->load->view('admin/layout/wrapper', $data, FALSE);
}else{
		$i=$this->input;
		
		$data = array('id_konfigurasi'=>$konfigurasi->id_konfigurasi,
					'id_user' => $this->session->userdata('id_user'),
					'namaweb' =>$i->post('namaweb'),
					  'tagline' =>$i->post('tagline'),
					  'email' =>$i->post('email'),
					  'telepon' =>$i->post('telepon'),
					  'alamat' =>$i->post('alamat'),
					  'website' =>$i->post('website'),
					  'deskripsi' =>$i->post('deskripsi'),
					  'keywords' =>$i->post('keywords'),
					  'metatext' =>$i->post('metatext'),
					  'map' =>$i->post('map'),
					  'facebook' =>$i->post('facebook'),
					  'instagram' =>$i->post('instagram'),
					
					  );
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diubah');
		redirect(base_url('admin/konfigurasi/logo'),'refresh');
			}
			// End masuk validasi
	}


// konfigurasi logo
	public function logo()
	{
		$konfigurasi=$this->konfigurasi_model->listing();

// validasi
		$this->form_validation->set_rules('id_konfigurasi','Nama Web','required',
			array('required' => '%s harus diisi'
			));
		if($this->form_validation->run()){
			 $config['upload_path']          = './assets/upload/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('logo')){

			// End validasi
		
			// end validasi
		$data = array('title' => 'konfigurasi website',
			'konfigurasi' =>$konfigurasi,
			'error' =>$this->upload->display_errors(),
			'isi' => 'admin/konfigurasi/logo');
$this->load->view('admin/layout/wrapper', $data, FALSE);
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
		
		$data = array('id_konfigurasi'=>$konfigurasi->id_konfigurasi,
					'id_user' => $this->session->userdata('id_user'),
					'logo' => $upload_data['uploads']['file_name']
					 
					
					  );
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diubah');
		redirect(base_url('admin/konfigurasi/logo'),'refresh');
			}}
			// End masuk validasi
				$data = array('title' => 'konfigurasi website',
			'konfigurasi' =>$konfigurasi,
			'isi' => 'admin/konfigurasi/logo');
$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


// konfigurasi icon
	public function icon()
	{
		$konfigurasi=$this->konfigurasi_model->listing();

// validasi
		$this->form_validation->set_rules('id_konfigurasi','Nama Web','required',
			array('required' => '%s harus diisi'
			));
		if($this->form_validation->run()){
			 $config['upload_path']          = './assets/upload/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('icon')){

			// End validasi
		
			// end validasi
		$data = array('title' => 'konfigurasi icon ',
			'konfigurasi' =>$konfigurasi,
			'error' =>$this->upload->display_errors(),
			'isi' => 'admin/konfigurasi/icon');
$this->load->view('admin/layout/wrapper', $data, FALSE);
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
		
		$data = array('id_konfigurasi'=>$konfigurasi->id_konfigurasi,
					'id_user' => $this->session->userdata('id_user'),
					'icon' => $upload_data['uploads']['file_name']
					 
					
					  );
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diubah');
		redirect(base_url('admin/konfigurasi/icon'),'refresh');
			}}
			// End masuk validasi
				$data = array('title' => 'konfigurasi icon website',
			'konfigurasi' =>$konfigurasi,
			'isi' => 'admin/konfigurasi/icon');
$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */