<?php
include_once '../DAO/CONEXAO/Conexao.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>VALIDA ALTERAR USUÁRIO</title>
    </head>
    <body>
        <?php
        require_once '../DAO/UsuarioDAO.php';
        require_once '../DTO/UsuarioDTO.php';

        $idUsuario = $_POST["idUsuario"];
        $Nome = $_POST["nome"];
        $Login = $_POST["login"];
        $Senha = md5($_POST["senha"]);
        $confsenha = md5($_POST["confsenha"]);
        $Email = $_POST["email"];
        $idPerfil = $_POST["idPerfil"];
        $Matricula = $_POST["matricula"];
      

        if (($idUsuario == "") or ($Nome == "") or ($Login == "") or ($Senha == "") or ($confsenha == "") or ($Email== "") or ($idPerfil == "")or ($Matricula == "")) {
            echo "<script>";
            echo "alert('Todos os campos devem estar preenchidos!');";
            echo "window.location.href='../VIEW/ListarUsuario.php';";
            echo "</script>";
        } else {
                      
            $UsuarioDTO = new UsuarioDTO;
            $UsuarioDTO->setNome($Nome);
            $UsuarioDTO->setLogin($Login);
            $UsuarioDTO->setSenha($Senha);
            $UsuarioDTO->setEmail($Email);       
            $UsuarioDTO->setIdPerfil($idPerfil);
            $UsuarioDTO->setMatricula($Matricula);
            $UsuarioDTO->setidUsuario($idUsuario);

            $UsuarioDAO = new UsuarioDAO;
            $verifica = $UsuarioDAO->Alterar($UsuarioDTO);

            if ($verifica) {
                echo "<script>";
                echo "alert('Alteração efetuado com sucesso!');";
                echo "window.location.href='../VIEW/ListarUsuario.php';";
                echo "</script>";
            } else {
                echo "<script>";
                echo "alert('Não foi possível realizar a Alteração!');";
                echo "window.location.href='../VIEW/ListarUsuario.php';";
                echo "</script>";
            }
        }
        ?> 
    </body>
</html>
