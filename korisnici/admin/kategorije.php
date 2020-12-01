<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/stil1.css">
        <style>


        </style>
    </head>

    <body>
       
    <?php
    if (isset($_GET['msg'])) {
        echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
    }
    if (isset($_GET['message'])) {
        echo "<h3 style='text-align:center;'>" . $_GET['message'] . "</h3>";
    }
    ?>
    <form action="kategorija_dodaj.php" method="post">
        <table class="tabla" id="unos" width="40%" align="center" cellpadding="7" cellspacing="7" border="2">
            <tr align="center">
                <td>Unesi kategoriju</td>
                <td><input type="text" name="kategorija" id="kategorija"/></td>
                <td><input type="submit" name="unesi" value="Unesi"/></td>
            </tr>
        </table>
    </form>
    <div id="infoMsg" style="text-align: center;font-size: 18px;color:red;"></div>        
    <br/>

    <table class="tabla" width="40%" align="center" cellpadding="7" cellspacing="7" border="2">
        <tr align="center">
            <td><b>Kategorija</b></td>
            <td><b>Obrisi</b></td>
            <td><b>Promeni</b></td>
        </tr>
        <?php
        $conn = konekcija();
        $query = "SELECT * FROM category";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr align="center" class="category">
                <td><?php echo $row['category_name']; ?></td>
                <td><a href="kategorija_brisi.php?category_id=<?php echo $row['category_id']; ?>">UKLONI</a></td>
                <td><a href="kategorija_promeni.php?category_id=<?php echo $row['category_id']; ?>&category=<?php echo $row['category_name']; ?>">PROMJENI</a></td>
            </tr>
        <?php } ?>
    </table> 
</body>
</html>