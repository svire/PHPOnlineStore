<div class="header"  >


    <ul class="bar" id="navbar">
        <li><a href="admin_pocetna.php">Home</a></li>    

        <li><a href="artikli.php">Products</a></li>      
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
           
        <li><a href="dodaj_artikal.php">Add product</a></li>
        <li><a href="korisnici.php">Users</a></li>
        <li><a href="narudzbe.php">Orders</a></li>     
        <li><a href="reklamacije.php">Complains</a></li>      
        <li><a href="uredi_pocetnu.php">Manage</a></li>';
            } else if ($uloga != 2) {
                //die('<p style="color:white;">Samo za administratore. Korisnik nema pristup.</p>');
            }
            echo "<li><a href='$path'>" . $poruka . "</a></li>";
        }
        ?>
        </li>
    </ul> 

</div>