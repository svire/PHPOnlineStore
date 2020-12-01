<?php

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
?>