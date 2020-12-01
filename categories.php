
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">        
        <style>          
        </style>         
    </head>    
    <body>
        <?php
        include "header.php";
        ?>
        <div class="central"> 
            <h1 style="text-align: center";><span class="promoted">***</span>Categories<span class="promoted">***</span></h1>
            <div class="container"> 
                <form method="post" action="categories.php">
                    <div class="smalbar">

                        <div class="smalone">
                            <label class="Label" for="search"><strong>Choose category:</strong></label>
                        </div>
                        <div class="smalone">
                            <select class="selection" name="kategorija">
                                <?php
                                include 'baza.inc';
                                $conn = konekcija();
                                $query = "SELECT * FROM category";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['category_id'] . " >" . $row['category_name'] . "</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="smalone">
                            <input class='Button2' name='submit' type='submit' value='Search'/>
                        </div>  
                    </div>       
                </form>

            </div> 

            <?php
            $conn = konekcija();
            if (!isset($_POST['kategorija']))
                $kategori = 1;
            else
                $kategori = $_POST['kategorija'];
            $query1 = 'SELECT * FROM articles a INNER JOIN category c ON(a.category=c.category_id) where category_id=' . $kategori;
            $result = mysqli_query($conn, $query1);


            $red = 0;
            if (mysqli_num_rows($result) == 0) {
                echo "<h2>No listings in this category!</h2>";
            } else {
                $red = 0;
                echo "<tr>";
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


