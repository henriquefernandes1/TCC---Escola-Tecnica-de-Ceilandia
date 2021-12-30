<?php

/**
 * Description of UsuarioDTO
 *
 * @author Windows10
 */
require_once '../DAO/CONEXAO/Conexao.php';

class UsuarioDTO { 
    //put your code here
  
    private $idUsuario;
    private $Nome;
    private $Login;
    private $Senha;
    private $Email;
    private $idPerfil;
    private $Matricula;
    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNome() {
        return $this->Nome;
    }

    function getLogin() {
        return $this->Login;
    }

    function getSenha() {
        return $this->Senha;
    }

    function getEmail() {
        return $this->Email;
    }

    function getIdPerfil() {
        return $this->idPerfil;
    }

    function getMatricula() {
        return $this->Matricula;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNome($Nome) {
        $this->Nome = $Nome;
    }

    function setLogin($Login) {
        $this->Login = $Login;
    }

    function setSenha($Senha) {
        $this->Senha = $Senha;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
    }

    function setMatricula($Matricula) {
        $this->Matricula = $Matricula;
    }

        
    //FIM
}
