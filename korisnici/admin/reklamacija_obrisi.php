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
$id = $_GET['rec_id'];
$query = "DELETE FROM reclamations WHERE reclamation_id=" . $id;
if (mysqli_query($conn, $query)) {
    $msg = "Reklamacija je obrisana";
} else {
    $msg = "Nije uspelo brisanje reklamacije";
}
header('Location: reklamacije.php?msg=' . $msg);
?>
