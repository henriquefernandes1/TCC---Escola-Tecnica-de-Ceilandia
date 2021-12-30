<?php

require_once '../DAO/ChecagemDAO.php';
require_once '../DTO/ChecagemDTO.php';

$id = $_GET["id"];
$ChecagemDTO = new ChecagemDTO;
$ChecagemDTO->setIdChecagem($id);

$ChecagemDAO = new ChecagemDAO;
$verifica = $ChecagemDAO->Apagar($ChecagemDTO);

if ($verifica) {
    echo "<script>";
    echo "alert('Exclusão efetuada com sucesso!');";
    echo "window.location.href='../VIEW/ListarChec.php';";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert('Não foi possível excluir o registro!');";
    echo "window.location.href='../VIEW/ListarChec.php';";
    echo "</script>";
}