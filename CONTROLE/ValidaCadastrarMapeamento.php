<?php
include_once '../DAO/CONEXAO/Conexao.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>VALIDA MAPEAMENTO</title>
    </head>
    <body>
        <?php
        require_once '../DAO/MapeamentoDAO.php';
        require_once '../DTO/MapeamentoDTO.php';
            
        $Desc_Desordem = $_POST["inputDescricaoMapeamento"];
        $Endereco = $_POST["addMap"];
        $Org_Responsavel = $_POST["inputOrgaoMapeamento"];
        $Cod_Desordem = $_POST["inputCodigoMapeamento"];
        $Data = $_POST["inputDataMap"];
        $Ponto = $_POST["inputPontoMapeamento"];
        $Tipo_Desordem = $_POST["inputTipoMap"];
        $Status = $_POST["inputStatusMapeamento"];
        $Foto = $_POST["fotoMapeamento"];
        $usuario_idUsuario = $_POST["usu_idUsu"];        
            
   // exit();
        
        if (($Desc_Desordem == "") or ( $Endereco == "") or ( $Org_Responsavel == "")or ( $Cod_Desordem == "")or ( $Data == "")or ( $Ponto == "")or ( $Tipo_Desordem == "")or ( $Status == "")or ( $Foto == "")or ( $usuario_idUsuario == "")) {         
            
            echo "<script>";
            echo "alert('Todos os campos são de preenchimento obrigatorio!');";
            echo "window.location.href='../VIEW/PrincipalCadastrarMap.php';";
            echo "</script>";
        } else {

            $MapeamentoDTO = new MapeamentoDTO;
            $MapeamentoDTO->setDesc_Desordem($Desc_Desordem);
            $MapeamentoDTO->setEndereco($Endereco);
            $MapeamentoDTO->setOrg_Responsavel($Org_Responsavel);
            $MapeamentoDTO->setCod_Desordem($Cod_Desordem);
            $MapeamentoDTO->setData($Data);
            $MapeamentoDTO->setPonto($Ponto);
            $MapeamentoDTO->setTipo_Desordem($Tipo_Desordem);
            $MapeamentoDTO->setStatus($Status);
            $MapeamentoDTO->setFoto($Foto);
            $MapeamentoDTO->setUsuario_idUsuario($usuario_idUsuario);
 
            $MapeamentoDAO = new MapeamentoDAO;
            $verificar = $MapeamentoDAO->Gravar($MapeamentoDTO);
            if ($verificar) {

                echo "<script>";
                echo "alert('Cadastramento efetuado com sucesso!');";
                echo "window.location.href='../VIEW/ListarMap.php';";
                echo "</script>";
            } else {
                echo "<script>";
                echo "alert('Não foi possível realizar o cadastro!');";
                echo "window.location.href='../VIEW/PrincipalCadastrarMap.php';";
                echo "</script>";
            }
        }
        ?>
    </body>
</html>
