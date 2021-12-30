<?php
include_once '../BOOTSTRAP/WebComplemento.html';
error_reporting(0);
session_start();
include './validaLogof.php';
if (isset($_SESSION["usuario"])) {
    $usuario = $_SESSION["usuario"];
//var_dump($_SESSION);
}
?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>PÁGINA MAPEAMENTO</title>
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
        </table>

        <table width="100%" cellspacing="0" cellpadding="0" style="border: none">
            <tr>
                <td>
                    <?php
                    include 'PaginaCadastrarMap.php';
                    ?>
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
    </body>
</html>