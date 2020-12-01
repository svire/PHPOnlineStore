<?php include 'baza.inc';
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script>

        </script>
    </head>
    <body>
        <?php
        include 'header.php';
        if (!isset($_GET['article_id'])) {
            die('Nema article_id-a!');
        }
        ?>
       
        <div class="cont_huge2">
        <?php
                
                $conn = konekcija();
                $query = "SELECT * FROM articles a INNER JOIN category c ON a.category=c.category_id WHERE article_id=" . $_GET['article_id'];
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                $imagePath = $row['image_url'];
                $for_sale = $row['for_sale'];
                $cat_name=$row['category_name'];
                ?>
        <div class='side_suggest' >
            <h3 style='color:rgb(204, 102, 0)'>Products related to this item</h3>
            <div class='similar_items'>
                <?php include 'similar_items.php';
                    echo similar($row['category'],$row['name'],$cat_name);
                ?>
            </div>
        </div>
            <div class="cont_one2">

               
                <h3><?php echo $row['name']; ?></h3>         
                <?php
                include 'image_carousel.php';
                echo carousel($imagePath, $row['article_id']);                    
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
                
                <div style='display:flex;flex-direction:column; align-items:center;'>
                    <form method="post" action="<?php echo $url; ?>">
                        <div>
                            <label>Qty:</label>
                            <select class="selection" name="kolicina">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        <?php
                        echo "<input class='Button'  style='width:150px'    name='submit' type='submit' value='Add to cart'/>";
                        ?>
                    </form>       
                </div>
       
   
            </div>
           
        </div>
       
    </body>
</html>

