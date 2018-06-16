<?php
include_once "inc/utils.php";

$page = "CADASTRO";
$conn = getConn() ;
redirIfNotLogged();






if($conn && $_POST ){

    $produto = new Produto();
    $produto->nome = $_POST['nome'];
    $produto->preco = $_POST['preco'];
    $produto->quant = $_POST['quant'];
    $produto->idCategoria = $_POST['id_categoria'];
   
    
    $added = addProduct( $conn, $produto  );

   
    if($added){
  
        header("Location: lista.php?action=add&message=success");
    }else{
        header("Location: cadastro.php?action=add&message=failed");
    }

}


if($conn){

    $categories = getCategories($conn);

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
             
                <?php while ( $categ = mysqli_fetch_assoc($categories)):?>
                    <div class="custom-control custom-radio">
                        <input style="padding-left:3px" type="radio" id="categ-<?=$categ['id']?>" name="id_categoria" value="<?=$categ['id']?>" class="custom-control-input">
                        <label class="custom-control-label" for="categ-<?=$categ['id']?>"><?=$categ['nome']?></label>
                    </div>
                <?php endwhile ?>
                



            </div>
            <br>            
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