<?php
include '../../baza.inc';
session_start();
$order_num = $_SESSION['order_number'];
$conn = konekcija();
$sql = "UPDATE orders SET order_status=1 WHERE order_number=" . $order_num;
if (mysqli_query($conn, $sql)) {
    $msg = "Uspešno ste naručili.";
} else {
    $msg = "Narudžba nije uspela.";
}
header('Location: pregledaj_naruceno.php?msg=' . $msg);
