<?php
include_once '../DAO/CONEXAO/Conexao.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>VALIDA ALTERAR CHECAGEM</title>
    </head>
    <body>
        <?php
        require_once '../DAO/ChecagemDAO.php';
        require_once '../DTO/ChecagemDTO.php';

        $idChecagem = $_POST["idChec"];
        $Desc_Desordem = $_POST["inputDescricaoChecagem"];
        $Endereco = $_POST["addChecagem"];
        $Org_Responsavel = $_POST["inputOrgaoChecagem"];
        $Cod_Desordem = $_POST["inputCodigoChecagem"];
        $Data = $_POST["inputDataChecagem"];
        $Ponto = $_POST["inputPontoChecagem"];
        $Tipo_Desordem = $_POST["inputTipoChecagem"];
        $Status = $_POST["inputStatusChecagem"];
        $Foto = $_POST["fotoChecagem"];
        $usuario_idUsuario = $_POST["usu_idUsu"];
          
        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';
        //die();
     
        
        if (($idChecagem == "") or ( $Desc_Desordem == "") or ( $Endereco == "") or ( $Org_Responsavel == "") or ( $Cod_Desordem == "") or ( $Data == "") or ( $Ponto == "") or ( $Tipo_Desordem == "") or ( $Status == "") or ( $Foto == "") or ( $usuario_idUsuario == "")) {
            echo "<script>";
            echo "alert('Todos os campos  são de preenchimento obrigatorio!');";
            echo "window.location.href='../VIEW/ListarChec.php';";
            echo "</script>";
        } else {

            $ChecagemDTO = new ChecagemDTO;
            $ChecagemDTO->setIdChecagem($idChecagem);
            $ChecagemDTO->setDesc_Desordem($Desc_Desordem);
            $ChecagemDTO->setEndereco($Endereco);
            $ChecagemDTO->setOrg_Responsavel($Org_Responsavel);
            $ChecagemDTO->setCod_Desordem($Cod_Desordem);
            $ChecagemDTO->setData($Data);
            $ChecagemDTO->setPonto($Ponto);
            $ChecagemDTO->setTipo_Desordem($Tipo_Desordem);
            $ChecagemDTO->setStatus($Status);
            $ChecagemDTO->setFoto($Foto);
            $ChecagemDTO->setUsuario_idUsuario($usuario_idUsuario);

            $ChecagemDAO = new ChecagemDAO;
            $verifica = $ChecagemDAO->Alterar($ChecagemDTO);

            if ($verifica) {
                echo "<script>";
                echo "alert('Alteração efetuado com Sucesso!');";
                echo "window.location.href='../VIEW/ListarChec.php';";
                echo "</script>";
            } else {
                echo "<script>";
                echo "alert(Não foi possivel realizar a Alteração!);";
                echo "window.location.href='../VIEW/ListarChec.php';";
                echo "</script>";
            }
        }
        ?>
    </body>
</html>
