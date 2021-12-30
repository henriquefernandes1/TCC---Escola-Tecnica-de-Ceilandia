<?php
include_once '../DAO/CONEXAO/Conexao.php';
?>
<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>VALIDA CADASTRAR USUÁRIO</title>
    </head>
    <body>
        <?php
        require_once '../DAO/UsuarioDAO.php';
        require_once '../DTO/UsuarioDTO.php';
        
        $login = addslashes($_POST["login"]);
        $nome = addslashes($_POST["nome"]);
        $email = addslashes($_POST["email"]);
        $senha = addslashes(md5($_POST["senha"]));
        $confsenha = addslashes(md5($_POST["confsenha"]));
        $matricula = addslashes($_POST["matricula"]);
        $idPerfil = addslashes($_POST["idPerfil"]);

        //echo "$nome <br>";
        //echo "$email <br>";
        //echo "$senha <br>";
        //echo "$confsenha <br>";
        //echo "$idPerfil <br>";
        //exit();

        if (($nome == "") or ( $login == "") or ( $email == "") or ( $senha == "") or ( $matricula == "") or ( $idPerfil == "")) {          
            
            echo "<script>";
            echo "alert('Não foi possível realizar o cadastro!');";
            echo "window.location.href='../VIEW/PaginaCadastrarUsuario.php?';";
            echo "</script>";
            
        } else if ($senha != $confsenha) {
           
            echo "<script>";
            echo "alert('Não foi possível realizar o cadastro!');";
            echo "window.location.href='../VIEW/PaginaCadastrarUsuario.php?';";
            echo "</script>";
        } else {

            $UsuarioDTO = new UsuarioDTO;
            $UsuarioDTO->setLogin($login);
            $UsuarioDTO->setNome($nome);
            $UsuarioDTO->setEmail($email);
            $UsuarioDTO->setSenha($senha);             
            $UsuarioDTO->setMatricula($matricula);
            $UsuarioDTO->setIdPerfil($idPerfil);
            //exit();

            $UsuarioDAO = New UsuarioDAO;
            $resultado = $UsuarioDAO->Gravar($UsuarioDTO);



            if (!empty($resultado)) {

                echo "<script>";
                echo "alert('Cadastramento efetuado com sucesso!');";
                echo "window.location.href='../VIEW/ListarUsuario.php?';";
                echo "</script>";
            } else {
              
                echo "<script>";
                echo "alert('Não foi possível realizar o cadastro!');";
                echo "window.location.href='../VIEW/paginaCadastrarUsuario.php?';";
                echo "</script>";
            }
        }
        ?>
    </body>
</html>

