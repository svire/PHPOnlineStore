
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
            <h1 style="text-align: center"><span class="promoted">***</span>Categories<span class="promoted">***</span></h1>
            <div class="container"> 
                <form method="post" action="search.php">
                    <div class="smalbar">

                        <div class="smalone">
                            <label class="Label" for="search"><strong>Choose category:</strong></label>
                        </div>
                        <div class="smalone">
                            <select name="kategorija">
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
        </div>

        <table name="tabla" width="40%" border="5 black solid">
            <form action="pretraga_kategorija.php" method="post"> 
                <tr>
                    <td>Kategorija</td>
                    <td colspan="2">
                        <select name="kategorija">
                            <?php
                            include 'baza.inc';
                            $conn = konekcija();
                            $query = "SELECT * FROM category";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value=" . $row['category_id'] . " >" . $row['category_name'] . "</option>";
                            }
                            ?>
                            <input type="submit" name="submit" value="Nadji">
                            </form>
                            </table>    
                            <table class="tabla" width="80%" align="center" cellpadding="12" cellspacing="12" border="2">
                                <?php
                                if (!isset($_POST['kategorija']))
                                    $kategori = 1;
                                else
                                    $kategori = $_POST['kategorija'];
                                $query1 = 'SELECT * FROM articles a INNER JOIN category c ON(a.category=c.category_id) where category_id=' . $kategori;
                                $result = mysqli_query($conn, $query1);
                                $red = 0;
                                echo "<tr>";
                                while ($row = mysqli_fetch_array($result)) {
                                    if ($red % 2 == 0) {
                                        echo "</tr>";
                                        echo "<tr>";
                                    }
                                    $articleId = $row['article_id'];
                                    $imagePath = $row['image_url'];
                                    echo "<td height='110' valign='bottom' align='center'>";
                                    echo "<img src='$imagePath' valign='middle' border='2' width='120' height='120'>";
                                    echo "<h3>" . $row['name'] . "</h3>";
                                    echo "<a href='info.php?article_id=$articleId'>Više informacija</a><br>";
                                    echo "<a href='korisnici/user/korpa_baza.php?article_id=$articleId&kolicina=1'>Kupi</a>";
                                    echo "</td>";
                                    $red++;
                                }
                                echo "</tr>";
                                if (mysqli_num_rows($result) == 0) {
                                    echo "<tr><td colspan='6' height='110' valign='center' align='center'>Nema proizvoda u kategoriji!</td></tr>";
                                }
                                ?>
                            </table>    

                            </body>
                            </html>