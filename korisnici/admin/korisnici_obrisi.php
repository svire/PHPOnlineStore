<?php
include'../../prijavljen.inc';
$poruka = $_SESSION['poruka'];
$path = $_SESSION['path'];
if ($poruka == 'Login') {
    echo "<li><a href='$path'>" . $poruka . "</a></li>";
    die('<p>Access denied. Admin only!.</p>');
} else if ($poruka == 'Logout') {
    echo "<li><a href='$path'>" . $poruka . "</a></li>";
    $uloga = $_SESSION['uloga'];
    if ($uloga != 1) {
        
    } else if ($uloga != 2) {
        die('<p>Access denied. Admin only!.</p>');
    }
}
include "../../baza.inc";
$conn = konekcija();
$id = $_GET['member_id'];
$query = "SELECT role FROM members m WHERE member_id=" . $id;
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
if ($row['role'] == 2) {
    $msg = "Only admin can perform these actions!";
    header('Location: korisnici.php?msg=' . $msg);
    exit();
}
$q = "DELETE FROM members WHERE member_id=" . $id;
if (mysqli_query($conn, $q)) {
    $msg = "User deleted!";
} else {
    $msg = "Something went wrong!";
}
header('Location: korisnici.php?msg=' . $msg);
?>
 
