<?php

$folder = "../../slike/";
$fajl = $folder . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($fajl, PATHINFO_EXTENSION);
if (($_FILES["fileToUpload"]["size"] < 5000000)) {
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Allowed image format: JPG, JPEG, PNG & GIF.";
    } else {

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fajl)) {
            echo "Image: " . basename($_FILES["fileToUpload"]["name"]) . " uploaded.";
            $img = "../../slike/" . $_FILES["fileToUpload"]["name"];
            session_start();
            if (empty($_SESSION['pic_alo'])) {
                $_SESSION['pic_alo'] = array();
            }
            array_push($_SESSION['pic_alo'], $img);
            header("Location: dodaj_artikal.php?msg='Photo uploaded'");
        } else {
            echo "Something went wrong.";
        }
    }
} else {
    echo "Image size too big!";
}
?>

<?php /*
  session_start();
  $folder = "../../slike/";
  $fajl = $folder . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = pathinfo($fajl, PATHINFO_EXTENSION);

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fajl)) {

  $img = "../../slike/" . $_FILES["fileToUpload"]["name"];

  if(empty($_SESSION['pic_alo'])){
  $_SESSION['pic_alo']=array();
  }

  array_push($_SESSION['pic_alo'],$img);
  array_push($_SESSION['pic_alo'],'../../slike/unknown.png');
  $msg='../../slike/unknown.png';
  header("Location: dodaj_artikal.php?msg=$msg");

  } */ ?>