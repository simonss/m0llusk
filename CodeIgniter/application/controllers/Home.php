<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view('home_view');
		$this->load->view('navbar_view');
		$this->load->view('sisu_view');
	}
	public function login(){
		$this->load->view('home_view');
		$this->load->view('navbar_view');
		$this->load->view('login_view');
	}


}
