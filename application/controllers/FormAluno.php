<?php

class FormAluno extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Aluno_model");
        $this->load->model("Reputacao_model");
    }
        
    public function index()
    {
        $this->form_validation->set_rules('ra', 'RA', 'required',
            array('required' => 'Necessário inserir um ra.')
            );
        $this->form_validation->set_rules(
        'ra', 'RA',
        'max_length[14]|callback_procurar_ra'
        );
        
        if ($this->form_validation->run() === TRUE)
        {
            $this->load->view('templates/header');
            $this->load->view('pages/aluno');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->load->view('templates/header');
            $this->load->view('pages/aluno_formulario');
            $this->load->view('templates/footer');
        }
    }
    
    public function procurar_ra ($str)
    {
        $aluno = $this->Aluno_model->select_aluno($str);
        if($aluno === FALSE){
            $this->form_validation->set_message('procurar_ra', "Erro: Aluno não encontrado pelo ra informado!");
            return FALSE;
        }
        $data = $this->gerarData($aluno);
        if($data === FALSE){
            $this->form_validation->set_message('procurar_ra', "Erro: Não foi possivel carregar dados, entre em contato com woh.");
            return FALSE;
        }
        $this->session->set_userdata($data);
        return TRUE;
    }
    
    private function gerarData($aluno){
        $reputacao = $this->Reputacao_model->select_reputacao($aluno['id']);
        if($reputacao === FALSE)
            return FALSE;
        $pontos_por = (int) (($reputacao['pontos'] / 1900) * 100);
        $data = array (
            'nome' => $aluno['nome'],
            'ra' => $aluno['ra'],
            'pontos' => $reputacao['pontos'],
            'pontos_nes' => $reputacao['pontos_nes'],
            'pontos_por' => $pontos_por,
            'nivel' => $reputacao['nivel'],
            'nivel_prox' => $reputacao['nivel_prox']
        );
        return $data;
    }
}



