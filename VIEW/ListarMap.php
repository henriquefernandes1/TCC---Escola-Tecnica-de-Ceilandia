<?php
include_once '../BOOTSTRAP/WebComplemento.html';
require_once '../DAO/MapeamentoDAO.php';
require_once '../DTO/MapeamentoDTO.php';

$MapeamentoDAO = new MapeamentoDAO;
$consulta = $MapeamentoDAO->Pesquisar();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style>
            html body {
                background-color: skyblue;
            }

            #formMapChec {
                width: 80%;
                margin-top: 10px;
                margin-bottom: 10px;
                background-color: #ffffff;
                border-radius: 10px;
                padding-top: 10px;
            }

            .tituloMapChec {
                text-align: center;
                font-weight: bolder;
                font-size: 30px;

            }
        </style>
        <link rel="stylesheet" href="../BOOTSTRAP/EstiloCentroMap_Chec.css" />
        <title>LISTAR MAPEAMENTO</title>
    </head>
    
    <body> 
        <?php
        include_once 'MenuPrincipal.php';
        ?>
        <div class="container-fluid">
            <br><br>
            <div class="container-fluid">
                <center>
                    <div class="card bg-dark text-white">
                        <div class="card-body tituloMapChec"> LISTAR MAPEAMENTOS</div>
                    </div>
                    <table class="table  table-bordered text-dark table-responsive">
                        <tr> 
                            <th>Código</th>
                            <th>Data</th>
                            <th>Ponto</th>
                            <th>Endereço</th>
                            <th>Tipo do problema</th>
                            <th>Código do problema</th>
                            <th>Descrição do código</th>
                            <th>Órgão Responsável</th>
                            <th>Status do problema</th>
                            <th>Anexe a foto</th> 
                            <th>Usuário</th> 
                            <th align="center">Alterar</th> 
                            <th align="center">Excluir</th>
                        </tr>  

                        <?php
                        foreach ($consulta as $p) {
                            echo "<tr>";
                            echo "<td>{$p["idMapeamento"]}</td>";
                            echo "<td>{$p["Data"]} </td>";
                            echo "<td>{$p["Ponto"]} </td>";
                            echo "<td>{$p["Endereco"]} </td>";
                            echo "<td>{$p["Tipo_Desordem"]} </td>";
                            echo "<td>{$p["Cod_Desordem"]} </td>";
                            echo "<td>{$p["Desc_Desordem"]} </td>";
                            echo "<td>{$p["Org_Responsavel"]} </td>";
                            echo "<td>{$p["Status"]} </td>";
                            echo "<td><img src='../FOTO/{$p["Foto"]}' with='50px' height='50px'> </td>";
                            echo "<td>{$p["Nome"]} </td>";
                            echo "<td align='center'> <a href='../VIEW/AlterarMap.php?id={$p["idMapeamento"]}' data-toggle='tooltip' data-placement='top' title='Editar Mapeamento'><i class='fas fa-user-edit text-dark'></i></a></td>";
                            echo "<td align='center'> <a href='../Controle/ApagarMapeamento.php?id={$p["idMapeamento"]}' data-toggle='tooltip' data-placement='top' title='Apagar Mapeamento!'><i class='fas fa-trash-alt text-danger'></i></a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </center>
            </div>
        </div>
    </body>
    <script src="../JS/scriptMapeamento.js"></script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</html>



