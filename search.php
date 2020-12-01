<?php
include 'baza.inc';
$conn = konekcija();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>          
        <?php
        include "header.php";
        ?>
        <div class="central"> 
            <h1 style="text-align: center";><span class="promoted">***</span>Search<span class="promoted">***</span></h1>
            <div class="container">  
                <form method="post" action="search.php">
                    <div class="smalbar">
                        <div class="smalone">
                            <label class="Label" for="search"><strong>Search name:</strong></label>
                        </div>
                        <div class="smalone">
                            <input class="InputField" type="text" id="search" name="search"/>
                        </div>
                        <div class="smalone">
                            <input class='Button2' name='submit' type='submit' value='Search'/>
                        </div>  
                    </div>       
                </form>


                <?php
                $conn = konekcija();
                $pronadji = isset($_POST['search']) ? $_POST['search'] : '';
                $query = "SELECT * FROM articles WHERE name LIKE '%$pronadji%'";

                $result = mysqli_query($conn, $query);
                $red = 0;
                if (mysqli_num_rows($result) == 0) {
                    echo "<h2>No matching criteria. Type again!</h2>";
                } else {
                    $red = 0;

                    while ($row = mysqli_fetch_array($result)) {
                        $articleId = $row['article_id'];
                        $imagePath = $row['image_url'];


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
                }
                ?>         
            </div>
        </div>
    </body>
</html>


