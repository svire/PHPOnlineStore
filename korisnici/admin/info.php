 
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <script>

        </script>
    </head>
    <body>
        <?php
        include 'admin_header.php';
        ?>
        <div class="cont_huge">
            <div class="cont_one">

                <?php
                if (!isset($_GET['article_id'])) {
                    die('Nema article_id-a!');
                }
                $conn = konekcija();
                $query = "SELECT * FROM articles a INNER JOIN category c ON a.category=c.category_id WHERE article_id=" . $_GET['article_id'];
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                $imagePath = $row['image_url'];
                $for_sale = $row['for_sale'];
                ?>
                <h3><?php echo $row['name']; ?></h3>         
                <?php
                include '../../image_carousel.php';
                echo carousel('../../'.$imagePath, $row['article_id']);
                    
                echo "<div class='two'>";
                echo "<div class='info'><p>" . $row['notes'] . "</p></div>";

                echo "<div class='three'>";
                if ($for_sale > 0) {
                    echo "<div class='instock'>In Stock.</div>";
                }
                echo "<h1><span class='sup'>$</span>" . $row['price'] . "</h1>";

                echo "<p>Warranty: " . $row['warranty'] . "days</p>";

                echo "</div>";
                ?>
                <?php
                if (isset($_SESSION['korisnik'])) {
                    $url = "korisnici/user/korpa_baza.php?article_id=" . $_GET['article_id'];
                    // $url = "korisnici/user/place_order.php?article_id=" . $_GET['article_id'];
                } else {
                    $url = 'korisnici/login.php';
                }
                ?>
               

            </div>
        </div>

    </body>
</html>
