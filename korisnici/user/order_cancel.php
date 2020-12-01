<?php
include '../../baza.inc';

 
$order_id=$_GET['order_id'];
$conn = konekcija();
$sql = "UPDATE orders SET order_status=1 WHERE order_id=" . $order_id;
if (mysqli_query($conn, $sql)) {
    $msg = "Order is cancelled.";
} else {
    $msg = "Something went wrong.";
}
header('Location: pregledaj_naruceno.php?msg=' . $msg);


?>