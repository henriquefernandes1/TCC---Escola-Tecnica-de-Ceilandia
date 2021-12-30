<?php
/**
 * Description of ChecagemDAO
 *
 * @author Windows10
 */
require_once 'CONEXAO/Conexao.php';

class ChecagemDAO 
{
    
    //put your code here
     public function Pesquisar() 
    {
        $pdo = Conexao::getInstance();
        try 
        {
            $sql = "select * from Checagem as c, usuario as u where c.usuario_idUsuario= u.idUsuario;";
            $execucao = $pdo->prepare($sql);
            $execucao->execute();
            $Pesquisa = "";
            $Pesquisa = $execucao->fetchAll(PDO::FETCH_ASSOC);
            return $Pesquisa;
        } 
        
        catch (PDOException $ex) 
        {
            //Caso Ocorra Erro na Pesquisa. 
            echo"Falha na pesquisa! Erro: " . $ex->getMessage();
        }
    }

    public function Gravar(ChecagemDTO $ChecagemDTO) 
    {
        $pdo = Conexao::getInstance();
        try 
        {
            $sql = "insert into Checagem(Desc_Desordem, Endereco, Org_Responsavel, Cod_Desordem, Data, Ponto, Tipo_Desordem, Status, Foto, Usuario_idUsuario) VALUES(? ,? ,? ,? ,? ,? ,?, ?, ?, ?);";
            $execucao = $pdo->prepare($sql);
            $execucao->bindValue(1, $ChecagemDTO->getDesc_Desordem());
            $execucao->bindValue(2, $ChecagemDTO->getEndereco());
            $execucao->bindValue(3, $ChecagemDTO->getOrg_Responsavel());
            $execucao->bindValue(4, $ChecagemDTO->getCod_Desordem());
            $execucao->bindValue(5, $ChecagemDTO->getData());
            $execucao->bindValue(6, $ChecagemDTO->getPonto());
            $execucao->bindValue(7, $ChecagemDTO->getTipo_Desordem());
            $execucao->bindValue(8, $ChecagemDTO->getStatus());        
            $execucao->bindValue(9, $ChecagemDTO->getFoto());
            $execucao->bindValue(10,$ChecagemDTO->getUsuario_idUsuario());
            return $execucao->execute();                       
                 
    
         } catch (PDOException $ex) {
            //Caso Ocorra Erro na Gravação.
            echo"Falha na gravação! Erro:" . $ex->getMessage();
        }
    }

    public function Apagar(ChecagemDTO $ChecagemDTO)
    {
        $pdo = Conexao::getInstance();
        try {
            $sql = "delete from Checagem where idChecagem = ?;";
            $execucao = $pdo->prepare($sql);
            $execucao->bindValue(1, $ChecagemDTO->getIdChecagem());
            return $execucao->execute();
            
        }
        catch (PDOException $ex)
        {
            //Caso Ocorra Erro ao apagar o registro.
            echo"Falha ao apagar o registro! Erro" . $ex->getMessage();
        }
    }

    public function Alterar(ChecagemDTO $ChecagemDTO)
    {
        
        try
        {
            $pdo = Conexao::getInstance();
            $sql = "update checagem set Desc_Desordem =?, Endereco =?, Org_Responsavel =?,Cod_Desordem =?, Data =?, Ponto =?, Tipo_Desordem =?, Status =?, Foto =?, Usuario_idUsuario =? where idChecagem =?;";
            $execucao = $pdo->prepare($sql);
            $execucao = $pdo->prepare($sql);
            $execucao->bindValue(1, $ChecagemDTO->getDesc_Desordem());
            $execucao->bindValue(2, $ChecagemDTO->getEndereco());
            $execucao->bindValue(3, $ChecagemDTO->getOrg_Responsavel());
            $execucao->bindValue(4, $ChecagemDTO->getCod_Desordem());
            $execucao->bindValue(5, $ChecagemDTO->getData());
            $execucao->bindValue(6, $ChecagemDTO->getPonto());
            $execucao->bindValue(7, $ChecagemDTO->getTipo_Desordem());
            $execucao->bindValue(8, $ChecagemDTO->getStatus());        
            $execucao->bindValue(9, $ChecagemDTO->getFoto());
            $execucao->bindValue(10,$ChecagemDTO->getUsuario_idUsuario());
            $execucao->bindValue(11,$ChecagemDTO->getIdChecagem());
            return $execucao->execute();
        } 
        catch (PDOException$ex)
        {
            //Caso Ocorra erro para Alterar.
            echo"Falha na alteração! Erro:" . $ex->getMessage();
        }
    }

    public function PesquisarUmRegistro(ChecagemDTO $ChecagemDTO)
    {
        $pdo = Conexao::getInstance();
        try 
        {
            $sql = "select * from Checagem as c,usuario as u where c.usuario_idUsuario= u.idUsuario and idChecagem= ?;";
            $execucao = $pdo->prepare($sql);
            $execucao->bindValue(1, $ChecagemDTO->getidChecagem());
            $execucao->execute();
            $Pesquisa = "";
            $Pesquisa = $execucao->fetch(PDO::FETCH_ASSOC);
            return $Pesquisa;
        } 
        catch (PDOException $ex) 
        {
            //Caso Ocorra Erro na pesquisa.
            echo"Falha na pesquisa! Erro:" . $ex->getMessage();
        }
    }
//FIM
}
