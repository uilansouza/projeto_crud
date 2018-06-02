<?php
include_once "inc/utils.php";
$page = "CADASTRO";
$conn = getConn() ;


if($conn && $_POST ){
    
    if(addProduct($conn, $_POST['nome'],$_POST['preco'], $_POST['quant'] )){
        
        header("Location: lista.php?action=add&message=success");
    }else{
        header("Location: cadastro.php?action=add&message=failed");
    }

    // $query = "INSERT INTO produtos
    // (nome,preco,quant) VALUES (

    // '{$_POST['nome']}',
    //  {$_POST['quant']},
    //  {$_POST['preco']}
    
    
    
    
    
    // )";

    // if(mysqli_query($conn, $query)){
    //     header("Location: lista.php");

    // };
   // print_r($query);
    

//print_r($query);

}


?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once "inc/header.php";?>

    <title>Projeto CRUD - Cadastro</title>
  </head>
  <body>
    <?php include "inc/navbar.php"?>
    <center><h1>Cadastro de Produto</h1></center>
    
    <div class="container">
        
        <?php include_once("inc/alerts.php")?>
        
        <form action="cadastro.php" method="POST">
            <div class="form-row">
                
                <!-- Produto -->
                <div class="form-group col-md-12">
                    <label for="produto">Produto</label>
                    <input type="text" name="nome" class="form-control" id="produto" placeholder="Produto">
                </div>

                <!-- Quantidade -->
                <div class="form-group col-md-6">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quant" class="form-control" id="quantidade" placeholder="Quantidade">
                </div>
                
                <!-- Preço -->
                <div class="form-group col-md-6">
                    <label for="preco">Preço</label>
                     <input type="text" name="preco" class="form-control" id="preco" placeholder="0.00">
                </div>

            </div>
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
       

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>