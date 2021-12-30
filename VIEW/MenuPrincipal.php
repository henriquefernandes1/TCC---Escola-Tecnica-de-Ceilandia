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
    
    <title>MENU MAPEAMENTO</title>
</head>
<body>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container" id="brand">
            <span class="navbar-brand">
                <img src="../IMAGE/logo.svg" alt="SMPSIP" width="100px" height="auto" /></span>
        </div>

        <div class="container-fluid" id="iconeMenu">
            <ul class="navbar-nav" id="menuLinks">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        Ações
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../VIEW/PrincipalCadastrarMap.php">Mapeamento</a>
                        <a class="dropdown-item" href="../VIEW/PrincipalCadastrarChec.php">Checagem</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../VIEW/ListarMap.php">Listar mapeamento</a>
                        <a class="dropdown-item" href="../VIEW/ListarChec.php">Listar checagem</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        Relatórios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../VIEW/RelatorioMap.php">Mapeamentos</a>
                        <a class="dropdown-item" href="../VIEW/RelatorioChec.php">Checagens</a>
                    </div>
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

    <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('.dropdown-toggle').dropdown();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').toolptip();
        });
    </script>
</body>

</html>