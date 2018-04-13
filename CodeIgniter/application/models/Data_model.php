<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->dbutil();
        $this->load->helper('file');
    }

    /*public function get_creds($name, $password)
    {
        $sql = "SELECT * FROM login WHERE name = ? AND password = ?";
        $query = $this->db->query($sql, array($name, $password));

        if($query->num_rows() > 0){
            //$result = $query->result_array();
            return true;
        }else{
            return false;
        }
    }*/

    public function get_toidud($location) {
        if ($location === "tartu") {
            $sql = "SELECT * FROM toidud_tartu_view";
        } else if ($location === "tallinn") {
            $sql = "SELECT * FROM toidud_tallinn_view";
        }

        $query = $this->db->query($sql);

        $result  = '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
        $result .= $this->dbutil->xml_from_result($query);
        //write_file('xml_file.xml', $result);
        return $result;
    }


}