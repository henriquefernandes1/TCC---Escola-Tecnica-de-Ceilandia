<?php
include_once '../BOOTSTRAP/WebComplemento.html';      
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../BOOTSTRAP/EstiloCentroUsuario.css">
        <title>RELATÓRIO USUÁRIO</title>
    </head>

    <body>
      
        <table width="100%" cellspacing="0" cellpadding="0" style="border: none">
            <tr>
                <td>
                    <?php
                    include 'MenuUsuario.php';
                    ?>
                </td>
            </tr>
        </table>

        <table width="100%" cellspacing="0" cellpadding="0" style="border: none">
            <tr>
                <td>
                    <div class="container-fluid mt-3 mb-3" id="formRegistro" style="hidden:550px">
                        <h3 class="tituloRegistro">RELATÓRIOS</h3>
                        
                        <div class="container-fluid" id="DiviFrame">
                            <iframe src="../RELATORIOS/RelatoriosGeral.php" allow="fullscreen" 
                                    frameborder="0" style="width: 100%; height: 500px;"></iframe>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <table width="100%" cellspacing="0" cellpadding="0" style="border: none;">
            <tr>
                <td>
                    <?php
                    include 'Rodape.php';
                    ?>
                </td>
            </tr>
        </table>
        <?php
        ?>
    </body>
</html>