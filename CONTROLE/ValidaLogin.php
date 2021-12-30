<?php
include_once '../DAO/CONEXAO/Conexao.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>VALIDA LOGIN</title>
    </head>
    <body>
        <?php
        require_once '../DAO/UsuarioDAO.php';
        require_once '../DTO/UsuarioDTO.php';

        session_start();
        $email = $_POST["email"];
        //$Senha = md5($_POST["senha"]);
       $Senha = $_POST["senha"];


        //echo "<br> Email:" . $email;
        //echo "<br> Senha:" . $Senha;
        //exit();

        if (($email == "") || ($Senha == "")) {
            
            echo "<script>";
            echo "alert('Os campos E-mail e Senha são de preenchimento obrigatorio!');";
            echo "window.location.href='../index.php?';";
            echo "</script>";
        } else {


            $UsuarioDTO = new UsuarioDTO;
            $UsuarioDTO->setEmail($email);
            $UsuarioDTO->setSenha($Senha);

            $UsuarioDAO = new UsuarioDAO;
            $resultado = $UsuarioDAO->validaLogin($UsuarioDTO);


            if (!empty($resultado)) {
                $_SESSION["usuario"] = $resultado["Nome"];
                $_SESSION["idUsuario"] = $resultado["idUsuario"];
                $_SESSION["idPerfil"] = $resultado["idPerfil"];
                $_SESSION["perfil"] = $resultado["descricao"];

                $idPerfil = $_SESSION["idPerfil"];
                $_SESSION["nome"] = $resultado["Nome"];
                //exit();

                if ($idPerfil == "1") {
                    echo "<script>";
                    echo "window.location.href='../VIEW/LandingUsuario.php';";
                    echo "</script>";
                } else {

                    echo "<script>";
                    echo "window.location.href='../VIEW/LandingMap_Chec.php';";
                    echo "</script>";
                }
            } else {

                echo "<script>";
                 echo "alert('E-mail ou Senha inválidos!');";
                echo "window.location.href='../index.php?';";
                echo "</script>";
            }
        }
        ?>
    </body>
</html>
