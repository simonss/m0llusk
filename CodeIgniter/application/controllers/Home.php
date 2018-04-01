<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load models
        $this->load->model('Home_model');
        $this->load->model('Data_model');
        //load session
        $this->load->library('session');
    }


	public function index()
	{
		$this->load->view('home_view');
        $this->load->view('navbar_view');

        $toidud = $this->Data_model->get_toidud();
		$this->load->view('tana_view', array('toidud' => $toidud));
	}
	public function login(){
		$this->load->view('home_view');
        $this->load->view('navbar_view');
		$this->load->view('login_view');
	}

	public function homme(){
		$this->load->view('home_view');
		$this->load->view('navbar_view');
		$this->load->view('homme_view');
	}

	public function login_submit() {
        //initialize form helper
        $this->input->post();

	    $name = $this->input->post('name');
	    $password = $this->input->post('password');
	    $login_sucess = $this->Home_model->get_creds($name, $password);

	    //echo $name;
        //echo $password;
        //echo $login_sucess ? 'true':'false';
	    if ($login_sucess == true) {
	    	$newdata = array(
	    		'name' => $name,
				'logged_in' => TRUE,
				//todo siia veel lisada äri/era
			);
	    	$this->session->set_userdata($newdata);
	        $shownname = $this->session->userdata('name');
	        $data = array('shownname' => $shownname);
	        $this->index();
            //$this->load->view('account_view', $data); //variable from [controller] to [view]
            //TODO siia panna midagi, et saada tehtud võte 3.9 (nagu muud ei peagi selle jaoks tegema vist?)
        } else {
            $this->load->view('home_view');
            //$this->load->view('navbar_view');
            //$this->load->view('login_view');
            //TODO siia mingi sõnum, et logimine ebaõnnestus...
            echo "sisselogimine ebaõnnestus";
        }

    }

    public function register() {
        $this->load->view('home_view');
        $this->load->view('navbar_view');
        $this->load->view('registreeru_view');

    }

    public function register_submit() {

        $this->input->post();

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password2 = $this->input->post('password2');

        $email_not_in_use = $this->Home_model->get_email_already_exists($email);

        //siin peab parool olema vähemalt 5 pikkune
        if (strlen($password) > 5 && $password == $password2 && $email_not_in_use) {
            $this->Home_model->put_new_user($email, $password);
            $this->load->view('home_view');
            $this->load->view('navbar_view');
            $this->load->view('login_view', array('email' => $email, 'message' => 'Registreeerimine õnnestus'));
            //echo "parool sobis";
        } else {
            echo "parool või email ei sobinud";
        }

    }

    public function logout(){
    	$this->session->sess_destroy();
    	redirect('/');
	}


}
