<?php

//include "../../prijavljen.inc";
include "../../baza.inc";
$naziv = $_POST['naziv'];
$kategorija = $_POST['kategorija'];
$cena = $_POST['cena'];
$opis = $_POST['opis'];
$kolicina = $_POST['kolicina'];
$garancija = $_POST['garancija'];
session_start();
$profile = '';
if (empty($_SESSION['pic_alo'])) {
    $profile = 'slike/unknown.png';
} else {
    $profile = substr($_SESSION['pic_alo'][0], 6);
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
       ('$naziv',$kategorija,$cena,'$profile','$opis',$garancija,$kolicina,1)";

    if (mysqli_query($conn, $insertQuery)) {


        $querymax = "SELECT MAX(article_id) from articles";
        $result = mysqli_query($conn, $querymax);
        $max = 0;
        $row = 0;
        while ($row = mysqli_fetch_array($result)) {
            $max = $row[0];
        }


        for ($i = 0; $i < count($_SESSION['pic_alo']); $i++) {
            $alo = substr($_SESSION['pic_alo'][$i], 6);
            $queryimg = "insert into images(article_id, naziv, alt) VALUES ('$max','$alo','alt')";
            mysqli_query($conn, $queryimg);


            //$profile= substr($_SESSION['pic_alo'][0], 6);
        }
        unset($_SESSION["pic_alo"]);
        $message = 'Product added!!' . $article_id;
    } else {
        $message = 'Something went wrong!';
    }
    header("Location: artikli.php?message=$message");
}
 