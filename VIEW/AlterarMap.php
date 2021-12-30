<?php
include_once '../BOOTSTRAP/WebComplemento.html';
require_once '../DAO/MapeamentoDAO.php';
require_once '../DTO/MapeamentoDTO.php';

$id = $_GET["id"];
$MapeamentoDTO = new MapeamentoDTO;
$MapeamentoDTO->setIdMapeamento($id);

$MapeamentoDAO = new MapeamentoDAO;
$Pesquisa = $MapeamentoDAO->PesquisarUmRegistro($MapeamentoDTO);
//var_dump($Pesquisa);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../BOOTSTRAP/EstiloCentroMap_Chec.css" />
        <title>ALTERAR MAPEAMENTO</title>
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
                    <a class="nav-link active" id="pillMap" data-toggle="pill" href="#pillsMap" role="tab">MAPEAMENTO</a>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pillsMap" role="tabpanel">
                    <!--EDITAR AQUI O FORM DE MAPEAMENTO-->                 

                    <form name="AlterarMap" method="post" action="../CONTROLE/ValidaAlterarMapeamento.php">

                        <div class="form-row">                           
                              <div class="form-group col-ms-6 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="Mape">USUÁRIO</span>
                                    </div>
                                    <input type="usu_idUsu" class="form-control" name="usu_idUsu" value="<?php echo $Pesquisa["usuario_idUsuario"] ?>" id="Map"placeholder="USUÁRIO" readonly/>
                                </div>
                            </div>

                            <div class="form-group col-ms-6 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="Mape">CODIGO</span>
                                    </div>
                                    <input type="idMap" class="form-control" name="idMap" value="<?php echo $Pesquisa["idMapeamento"] ?>" id="Map"placeholder="Cdígo" readonly/>  
                                </div>
                            </div>
                          
                            <div class="form-group col-ms-6 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="dataMape">DATA</span>
                                    </div>
                                    <input type="date" class="form-control" name="inputDataMap" value="<?php echo $Pesquisa["Data"] ?>" id="dataMape"placeholder="DATA" />                               
                                </div>
                            </div>

                            <div class="form-group col-ms-6 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="pontoMape">PONTO</span>
                                    </div>
                                    <input type="number" class="form-control" min="0" name="inputPontoMapeamento"  value="<?php echo $Pesquisa["Ponto"] ?>" id="pontoMape" placeholder="PONTO" />
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-ms-12 col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addMape">ENDEREÇO</span>
                                    </div>
                                    <textarea id="addMape" name="addMap" rows="" cols="" class="form-control"placeholder="Insira o endereço da verificação"><?php echo $Pesquisa["Endereco"]?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-ms-2 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="tipoMapeamento">Tipo do problema</label>
                                    </div>

                                    <select class="custom-select" id="tipoMape" name="inputTipoMap" >
                                        <option value="<?php echo $Pesquisa["Tipo_Desordem"] ?>" ><?php echo $Pesquisa["Tipo_Desordem"] ?></option>
                                        <option value="fisico">Físico</option>
                                        <option value="social">Social</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-ms-2 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="codigoMapeamento">Código do problema</label>
                                    </div>

                                    <select class="custom-select" id="codMape" name="inputCodigoMapeamento">
                                        <option value="<?php echo $Pesquisa["Cod_Desordem"] ?>" ><?php echo $Pesquisa["Cod_Desordem"] ?></option>
                                        <option class="fisicoMap" value="Buraco na rua">A</option>
                                        <option class="fisicoMap" value="Poste queimado">B</option>
                                        <option class="fisicoMap" value="Sinalização deficiente">C</option>
                                        <option class="socialMap" value="Concentração de usuários de drogas">X</option>
                                        <option class="socialMap" value="Trabalho infantil">Y</option>
                                        <option class="socialMap" value="Alto índice de assaltos">Z</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="descricaoMapeamento">Descrição do código</label>
                                    </div>
                                    <input class="form-control" type="text" name="inputDescricaoMapeamento" value="<?php echo $Pesquisa["Desc_Desordem"] ?>" id="descMape"readonly >
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-ms-2 col-lg-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="orgaoMapeamento">Órgão Responsável</label>
                                    </div>
                                    <input class="form-control" type="text" name="inputOrgaoMapeamento" value="<?php echo $Pesquisa["Org_Responsavel"] ?>" id="orgMape"readonly>
                                </div>
                                <select class="custom-select" id="orgMape" style="display: none;">
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
                                        <label class="input-group-text" for="statusMapeamento">Status do problema</label>
                                    </div>
                                    <select class="custom-select" name="inputStatusMapeamento" value="<?php echo $Pesquisa["Status"] ?>" id="statMape">
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
                                        <input type="file" class="custom-file-input" name="fotoMapeamento"  id="fotoMap">
                                        <label class="custom-file-label" for="fotoMapeamento"></label>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="text-center">
                            <a href="ListarMap.php" class="btn btn-success">Voltar</a>
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
    <script src="../JS/scriptMapeamento.js"></script>
</html>