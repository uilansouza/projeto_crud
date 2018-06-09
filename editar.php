<?php
include_once "inc/utils.php";
$page = "EDITAR";

$checked ="";

$conn = getConn();

if($conn && $_GET){
  

 
  $prod = getProduct( getProductById($conn, $_GET['id']) );
   $categories = getCategories($conn);

  if(!$prod){
    header("Location: lista.php?action=edit&message=failed");
  }
}



if($conn && $_POST){
  
  $update = updateProduct($conn, $_POST['id'], $_POST['nome'], $_POST['quant'], $_POST['preco'], $_POST['id_categoria']);

  if($update){
    header("Location: lista.php?action=edit&message=success");
  }else{
    header("Location: lista.php?action=edit&message=failed");
  }
   
}

?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once "inc/header.php";?>

    <title>Projeto CRUD - Editar</title>
  </head>
  <body>
    <?php include "inc/navbar.php"?>

     <div class="container">
        
        <?php include_once("inc/alerts.php")?>
        
        <form action="editar.php" method="POST">
          <input type="hidden" name="id" value="<?=$prod['id']?>" >
            <div class="form-row">
                
                <!-- Produto -->
                <div class="form-group col-md-12">
                    <label for="produto">Produto</label>
                    <input type="text" name="nome" class="form-control" id="produto" value="<?=$prod['nome']?>" placeholder="Produto">
                </div>

                <!-- Quantidade -->
                <div class="form-group col-md-6">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quant" class="form-control" id="quantidade" placeholder="Quantidade" value="<?=$prod['quant']?>">
                </div>
                
                <!-- Preço -->
                <div class="form-group col-md-6">
                    <label for="preco">Preço</label>
                     <input type="text" name="preco" class="form-control" id="preco" placeholder="0.00"value="<?=$prod['preco']?>" >
                </div>

                 <?php while ( $categ = mysqli_fetch_assoc($categories)):?>
                    <?php $checked = $prod['id_categoria']==$categ['id']?"checked":""; ?>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="categ-<?=$categ['id']?>" <?=$checked?> name="id_categoria" value="<?=$categ['id']?>" class="custom-control-input">
                        <label class="custom-control-label" for="categ-<?=$categ['id']?>"><?=$categ['nome']?></label>
                    </div>
                <?php endwhile ?>

            </div>
            <br>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
       

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
