<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <style>
        </style>
    </head>
    <body>
        <?php include 'admin_header.php'; ?>
        <?php
        if (isset($_GET['msg'])) {
            echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
        }
        if (isset($_GET['message'])) {
            echo "<h3 style='text-align:center;'>" . $_GET['message'] . "</h3>";
        }
        ?>
        <h1 style="text-align: center"><span class="promoted">***</span>Order details<span class="promoted">***</span></h1>


        <table class="table" width="80%" align="center" cellpadding="7" cellspacing="7" >
            <tr><td colspan="4" align="center"  style="font-size:28px;" >Order #<?php echo $_GET['order_number']; ?></td></tr>
            <tr>
                <td align="center" colspan="2"><strong>Product name</strong></td>
                <td><strong>Price</strong></td>
                <td><strong>Quantity</strong></td>

            </tr>
            <?php
            $conn = konekcija();
            $user_id = '-';// $_GET['user_id'];
            $order_number = $_GET['order_number'];
            $total = 0;
            //$order_stat = $_GET['order_status'];

            $queryitems = "SELECT * FROM articles a INNER JOIN order_items o ON a.article_id=o.article_id where order_id=$order_number";
            $result2 = mysqli_query($conn, $queryitems);
            while ($row2 = mysqli_fetch_array($result2)) {
                $total = $total + $row2['price'] * $row2['quantity'];
                ?>
                <tr >
                    <td colspan="2"><?php echo $row2['name']; ?></td>
                    <td align="right"><?php echo $row2['price']; ?></td>
                    <td align="right"><?php echo $row2['quantity']; ?></td>  

                </tr>
                <?php
            }
            $queryorder= "SELECT * FROM orders where order_id=$order_number";
            $result3 = mysqli_query($conn, $queryorder);
            $row3 = $result3->fetch_row();
            $user_id = $row3[1];  //?? false;
            $order_stat=$row3[5];
            ?>
            <tr style="background-color:rgba(0, 221, 0, 0.655);">
                <td colspan="4"  style="font-size:25px;">Total: <?php echo $total; ?>$</td></tr>
            <tr><td colspan="4" align="center"  style="font-size:28px;">User details</td></tr>
            <?php
            $query1 = "SELECT * FROM members WHERE member_id=$user_id";
            $result1 = mysqli_query($conn, $query1);
            $row1 = mysqli_fetch_array($result1)
            ?>  
            <tr><td><strong>First name</strong></td> <td colspan="3"><?php echo $row1['first_name']; ?></td></tr>
            <tr><td><strong>Last name</strong></td><td colspan="3"><?php echo $row1['last_name']; ?></td></tr>
            <tr> <td><strong>Address</strong></td><td colspan="3"><?php echo $row1['address']; ?></td></tr>
            <?php
            $order_status = '-';
            $order_color = 'rgb(44, 188, 186)';

            if ($order_stat == 0) {
                $order_status = 'ordered';
            } else if ($order_stat == 1) {
                $order_status = 'cancelled';
                $order_color = 'rgba(245, 49, 49, 0.948)';
            } else if ($order_stat == 2) {
                $order_status = 'delivered';
                $order_color = 'rgba(38, 215, 7, 0.867);'; //'rgba(25, 255, 21, 0.795)';
            }
            ?>
            <tr><td colspan="4" align="center"  style='color:#fff;font-size:28px;background-color:<?php echo $order_color; ?>'>Order status:<?php echo $order_status; ?></td></tr>
            <?php
            if ($order_status == 'ordered') {
                ?>
                <tr>
                    <td colspan="4" align='center'>

                        Order already delivered? Change status: <div class='next_time' style='background:rgba(47, 255, 10, 0.867);'><a href="order_delivered.php?order_id=<?php echo $order_number; ?> ">✔</a> </div>


                    </td>
                </tr>

    <?php
}
?>
        </table>
    </body>
</html>
