<?php
include_once '../BOOTSTRAP/WebComplemento.html';
require_once '../DAO/UsuarioDAO.php';
require_once '../DTO/UsuarioDTO.php';
require_once '../DAO/PerfilDAO.php';


$PerfilDAO = new PerfilDAO;
$consulta = $PerfilDAO->Pesquisar();

$id = $_GET["id"];
$UsuarioDTO = new UsuarioDTO;
$UsuarioDTO->setidUsuario($id);

$UsuarioDAO = new UsuarioDAO;
$Pesquisa = $UsuarioDAO->PesquisarRegistroPorId($UsuarioDTO);
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../BOOTSTRAP/EstiloCentroUsuario.css" />
        <title>ALTERAR USUÁRIOS</title>
    </head>

    <body>
        <table width="100%"  cellspacing="0" cellpadding="0" style="border: none">
            <tr>
                <td>
                    <?php                
                    include './MenuUsuario.php';
                    ?>
                </td>
            </tr>
        </table>       
        
        <br>
        <div class="card bg-dark text-white">
            <div class="container-fluid mb-3 tituloRegistro">ALTERAR USUÁRIOS</div>
        </div>
        
        <!--INÍCIO DA SELEÇÃO DAS PILLS-->
        <div class="container-fluid" id="formRegistro">


            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pillsMap" role="tabpanel">
                    <!--EDITAR AQUI O FORM DE MAPEAMENTO-->

                    <form name="AlterarUsuario" method="post" action="../CONTROLE/ValidaAlterarUsuario.php" >
                        <div class="form-row">
                            <div class="form-group col-ms-6 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="spanNome">Nome Completo</span>
                                    </div>                                
                                     <input type="text" class="form-control" name="nome" value="<?php  echo $Pesquisa["Nome"]?>" id="nome" placeholder="Digite o nome completo" maxlength="40" required>
                                     <input type="text" class="form-control" name="idUsuario" value="<?php  echo $Pesquisa["idUsuario"]?>" id="Usuario"  maxlength="40" readonly="1">
                                    
                                </div>
                                
                            </div>

                            <div class="form-group col-ms-6 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="spanEmail">E-mail</span>
                                    </div>
                                    <input type="email" class="form-control" name="email"  value="<?php  echo $Pesquisa["Email"]?>" id="email" placeholder="Digite o e-mail" maxlength="50">
                                </div>
                            </div>
                            
                            <div class="form-group col-ms-6 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="spanEmail">Login</span>
                                    </div>
                                    <input type="text" class="form-control" name="login"  value="<?php  echo $Pesquisa["Login"]?>" id="login" placeholder="Digite o Login" maxlength="50">
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
                                        <span class="input-group-text" id="spanSenha">Matrícula</span>
                                    </div>
                                    <input type="text" class="form-control" name="matricula"  value="<?php  echo $Pesquisa["Matricula"]?>" id="matricula" placeholder="matricula" maxlength="15">
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
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="idPerfil">Selecione o Perfil</label>
                                        <select class="form-control" name="idPerfil" id="idPerfil">
                                            
                                           <?php
                                                 echo" <option value='{$Pesquisa["idPerfil"]}'>{$Pesquisa["descricao"]}</option>";
                                                 foreach ($consulta as $c) {
                                                 echo" <option value='{$c["idPerfil"]}'>{$c["descricao"]}</option>";
                                                 }
                                              ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="container-fluid" style="width: 100%; text-align: center;">
                        <button type="submit" class="btn btn-success mb-3">Alterar</button>
                         </div>
                    </form>
                </div>
            </div>   
        </div>
          <?php
            include_once './Rodape.php';
          ?>
    </body>

    <script src="../JS/scriptADM.js"></script>
</html>