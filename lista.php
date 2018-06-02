<?php
include_once "inc/utils.php";

$page = "LISTA";
$conn = getConn();

if($conn){
    $result = getProducts($conn);

   

}

?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once "inc/header.php";?>

    <title>Projeto CRUD - Lista</title>
  </head>
  <body>
  
    <?php include "inc/navbar.php"?>
    
    <br>
    <!-- validacao de erro -->
        
<div class="container">

<?php include_once "inc/alerts.php"?>

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Preço</th>
            <th scope="col">Total</th>
            <th scope="col">Açoes</th>
            </tr>
        </thead>
        <tbody>
            <?php while($prod = mysqli_fetch_assoc($result)): ?>
            <tr>
                <th scope="row"><?=$prod['id']?></th>
                <td><?=$prod['nome']?></td>
                <td><?=$prod['quant']?></td>
                <td><?=number_format($prod['preco'],2,",",".")?></td>
                <td>R$: <?=number_format($total=$prod['preco']*$prod['quant'],2,",",".")?></td>
                <td>
                <form action="editar.php" method="GET" >
                        <input type="hidden" name="id" value="<?=$prod['id']?>" >
                        <button type="submit"   class="btn btn-primary">Editar</button>

                    </form>
                     
                    <!-- <a href="excluir.php?id=">Excluir</a> -->

                    <form action="excluir.php" method="POST" >
                        <input type="hidden" name="id" value="<?=$prod['id']?>" >
                        <button type="submit"   class="btn btn-danger">Excluir</button>

                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
                
        </tbody>
    </table>

            
    </div>
       

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>