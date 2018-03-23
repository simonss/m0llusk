<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load models
        $this->load->model('home_model');
        $this->load->model('data_model');
        //load session
        $this->load->library('session');
    }


	public function index()
	{
		$this->load->view('home_view');
        $this->load->view('navbar_view');

        $toidud = $this->data_model->get_toidud();
		$this->load->view('sisu_view', array('toidud' => $toidud));
	}
	public function login(){
		$this->load->view('home_view');
        $this->load->view('navbar_view');
		$this->load->view('login_view');
	}

	public function login_submit() {
        //initialize form helper
        $this->input->post();

	    $name = $this->input->post('name');
	    $password = $this->input->post('password');
	    $login_sucess = $this->home_model->get_creds($name, $password);

	    //echo $name;
        //echo $password;
        //echo $login_sucess ? 'true':'false';
	    if ($login_sucess == true) {
	        $this->session->set_userdata(array('name' => $name)); //save things to session

	        $shownname = $this->session->userdata('name');
	        $data = array('shownname' => $shownname);
            $this->load->view('account_view', $data); //variable from [controller] to [view]
        } else {
            $this->load->view('home_view');
            //$this->load->view('navbar_view');
            //$this->load->view('login_view');
            //TODO siia mingi sõnum, et logimine ebaõnnestus...
        }

    }


}
