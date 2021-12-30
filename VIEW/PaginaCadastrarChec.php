<?php
include_once '../BOOTSTRAP/WebComplemento.html';
require_once '../DAO/ChecagemDAO.php';

$ChecagemDAO = new ChecagemDAO;
$consulta = $ChecagemDAO->Pesquisar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../BOOTSTRAP/EstiloCentroMap_Chec.css" />
    <title>CADASTRAR CHECAGEM</title>
</head>

<body>

    <div class="container-fluid" id="formMapChec">
        <div class="container-fluid mb-3 tituloMapChec">
            CHECAGEM
        </div>
        <form name="CadastrarChecagem" action="../CONTROLE/ValidaCadastrarChecagem.php" method="post">


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
                            <span class="input-group-text" id="dataChecagem">DATA</span>
                        </div>
                        <input type="date" class="form-control" name="inputDataChecagem" id="inputDataChecagem" placeholder="DATA" />
                    </div>
                </div>

                <div class="form-group col-ms-6 col-lg-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="pontoChecagem">PONTO</span>
                        </div>
                        <input type="number" class="form-control" min="0" name="inputPontoChecagem" id="inputPontoChecagem" placeholder="PONTO" />
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-ms-12 col-lg-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="enderecoChecagem">ENDEREÇO</span>
                        </div>
                        <textarea id="inputEnderecoChecagem" name="addChecagem" rows="" cols="" class="form-control" placeholder=<?php echo $Pesquisa["Endereco"] ?>" Endereço"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-ms-2 col-lg-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="tipoChecagem">Tipo do problema</label>
                        </div>
                        <select class="custom-select" name="inputTipoChecagem" id="inputTipoChecagem">
                            <option value="" disabled selected>Selecione o tipo do problema</option>
                            <option value="Físico">Físico</option>
                            <option value="Social">Social</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-ms-2 col-lg-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="codigoChecagem">Código do problema</label>
                        </div>
                        <select class="custom-select" name="inputCodigoChecagem" id="inputCodigoChecagem">
                            <option value="" disabled selected>Selecione o código</option>
                            <option class="Físico" value="Buraco na rua" data-orgao="NOVACAP">A</option>
                            <option class="Físico" value="Poste queimado" data-orgao="CEB">B</option>
                            <option class="Físico" value="Sinalização deficiente" data-orgao="DETRAN-DF">C</option>
                            <option class="Social" value="Concentração de usuários de drogas" data-orgao="SSP-DF">X</option>
                            <option class="Social" value="Trabalho infantil" data-orgao="MPF">Y</option>
                            <option class="Social" value="Alto índice de assaltos" data-orgao="PM-DF">Z</option>
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
                        <input class="form-control" type="text" name="inputDescricaoChecagem" id="inputDescricaoChecagem" readonly>
                    </div>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-ms-2 col-lg-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="orgaoChecagem">Órgão Responsável</label>
                        </div>
                        <input class="form-control" type="text" name="inputOrgaoChecagem" id="inputOrgaoChecagem" readonly>
                    </div>

                </div>

                <div class="form-group col-ms-2 col-lg-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="statusChecagem">Status do problema</label>
                        </div>
                        <select class="custom-select" name="inputStatusChecagem" id="inputStatusChecagem">
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
                            <input type="file" name="fotoChecagem">
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
<script src="../JS/scriptChecagem.js"></script>

</html>