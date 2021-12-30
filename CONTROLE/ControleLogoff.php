<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CONTROLE LOGOFF</title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        session_destroy();
//        die();
        echo"<script>";
        echo"window.location.href ='../index.php';";
        echo"</script> ";
        ?>
    </body>
</html>
