<?php
/**
 * Description of MapeamentoDAO
 *
 * @author Windows10
 */
require_once 'CONEXAO/Conexao.php';

class MapeamentoDAO {
    //put your code here
    
    public function Pesquisar() {
        $pdo = Conexao::getInstance();

        try {

            $sql = "select * from Mapeamento as m, usuario as u where m.usuario_idUsuario= u.idUsuario;";
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

    public function Gravar(MapeamentoDTO $MapeamentoDTO) 
    {
        $pdo = Conexao::getInstance();
        try 
        {
            $sql = "insert into Mapeamento(Desc_Desordem, Endereco, Org_Responsavel, Cod_Desordem, Data, Ponto, Tipo_Desordem, Status, Foto, Usuario_idUsuario) VALUES(? ,? ,? ,? ,? ,? ,?, ?, ?, ?);";
            $execucao = $pdo->prepare($sql);
            $execucao->bindValue(1, $MapeamentoDTO->getDesc_Desordem());
            $execucao->bindValue(2, $MapeamentoDTO->getEndereco());
            $execucao->bindValue(3, $MapeamentoDTO->getOrg_Responsavel());
            $execucao->bindValue(4, $MapeamentoDTO->getCod_Desordem());
            $execucao->bindValue(5, $MapeamentoDTO->getData());
            $execucao->bindValue(6, $MapeamentoDTO->getPonto());
            $execucao->bindValue(7, $MapeamentoDTO->getTipo_Desordem());
            $execucao->bindValue(8, $MapeamentoDTO->getStatus());        
            $execucao->bindValue(9, $MapeamentoDTO->getFoto());
            $execucao->bindValue(10,$MapeamentoDTO->getUsuario_idUsuario());
            return $execucao->execute();                       
                 
    
         } catch (PDOException $ex) {
            //Caso Ocorra Erro na Gravação.
            echo"Falha na gravação! Erro:" . $ex->getMessage();
        }
    }

    public function Apagar(MapeamentoDTO $MapeamentoDTO)
    {
        $pdo = Conexao::getInstance();
        try {
            $sql = "delete from Mapeamento where idMapeamento = ?;";
            $execucao = $pdo->prepare($sql);
            $execucao->bindValue(1, $MapeamentoDTO->getIdMapeamento());
            return $execucao->execute();
            
        } 
        catch (PDOException $ex)
        {
            //Caso Ocorra Erro ao apagar o registro.
            echo"Falha ao apagar o registro! Erro" . $ex->getMessage();
        }
    }

    public function Alterar(MapeamentoDTO $MapeamentoDTO)
    {
      
        try
        {
            $pdo = Conexao::getInstance();
            $sql = "update mapeamento set Desc_Desordem =?, Endereco =?, Org_Responsavel =?,Cod_Desordem =?, Data =?, Ponto =?, Tipo_Desordem =?, Status =?, Foto =?, Usuario_idUsuario =? where idMapeamento = ?;";
            $execucao = $pdo->prepare($sql);
            $execucao = $pdo->prepare($sql);
            $execucao->bindValue(1, $MapeamentoDTO->getDesc_Desordem());
            $execucao->bindValue(2, $MapeamentoDTO->getEndereco());
            $execucao->bindValue(3, $MapeamentoDTO->getOrg_Responsavel());
            $execucao->bindValue(4, $MapeamentoDTO->getCod_Desordem());
            $execucao->bindValue(5, $MapeamentoDTO->getData());
            $execucao->bindValue(6, $MapeamentoDTO->getPonto());
            $execucao->bindValue(7, $MapeamentoDTO->getTipo_Desordem());
            $execucao->bindValue(8, $MapeamentoDTO->getStatus());        
            $execucao->bindValue(9, $MapeamentoDTO->getFoto());
            $execucao->bindValue(10,$MapeamentoDTO->getUsuario_idUsuario());
            $execucao->bindValue(11,$MapeamentoDTO->getIdMapeamento());
            return $execucao->execute();
        } 
        catch (PDOException$ex)
        {
            //Caso Ocorra erro para Alterar.
            echo"Falha na alteração! Erro:" . $ex->getMessage();
        }
    }

    public function PesquisarUmRegistro(MapeamentoDTO $MapeamentoDTO)
    {
        $pdo = Conexao::getInstance();
        try 
        {
            $sql = "select * from Mapeamento as m,usuario as u where m.usuario_idUsuario= u.idUsuario and idMapeamento= ?;";
            $execucao = $pdo->prepare($sql);
            $execucao->bindValue(1, $MapeamentoDTO->getIdMapeamento());
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
