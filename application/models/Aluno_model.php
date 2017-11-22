<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select_aluno ($ra)
    {
        $select = $this->db->query("SELECT * FROM aluno WHERE ra = '".$ra."'");
        $rows = count($select->row_array());
        if($rows < 1){
            return FALSE;;
        }
        return $select->row_array();
    }
}