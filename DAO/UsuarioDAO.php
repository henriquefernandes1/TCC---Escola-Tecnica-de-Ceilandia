<?php
/**
 * Description of UsuarioDAO
 *
 * @author Windows10
 */
require_once 'CONEXAO/Conexao.php';

class UsuarioDAO {

//put your code here

    public function validaLogin(UsuarioDTO $UsuarioDTO) 
    {
        
        try 
        {
            $pdo = Conexao:: getInstance();
            $sql = "select u.idUsuario, u.Nome, u.Login, u.Senha, u.Email, u.idPerfil, u.Matricula, p.idPerfil, p.descricao from usuario as u, perfil as p where u.idPerfil=p.idPerfil and  u.Email= ? and u. Senha = ?;";
            $execucao = $pdo ->prepare($sql);
            $execucao -> bindValue(1, $UsuarioDTO ->getEmail());
            $execucao -> bindValue(2, $UsuarioDTO ->getSenha());
            $execucao -> execute();
            
            $pesquisa = "";
            $pesquisa = $execucao->fetch(PDO::FETCH_ASSOC);
            return $pesquisa;
        } 
        
        catch (PDOException $exc) 
        {
            //Caso Ocorra Erro para Validar o Login.
            echo "Falha ao Efetuar Login! Erro:" . $exc->getMessage();
        }
    }
    
    
    public function Pesquisar()
    {
       
        try 
        {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM usuario as u, perfil as p WHERE u.idPerfil = p.idPerfil;";
            $execucao = $pdo->prepare($sql);
            $execucao->execute();
            $pesquisar = "";
            $pesquisar = $execucao->fetchAll(PDO::FETCH_ASSOC);
            return $pesquisar;  
        } 
        
        catch (PDOException $exc) 
        {
            //Caso ocorra Erro na pesquisa.
            echo"Falha ao realizar a pesquisa! Erro:" . $exc->getMessage();
        }
    }
    
    
    public function Gravar(UsuarioDTO $UsuarioDTO)
    {
        
        try 
        {
            $pdo = Conexao::getInstance();
            $sql = "insert into usuario (Nome, Login, Senha, Email, idPerfil, Matricula) values (?, ?, ?, ?, ?, ? );";
            $execucao = $pdo->prepare($sql);
            $execucao->bindValue(1, $UsuarioDTO->getNome());
            $execucao->bindValue(2, $UsuarioDTO->getLogin());
            $execucao->bindValue(3, $UsuarioDTO->getSenha());
            $execucao->bindValue(4, $UsuarioDTO->getEmail());
            $execucao->bindValue(5, $UsuarioDTO->getidPerfil());
            $execucao->bindValue(6,$UsuarioDTO->getMatricula());
            return $execucao->execute(); 
         
        } 
        
        catch (PDOException $exc) 
        {
            //Caso Ocorra Erro na Gravação.
            echo "Falha na gravação! Erro" . $exc->getMessage();
        }
    }

    
    public function Apagar(UsuarioDTO $UsuarioDTO)
    {
        try 
        {
            $pdo = Conexao::getInstance();
            $sql = "delete from usuario where idUsuario = ?;";
            $execucao = $pdo->prepare($sql);
            $execucao->bindValue(1, $UsuarioDTO->getIdUsuario());
            return $execucao->execute();   
        } 
        
        catch (PDOException $exc)
        {
            //Caso Ocorra Erro ao apagar o registro.
            echo "Falha na exclusão da informação! Erro:" . $exc->getMessage();
        }
    }
    
    
    public function Alterar(UsuarioDTO $UsuarioDTO)
    {
       
        try 
        {
            $pdo = Conexao::getInstance();
            $sql = "update usuario set Nome =?, Email =?, Login =?,Senha =?, idPerfil =?, Matricula =? where idUsuario =?;";
            $execucao = $pdo->prepare($sql);
            $execucao->bindValue(1, $UsuarioDTO->getNome());
            $execucao->bindValue(2, $UsuarioDTO->getEmail());
            $execucao->bindValue(3, $UsuarioDTO->getLogin());
            $execucao->bindValue(4, $UsuarioDTO->getSenha());
            $execucao->bindValue(5, $UsuarioDTO->getIdPerfil());
            $execucao->bindValue(6, $UsuarioDTO->getMatricula());
            $execucao->bindValue(7, $UsuarioDTO->getIdUsuario());
            return $execucao->execute();
        } 
        
        catch (PDOException$exc)
        {
            //Caso ocorra Erro para Alterar.
            echo"Falha na alteração! Erro:" . $exc->getMessage();
        }
    }
    
    
    public function PesquisarRegistroPorId (UsuarioDTO $UsuarioDTO)
    {
        try 
        {
             $pdo = Conexao::getInstance();
             $sql = "select * from usuario where idUsuario= ?;";
             $execucao = $pdo ->prepare($sql);
             $execucao ->bindValue(1, $UsuarioDTO ->getIdUsuario());
             $execucao ->execute();
             $pesquisa = "";
             $pesquisa  = $execucao->fetch(PDO::FETCH_ASSOC);
             return $pesquisa;  
        } 
        
        catch (PDOException $exc) 
        {
            //Caso Ocorra Erro na pesquisa.
            echo "Fallha na pesquisa! Erro: " . $exc ->getMessage();
        }
    }

//FIM
}
