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

    public function get_toidud() {
        $sql = "SELECT * FROM toidud"; //ORDER BY/WHERE et kasutada otsingut/filtreid?
        $query = $this->db->query($sql);


        $result = $this->dbutil->xml_from_result($query);
        //write_file('xml_file.xml', $result);
        return $result;
    }


}