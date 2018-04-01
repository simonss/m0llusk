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

        //this is for google auth
        //require_once base_url('google-api-php-client-2.2.1/vendor/autoload.php');
        require_once(APPPATH.'libraries/google-api-php-client-2.2.1/vendor/autoload.php');
    }


	public function index()
	{
	    //echo ($this->session->userdata('loggedIn')) ? "true" : "false";'
        echo $this->session->userdata('userid');

        $this->load->view('templates/header');
		$this->load->view('home_view');
        $this->load->view('navbar_view', array('loggedIn' => $this->session->userdata('loggedIn'), 'name' => $this->session->userdata('name'), 'usertype' => $this->session->userdata('usertype')));

        $toidud = $this->Data_model->get_toidud();
		$this->load->view('tana_view', array('toidud' => $toidud));
        $this->load->view('templates/footer');
	}
	public function login(){

        $this->load->view('templates/header');
		$this->load->view('home_view');
        $this->load->view('navbar_view', array('loggedIn' => $this->session->userdata('loggedIn'), 'name' => $this->session->userdata('name'), 'usertype' => $this->session->userdata('usertype')));
		$this->load->view('login_view');
        $this->load->view('templates/footer');
	}

	public function logout() {
        $this->session->sess_destroy();
        //$this->session->set_userdata(array('loggedIn' => false));
        //$this->index();
        redirect('/');
    }

	public function homme(){

        $this->load->view('templates/header');
		$this->load->view('home_view');
		$this->load->view('navbar_view', array('loggedIn' => $this->session->userdata('loggedIn'), 'name' => $this->session->userdata('name'), 'usertype' => $this->session->userdata('usertype')));
		$this->load->view('homme_view');
        $this->load->view('templates/footer');
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
				'loggedIn' => TRUE,
				'usertype' => $this->Home_model->get_usertype($name)
			);
	    	$this->session->set_userdata($newdata);
	        $shownname = $this->session->userdata('name');
	        $data = array('shownname' => $shownname);
	        $this->index();
            //$this->load->view('account_view', $data); //variable from [controller] to [view]
            //TODO siia panna midagi, et saada tehtud võte 3.9 (nagu muud ei peagi selle jaoks tegema vist?)
        } else {
            $this->load->view('templates/header');
            $this->load->view('home_view');
            $this->load->view('templates/footer');
            //$this->load->view('navbar_view');
            //$this->load->view('login_view');
            //TODO siia mingi sõnum, et logimine ebaõnnestus...
            echo "sisselogimine ebaõnnestus";
        }

    }

    public function login_google() {
        $this->input->post();
        $id_token = $this->input->post('idtoken'); //nüüd on käes token, mida on vaja verifitseerida

        $CLIENT_ID = "254669445111-s780gs1euvbqq4464m5hokqq2b2ldu8e.apps.googleusercontent.com"; //TODO muuta seda kui webhosti üles laadida
        //code from https://developers.google.com/identity/sign-in/web/backend-auth
        $client = new Google_Client(array('client_id' => $CLIENT_ID));  // Specify the CLIENT_ID of the app that accesses the backend
        $payload = $client->verifyIdToken($id_token);
        echo $payload ? 'true':'false';
        if ($payload) {
            $userid = $payload['sub'];
            $this->session->set_userdata(array('userid' => $userid));
        } else {
            echo "sisselogimine ebaõnnestus";
        }
    }

    public function register() {
        $this->load->view('templates/header');
        $this->load->view('home_view');
        $this->load->view('navbar_view', array('loggedIn' => $this->session->userdata('loggedIn'), 'name' => $this->session->userdata('name'), 'usertype' => $this->session->userdata('usertype')));
        $this->load->view('registreeru_view');
        $this->load->view('templates/footer');

    }

    public function register_submit()
    {

        $this->input->post();

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password2 = $this->input->post('password2');
        $usertype = $this->input->post('usertype');

        $email_not_in_use = $this->Home_model->get_email_already_exists($email);

        if ($usertype === 'arikasutaja') {
            $business_name = $this->input->post('firma_nimi');
            $place_name = $this->input->post('toidukoha_nimi');
            $reg_code = $this->input->post('registrikood');

            //ilmselt mingi kontroll et ei oleks fake äri - tuleb ette kujutada et see on ka siin
            if (strlen($password) > 5 && $password == $password2 &&$email_not_in_use && !empty($business_name) && !empty($place_name) && !empty($reg_code)) {
                $this->Home_model->put_new_business($email, $password, $business_name, $place_name, $reg_code);
                $this->load->view('templates/header');
                $this->load->view('home_view');
                $this->load->view('navbar_view', array('loggedIn' => $this->session->userdata('loggedIn'), 'name' => $this->session->userdata('name'), 'usertype' => $this->session->userdata('usertype')));
                $this->load->view('login_view', array('email' => $email, 'message' => 'Uue Ärikasutaja Registreeerimine õnnestus'));
                $this->load->view('templates/footer');
            } else {
                echo "midagi läks valesti (parool või email ei sobinud / kõik väljad polnud täidetud)";
            }

        } else {
            //siin peab parool olema vähemalt 5 pikkune
            if (strlen($password) > 5 && $password == $password2 && $email_not_in_use) {
                $this->Home_model->put_new_user($email, $password);
                $this->load->view('templates/header');
                $this->load->view('home_view');
                $this->load->view('navbar_view', array('loggedIn' => $this->session->userdata('loggedIn'), 'name' => $this->session->userdata('name'), 'usertype' => $this->session->userdata('usertype')));
                $this->load->view('login_view', array('email' => $email, 'message' => 'Registreeerimine õnnestus'));
                $this->load->view('templates/footer');
            } else {
                echo "parool või email ei sobinud";
            }

        }
    }

    public function favs($action = "show") {

        if ($this->session->userdata('loggedIn')) {
            if ($action === 'change') {

                $this->load->view('templates/header');
                $this->load->view('home_view');
                $this->load->view('navbar_view', array('loggedIn' => $this->session->userdata('loggedIn'), 'name' => $this->session->userdata('name'), 'usertype' => $this->session->userdata('usertype')));
                $this->load->view('lemmikud_muuda_view');
                $this->load->view('templates/footer');

            } else { //$action === 'show'

                $this->load->view('templates/header');
                $this->load->view('home_view');
                $this->load->view('navbar_view', array('loggedIn' => $this->session->userdata('loggedIn'), 'name' => $this->session->userdata('name'), 'usertype' => $this->session->userdata('usertype')));
                $toidud = $this->Data_model->get_toidud();  //TODO siia panna filter
                $this->load->view('lemmikud_view', array('toidud' => $toidud));
                $this->load->view('templates/footer');
            }
        } else {
            $this->index();
        }
    }

    public function user() {
        if ($this->session->userdata('loggedIn')) {

            $this->load->view('templates/header');
            $this->load->view('home_view');
            $this->load->view('navbar_view', array('loggedIn' => $this->session->userdata('loggedIn'), 'name' => $this->session->userdata('name'), 'usertype' => $this->session->userdata('usertype')));
            $this->load->view('sinuandmed_view', array('usertype' => $this->session->userdata('usertype')));
            $this->load->view('templates/footer');

        } else {
            $this->index();
        }
    }

    public function foods() {
        if ($this->session->userdata('loggedIn') && $this->session->userdata('usertype') === 'arikasutaja') {

            $this->load->view('templates/header');
            $this->load->view('home_view');
            $this->load->view('navbar_view', array('loggedIn' => $this->session->userdata('loggedIn'), 'name' => $this->session->userdata('name'), 'usertype' => $this->session->userdata('usertype')));
            $this->load->view('sinu_toidud_view');
            $this->load->view('templates/footer');

        } else {
            $this->index();
        }
    }

}
