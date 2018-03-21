<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_model extends CI_Model {
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
}