<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/stil1.css">
        <style>

        </style>
    </head>
    <body>
        <div class="baner">
            <a href="../../pocetna.php"><img src="../../slike/baner2.png" border="0" alt="slika" title="slika"></a>
        </div>
        <ul class="bar" id="bar">
            <li><a href="admin_pocetna.php">Pocetna</a></li>
            <?php
            include "../../baza.inc";
            include '../../prijavljen.inc';
            $poruka = $_SESSION['poruka'];
            $path = $_SESSION['path'];
            if ($poruka == 'Login') {
                echo "<li><a href='$path'>" . $poruka . "</a></li>";
                header('Location: ../login.php');
            } else if ($poruka == 'Logout') {
                $uloga = $_SESSION['uloga'];
                if ($uloga != 1) {
                    echo '
       <li><a href="artikli.php">Artikli</a></li>       
        <li><a href="dodaj_artikal.php">Dodaj artikal</a></li>
        <li><a href="korisnici.php">Korisnici</a></li>
        <li><a href="korisnici_dodaj.php">Dodaj kor./admina</a></li>        
        <li><a href="kategorije.php">Kategorije</a></li>       
        <li><a href="narudzbe.php">Narudzbe</a></li>
        <li><a href="reklamacije.php">Reklamacije</a></li>      
        <li><a href="uredi_pocetnu.php">Uredi izlog</a></li>';
                } else if ($uloga != 2) {
                    die('<p style="color:white;">Samo za administratore. Korisnik nema pristup.</p>');
                }
                echo "<li><a href='$path'>" . $poruka . "</a></li>";
            }
            ?>
        </li>
    </ul>
    <?php
    if (isset($_GET['msg'])) {
        echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
    }
    if (isset($_GET['message'])) {
        echo "<h3 style='text-align:center;'>" . $_GET['message'] . "</h3>";
    }
    ?>
    <form action="kategorija_promeni_baza.php?category_id=<?php echo $_GET['category_id']; ?>" method="post" onsubmit="return formValidator()">
        <table class="tabla" width="40%" align="center" cellpadding="7" cellspacing="7" border="2">
            <tr align="center">
                <td>Izmeni kategoriju</td>
                <td><input type="text" name="kategorija" id="kategorija" value="<?php echo $_GET['category']; ?>"/></td>
                <td><input type="submit" name="unesi" value="Promeni"/></td>
            </tr>
        </table>
    </form>

</body>
</html>
