<?php
class Aluno extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
                
    }
    
    public function home()
    {
        $ra = $this->session->userdata('ra');
        if($ra !== NULL){
            redirect(base_url().'posaluno');
        }else if ($ra === NULL){
            redirect(base_url().'prealuno');
        }else {
            show_404();
        }
    }
                
}