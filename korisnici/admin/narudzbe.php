<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <style>

        </style>
    </head>
    <body>
        <?php include 'admin_header.php'; ?>
        <h1 style="text-align: center";><span class="promoted">***</span>Orders<span class="promoted">***</span></h1>
        <?php
        if (isset($_GET['msg'])) {
            echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
        }
        if (isset($_GET['message'])) {
            echo "<h3 style='text-align:center;'>" . $_GET['message'] . "</h3>";
        }
        ?>
        <?php
        $conn = konekcija();
        $query = "SELECT * FROM orders o INNER JOIN members m ON (o.user=m.member_id)  ";
        $result = mysqli_query($conn, $query);
        ?>
        <table class="table" width="80%" align="center" cellpadding="7" cellspacing="7"  >
            <tr>
                <td><strong>Order id</strong></td>
                <td><strong>User</strong></td>
                <td><strong>Date</strong></td>
                <td><strong>Time</strong></td>
                <td><strong>Delete</strong></td>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr class="order"><td align="center"><a href="narudzba.php?order_number=<?php echo $row['order_id']; ?>&user_id=<?php echo $row['user']; ?>&order_status=<?php echo $row['order_status']; ?>"> &#9757; <?php echo $row['order_id']; ?></a></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <td><?php echo $row['order_time']; ?></td>

                    <td>  
                        <div style="margin:0 auto;" class="round"><a href="<?php echo "narudzba_obrisi.php?order_number=" . $row['order_number']; ?>">X</a></div>
                    </td>

                </tr>
            <?php } ?>
        </table>
    </body></html>
