<?php
 
include "../../baza.inc";
$conn = konekcija();
$query = "SELECT * FROM articles";
$result = mysqli_query($conn, $query);

$article_id=$_GET['id'];
$set=$_GET['set'];
$updateQuery = "UPDATE articles SET shop_window=1 WHERE article_id=$article_id";

if($set==0){
    $updateQuery = "UPDATE articles SET shop_window=0 WHERE article_id=$article_id";
}
mysqli_query($conn, $updateQuery);

$msg = "Uspesno uredjen izlog!";
header("Location: admin_pocetna.php?msg=" . $msg);


/*
while ($row = mysqli_fetch_array($result)) {
    $article_id = $row['article_id'];
    if (isset($_GET[$article_id])) {
        $updateQuery = "UPDATE articles SET shop_window=1 WHERE article_id=$article_id";
    } else {
        $updateQuery = "UPDATE articles SET shop_window=0 WHERE article_id=$article_id";
    }
    mysqli_query($conn, $updateQuery);
} 
*/


/*
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


*/