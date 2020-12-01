<?php
include('../../baza.inc');
$conn = konekcija();
if (!isset($_POST['kategorija'])) {
    die('Nije dozvoljeno');
}
$kategorija = $_POST['kategorija'];
$query = "SELECT * FROM category WHERE category_name='$kategorija'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
if ($row[0]) {
    $message = 'Kategorija već postoji u bazi!';
    header("Location: kategorije.php?message=$message");
} else {
    $insertQuery = "INSERT INTO category(category_name) VALUES ('$kategorija')";
    if (mysqli_query($conn, $insertQuery)) {
        $message = 'Uspešno dodata kategorija!';
    } else {
        $message = 'Neuspešno dodavanje kategorije!';
    }
    header("Location: kategorije.php?message=$message");
}

