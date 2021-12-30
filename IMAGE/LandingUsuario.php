<?php
include_once '../BOOTSTRAP/WebComplemento.html';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../BOOTSTRAP/estiloLanding.css">
  <title>BEM-VINDO, ADMINISTRADOR(A)</title>
</head>

<body>
  <div class="container-fluid text-nowrap" id="header">
    <p class="text-center font-weight-bold  pt-2">
      OLÁ, ADMINISTRADOR(A)!<br>
      <small class="text-muted">SELECIONE A SUA AÇÃO</small>
    </p>
  </div>

  <div class="container-fluid mt-3 mb-3" id="centro">
    <div class="row d-inline-flex my-5">
        <a class="btn btn-primary" href="../VIEW/PrincipalCadastrarUsuario.php" role="button">CADASTRO DE USUÁRIOS</a>
    </div>

    <div class="row d-inline-flex my-5">
        <a class="btn btn-primary" href="../VIEW/RelatorioUsuario.php" role="button">RELATÓRIOS</a>
    </div>
  </div>

  <div class="container-fluid bg-dark" style="text-align: center; color: gray;">
      <span>SMPSIP - V 1.0.0 &COPY; 2021 - 
        
         <?php
                $data = date("y");
                echo $data;
                ?>
        </span>
  </div>
</body>

</html>