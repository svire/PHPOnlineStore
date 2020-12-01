<?php

session_start();
if (!isset($_SESSION['korisnik'])) {
    $_SESSION['poruka'] = 'Login';
    $_SESSION['path'] = '/phponlinestore/korisnici/login.php';
} else {
    $_SESSION['poruka'] = 'Logout';
    $_SESSION['path'] = '/phponlinestore/korisnici/logout.php';
}

