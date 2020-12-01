<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <style>
        </style>
    </head>

    <body>
        <?php
        include "./header.php";
        include "../../baza.inc";
        $conn = konekcija();
        $korisnik = $_SESSION['korisnik'];
        $order_num = $_SESSION['order_number'];
        ?>   
        <div class="central">
            <?php
            if (isset($_GET['msg'])) {
                echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
            }
            ?>   

            <h1 style="text-align: center";><span class="promoted">***</span>Cart<span class="promoted">***</span></h1>   
            <?php
            if (empty($_SESSION['cart'])) {
                echo "<h2>Cart is empty</h2>";
            } else {
                $array = json_encode($_SESSION['cart']);
                // echo $array;
                $deco2 = json_decode($array, true);
                $deco = json_decode($array);
                ?>
                <table class="table" width='70%' align='center'>
                  
                        <tr>
                            <td>Product name</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td></td>
                        </tr>
                    
                    
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                    <script>
                        function ajde(id, kolicina) {

                            $.ajax({
                                type: "GET",

                                url: "korpa_promjeni.php",

                                data: {"article_id": id, "kolicina": kolicina}, //saslje ali onda moras get kolicina staviti
                                success: function () {
                                    alert('ouhyeah');
                                },
                                error: function () {
                                    alert('ne');
                                }
                            });

                            location.reload();



                        }

                    </script>
                    <?php
                    $totals = 0.00;
                    foreach ($deco as $value) {     //prolaz kroz ove
                        $query = "SELECT * FROM articles WHERE article_id=$value->id";

                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) == 0) {
                            echo "<p>Korpa je prazna!+" . $value->id . "</p>";
                        } else {
                            while ($row = mysqli_fetch_array($result)) {

                                $totals = $totals + $row['price'] * $value->qty;
                                ?>
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><input style="text-align:center; height:100%;" type="text" onchange="ajde(<?php echo $value->id ?>, this.value)"  value=<?php echo $value->qty; ?> />

                                    <td><?php echo $row['price']; ?> $</td>

                                    <td style="text-align:center"><div class="round"><a href="korpa_izbaci.php?redni_br=<?php echo $value->id; ?>">X</a></div></td>
                                </tr>                     

                                <?php
                            }
                        }
                    }
                    ?>                            

                    <tr>
                        <td colspan="5">
                            <span class="spantotal">  Total price <span style="color:red;font-size:18px;"> <?php echo $totals; ?></span> $  </span>
                        </td>                       
                    </tr>

                    <tr>
                        <td colspan="5">  

                            <form method="post" action="place_order.php">   
                                <input type="hidden" name="price" value=<?php echo $totals; ?> /> 
                                <input class='Button2' name='submit' type='submit' value='Order'/>
                            </form>
                        </td>
                    </tr>

                     
                </table>
                <?php
            }
            ?>   
        </div>
    </body>
</html>

