<?php

include('../../baza.inc');
$conn = konekcija();
$kategorija = $_POST['kategorija'];
$k_id = $_GET['category_id'];
$query = "SELECT * FROM category WHERE category_name='$kategorija'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
if ($row[0]) {
    $message = 'Ime kategorije već postoji u bazi!';
    header("Location: kategorija_promeni.php?message=$message&category_id=$k_id&category=$kategorija");
} else {
    $updateQuery = "UPDATE category SET category_name='$kategorija' WHERE category_id=$k_id";
    if (mysqli_query($conn, $updateQuery)) {
        $message = 'Uspešno izmenjena kategorija!';
    } else {
        $message = 'Neuspešno menjanje kategorije!';
    }
    header("Location: kategorija_promeni.php?message=$message&category_id=$k_id&category=$kategorija");
}

