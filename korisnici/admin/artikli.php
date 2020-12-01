<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <style>

        </style>
    </head>

    <body>

        <?php
        include 'admin_header.php';
        ?>
        <h1 class="nicehead" style="text-align: center";><span class="promoted">***</span>Products<span class="promoted">***</span></h1> 


        <?php
        if (isset($_GET['msg'])) {
            echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
        }
        if (isset($_GET['message'])) {
            echo "<h3 style='text-align:center;'>" . $_GET['message'] . "</h3>";
        }
        ?>
        <table class="table" width="80%" align="center" cellpadding="7" cellspacing="7"  >
            <thead>
                <tr>             
                    <td align="center"><strong>Image</strong></td>
                    <td><strong>Name</strong></td>
                    <td><strong>Category</strong></td>
                    <td><strong>Price</strong></td>
                    <td align="center" colspan="2"><strong>Actions</strong></td>
                </tr>
            </thead>
            <tbody> 
                <?php
                // include "../../baza.inc";
                $conn = konekcija();
                //$korisnik = $_SESSION['korisnik'];
                //$order_num = $_SESSION['order_number'];
                $query = "SELECT * FROM articles a INNER JOIN category c ON (a.category=c.category_id)";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td align="center"><img src="../../<?php echo $row['image_url']; ?>" width="50" height="50" border="0"/></td>
                        <td style='vertical-align: middle;'>
                        <a href='info.php?article_id=<?php echo $row['article_id'];?>' >
                        <?php echo $row['name']; ?>
                        </a>
                         </td>
                        <td  style='vertical-align: middle;'><?php echo $row['category_name']; ?></td>
                        <td  style='vertical-align: middle;'><?php echo $row['price']; ?></td>                 
                        <td style='vertical-align: middle;'><a href="artikal_promeni.php?article_id=<?php echo $row['article_id']; ?>">UPDATE</a></td>
                        <td align='center'  style='vertical-align: middle;'><a href="artikal_obrisi.php?article_id=<?php echo $row['article_id']; ?>"><div class='round'>X</div></a></td>                
                    </tr>

<?php } ?>   


            </tbody>

        </table>


    </body>
</html>

