<?php

include "../../baza.inc";
$conn = konekcija();
$id = $_GET['article_id'];
$query = "DELETE FROM articles WHERE article_id=" . $id;
if (mysqli_query($conn, $query)) {
    $msg = "Product deleted!";
} else {
    $msg = "Something went wrong...";
}
header('Location: artikli.php?msg=' . $msg);
