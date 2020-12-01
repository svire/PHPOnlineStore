<?php
include'../../prijavljen.inc';
$poruka = $_SESSION['poruka'];
$path = $_SESSION['path'];
if ($poruka == 'Login') {
    echo "<li><a href='$path'>" . $poruka . "</a></li>";
    die('<p>Samo za administratore. Korisnik nema pristup.</p>');
} else if ($poruka == 'Logout') {
    echo "<li><a href='$path'>" . $poruka . "</a></li>";
    $uloga = $_SESSION['uloga'];
    if ($uloga != 1) {
        
    } else if ($uloga != 2) {
        die('<p>Samo za administratore. Korisnik nema pristup.</p>');
    }
}
include "../../baza.inc";
$conn = konekcija();
$id = $_GET['order_number'];
$query = "DELETE FROM orders WHERE order_number=" . $id;
if (mysqli_query($conn, $query)) {
    $msg = "Narudzba je obrisana";
} else {
    $msg = "Nije uspelo brisanje narudzbe";
}
header('Location: narudzbe.php?msg=' . $msg);
?>

