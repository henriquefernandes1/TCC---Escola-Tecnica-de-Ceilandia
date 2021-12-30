<?php

require_once '../DAO/MapeamentoDAO.php';
require_once '../DTO/MapeamentoDTO.php';

$id = $_GET["id"];
$MapeamentoDTO = new MapeamentoDTO;
$MapeamentoDTO->setIdMapeamento($id);

$MapeamentoDAO = new MapeamentoDAO;
$verifica = $MapeamentoDAO->Apagar($MapeamentoDTO);

if ($verifica) {
    echo "<script>";
    echo "alert('Exclusão efetuada com sucesso!');";
    echo "window.location.href='../VIEW/ListarMap.php';";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert('Não foi possível excluir o registro!');";
    echo "window.location.href='../VIEW/ListarMap.php';";
    echo "</script>";
}