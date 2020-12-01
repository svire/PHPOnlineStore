<?php

include "../../baza.inc";
$conn = konekcija();
$id = $_GET['order_id'];

$queryupdate = "UPDATE orders set order_status=2 where order_id=" . $id;
if (mysqli_query($conn, $queryupdate)) {
    $msg = "Updateted product delivery status!";
} else {
    $msg = "Something went wrong...";
}
header('Location: narudzbe.php?msg=' . $msg);
?>