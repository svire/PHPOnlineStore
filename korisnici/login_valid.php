<?php

include '../baza.inc';
session_start();
$user = $_POST['username'];
$password = $_POST['pass'];
$conn = konekcija();
$query = "SELECT * FROM members WHERE username='$user' AND password='$password'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
if ($row[0] == null) {
    $greska = 'Error occur. No such user. Try again!';
    header("Location: login.php?greskaPoruka=$greska");
} else {
    $_SESSION['korisnik'] = $row['member_id'];
    $_SESSION['uloga'] = $row['role'];
    if ($row['role'] == 1) {
        $sql_query1 = 'SELECT MAX(order_number) FROM orders';
        $result1 = mysqli_query($db_link, $sql_query1);
        $row1 = mysqli_fetch_array($result1);
        $_SESSION['order_number'] = max($row1) + 1;
        $link = "../pocetna.php";
    } else if ($row['role'] == 2) {
        $_SESSION['homePath'] = "projektni_rad/korisnici/admin/admin_pocetna.php";
        $link = "admin/admin_pocetna.php";
    }
    header("Location: $link");
}