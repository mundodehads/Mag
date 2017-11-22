<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fluxo_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select_fluxo ($id)
    {
        $select = $this->db->query("SELECT * FROM fluxo WHERE id = ".$id);
        $rows = count($select->row_array());
        if($rows < 1){
            return FALSE;;
        }
        return $select->row_array();
    }
    
    public function update_habilidade ($quant){
        $data = array ('habilidade' => $quant);
        $fluxo_id = $this->session->userdata('fluxo_id');
        if(ctype_digit($quant)){
            $update = $this->db->affected_rows($this->db->update('fluxo', $data, "id = $fluxo_id"));
            if ($update < 1)
            {
                return FALSE;
            }
        }else {
            return FALSE;
        }
        return TRUE;
    }
    
    public function update_desafio ($quant){
        $data = array ('desafio' => $quant);
        $fluxo_id = $this->session->userdata('fluxo_id');
        if(ctype_digit($quant)){
            $update = $this->db->affected_rows($this->db->update('fluxo', $data, "id = $fluxo_id"));
            if ($update < 1)
            {
                return FALSE;
            }
        }else {
            return FALSE;
        }
        return TRUE;
    }
}