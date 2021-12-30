<?php

/**
 * Description of PerfilDTO
 *
 * @author Windows10
 */
require_once '../DAO/CONEXAO/Conexao.php'; 

class PerfilDTO {
    //put your code here
    
    private $idPerfil;
    private $descricao;
    
    
    function getIdPerfil() {
        return $this->idPerfil;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    
    //FIM
}
