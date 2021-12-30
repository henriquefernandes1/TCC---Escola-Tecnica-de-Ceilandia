<?php
include_once '../DAO/CONEXAO/Conexao.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>VALIDA CHECAGEM</title>
    </head>
    <body>
        <?php
        require_once'../DAO/ChecagemDAO.php';
        require_once'../DTO/ChecagemDTO.php';


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
 
        
        //echo '<pre>';
        //var_dump($_POST);
        // echo '</pre>';
        //die();
  
        if (($Desc_Desordem == "") or ( $Endereco == "") or ( $Org_Responsavel == "")or ( $Cod_Desordem == "")or ( $Data == "")or ( $Ponto == "")or ( $Tipo_Desordem == "")or ( $Status == "")or ( $Foto == "")or ( $usuario_idUsuario == "")) {

            echo "<script>";
            echo "alert('Todos os campos são de preenchimento obrigatorio!');";
            echo "window.location.href='../VIEW/PrincipalCadastrarChec.php';";
            echo "</script>";
        } else {

            $ChecagemDTO = new ChecagemDTO;
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
            $verificar = $ChecagemDAO->Gravar($ChecagemDTO);
                             
            if ($verificar) {

                echo "<script>";
                echo "alert('Cadastramento efetuado com sucesso!');";
                echo "window.location.href='../VIEW/ListarChec.php';";
                echo "</script>";
            } else {
                echo "<script>";
                echo "alert('Não foi possível realizar o cadastro!');";
                echo "window.location.href='../VIEW/PrincipalCadastrarChec.php';";
                echo "</script>";
            }
        }
        ?>
    </body>
</html>
