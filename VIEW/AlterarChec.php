<?php
include_once '../BOOTSTRAP/WebComplemento.html';
require_once '../DAO/ChecagemDAO.php';
require_once '../DTO/ChecagemDTO.php';

$id = $_GET["id"];
$ChecagemDTO = new ChecagemDTO;
$ChecagemDTO->setIdChecagem($id);

$ChecagemDAO = new ChecagemDAO;
$Pesquisa = $ChecagemDAO->PesquisarUmRegistro($ChecagemDTO);
//var_dump($Pesquisa);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../BOOTSTRAP/EstiloCentroMap_Chec.css" />
        <title>ALTERAR CHECAGEM</title>
    </head>

    <body>
        <table width="100%"  cellspacing="0" cellpadding="0" style="border: none">
            <tr>
                <td>
                    <?php
                    include 'MenuPrincipal.php';
                    ?>
                </td>
            </tr>
        </table  

        <br>
        <!--INÍCIO DA SELEÇÃO DAS PILLS-->
        <div class="container-fluid" id="formMapChec">

            <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">            
                <li class="nav-item">
                    <a class="nav-link active" id="pillChec" data-toggle="pill" href="#pillsChec" role="tab">CHECAGEM</a>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pillsChec" role="tabpanel">
                    <!--EDITAR AQUI O FORM DE CHECAGEM-->

                    <form name="AlterarChec"  method="post" action="../CONTROLE/ValidaAlterarChecagem.php">

                        <div class="form-row">
                            <div class="form-group col-ms-6 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="Chec">USUÁRIO</span>
                                    </div>                         
                                    <input type="usu_idUsu" class="form-control" name="usu_idUsu" value="<?php echo $Pesquisa["usuario_idUsuario"] ?>" id="Chec"placeholder="USUÁRIO" readonly= />
                                </div>
                            </div>

                            <div class="form-group col-ms-6 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="Chec">CODIGO</span>
                                    </div>
                                    <input type="idChec" class="form-control" name="idChec" value="<?php echo $Pesquisa["idChecagem"] ?>" id="Chec"placeholder="Cdígo" readonly/>  
                                </div>
                            </div>

                            <div class="form-group col-ms-6 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="dataChec">DATA</span>
                                    </div>
                                    <input type="date" class="form-control" name="inputDataChecagem" value="<?php echo $Pesquisa["Data"] ?>" id="dataChec" placeholder="DATA" />
                                </div>
                            </div>

                            <div class="form-group col-ms-6 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="pontoChec">PONTO</span>
                                    </div>
                                    <input type="number" class="form-control" min="0" name="inputPontoChecagem" value="<?php echo $Pesquisa["Ponto"] ?>" id="pontoChec" placeholder="PONTO" />
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-ms-12 col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addChec">ENDEREÇO</span>
                                    </div>
                                    <textarea id="addChec" name="addChecagem" rows="" cols=""  class="form-control"placeholder="Insira o endereço da verificação"><?php echo $Pesquisa["Endereco"]?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-ms-2 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="tipoChecagem">Tipo do problema</label>
                                    </div>
                                    
                                    <select class="custom-select" id="tipoChec" name="inputTipoChecagem" >  
                                        <option value="<?php echo $Pesquisa["Tipo_Desordem"] ?>" ><?php echo $Pesquisa["Tipo_Desordem"] ?></option>
                                        <option value="fisico">Físico</option>
                                        <option value="social">Social</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-ms-2 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="codigoChecagem">Código do problema</label>
                                    </div>

                                    <select class="custom-select" id="codChec" name="inputCodigoChecagem">
                                        <option value="<?php echo $Pesquisa["Cod_Desordem"] ?>" ><?php echo $Pesquisa["Cod_Desordem"] ?></option>
                                        <option class="fisicoChe" value="Buraco na rua">A</option>
                                        <option class="fisicoChe" value="Poste queimado">B</option>
                                        <option class="fisicoChe" value="Sinalização deficiente">C</option>
                                        <option class="socialChe" value="Concentração de usuários de drogas">X</option>
                                        <option class="socialChe" value="Trabalho infantil">Y</option>
                                        <option class="socialChe" value="Alto índice de assaltos">Z</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="descricaoChecagem">Descrição do código</label>
                                    </div>
                                    <input class="form-control" type="text" name="inputDescricaoChecagem" value="<?php echo $Pesquisa["Desc_Desordem"] ?>" id="descChec"readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-ms-2 col-lg-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="orgaoChecagem">Órgão Responsável</label>
                                    </div>
                                    <input class="form-control" type="text" name="inputOrgaoChecagem" value="<?php echo $Pesquisa["Org_Responsavel"] ?>" id="orgChec"readonly>
                                </div>
                                <select class="custom-select" id="orgChec" style="display: none;">
                                    <option value="" >Órgão Responsável</option>

                                    <option value="1"></option>
                                    <option value="2"></option>
                                    <option value="3"></option>
                                    <option value="4"></option>
                                    <option value="5"></option>
                                    <option value="6"></option>
                                </select>
                            </div>

                            <div class="form-group col-ms-2 col-lg-4 mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="statusChecagem">Status do problema</label>
                                    </div>
                                    <select class="custom-select" name="inputStatusChecagem" value="<?php echo $Pesquisa["Status"] ?>" id="statChec">
                                        <option value="Resolvido">Resolvido</option>
                                        <option value="Parcialmente Resolvido">Parcialmente Resolvido</option>
                                        <option value="Não resolvido">Não resolvido</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-ms-12 col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Anexe a foto</span>
                                    </div>
                                    
                                     <div class="input-group-prepend">
                                        <a href="../FOTO/<?php echo $Pesquisa["Foto"] ?>">
                                        <img src="../FOTO/<?php echo $Pesquisa["Foto"] ?>" style="width: 40px;" class="img-thumbnail">
                                        </a>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"  name="fotoChecagem" id="fotoChec">
                                        <label class="custom-file-label" for="fotoChecagem"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="ListarChec.php" class="btn btn-success">Voltar</a>
                             <button type="submit" class="btn btn-danger">Alterar</button>
                        </div>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>

        <?php
        include_once 'Rodape.php';
        ?>
    </body>
    <script src="../JS/scriptChecagem.js"></script>
</html>
