<?php

include "../../prijavljen.inc";
include "../../baza.inc";
$naziv = $_POST['naziv'];
$kategorija = $_POST['kategorija'];
$cena = $_POST['cena'];
$opis = $_POST['opis'];
$kolicina = $_POST['kolicina'];
$garancija = $_POST['garancija'];
$img = $_POST['slika'];
$folder = "slike_artikala/";
$fajl = $folder . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($fajl, PATHINFO_EXTENSION);
if (($_FILES["fileToUpload"]["size"] < 5000000)) {
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Samo JPG, JPEG, PNG & GIF formati dozvoljeni.";
    }
    if (file_exists($fajl)) {
        echo "Preimenujte sliku vec postoji ista.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fajl)) {
            echo "Slika " . basename($_FILES["fileToUpload"]["name"]) . " je uploadovana.";
            $img = "korisnici_admin_slike_artikala/" . $_FILES["fileToUpload"]["name"];
        } else {
            echo "Greska pri uploadu.";
        }
    }
} else {
    echo "Velicina slike prevelika!";
}
$conn = konekcija();
$query = "UPDATE articles SET name='$naziv',
 category=$kategorija,
 price=$cena,
 image_url='$img',
 notes='$opis',
 warranty=$garancija,
 for_sale=$kolicina WHERE article_id=" . $_GET['article_id'];
if (mysqli_query($conn, $query)) {
    $message = 'Product updated!';
} else {
    $message = 'Something went wrong!';
}
header("Location: artikli.php?message=$message");
