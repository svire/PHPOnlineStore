<div class="header"  >


    <ul class="bar" id="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="search.php">Products</a></li>
        <li><a href="categories.php">Categories</a></li> 

        <?php
        include "prijavljen.inc";
        $poruka = $_SESSION['poruka'];
        $path = $_SESSION['path'];
        if ($poruka == "Login") {
            echo "<li class='right'><a href='$path'>" . $poruka . "</a></li>";
        } else if ($poruka == 'Logout') {
            $uloga = $_SESSION['uloga'];
            if ($uloga != 1) {
                
            } else if ($uloga != 2) {
                echo "<li><a href='korisnici/user/korpa.php'>Cart</a></li>";
                echo "<li><a href='korisnici/user/pregledaj_naruceno.php'>Orders</a></li>";
               
            }
            echo "<li><a href='$path'>" . $poruka . "</a></li>";
        }
        ?>
        </li>
    </ul> 

</div>