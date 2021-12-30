<?php

require_once '../DAO/UsuarioDAO.php';
require_once '../DTO/UsuarioDTO.php';

$id = $_GET["id"];
$UsuarioDTO = new UsuarioDTO;
$UsuarioDTO->setIdUsuario($id);

$UsuarioDAO = new UsuarioDAO;
$verifica = $UsuarioDAO->Apagar($UsuarioDTO);

if ($verifica) {
    echo "<script>";
    echo "alert('Exclusão efetuada com sucesso!');";
    echo "window.location.href='../VIEW/ListarUsuario.php';";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert('Não foi possível excluir o registro!');";
    echo "window.location.href='../VIEW/ListarUsuario.php';";
    echo "</script>";
}