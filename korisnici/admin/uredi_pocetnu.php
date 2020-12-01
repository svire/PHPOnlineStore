<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <style>


        </style>
    </head>

    <body>
            <?php include 'admin_header.php' ?>
            <h1 style="text-align: center";><span class="promoted">***</span>Promote products<span class="promoted">***</span></h1>

            <?php
            if (isset($_GET['msg'])) {
                echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
            }
            if (isset($_GET['message'])) {
                echo "<h3 style='text-align:center;'>" . $_GET['message'] . "</h3>";
            }
            ?>
    <form method="post" action="uredi_pocetnu_baza.php">
        <table class="table" width="50%" align="center" cellpadding="7" cellspacing="7"  >
    <?php
    $conn = konekcija();
    $query = "SELECT * FROM articles ORDER BY name";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $image_url = $row['image_url'];
        $image_url = "../../" . $image_url;
        ?>
                <tr class="article">
                    <td width="70"><div align="center">
                            <img src="<?php echo $image_url; ?>" width="50" height="50" border="0"/></div></td>
                    <td colspan="2" width="240"><?php echo $row['name']; ?></td>
                    <td width="20"><div align="center">
                            <input type="checkbox" name="<?php echo $row['article_id']; ?>" value="<?php echo $row['article_id']; ?>"
    <?php
    if ($row['shop_window'] == 1) {
        ?>
                                       checked <?php } ?> /></div></td>
                </tr>
                            <?php
                        }
                        ?>
            <tr><td colspan="3" ></td>
                <td width="20"><div align="center">
                        <input class='Button' name="uredi" type="submit" value="Confirm"/></div></td>
            </tr>
        </table>
    </form
</body>
</html>