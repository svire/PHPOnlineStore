<?php

include '../../prijavljen.inc';
include '../../baza.inc';

if ($_SESSION['korisnik']) {
    $conn = konekcija();
    $korisnik = $_SESSION['korisnik'];
    $broj = $_SESSION['order_number'];

    $articleId = $_GET['article_id'];
    $amount = $_GET['kolicina'];


    if (empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    array_push($_SESSION['cart'], array('id' => $_GET['article_id'], 'qty' => $_GET['kolicina']));


    if (mysqli_query($conn, $query)) {
        header('http://localhost:1234/PhpOnlineStore/index.php?msg=' . $msg);
    }
} else {
    header("Location: ../login.php");
}
