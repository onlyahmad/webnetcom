<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	// Main page - Homepage
	public function index()
	{
		$data=array('title' => 'Profile Network Community' ,
					'isi'	=> 'profile/list'
				);
		$this->load->view('layout/wrapper',$data,FALSE);
	}
}
