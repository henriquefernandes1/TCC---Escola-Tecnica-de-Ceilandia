<?php
/**
 * Description of ChecagemDTO
 *
 * @author Windows10
 */

require_once '../DAO/CONEXAO/Conexao.php';

class ChecagemDTO {
    //put your code here
    function getIdChecagem() {
        return $this->idChecagem;
    }

    function getDesc_Desordem() {
        return $this->Desc_Desordem;
    }

    function getEndereco() {
        return $this->Endereco;
    }

    function getOrg_Responsavel() {
        return $this->Org_Responsavel;
    }

    function getCod_Desordem() {
        return $this->Cod_Desordem;
    }

    function getData() {
        return $this->Data;
    }

    function getPonto() {
        return $this->Ponto;
    }

    function getTipo_Desordem() {
        return $this->Tipo_Desordem;
    }

    function getStatus() {
        return $this->Status;
    }

    function getFoto() {
        return $this->Foto;
    }

    function getUsuario_idUsuario() {
        return $this->usuario_idUsuario;
    }

    function setIdChecagem($idChecagem) {
        $this->idChecagem = $idChecagem;
    }

    function setDesc_Desordem($Desc_Desordem) {
        $this->Desc_Desordem = $Desc_Desordem;
    }

    function setEndereco($Endereco) {
        $this->Endereco = $Endereco;
    }

    function setOrg_Responsavel($Org_Responsavel) {
        $this->Org_Responsavel = $Org_Responsavel;
    }

    function setCod_Desordem($Cod_Desordem) {
        $this->Cod_Desordem = $Cod_Desordem;
    }

    function setData($Data) {
        $this->Data = $Data;
    }

    function setPonto($Ponto) {
        $this->Ponto = $Ponto;
    }

    function setTipo_Desordem($Tipo_Desordem) {
        $this->Tipo_Desordem = $Tipo_Desordem;
    }

    function setStatus($Status) {
        $this->Status = $Status;
    }

    function setFoto($Foto) {
        $this->Foto = $Foto;
    }

    function setUsuario_idUsuario($usuario_idUsuario) {
        $this->usuario_idUsuario = $usuario_idUsuario;
    }

        

      
    //FIM
}
