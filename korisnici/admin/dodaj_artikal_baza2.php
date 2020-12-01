<?php

include "../../prijavljen.inc";
include "../../baza.inc";
$naziv = $_POST['naziv'];
$kategorija = $_POST['kategorija'];
$cena = $_POST['cena'];
$opis = $_POST['opis'];
$kolicina = $_POST['kolicina'];
$garancija = $_POST['garancija'];
$folder = "../../slike/";
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
            $img = "slike/" . $_FILES["fileToUpload"]["name"];
        } else {
            echo "Greska pri uploadu.";
        }
    }
} else {
    echo "Velicina slike prevelika!";
}
$conn = konekcija();
$check = "SELECT * FROM articles WHERE name='$naziv'";
$result1 = mysqli_query($conn, $check);
$row1 = mysqli_fetch_array($result1);
if ($row1[0]) {
    $message = 'Naziv proizvoda već postoji u bazi!';
    header("Location: dodaj_artikal.php?message=$message");
} else {
    $insertQuery = "INSERT INTO articles(name, category, price, image_url, notes, warranty,for_sale,shop_window) VALUES
       ('$naziv',$kategorija,$cena,'$img','$opis',$garancija,$kolicina,1)";
    if (mysqli_query($conn, $insertQuery)) {
        $message = 'Uspešno dodavanje proizvoda!';
    } else {
        $message = 'Neuspešno dodavanje proizvoda!';
    }
    header("Location: dodaj_artikal.php?message=$message");
}
