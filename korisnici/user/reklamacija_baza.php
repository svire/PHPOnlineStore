<?php

include('../../baza.inc');
include('../../prijavljen.inc');
$conn = konekcija();
$poruka = $_POST['poruka'];
$broj = $_POST['broj'];
$kor = $_SESSION['korisnik'];
$insertQuery = "INSERT INTO reclamations (rec_order,rec_user, message) VALUES ($broj,$kor,'$poruka')";
if (mysqli_query($conn, $insertQuery)) {
    $message = 'Uspešna reklamacija!';
} else {
    $message = 'Neuspešna reklamacija!';
}
header("Location: reklamacija.php?msg=$message");
