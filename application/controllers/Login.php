<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed'); // linha de proteção ao controller

class Login extends CI_Controller { // criação da classe Login

    function __construct() {
        parent::__construct();
        /*
         * Carrega a library 'session' para que seja possível fazer o uso 
         * das sessões na aplicação 
         */
        $this->load->library('session');
    }

    public function index() {
        $this->load->view("sistema");
    }

    public function autenticar() {
        $this->load->library('email');
        $this->load->model("usuarios_model"); // chama o modelo usuarios_model
        $email = $this->input->post("email"); // pega via post o email que venho do formulario
        $senha = $this->input->post("senha"); // pega via post a senha que venho do formulario
        $usuario = $this->usuarios_model->buscaPorEmailSenha($email, $senha); // acessa a função buscaPorEmailSenha do modelo
        $this->usuarios_model->setToken($this->input->post('email'));
        if ($usuario) {
            $this->session->set_userdata("usuario_logado", $usuario);
            $dados = array("mensagem" => "Logado com sucesso!");
        } else {
            $dados = array("mensagem" => "Não foi possível fazer o Login!");
        }
        $this->load->view("autenticar", $dados);
    }

}
