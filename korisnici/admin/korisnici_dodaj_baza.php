<?php
include('../../baza.inc');
include('../../prijavljen.inc');
$conn = konekcija();
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];
$jmbg = $_POST['jmbg'];
$address = $_POST['address'];
$user = $_POST['username'];
$pass = $_POST['pass'];
$checkJMBG = "SELECT * FROM members WHERE jmbg='$jmbg' OR username='$user'";
$resultJMBG = mysqli_query($conn, $checkJMBG);
$rowJMBG = mysqli_fetch_array($resultJMBG);
if ($rowJMBG[0]) {
    $message = 'Korisnik već postoji u bazi!';
    header("Location: korisnici_dodaj.php?message=$message");
} else {
    $insertQuery = "INSERT INTO members(username, password,email, first_name, last_name, jmbg, address, role) VALUES
       ('$user','$pass','$email','$first_name','$last_name','$jmbg','$address',1)";
    if (mysqli_query($conn, $insertQuery)) {
        $message = 'Uspešno ste dodali novog korisnika!';
    } else {
        $message = 'Neuspešno dodavanje novog korisnika!';
    }
    header("Location: korisnici_dodaj.php?message=$message");
}

