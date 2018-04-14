<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// listing layanan
	public function listing()
	{
		$this->db->select('layanan.*,
							,user.nama');
		$this->db->from('layanan');
		
		$this->db->join('user','user.id_user=layanan.id_user','LEFT');
		// end join

		$this->db->order_by('id_layanan');
		$query=$this->db->get();
		return $query->result();
	}
	// home layanan
	public function home()
	{
		$this->db->select('layanan.*,
							,user.nama');
		$this->db->from('layanan');
		
		$this->db->join('user','user.id_user=layanan.id_user','LEFT');
		// end join
		$this->db->where('layanan.status_layanan','Publish');

		$this->db->order_by('id_layanan','DESC');
		$this->db->limit(3);
		$query=$this->db->get();
		return $query->result();
	}
	//  layanan
	public function layanan($limit,$start)
	{
		$this->db->select('layanan.*,
							,user.nama');
		$this->db->from('layanan');
		
		$this->db->join('user','user.id_user=layanan.id_user','LEFT');
		// end join
		$this->db->where('layanan.status_layanan','Publish');

		$this->db->order_by('id_layanan','DESC');
		$this->db->limit($limit,$start);
		$query=$this->db->get();
		return $query->result();
	}

	// total layanan
	public function total()
	{
		$this->db->select('layanan.*,
							,user.nama');
		$this->db->from('layanan');
		
		$this->db->join('user','user.id_user=layanan.id_user','LEFT');
		// end join
		$this->db->where('layanan.status_layanan','Publish');

		$this->db->order_by('id_layanan','DESC');
		$query=$this->db->get();
		return $query->result();
	}

	// total layanan
	public function read($slug_layanan)
	{
		$this->db->select('layanan.*,
							,user.nama');
		$this->db->from('layanan');
		
		$this->db->join('user','user.id_user=layanan.id_user','LEFT');
		// end join
		$this->db->where(array('layanan.status_layanan'=>'Publish','layanan.slug_layanan'=>$slug_layanan));

		$this->db->order_by('id_layanan','DESC');
		$query=$this->db->get();
		return $query->row();
	}

	// Detail layanan
	public function detail($id_layanan)
	{
		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->where('id_layanan',$id_layanan);
		$this->db->order_by('id_layanan');
		$query=$this->db->get();
		return $query->row();
	}

	// Detail layanan
	public function login($layananname,$password)
	{
		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->where(array('layananname'=>$layananname,
						 'password'=>sha1($password)));
		$this->db->order_by('id_layanan');
		$query=$this->db->get();
		return $query->row();
	}

	// Tambah/insert data layanan
	public function tambah($data)
	{
		$this->db->insert('layanan',$data);
	}
// Edit/update layanan
	public function edit($data)
	{
		$this->db->where('id_layanan',$data['id_layanan']);
		$this->db->update('layanan',$data);
	}
	// delete/hapus layanan
	public function delete($data)
	{
		$this->db->where('id_layanan',$data['id_layanan']);
		$this->db->delete('layanan',$data);
	}
}

/* End of file Layanan_model.php */
/* Location: ./application/models/Layanan_model.php */