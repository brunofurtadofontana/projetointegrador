<?php

include("conexao.php");

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$id = $_POST['id_produto'];

if(isset($_FILES['imagem']) && $_FILES['imagem']['name'] != ''){
    $ext = strtolower(substr($_FILES['imagem']['name'],-4));
    $new_name = date('Y.m.d-h.i.s').$ext;
    $dir = '../images/';
    move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name);
    $res = mysqli_query($link,"UPDATE produtos set 
                                                nome = '$nome',
                                                valor =  '$valor',
                                                imagem = '$new_name' WHERE id_produto = '$id'")or die(mysqli_error($link));
    if($res){
        header("Location:../produtos.php");
    }else{
        header("Location:../produtos.php?erro=2");
    }
}
