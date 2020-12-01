<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <style>


        </style>
    </head>

    <body>
        <?php include 'admin_header.php'; ?>
        <h1 style="text-align: center";><span class="promoted">***</span>Users<span class="promoted">***</span></h1>
        <?php
        if (isset($_GET['msg'])) {
            echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
        }
        if (isset($_GET['message'])) {
            echo "<h3 style='text-align:center;'>" . $_GET['message'] . "</h3>";
        }
        ?>
        <div id="infoMsg" style="text-align: center;font-size: 18px;color:red;"></div>        
        <br/>
         
        <table class="table" width="80%" align="center" cellpadding="7" cellspacing="7"  >
            
            <tr align="center">
                <td><b>Username</b></td>
                <td><b>Password</b></td>
                <td><b>Address</b></td>
                <td><b>Email</b></td>
               
                <td><b>Role</b></td>
                <td><b>Delete</b></td>
            </tr>
            <?php
            $conn = konekcija();
            $query = "SELECT first_name,last_name,role_name,member_id,username,email,address,role,jmbg  FROM members m INNER JOIN roles r ON (m.role=r.role_id)";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr align="center" class="category">
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                     
                    <td><?php echo $row['role_name']; ?></td>

                    <td>
                        <div class="round"><a href="korisnici_obrisi.php?member_id=<?php echo $row['member_id']; ?>">X</a></div>
                    </td>
                </tr>
            <?php } ?>
        </table> 
    </body>
</html>

