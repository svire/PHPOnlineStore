<?php

include '../../prijavljen.inc';
include '../../baza.inc';
session_start();
if ($_SESSION['korisnik']) {
    $conn = konekcija();
    $korisnik = $_SESSION['korisnik'];
    $broj = $_SESSION['order_number'];
    $price = $_POST['price'];

    $array = json_encode($_SESSION['cart']);
    $deco2 = json_decode($array, true);
    $deco = json_decode($array);

    $querymax = "SELECT MAX(order_id) from orders";
    $result = mysqli_query($conn, $querymax);
    $max = 0;
    $row = 0;
    while ($row = mysqli_fetch_array($result)) {
        $max = $row[0];
    }

    $newmax = $max + 1;
    $datum = date('Y-m-d');
    $time = date('H:i:s');
    $query = "INSERT INTO orders(order_id, user, order_date, order_time, order_number, order_status,price) VALUES
             ($newmax, $korisnik, '$datum','$time', $broj, 0,$price)";
    $articleid = 0;
    $quantity = 0;

    mysqli_query($conn, $query);
    foreach ($deco as $value) {
        $articleid = $value->id;
        $quantity = $value->qty;
        $queryitem = "INSERT into order_items(order_id,article_id,quantity) VALUES ($newmax,$articleid,$quantity)";
        mysqli_query($conn, $queryitem);
    }
    $_SESSION['cart'] = array();
    $msq = "Order placed!";
    header('Location: pregledaj_naruceno.php?msg=' . $msg);
} else {
    header("Location: ../login.php");
}

 

  

 