<?php
include "../../baza.inc";
$conn = konekcija();
$redni_br = $_GET['redni_br'];
session_start();
$nesto=12;
 if(empty($_SESSION['cart'])){
   $nesto=553;
}
$array=json_encode($_SESSION['cart']);
$deco2=json_decode($array,true);
$deco=json_decode($array);
foreach ($deco2 as $index => $one) {   
    if ($one['id'] == $redni_br) {
        echo "<p>".$index."</p>";   
        $nesto=$index;
        unset($deco2[$index]);       
        $nesto=15;
    }
    else{
        $nesto=14;
    }
} 
$_SESSION['cart']=$deco2;  
 
header('Location: korpa.php?msg=' . $msg);

