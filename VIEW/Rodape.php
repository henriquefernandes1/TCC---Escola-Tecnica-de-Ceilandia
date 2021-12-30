<?php
include_once '../BOOTSTRAP/WebComplemento.html';
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RODAPÉ</title>
  </head>
  <body>
    
    <div class="container-fluid bg-dark fixed-bottom" style="text-align: center; color: gray;">
        <span>SMPSIP - V 1.0.0 &COPY; 2021 - 
        
         <?php
                $data = date("y");
                echo $data;
                ?>
        </span>
    </div>

  </body>