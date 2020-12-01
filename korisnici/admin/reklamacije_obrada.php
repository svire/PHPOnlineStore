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
        <h1 style="text-align: center"><span class="promoted">***</span>Complaint <span class="promoted">***</span></h1>
        <?php
        if (isset($_GET['msg'])){
           echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
        }
        if (isset($_GET['message'])) {
        echo "<h3 style='text-align:center;'>" . $_GET['message'] . "</h3>";
        }
        ?>
    
        <table class="table" width="80%" align="center" cellpadding="7" cellspacing="7" >
        <tr><td colspan="4" align="center"  style="font-size:28px;" >Complaint #<?php echo $_GET['order_number']; ?></td></tr>
            
            <?php
            $conn = konekcija();
          
            $order_number = $_GET['order_number'];
            $total = 0;
          
            $query = "SELECT * FROM complaints c inner join articles a on c.article_id=a.article_id  WHERE reclamation_id=$order_number";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {           
            ?>
            <tr class="article">               
            <td align="center" ><strong>Product name</strong></td> <td><?php echo $row['name']; ?></td>  
            </tr>
            <tr class="article">               
            <td align="center" ><strong>Order id</strong></td> 
            <td align="center"><a href="narudzba2.php?order_number=<?php echo $row['order_id'];?>">See whole order #<?php echo $row['order_id']; ?></a></td>
             
            </tr>
            <tr>
                <td><strong>Complaint:</strong></td><td colspan="3" align="center" style="font-size:18px;"><?php echo $row['complaint']; ?></td></tr>
            <tr><td colspan="4" align="center" style="color:navy;font-size:20px;">Time: <?php echo $row['time'];?></td></tr>
            <?php
            }
            ?> 
             
        </table>
    </body>
</html>
