<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Professor_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select_professor ($login)
    {
        $select = $this->db->query("SELECT * FROM professor WHERE email = '".$login['email']."' AND senha = '".$login['senha']."'");
        $rows = count($select->row_array());
        if($rows < 1){
            return FALSE;;
        }
        return $select->row_array();
    }
    
    public function select_alunos ($id)
    {
        $select = $this->db->query("SELECT * FROM aluno WHERE professor_id = ".$id);
        if($select->num_rows() < 1){
            return FALSE;;
        }
        $retorno = array();
        foreach ($select->result_array() as $row){
            $retorno[] = $row;
        }
        return $retorno;
    }
}