<?php
include("conexao.php");

$id = $_GET['id'];
$getImage = mysqli_query($link,"SELECT imagem from produtos WHERE id_produto = $id");
$respImage = mysqli_fetch_assoc($getImage);
$imagem = $respImage['imagem'];

$res = mysqli_query($link,"DELETE from produtos WHERE id_produto = $id ")or die(mysqli_error($link));

if($res){
    unlink("../images/$imagem");
    header("Location:../produtos.php");
}else{
    header("Location:../produtos.php?erro=1");
}

