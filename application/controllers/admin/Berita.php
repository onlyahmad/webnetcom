<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
// Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategori_model');
	}
	public function index()
	{
		$berita =$this->berita_model->listing();
		$data=array('title' => 'Data Berita ('.count($berita).')',
			'berita' =>$berita,
			'isi' =>'admin/berita/list'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	// Tambah Berita
	public function tambah()
	{

		$kategori=$this->kategori_model->listing();

		// validasi
		$valid=$this->form_validation;
		$valid->set_rules('judul_berita','Judul berita','required',
			array('required' => '%s harus diisi'));
		$valid->set_rules('isi_berita','Isi berita','required',
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
		
	
		$data=array('title' => 'Tambah Berita',
			'kategori' =>$kategori,
			'error_upload'=> $this->upload->display_errors(),
			'isi' =>'admin/berita/tambah'
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
					  'id_kategori' =>$i->post('id_kategori'),
					  'slug_berita' =>url_title($this->input->post('judul_berita'), 'dash', TRUE),
			  	      'judul_berita' =>$i->post('judul_berita'),
					  'isi_berita' =>$i->post('isi_berita'),
					  	'gambar' => $upload_data['uploads']['file_name'],
					  	'status_berita'=>$i->post('status_berita'),
					  	'keywords'=>$i->post('keywords'),
				  		'jenis_berita' => $i->post('jenis_berita'),
				  		'tanggal_post' =>date('Y-m-d H:i:s')
					  );
		$this->berita_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambah');
		redirect(base_url('admin/berita'),'refresh');
	}}
	// End masuk database

		$data=array('title' => 'Tambah Berita',
			'kategori' =>$kategori,
			'isi' =>'admin/berita/tambah'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit Berita

	public function edit($id_berita)
	{
		$berita=$this->berita_model->detail($id_berita);

		$kategori=$this->kategori_model->listing();

		// validasi
		$valid=$this->form_validation;
		$valid->set_rules('judul_berita','Judul berita','required',
			array('required' => '%s harus diisi'));
		$valid->set_rules('isi_berita','Isi berita','required',
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
		
	
		$data=array('title' => 'Edit Berita',
			'kategori' =>$kategori,
			'berita' =>$berita,
			'error_upload'=> $this->upload->display_errors(),
			'isi' =>'admin/berita/edit'
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

		if($berita->gambar != ""){
			unlink('./assets/upload/image/'.$berita->gambar);
			unlink('./assets/upload/image/thumbs/'.$berita->gambar);
			
		}
		// end hapus gambar
		$data = array('id_berita' =>$id_berita,
			'id_user' =>$this->session->userdata('id_user'),
					  'id_kategori' =>$i->post('id_kategori'),
					  'slug_berita' =>url_title($this->input->post('judul_berita'), 'dash', TRUE),
			  	      'judul_berita' =>$i->post('judul_berita'),
					  'isi_berita' =>$i->post('isi_berita'),
					  	'gambar' => $upload_data['uploads']['file_name'],
					  	'status_berita'=>$i->post('status_berita'),
					  	'keywords'=>$i->post('keywords'),
				  		'jenis_berita' => $i->post('jenis_berita')
				  		
					  );
		$this->berita_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('admin/berita'),'refresh');
	}}else{
// update berita tanpa ganti gambar baru
		$i=$this->input;

		$data = array('id_berita' =>$id_berita,
			'id_user' =>$this->session->userdata('id_user'),
					  'id_kategori' =>$i->post('id_kategori'),
					  'slug_berita' =>url_title($this->input->post('judul_berita'), 'dash', TRUE),
			  	      'judul_berita' =>$i->post('judul_berita'),
					  'isi_berita' =>$i->post('isi_berita'),
					  	'status_berita'=>$i->post('status_berita'),
					  	'keywords'=>$i->post('keywords'),
				  		'jenis_berita' => $i->post('jenis_berita')
				  		
					  );
		$this->berita_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('admin/berita'),'refresh');
	}}
	// End masuk database

		$data=array('title' => 'Edit Berita',
			'kategori' =>$kategori,
			'berita'=>$berita,
			'isi' =>'admin/berita/edit'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete berita
	public function delete($id_berita)
	{
		// proteksi delete
		$this->check_login->check();

		$berita=$this->berita_model->detail($id_berita);
		// Hapus gambar
		if($berita->gambar != ""){
			unlink('./assets/upload/image/'.$berita->gambar);
			unlink('./assets/upload/image/thumbs/'.$berita->gambar);
			
		}
		// end hapus gambar
		$data= array('id_berita' => $berita->id_berita);
		$this->berita_model->delete($data);
		$this->session->flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/berita'),'refresh');

	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/admin/Berita.php */