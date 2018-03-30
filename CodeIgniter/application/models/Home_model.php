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

    public function put_new_user($name, $password) {
        //$sql = "INSERT INTO login (name,password) VALUES (".$this->db->escape($name).", ".;
        $data = array('name' => $name, 'password' => $password);
        $this->db->insert('login', $data);
    }
}