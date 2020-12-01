<?php
include '../../baza.inc';
$redni_br = $_GET['redni_br'];
$kolicina = $_POST['kolicina'];
$conn = konekcija();
$sql = "UPDATE orders SET amount=" . $kolicina . " WHERE order_id=" . $redni_br;
if (mysqli_query($conn, $sql)) {
    $msg = "Uspešna promena količine.";
} else {
    $msg = "Promena količine nije uspela.";
}
header('Location: korpa.php?msg=' . $msg);
