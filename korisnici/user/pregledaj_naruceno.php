<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <style>

        </style>
        <script>
            function forma() {
                var msg = document.getElementById('infoMsg');
                var poruka = document.getElementById('poruka').value.trim();
                if (poruka == '') {
                    document.getElementById('poruka').focus();
                    msg.innerHTML = 'Unesite poruku!';
                    return false
                }

                return true
            }
        </script>
        <script>
            function show(id) {
                var row = document.getElementById(id);
                if (row.classList == "hide_row") {
                    row.classList.remove("hide_row");
                } else {
                    row.classList.add("hide_row");
                }
            }

        </script>
    </head>

    <body>
        <?php
        include 'header.php';
        ?>

        <h1 style="text-align: center";><span class="promoted">***</span>Orders<span class="promoted">***</span></h1>
        <?php
        if (isset($_GET['msg'])) {
            echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
        }
        ?>   

        <table class="table" width="80%" align="center" cellpadding="7" cellspacing="7"  >
            <tr>
                <td><strong>Order_ID</strong></td>
                <td><strong>Order date</strong></td>
                <td><strong>Order time</strong></td>
                <td><strong>Price</strong></td>
                <td><strong>Status</strong></td>
                <td><strong></strong></td>


                <?php
                include "../../baza.inc";
                $conn = konekcija();
                $korisnik = $_SESSION['korisnik'];
                $order_num = $_SESSION['order_number'];
//$query = "SELECT * FROM orders articles WHERE order_number=$order_num and user=$korisnik";
                $query = "SELECT * FROM orders WHERE user=$korisnik";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {

                    $order_id = $row["order_id"];
                    $total = 0;
                    $order_status = "pe";
                    $order_color = 'rgb(44, 188, 186)';
                    if ($row['order_status'] == 0) {
                        $order_status = 'ordered';
                    } else if ($row['order_status'] == 1) {
                        $order_status = 'cancelled';
                        $order_color = 'rgba(245, 49, 49, 0.948)';
                    } else if ($row['order_status'] == 2) {
                        $order_status = 'delivered';
                        $order_color = 'rgba(25, 255, 21, 0.795)';
                    }
                    ?> 
                <tr onclick="show(<?php echo $order_id; ?>)">
                    <td><?php echo $order_id; ?></td>               
                    <td><?php echo $row['order_date']; ?></td>
                    <td><?php echo $row['order_time']; ?></td> 
                    <td><strong><?php echo $row['price']; ?>$</strong></td> 
                    <td style='background-color:<?php echo $order_color; ?>'><strong><?php echo $order_status; ?></strong></td>     
                    <td style="width:30px;" >
    <?php if ($order_status == 'ordered') {
        ?>
                            <div class="round"><a href="order_cancel.php?order_id=<?php echo $order_id; ?>">X</a></div>
                        <?php } ?>


                    </td>
                </tr> 

                <tr   class="hide_row"  id=<?php echo $order_id; ?>>
                    <td colspan="5" style="padding:0;">
                        <table class="smalltable"   >
                            <thead  >
                                <tr style="background-color:rgba(232, 229, 230, 0.795);">                          
                                    <td><strong> Name</strong></td> 
                                    <td> <strong>Price</strong></td> 
                                    <td style="background-color:rgb(231, 240, 65) ;"><strong>Quantity</strong> </td>   
                                    <td><strong>?</strong> </td>                   
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $queryitems = "SELECT * FROM articles a INNER JOIN order_items o ON a.article_id=o.article_id where order_id=$order_id";
    $result2 = mysqli_query($conn, $queryitems);
    while ($row2 = mysqli_fetch_array($result2)) {
        ?>
                                    <tr>
                                        <td><?php echo $row2['name']; ?></td>
                                        <td><?php echo $row2['price']; ?>$</td>
                                        <td><?php echo $row2['quantity']; ?></td>
                                        <td style="width:30px;" class="tooltip" >

        <?php if ($order_status == 'delivered') { ?>  
                                                <div class="complaint"><a href="complaint.php?order_id=<?php echo $row['order_id']; ?>&order_date=<?php echo $row['order_date']; ?>&order_time=<?php echo $row['order_time']; ?>&name=<?php echo $row2['name']; ?>&article_id=<?php echo $row2['article_id']; ?>&quantity=<?php echo $row2['quantity']; ?>">?</a></div>
                                                <div class="tooltip">
                                                    <span class="tooltiptext">Make complaint</span>
                                                </div>                 
        <?php } ?>   
                                        </td> 
                                    </tr>
                                            <?php
                                        }
                                        ?>
                            </tbody>
                        </table>
                    </td>
                <tr>

    <?php
}
?>

        </table>

    </body>    
</html>