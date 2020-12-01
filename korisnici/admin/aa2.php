<?php

session_start();
$folder = "../../slike/";
$fajl = $folder . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($fajl, PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fajl)) {
    /*
      if(empty($_SESSION['pic_array'])){
      $_SESSION['pic_array']= []; //array();
      }
     */
    //$msg= "Picture - " . basename($_FILES["fileToUpload"]["name"]) . " is uploaded.";
    $img = "../../slike/" . $_FILES["fileToUpload"]["name"];

    /* E OVO RADDI
      $_SESSION['pic_alo']= ['aaaa','bsad','csad',$img];

     */
    if (empty($_SESSION['pic_alo'])) {
        $_SESSION['pic_alo'] = array(); // e ovo ga jebe 
    }

    //$_SESSION['pic_alo']=array();
    //$student_name=$_POST['student_name'];  
    //$student_city=$_POST['city_id'];    
    array_push($_SESSION['pic_alo'], $img);
    array_push($_SESSION['pic_alo'], '../../slike/unknown.png');
    $msg = '../../slike/unknown.png';


    include "../../baza.inc";
    $article_id = 1;
    $conn = konekcija();
    for ($i = 0; $i < count($_SESSION['pic_alo']); $i++) {

        //  $_SESSION['pic_alo'][$i];
        $alo = $_SESSION['pic_alo'][$i];
        $query = "insert into images(article_id, naziv, alt) VALUES ('$article_id','$alo','alt')";
        mysqli_query($conn, $query);
    }

    unset($_SESSION["pic_alo"]);


    header("Location: aa.php?msg=$msg");
}



/*

  $neki=$_SESSION['pic_array'];
  array_push($neki,'jeste');
  //array_push($neki,'$img');
  // echo $neki[0].'<br/>';
  //  echo $neki[1].'<br/>';
  // echo $neki[2].'<br/>';



  $folder = "../../slike/";
  $fajl = $folder . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = pathinfo($fajl, PATHINFO_EXTENSION);



  $msg='dobra';
  if (($_FILES["fileToUpload"]["size"] < 5000000)) {
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
  echo "Allowed format: JPG, JPEG, PNG & GIF .";
  }
  if (file_exists($fajl)) {
  $msg='Picture already exist';
  } else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fajl)) {
  if(empty($_SESSION['pic_array'])){
  $_SESSION['pic_array']=array();
  }
  $msg= "Picture - " . basename($_FILES["fileToUpload"]["name"]) . " is uploaded.";
  $img = "../../slike/" . $_FILES["fileToUpload"]["name"];

  // echo $img; //../../slike/download.jpg
  array_push($_SESSION['pic_array'],
  array('name'=>$img));

  } else {

  $msg='Something went wrong';
  }
  }
  } else {
  echo "Size of a picture is too big!";
  }

  header("Location: aa.php?msg=$msg");

 */
?>

