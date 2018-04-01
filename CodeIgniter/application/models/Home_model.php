<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_creds($name, $password)
    {
        $sql = "SELECT * FROM login WHERE name = ? AND password = ?";
        $query = $this->db->query($sql, array($name, $password));

        if($query->num_rows() > 0){
            //$result = $query->result_array();
            return true;
        }else{
            return false;
        }
    }

    public function get_email_already_exists($email) {
        $sql = "SELECT * FROM login WHERE name = ?";
        $query = $this->db->query($sql, array($email));
        return !($query->num_rows() > 0);
    }

    public function get_usertype($name) {
        $sql = "SELECT usertype FROM login WHERE name = ?";
        $query = $this->db->query($sql, array($name));
        $row = $query->row();
        if (isset($row)) {
            return $row->usertype;
        }
    }

    public function put_new_user($name, $password) {
        //$sql = "INSERT INTO login (name,password) VALUES (".$this->db->escape($name).", ".;
        $data = array('name' => $name, 'password' => $password, 'usertype' => 'tavakasutaja');
        $this->db->insert('login', $data);
    }

    public function put_new_business($name, $password, $business_name, $place_name, $regcode) {
        $data = array('name' => $name, 'password' => $password, 'usertype' => 'arikasutaja', 'businessname' => $business_name, 'placename' => $place_name, 'regcode' => $regcode);
        $this->db->insert('login', $data);
    }

    public function get_googleuser_exists($userid) {
        $sql = "SELECT * FROM googlelogin WHERE googleid = ?";
        $query = $this->db->query($sql, array($userid));
        return ($query->num_rows() > 0);
    }

    public function put_googleuser($name, $googleid) {
        $data = array('email' => $name, 'usertype' => 'tavakasutaja', 'googleid' => $googleid);
        $this->db->insert('googlelogin', $data);
    }
}