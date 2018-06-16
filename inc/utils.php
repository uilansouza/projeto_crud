<?php
include_once "classes/Produto.php";
include_once "classes/Categoria.php";

function navActive($pg,$key ){
    if($pg==$key){
        return "active";
    }
}

function getConn(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db="fp_73";

    return mysqli_connect($host, $user, $pass, $db);
}

function getProductById($conn, $id){
    $query = "SELECT * FROM produtos WHERE id ={$id}";
    return   mysqli_query($conn, $query);

    $dados = mysqli_fetch_assoc($result);
}

function updateProduct ($conn, $id, $nome, $quant, $preco, $id_categoria){

  //  var_dump($id_categoria);
   // die();

    if($id && is_numeric($id)){

        $query = " UPDATE produtos SET nome='{$nome}',quant='{$quant}', preco='{$preco}',id_categoria = {$id_categoria} 
              WHERE id = '{$id}'";

        return mysqli_query($conn, $query);
       }
       return false;
}


function getProducts($conn ){
    $products = [];

    $query = " SELECT  
    p.id,
    p.nome as nome_produto,
    p.preco,
    p.quant,
    c.id as id_categoria,
    c.nome as nome_categoria
    
     FROM produtos as p
    LEFT JOIN categoria as c
    
    ON (p.id_categoria = c.id)
    ORDER BY p.id DESC

    ";
    $result =   mysqli_query($conn, $query);

 
    while($prod = mysqli_fetch_assoc($result)){
      
        $produto = new Produto();
        $produto ->id = $prod['id'];
        $produto ->Setnome($prod['nome_produto']);
        $produto ->preco = $prod['preco'];
        $produto ->quant = $prod['quant'];
        $produto ->categoria = new Categoria();
        $produto ->categoria->id = $prod['id_categoria'];
        $produto ->categoria->nome = $prod['nome_categoria'];
       // $produto ->idCategoria = $prod['id_categoria'];
      //  $produto ->nomeCategoria = $prod['nome_categoria'];
        array_push($products, $produto);      


    }

     return $products;

    //return $products;
}


function getProduct($result){
    return mysqli_fetch_assoc($result);
}


function addProduct($conn, $prod){


    //$added = addProduct( $conn, $_POST['nome'], $_POST['preco'] ,$_POST['quant'],$_POST['id_categoria']   );

    $query = "INSERT INTO produtos (nome,preco,quant,id_categoria )VALUES
    
     ('{$prod->getnome()}', {$prod->preco}, {$prod->quant}, {$prod->categoria->id} )";

    return (mysqli_query($conn, $query));
}

function removeProducts($conn, $id){
    if($id && is_numeric($id)){

        $query =   "DELETE FROM produtos WHERE id={$id}";

        return  mysqli_query($conn, $query);
        
    }
    return false;
}

function getCategories($conn){

    $query = "SELECT * FROM categoria ORDER BY Nome";

    return  mysqli_query($conn, $query);

}

function getUser($conn, $email, $senha){

     $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha =  md5('$senha')";
     return mysqli_query($conn, $query);

}

function redirIfNotLogged(){

    session_start();
    if( !(isset($_SESSION['AUTH']) && $_SESSION['AUTH']==TRUE) ){

        
    
         header("Location: index.php?r=notLog") ;
    }
}

function logout(){
    session_start();

    if( (isset($_SESSION['AUTH']) && $_SESSION['AUTH']==TRUE) ){
        session_destroy();
    }

}


?>