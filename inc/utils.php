<?php

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

function updateProduct ($conn, $id, $nome, $quant, $preco){

    if($id && is_numeric($id)){

        $query = " UPDATE produtos SET nome='{$nome}',quant='{$quant}', preco='{$preco}' 
              WHERE id = '{$id}'";

        return mysqli_query($conn, $query);
       }
       return false;
}


function getProducts($conn){
    $query = " SELECT  

    p.id,
    p.nome as nome_produto,
    p.preco,
    p.quant,
    c.nome as nome_categoria
    
     FROM produtos as p
    INNER JOIN categoria as c
    
    ON (p.id_categoria = c.id);
    
    
    
    ";
    return  mysqli_query($conn, $query); 
}

function getProduct($result){
    return mysqli_fetch_assoc($result);
}

function addProduct($conn, $nome, $preco, $quant, $idcateg){


    //$added = addProduct( $conn, $_POST['nome'], $_POST['preco'] ,$_POST['quant'],$_POST['id_categoria']   );

    $query = "INSERT INTO produtos (nome,preco,quant,id_categoria ) VALUES ('{$nome}', {$preco}, {$quant}, {$idcateg} )";

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

    $query = "SELECT * FROM categoria";

    return  mysqli_query($conn, $query);

}


?>