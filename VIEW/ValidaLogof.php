<?php

if (!isset($_SESSION["usuario"])) {
//    var_dump($_SESSION);
//    die();
    echo "<script>";
    echo "window.location.href = '../index.php';";
    echo "</script> ";
}
?>

