<?php
include_once '../BOOTSTRAP/WebComplemento.html';
require_once '../DAO/UsuarioDAO.php';

$UsuarioDAO = new UsuarioDAO;
$consulta = $UsuarioDAO->Pesquisar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../BOOTSTRAP/EstiloCentroUsuario.css">
    <title>CADASTRAR USUÁRIO(A)</title>
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
</head>

<body>

    <div class="container-fluid" id="formRegistro">

        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pillRegistro" data-toggle="pill" href="#pillsMap" role="tab">REGISTRAR USUÁRIO(A)</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="pillRel" data-toggle="pill" href="#pillsChec" role="tab">USUÁRIOS REGISTRADOS(AS)</a>
            </li>
        </ul>


        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pillsMap" role="tabpanel">

                <center>
                    <div class="container-fluid mb-3 tituloRegistro">
                        <h1>CADASTRAR USUÁRIO</h1>
                    </div>
                </center>

                <form name="CadastrarUsuário" action="../CONTROLE/ValidaCadastroUsuario.php" method="post">

                    <div class="form-row">
                        <div class="form-group col-ms-6 col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="spanNome">LOGIN</span>
                                </div>
                                <input type="text" class="form-control" name="login" id="login" placeholder="Digite o Login" maxlength="40" required>
                            </div>
                        </div>

                        <div class="form-group col-ms-6 col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="spanNome">Nome Completo</span>
                                </div>
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome completo" maxlength="40" required>
                            </div>
                        </div>

                        <div class="form-group col-ms-6 col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="spanEmail">E-mail</span>
                                </div>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Digite o e-mail" maxlength="50">
                            </div>
                        </div>

                        <div class="form-group col-ms-6 col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="spanSenha">Matrícula</span>
                                </div>
                                <input type="text" class="form-control" name="matricula" id="matricula" placeholder="matricula" maxlength="15">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-ms-6 col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="spanSenha">Senha</span>
                                </div>
                                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" maxlength="15">
                            </div>
                        </div>

                        <div class="form-group col-ms-6 col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="spanConfSenha">Confirme a Senha</span>
                                </div>
                                <input type="password" class="form-control" name="confsenha" id="confsenha" placeholder="Confirme sua Senha" maxlength="15" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-ms-6 col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="idPerfil">Selecione o Perfil</label>
                                    <select class="form-control" name="idPerfil" id="idPerfil">
                                        <option value="" disabled selected>Selecione um perfil</option>
                                        <option value="1" class="btn btn-warning btn-block">Administrador</option>
                                        <option value="2" class="btn btn-primary btn-block">Usuário</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid" style="width: 100%; text-align: center;">
                        <button type="submit" class="btn btn-success mb-3">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade" id="pillsChec" role="tabpanel">
                <center>
                    <div class="container-fluid mb-3 tituloRegistro">
                        <h1>USUÁRIOS(AS) EXISTENTES</h1>
                    </div>
                </center>

                <form name="AlterarUsuário" action="../CONTROLE/ValidaAlterarUsuario.php" method="post">
                    <div class="container-fluid mb-3 tituloRegistro">

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
                                echo "<td align='center'> <a href='../VIEW/AlterarUsuario.php?id={$p["idUsuario"]}' data-toggle='tooltip' data-placement='top' title='Editar Usuário'> <i class='fas fa-user-edit text-dark'> </i> </a> </td>";
                                echo "<td align='center'> <a href='../Controle/ApagarUsuario.php?id={$p["idUsuario"]}' data-toggle='tooltip' data-placement='top' title='Apagar Usuário'><i class='fas fa-trash-alt text-danger'> </i> </a> </td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('[data-toggle="tooltip"]').tooltip();
                            });
                        </script>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="../JS/scriptADM.js"></script>

</html>