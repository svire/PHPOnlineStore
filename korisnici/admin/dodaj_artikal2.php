<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/stil1.css">
        <style>


        </style>
        <script type="text/javascript">
            function forma() {
                var naziv = document.getElementById('naziv').value.trim();
                var garancija = document.getElementById('garancija').value.trim();
                var cena = document.getElementById('cena').value.trim();
                var msg = document.getElementById('infoMsg');
                var opis = document.getElementById('opis').value.trim();
                var kolicina = document.getElementById('kolicina').value.trim();
                if (naziv == '') {
                    document.getElementById('naziv').focus();
                    msg.innerHTML = 'Unesite naziv!';
                    return false
                }
                if (garancija == '') {
                    document.getElementById('garancija').focus();
                    msg.innerHTML = 'Unesite garanciju!';
                    return false
                }
                if (!/^[0-9]+$/.test(garancija)) {
                    document.getElementById('garancija').focus();
                    msg.innerHTML = 'Samo brojevi mogu biti u garanciji!';
                    return false
                }
                if (opis == '') {
                    document.getElementById('opis').focus();
                    msg.innerHTML = 'Unesite opis!';
                    return false
                }
                if (kolicina == '') {
                    document.getElementById('kolicina').focus();
                    msg.innerHTML = 'Unesite kolicinu!';
                    return false
                }
                if (!/^[0-9]+$/.test(kolicina)) {
                    document.getElementById('kolicina').focus();
                    msg.innerHTML = 'Samo brojevi mogu biti u kolicini!';
                    return false
                }
                if (cena == '') {
                    document.getElementById('cena').focus();
                    msg.innerHTML = 'Unesite cenu!';
                    return false
                }
                if (!/^[0-9]+$/.test(cena)) {
                    document.getElementById('cena').focus();
                    msg.innerHTML = 'Samo brojevi mogu biti u ceni!';
                    return false
                }
                return true
            }
        </script> 
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
    <div id="infoMsg" style="text-align: center;font-size: 18px;color:red;"></div>
    <form enctype="multipart/form-data" action="dodaj_artikal_baza.php" method="post" onsubmit="return forma()">
        <table class="tabla" width="40%" align="center" cellpadding="7" cellspacing="7" border="2"> 
            <tr><td width="30%"><div align="right">
                        <strong>Slika</strong></div></td>
                <td colspan="2"><div align="left">
                        <input name="fileToUpload" type="file" id="fileToUpload" /></div></td>
            </tr>
            <tr><td><div align="right">
                        <strong>Naziv</strong></div></td>
                <td colspan="2"><div align="left">
                        <input name="naziv" type="text" id="naziv" /></div></td>
            </tr>
            <tr><td><div align="right">
                        <strong>Kategorija</strong></div></td>
                <td colspan="2"><div align="left">
                        <select name="kategorija">
                            <?php
                            $conn = konekcija();
                            $query = "SELECT * FROM category";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value=" . $row['category_id'] . ">" . $row['category_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div></td>
            </tr>
            <tr><td><div align="right">
                        <strong>Garancija</strong></div></td>
                <td colspan="2"><div align="left">
                        <input name="garancija" type="text" id="garancija" /></div></td>
            </tr>
            <tr><td><div align="right">
                        <strong>Opis</strong></div></td>
                <td colspan="2"><div align="left">
                        <textarea cols="50" rows="6" name="opis" type="text" id="opis"></textarea>
                    </div></td>
            </tr>
            <tr><td><div align="right">
                        <strong>Raspolozivo</strong></div></td>
                <td colspan="2"><div align="left">
                        <input name="kolicina" type="text" id="kolicina" /></div></td>
            </tr>
            <tr><td><div align="right">
                        <strong>Ukupna cena</strong></div></td>
                <td colspan="2"><div align="left">
                        <input name="cena" type="text" id="cena" /></div></td>
            </tr>
            <tr> <td colspan="2">
                    <div align="center">
                        <input name="submit" type="submit" value="Potvrdi" />
                        <input name="reset" type="reset" value="Ponisti" />
                    </div></td>
            </tr>
        </table>
    </form>
</body>
</html>
