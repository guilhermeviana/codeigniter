<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuarios_model
 *
 * @author guilherme
 */
class Usuarios_model extends CI_Model {

    public function buscaPorEmailSenha($email) {
        $this->db->where("email", $email);
        $usuario = $this->db->get("usuarios")->row_array();
        return $usuario;
    }

    public function setToken($email) {
        $this->db->where("email", $email);
        $usuario = $this->db->get("usuarios")->row_array();
        $usuario['token'] = md5($email);
        $flag = $this->db->update('usuarios', $usuario, array('id' => $usuario['id']));
        return $flag;
    }

    public function validaToken($id, $token) {
        $this->db->where("id", $id);
        $this->db->where("token", $token);
        $usuario = $this->db->get("usuarios")->row_array();
        return $usuario;
    }

    public function setSenha($senha, $id) {
        $this->db->where("id", $id);
        $usuario = $this->db->get("usuarios")->row_array();
        $usuario['token'] = '';
        $usuario['senha'] = $senha;
        $flag = $this->db->update('usuarios', $usuario, array('id' => $usuario['id']));
        return $flag;
    }

}
