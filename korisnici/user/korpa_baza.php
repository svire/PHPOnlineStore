<?php

include '../../prijavljen.inc';
include '../../baza.inc';

if ($_SESSION['korisnik']) {
    $conn = konekcija();
    $korisnik = $_SESSION['korisnik'];
    $broj = $_SESSION['order_number'];
    $articleId = $_GET['article_id'];
    $amount = $_POST['kolicina'];

    if (empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    array_push($_SESSION['cart'], array('id' => $_GET['article_id'], 'qty' => $_POST['kolicina']));



    $msg = "Usesno ubacivanje u korpe";
    header("Location: korpa.php");
} else {
    header("Location: ../login.php");
}
