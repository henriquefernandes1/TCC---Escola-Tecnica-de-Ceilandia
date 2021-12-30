<?php
include_once '../BOOTSTRAP/WebComplemento.html';
require_once '../DAO/MapeamentoDAO.php';

$MapeamentoDAO = new MapeamentoDAO;
$consulta = $MapeamentoDAO->Pesquisar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../BOOTSTRAP/EstiloCentroMap_Chec.css" />
    <title>CADASTRAR MAPEAMENTO</title>
</head>

<body>

    <div class="container-fluid" id="formMapChec">
        <div class="container-fluid mb-3 tituloMapChec">
            MAPEAMENTO
        </div>
        <form name="CadastrarMapeamento" action="../CONTROLE/ValidaCadastrarMapeamento.php" method="post">

            <div class="form-row">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="dataChecagem">CÓDIGO DE USUÁRIO(A)</span>
                        </div>
                        <input class="form-control col-1" type="text" name="usu_idUsu" id="usu_idUsuo" value="<?PHP echo $_SESSION["idUsuario"] ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-ms-6 col-lg-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="dataMapeamento">DATA</span>
                        </div>
                        <input type="date" class="form-control" name="inputDataMap" id="inputDataMap" placeholder="DATA" />
                    </div>
                </div>

                <div class="form-group col-ms-6 col-lg-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="pontoMapeamento">PONTO</span>
                        </div>
                        <input type="number" class="form-control" min="0" name="inputPontoMapeamento" id="inputPontoMapeamento" placeholder="PONTO" />
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-ms-12 col-lg-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="enderecoMapeamento">ENDEREÇO</span>
                        </div>
                        <textarea id="inputEnderecoMapeamento" name="addMap" rows="" cols="" class="form-control" placeholder=<?php echo $Pesquisa["Endereco"] ?>" Endereço"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-ms-2 col-lg-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="tipoMapeamento">Tipo do problema</label>
                        </div>
                        <select class="custom-select" name="inputTipoMap" id="inputTipoMap" readonly>
                            <option value="" disabled selected>Selecione o tipo do problema</option>
                            <option value="Físico">Físico</option>
                            <option value="Social">Social</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-ms-2 col-lg-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="codigoMapeamento">Código do problema</label>
                        </div>
                        <select class="custom-select" name="inputCodigoMapeamento" id="inputCodigoMapeamento">
                            <option value="" disabled selected>Selecione o código</option>
                            <option class="Físico" value="A" data-orgao="NOVACAP" data-desc="Buraco na rua">A</option>
                            <option class="Físico" value="B" data-orgao="CEB" data-desc="Poste queimado">B</option>
                            <option class="Físico" value="C" data-orgao="DETRAN-DF" data-desc="Sinalização deficiente">C</option>
                            <option class="Social" value="X" data-orgao="SSP-DF" data-desc="Concentração de usuários de drogas">X</option>
                            <option class="Social" value="Y" data-orgao="MPF" data-desc="Trabalho infantil">Y</option>
                            <option class="Social" value="Z" data-orgao="PM-DF" data-desc="Alto índice de assaltos">Z</option>
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
                        <input class="form-control" type="text" name="inputDescricaoMapeamento" id="inputDescricaoMapeamento" readonly>
                    </div>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-ms-2 col-lg-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="orgaoMapeamento">Órgão Responsável</label>
                        </div>
                        <input class="form-control" type="text" name="inputOrgaoMapeamento" id="inputOrgaoMapeamento" readonly>
                    </div>

                </div>

                <div class="form-group col-ms-2 col-lg-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="statusMapeamento">Status do problema</label>
                        </div>
                        <select class="custom-select" name="inputStatusMapeamento" id="inputStatusMapeamento">
                            <option value=""></option>
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
                        <div class="custom-file">
                            <input type="file" name="fotoMapeamento">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid" style="width: 100%; text-align: center;">
                <button type="submit" class="btn btn-success mb-3">Enviar</button>
            </div>
        </form>
    </div>
</body>

<script src="../JS/scriptMapeamento.js"></script>

</html>