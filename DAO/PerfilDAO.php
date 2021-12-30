<?php

/**
 * Description of PerfilDAO
 *
 * @author Windows10
 */
require_once 'CONEXAO/Conexao.php';

class PerfilDAO {

    //put your code here

    public $pdo = null;

    public function _construct() {
        $this->pdo;
    }

//INSERT
    public function Pesquisar() {
        try {
            $pdo = Conexao::getInstance();
            $sql = "select * from perfil;";
            $execucao = $pdo->prepare($sql);
            $execucao->execute();
            $pesquisar = "";
            $pesquisar = $execucao->fetchAll(PDO::FETCH_ASSOC);
            return $pesquisar;   
        } 
        
        catch (PDOException $exc) 
        {
            //Caso ocorra Erro na pesquisa.
            echo"Falha ao realizar a pesquisa. Erro:" . $exc->getMessage();
        }
    }

//FIM
}
