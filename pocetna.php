<html>
    <head> 
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <style> 

        </style> 
    </head> 
    <?php
    include "header.php";
    ?>
    <body>
        <div class="central"> 
            <h1 style="text-align: center";><span class="promoted">***</span>Promoted listings<span class="promoted">***</span></h1>
            <div class="container">
                <?php
                include 'baza.inc';
                $conn = konekcija();
                $query = 'SELECT * FROM articles WHERE shop_window=1';
                $result = mysqli_query($conn, $query);
                $red = 0;


                while ($row = mysqli_fetch_array($result)) {
                    echo "<div class='one'>";
                    $articleId = $row['article_id'];
                    $imagePath = $row['image_url'];
                    echo "<div class='div_pic'><img class='div_image' src='$imagePath' ></div>";
                    echo "<div class='div_content'>";
                    echo "<h2>" . $row['name'] . "</h2>";
                    echo "<p class='max-lines eli'>" . $row['notes'] . "</p>";
                    echo "<h1><span class='sup'>$</span>" . $row['price'] . "</h1>";

                    echo "<a class='nicelink' style='font-size:22px;' href='info.php?article_id=$articleId'>More info</a><br>";
                    echo "</div>";

                    echo "</div>";
                }
                ?>         
            </div>
    </body> 
</html>
