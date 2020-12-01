<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <style>


        </style>
    </head>

    <body>
        <?php include 'admin_header.php'; ?>
        <div class="central">
            <h1 class="nicehead" style="text-align: center";><span class="promoted">***</span>Promote products<span class="promoted">***</span></h1> 

            
            <div class="container">
                <div class="container_admin">
                    <div class="divseven">
                        <form method="post" action="admin_pocetna.php">
                            <div class="smalbar">

                                <div class="smalone">
                                    <label style="color:#fff;" class="Label" for="search"><strong>Choose category:</strong></label>
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
                                    <input class='Button3' style="height:35px;margin-top:0;" name='submit' type='submit' value='Search'/>                            
                                </div>  
                            </div>       
                        </form>
                        <div class="products_list">
                            <?php
                            $conn = konekcija();
                            if (!isset($_POST['kategorija']))
                                $kategori = 1;
                            else
                                $kategori = $_POST['kategorija'];
                            // $query1="select * from articles";
                            $query1 = 'SELECT * FROM articles a INNER JOIN category c ON(a.category=c.category_id) where category_id=' . $kategori;
                            $result = mysqli_query($conn, $query1);


                            $red = 0;
                            if (mysqli_num_rows($result) == 0) {
                                echo "<h2>No listings in this category!</h2>";
                            } else {
                                $red = 0;

                                while ($row = mysqli_fetch_array($result)) {
                                    $articleId = $row['article_id'];
                                    $imagePath = $row['image_url'];
                                    ?>

                                    <div class="product_item">
                                        <div class="alo">
                                            <div class='div_pic3'><img class='div_image' src='../../<?php echo $imagePath; ?>'; >                        
                                            </div>
                                        </div>
                                        <div style="height:60px;padding-top:10px;" class="">
                                            <h3><?php echo $row['name']; ?></h3>
                                        </div>
                                        <input type='hidden' value="<?php $row['article_id']; ?>" name="article_id" />
                                        <a href="uredi_pocetnu_baza.php?id=<?php echo $row['article_id']; ?>&set=1">
                                            <input  type="button" value="Promote" class="Button3"/>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                            ?>     
                        </div>       

                    </div>  

                    <div class="divthree"> 
                        <div class='rightside'>
                            <h2 class='nicehead'>Promoted products</h3>
                                <?php
                                include 'promoted.php';
                                echo promoted_articles();
                                ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </body>
</html>



