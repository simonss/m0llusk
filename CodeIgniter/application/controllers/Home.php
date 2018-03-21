<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('home_model');
    }


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

	public function login_submit() {
        //initialize form helper AKA fuck you
        $this->input->post();

	    $name = $this->input->post('name');
	    $password = $this->input->post('password');
	    $login_sucess = $this->home_model->get_creds($name, $password);

	    //echo $name;
        //echo $password;
        //echo $login_sucess ? 'true':'false';
	    if ($login_sucess == true) {
            $this->load->view('account_view');
        } else {
            $this->load->view('home_view');
            //$this->load->view('navbar_view');
            //$this->load->view('login_view');
            //TODO siia mingi sõnum, et logimine ebaõnnestus...
        }

    }


}
