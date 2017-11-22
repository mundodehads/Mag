<?php
class Professor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function home()
    {
        $email = $this->session->userdata('prof_email');
        if($email !== NULL){
            redirect(base_url().'posprofessor');
        }else if ($email === NULL){
            redirect(base_url().'preprofessor');
        }else {
            show_404();
        }
    }
    
}