<?php
include_once '../BOOTSTRAP/WebComplemento.html';
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../BOOTSTRAP/estiloMenuSMPSIP.css">
        <title>MENU ADMINISTRADOR</title>
    </head>
    <body>

        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container" id="brand">
                <span class="navbar-brand"
                      ><img
                        src="../IMAGE/logo.svg"
                        alt="SMPSIP"
                        width="100px"
                        height="auto"
                        /></span>
            </div>

            <div class="container-fluid" id="iconeMenu">
                <ul class="navbar-nav" id="menuLinks">
                    <li class="nav-item">
                        <a class="nav-link" href="PrincipalCadastrarUsuario.php"
                           ><i class="fas fa-address-book"></i>
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link" href="RelatorioUsuario.php"><i class="fas fa-book"></i></a>
                    </li>

                    <li class="nav-item" id="session">
                        <a class="nav-link text-success text-uppercase" href="#">
                            <i class="fas fa-user-circle" data-toggle="tooltip" data-placement="left" title="Usuário Logado"></i>
                            <?php
                            echo $_SESSION["usuario"];
                            ?>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="../CONTROLE/ControleLogoff.php">
                            <i class="fas fa-sign-out-alt text-danger "title="Sair do Sistema." data-toggle="tooltip" data-placement="bottom"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').toolptip();
        });
    </script>
    </body>
</html>