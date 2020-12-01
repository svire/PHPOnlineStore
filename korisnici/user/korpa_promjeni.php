<?php
session_start();
$articleId = $_GET['article_id'];
$amount = $_GET['kolicina'];
$array=json_encode($_SESSION['cart']);
$deco2=json_decode($array,true);
$deco=json_decode($array);
foreach ($deco2 as $index => $one) {   
    if ($one['id'] == $articleId) {          
        $deco2[$index]['qty']=$amount;
    }   
} 

$_SESSION['cart']=$deco2;  

?>