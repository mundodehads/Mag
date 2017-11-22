<?php

class FormProfessor extends CI_Controller {
    
    private $senha;
    
    public function __construct()
    {
        parent::__construct();
        $this->senha = null;
        $this->load->model("Professor_model");
        $this->load->model("Fluxo_model");
        $this->load->model("Reputacao_model");
    }
    
    public function index()
    {
        $this->senha = $_POST['senha'];
        $this->form_validation->set_rules('email', 'email', 'required',
            array('required' => 'Necessário inserir um email.')
            );
        $this->form_validation->set_rules('senha', 'senha', 'required',
            array('required' => 'Necessário inserir uma senha.')
            );
        $this->form_validation->set_rules(
            'email', 'email',
            'callback_procurar_email'
            );
        
        if ($this->form_validation->run() === TRUE)
        {
            $this->load->view('templates/header');
            $this->load->view('pages/professor');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->load->view('templates/header');
            $this->load->view('pages/professor_formulario');
            $this->load->view('templates/footer');
        }
    }
    
    public function procurar_email ($str)
    {
        $login = array ('email' => $str, 'senha' => $this->senha);
        $professor = $this->Professor_model->select_professor($login);
        if($professor === FALSE){
            $this->form_validation->set_message('procurar_email', "Erro: Email ou senha inválidos!");
            return FALSE;
        }
        $data = $this->gerarData($professor);
        if($data === FALSE){
            $this->form_validation->set_message('procurar_ra', "Erro: Não foi possivel carregar dados, entre em contato com woh.");
            return FALSE;
        }
        $this->session->set_userdata($data);
        return TRUE;
    }
    
    private function gerarData($professor){
        $fluxo = $this->Fluxo_model->select_fluxo($professor['fluxo_id']);
        if($fluxo === FALSE)
            return FALSE;
        $alunos_raw = $this->Professor_model->select_alunos($professor['id']);
        if($alunos_raw === FALSE)
            return FALSE;
        $alunos = array ();
        foreach($alunos_raw as $aluno){
            $reputacao = $this->Reputacao_model->select_reputacao($aluno['reputacao_id']);
            if($reputacao === FALSE){
                return FALSE;
            }
            $alunos[] =  array (
                'id' => $aluno['id'],
                'nome' => $aluno['nome'],
                'reputacao_id' => $aluno['reputacao_id'],
                'ponto' => $reputacao['pontos'],
                'pontos' => $reputacao['pontos']." / ".$reputacao['pontos_nes'],
                'nivel' => $reputacao['nivel']
            );
        }     
            
        $data = array (
            'prof_email' => $professor['email'],
            'prof_nome' => $professor['nome'],
            'fluxo_id' => $professor['fluxo_id'],
            'fluxo_habilidade' => $fluxo['habilidade'],
            'fluxo_desafio' => $fluxo['desafio'],
            'prof_alunos' => $alunos
        );
        
        return $data;
    }
}



