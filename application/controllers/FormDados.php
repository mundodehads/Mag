<?php

class FormDados extends CI_Controller {
    
    private $dados;
    
    public function __construct()
    {
        parent::__construct();
        $this->dados = array();
        $this->load->model("Fluxo_model");
        $this->load->model("Reputacao_model");
    }
    
    public function index()
    {
        $this->dados['habilidade'] = $_POST['habilidade'];
        $this->dados['desafio'] = $_POST['desafio'];
        $this->dados['nome'] = $_POST['nome'];
        $this->dados['ponto'] = $_POST['ponto'];
        $this->form_validation->set_rules(
            'nome', 'nome',
            'callback_atualizar_dados'
            );
        
        if ($this->form_validation->run() === TRUE)
        {
            $this->load->view('templates/header');
            $this->load->view('pages/home');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->load->view('templates/header');
            $this->load->view('pages/att_dados');
            $this->load->view('templates/footer');
        }
    }
    
    public function atualizar_dados ($str)
    {
        if(isset($this->dados['habilidade']) AND strlen($this->dados['habilidade']) > 0){
            $habilidade = $this->Fluxo_model->update_habilidade($this->dados['habilidade']);
            if($habilidade === FALSE){
                $this->form_validation->set_message('atualizar_dados',  "Erro: Não foi possivel atualizar habilidade, valor igual ao existente ou inserção de valores não numericos!");
                return FALSE;
            }
        }
        if(isset($this->dados['desafio']) AND strlen($this->dados['desafio']) > 0){
            $desafio = $this->Fluxo_model->update_desafio($this->dados['desafio']);
            if($desafio === FALSE){
                $this->form_validation->set_message('atualizar_dados', "Erro: Não foi possivel atualizar desafio, valor igual ao existente ou inserção de valores não numericos!");
                return FALSE;
            }
        }
        if(isset($this->dados['nome']) AND strlen($this->dados['nome']) > 0){
            $id = NULL;
            foreach($this->session->userdata('prof_alunos') AS $aluno){
                if (strcmp($aluno['nome'], $this->dados['nome']) === 0) {
                    $id = $aluno['reputacao_id'];
                }
            }
            if($id === NULL){
                $this->form_validation->set_message('atualizar_dados',  "Erro: Aluno não encontrado!");
                return FALSE;
            }else {
                if(isset($this->dados['ponto']) AND strlen($this->dados['ponto']) > 0){
                    $reputacao = $this->Reputacao_model->update_pontos($id, $this->dados['ponto']);
                    if($reputacao === FALSE){
                        $this->form_validation->set_message('atualizar_dados',  "Erro: Valor de ponto não numerico!");
                        return FALSE;
                    }
                }else {
                    $this->form_validation->set_message('atualizar_dados', "Erro: Necessário informar quantidade de pontos a ser adicionado!");
                    return FALSE;
                }
            }
        }
        return TRUE;
    }
}



