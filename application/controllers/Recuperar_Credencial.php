<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Recuperar_Credencial
 *
 * @author guilherme
 */
class Recuperar_Credencial extends CI_Controller {

    //put your code here


    public function index() {
        $this->load->view("recuperar");
    }

    public function valida() {
        $this->load->library('email');
        $this->load->model("usuarios_model"); // chama o modelo usuarios_model
        $email = $this->input->post("email"); // pega via post o email que venho do formulario
        $usuario = $this->usuarios_model->buscaPorEmailSenha($email); // acessa a função buscaPorEmailSenha do modelo
       
        if ($usuario) {
            $this->usuarios_model->setToken($email);
            $mensagem .= "E-mail:" . $this->input->post('email');
            $mensagem .= "<br>Menagem: SOLICITAÇÂO DE NOVA SENHA <br>";
            $mensagem .= "<a href='http://127.0.0.1/code/index.php/Recuperar_Credencial/recuperar/" . md5($email) . "/" . $usuario['id'] . "'>CLIQUE AQUI PARA RECUPERAR SUA SENHA</a>";

            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'xxx@gmail.com';
            $config['smtp_pass'] = 'xxx';
            $config['protocol'] = 'smtp'; 
            $config['wordwrap'] = TRUE;
            $config['validate'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $config['smtp_host'] = 'ssl://smtp.gmail.com';

            $this->email->initialize($config);
            $this->email->from('sigae.ifnmg@gmail.com', 'SGPC'); // Remetente
            $this->email->to('guilhermeluis609@yahoo.com.br');
            $this->email->subject('Recuperação de senha');
            $this->email->message($mensagem);
            
            if ($this->email->send()) {
                echo "EMAIL ENVIADO COM SUCESSO"; exit();
            } else {
                print_r($this->email->print_debugger());
            }
        } 
        $dados = array("mensagem" => "USUARIO NAO ENCONTRADO");
        $this->load->view("autenticar", $dados);
    }

    public function update() {
        $this->load->model("usuarios_model");
        $senha = $this->input->post("senha");
        $senha2 = $this->input->post("senha2");
        $id = $this->input->post("id");

        if ($senha === $senha2) {
            $this->usuarios_model->setSenha($senha, $id);
            echo "SUCESSO";
        } else {
            echo "SENHAS NAO SAO IGUAIS";
        }
    }

    public function recuperar($token, $id) {
        $this->load->model("usuarios_model");
        $valida = $this->usuarios_model->validaToken($id, $token);
        $dados = ['id' => $id];
        if ($valida) {
            $this->load->view("credenciais", $dados);
        } else {
            echo "VALIDACAO FALHA";
        }
    }

}
