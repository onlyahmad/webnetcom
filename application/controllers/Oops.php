<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oops extends CI_Controller {
	// Main page - Homepage
	public function index()
	{
		$data=array('title' => 'Oops Network Community' ,
					'isi'	=> 'oops/list'
				);
		$this->load->view('layout/wrapper',$data,FALSE);
	}
}
