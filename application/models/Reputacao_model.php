<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reputacao_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select_reputacao ($id)
    {
        $select = $this->db->query("SELECT * FROM reputacao WHERE id = ".$id);
        $rows = count($select->row_array());
        if($rows < 1){
            return FALSE;;
        }
        return $select->row_array();
    }
    
    public function update_pontos ($id, $quant){
        $query = $this->db->query("SELECT pontos FROM reputacao WHERE id = ".$id);
        $anterior = $query->row_array();
        $data = array ('pontos' => $anterior['pontos'] + $quant);
        if(ctype_digit($quant)){
            $update = $this->db->affected_rows($this->db->update('reputacao', $data, "id = $id"));
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