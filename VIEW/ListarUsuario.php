<?php
include_once '../BOOTSTRAP/WebComplemento.html';
require_once '../DAO/UsuarioDAO.php';
require_once '../DTO/UsuarioDTO.php';

$UsuarioDAO = new UsuarioDAO;
$consulta = $UsuarioDAO->Pesquisar();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <style>
            html body {
                background-color: skyblue;
            }

            #formRegistro {
                width: 80%;
                margin-top: 10px;
                margin-bottom: 10px;
                background-color: #ffffff;
                border-radius: 10px;
                padding-top: 10px;
            }

            .tituloRegistro {
                text-align: center;
                font-weight: bolder;
                font-size: 30px;

            }
        </style>
        <link rel="stylesheet" href="../BOOTSTRAP/EstiloCentroUsuario.css" />
        <title>LISTAR USUÁRIO</title>
    </head>

    <body>  
        <?php
        include_once 'MenuUsuario.php';
        ?>
        <br><br>
        
        <div class="container-fluid">
            <center>
                <div class="card bg-dark text-white">
                    <div class="container-fluid mb-3 tituloRegistro">LISTAR USUÁRIOS<a href="#"</a></div>
                </div>

                <table class="table text-blck" border="2" widht="100%">
                    <tr>
                        <th>Código</th>
                        <th>Login</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Matricula</th>
                        <th>Perfil</th>
                        <th align="center">Alterar</th>
                        <th align="center">Excluir</th>
                    </tr>  

                    <?php
                    foreach ($consulta as $p) {
                        echo "<tr>";
                        echo "<td>{$p["idUsuario"]}</td>";
                        echo "<td>{$p["Login"]} </td>";
                        echo "<td>{$p["Nome"]} </td>";
                        echo "<td>{$p["Email"]} </td>";
                        echo "<td>{$p["Matricula"]} </td>";
                        echo "<td>{$p["descricao"]} </td>";
                        echo "<td align='center'> <a href='../VIEW/AlterarUsuario.php?id={$p["idUsuario"]}' data-toggle='tooltip' data-placement='top' title='Editar Usuário'><i class='fas fa-user-edit text-dark'></i></a></td>";
                        echo "<td align='center'> <a href='../Controle/ApagarUsuario.php?id={$p["idUsuario"]}' data-toggle='tooltip' data-placement='top' title='Apagar Usuário'><i class='fas fa-trash-alt text-danger'></i></a></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
                <script>
                    $(document).ready(function () {
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                </script>
            </center>
        </div>       
    </body>
    <script src="../JS/scriptADM.js"></script>
</html>
