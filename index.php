
<?php
include_once './BOOTSTRAP/WebComplemento.html';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PÁGINA LOGIN</title> 
    </head>

    <body style="background-color:azure">
        <div class="container-fluid">
            <center>

                <h2 class="text-light" style="margin-top: 100px;margin-top:30px;"></h2>
                <div class="card" style="width:350px;"  alt="Referência">
                    <img src="IMAGE/SMPSIP2.jpeg" class="card-img-top  img-fluid" alt="Referência">

                    <div class="card-body">
                        <form name="Login" method="post" action="CONTROLE/ValidaLogin.php" >

                            <table class="table table-borderless table-responsive">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Digite seu email" style="background-color:lightgray;">
                                </div>

                                <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" style="background-color:lightgray;">
                                </div>
                            
                                <div class="container-fluid" style="width: 100%; text-align:center;">
                                   <button type="reset" value="Limpar" class="btn btn-danger" class="form-control">Limpar</button>  
                                   <button type="submit" value="Entrar" class="btn btn-warning" class="form-control">Entrar</button>                        
                                </div>
                            </table>  
                        </form>  
                    </div>
                </div>  
            </center>
        </div>
    </body>
</html>

