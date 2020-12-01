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
        <ul class="bar" id="navbar">
            <li><a href="../../pocetna.php">Pocetna</a></li>
            <li><a href="../../pretraga.php">Pretraga</a></li>
            <li><a href="../../pretraga_kategorija.php">Kategorija</a></li>

            <?php
            include "../../baza.inc";
            include "../../prijavljen.inc";
            $poruka = $_SESSION['poruka'];
            $path = $_SESSION['path'];
            if ($poruka == "Login") {
                //ako se jos nisi ulogovao login
                //trenutno ga prebacuje iz prijavljen tamo na login flowersa
                echo "<li><a href='$path'>" . $poruka . "</a></li>";
            } else if ($poruka == 'Logout') {
                $uloga = $_SESSION['uloga'];
                if ($uloga != 1) {
                    die('<p style="color:white;">Samo za korisnike. </p>');
                } else if ($uloga == 1) {
                    echo "<li><a href='korpa.php'>Korpa</a></li>";
                    echo "<li><a href='reklamacija.php'>Reklamacija</a></li>";
                    echo "<li><a href='pregledaj_naruceno.php'>Narudzbe</a></li>";
                }
                echo "<li><a href='$path'>" . $poruka . "</a></li>";
            }
            ?>
        </li>
    </ul>

    <?php
    if (!isset($_GET['article_id']) || !isset($_GET['redni_br']) || !isset($_GET['kolicina'])) {
        die('Nema parametara u url-u!');
    }
    if (isset($_GET['msg'])) {
        echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
    }
    ?>   

    <table width="40%" align="center" cellpadding="7" cellspacing="7" border="2">
        <?php
        $conn = konekcija();
        $query = "SELECT * FROM articles a INNER JOIN category c ON a.category=c.category_id WHERE article_id=" . $_GET['article_id'];
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        ?>
        <form method="post" action="korpa_komada_baza.php?redni_br=<?php echo $_GET['redni_br']; ?>">
            <tr>
                <td colspan="2"><h3 align="center"><?php echo $row['name']; ?></h3></td>
            </tr>
            <tr>
                <td>Cena</td>
                <td><?php echo $row['price']; ?></td>
            </tr>    
            <tr>
                <td>Količina</td>
                <td><input name="kolicina" type="number" value="<?php echo $_GET['kolicina']; ?>" min="1" max="<?php echo $row['for_sale']; ?>"/></td>
            </tr>
            <tr>
                <td colspan="2"><input name="submit" type="submit" value="Promeni kolicinu" /></td>
            </tr>
        </form>
    </table>
</body>
</html>