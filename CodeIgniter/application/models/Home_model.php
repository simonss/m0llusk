<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_creds($name, $password)
    {
        $sql = "SELECT * FROM login_view WHERE name = ? AND password = ?";
        $query = $this->db->query($sql, array($name, $password));

        if($query->num_rows() > 0){
            //$result = $query->result_array();
            return true;
        }else{
            return false;
        }
    }

    public function get_email_already_exists($email) {
        $sql = "SELECT * FROM login_view WHERE name = ?";
        $query = $this->db->query($sql, array($email));
        return !($query->num_rows() > 0);
    }

    public function get_usertype($name) {
        $sql = "SELECT usertype FROM login_view WHERE name = ?";
        $query = $this->db->query($sql, array($name));
        $row = $query->row();
        if (isset($row)) {
            return $row->usertype;
        }
    }

    public function put_new_user($name, $password) {
        //$data = array('name' => $name, 'password' => $password, 'usertype' => 'tavakasutaja');
        //$this->db->insert('login', $data);
        $usertype = "tavakasutaja";
        $this->db->query("call login_insert_normal('$name','$password','$usertype')");

    }

    public function put_new_business($name, $password, $business_name, $place_name, $regcode) {
        //$data = array('name' => $name, 'password' => $password, 'usertype' => 'arikasutaja', 'businessname' => $business_name, 'placename' => $place_name, 'regcode' => $regcode);
        //$this->db->insert('login', $data);
        $usertype = "arikasutaja";
        $this->db->query("call login_insert_business('$name','$password','$usertype','$business_name','$place_name','$regcode')");
    }

    public function get_googleuser_exists($userid) {
        $sql = "SELECT * FROM googlelogin_view WHERE googleid = ?";
        $query = $this->db->query($sql, array($userid));
        return ($query->num_rows() > 0);
    }

    public function put_googleuser($name, $googleid) {
        //$data = array('email' => $name, 'usertype' => 'tavakasutaja', 'googleid' => $googleid);
        //$this->db->insert('googlelogin', $data);
        $usertype = "tavakasutaja";
        $this->db->query("call googlelogin_insert('$name','$usertype','$googleid')");
    }
}