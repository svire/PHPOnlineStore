<?php

include('../../baza.inc');
include('../../prijavljen.inc');
$conn = konekcija();

$order_id = $_POST['order_id'];
$order_date = $_POST['order_date'];
$order_time = $_POST['order_time'];
$name = $_POST['name'];
$article_id = $_POST['article_id'];
$complaint = $_POST['complaint'];
$kor = $_SESSION['korisnik'];



$insertQuery = "INSERT INTO complaints(order_id, userid, article_id, complaint) VALUES ($order_id,$kor,$article_id,'$complaint')";


if (mysqli_query($conn, $insertQuery)) {
    $message = 'We will resolve your complaint ASAP!';
}
header("Location: pregledaj_naruceno.php?msg=$message");
?>