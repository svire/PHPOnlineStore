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
    </head>
    <body>        
        <?php
        include "header.php";
        ?>
        <div class="central"> 
            <h2 style="text-align: center";><span class="promoted">***</span>Complaint<span class="promoted">***</span></h2>   

            <form method="POST" action="complaint_db.php">
                <div class="formtwo">
                    <div class="formtwoitem">
                        <div>                  
                            <div class="TextInputs">
                                <label class="Label">Order id</label>
                                <input class="InputField" name="order_id" value=<?php echo $_GET['order_id']; ?> readonly id="orderid" type='text'/>
                            </div>                   
                        </div>
                        <div>
                            <div class="TextInputs">
                                <label class="Label">Order date</label>
                                <input class="InputField" name="order_date" value=<?php echo $_GET['order_date']; ?> readonly id="orderdate" type='text'/>
                            </div>
                        </div>
                        <div>
                            <div class="TextInputs">
                                <label class="Label">Order time</label>
                                <input class="InputField" name="order_time" value=<?php echo $_GET['order_time']; ?> readonly id="ordertime" type='text'/>
                            </div>
                        </div>       

                    </div>
                    <?php
                    $name = $_GET['name'];
                    ?>
                    <div class="formtwoitem" >
                        <div style="flex:80%;">
                            <div class="TextInputs">
                                <label class="Label">Product name</label>
                                <input class="InputField" name="name" value="<?php echo $name; ?>"" readonly  id="name" type='text'/>
                                <input type="hidden" name="article_id" value=<?php echo $_GET['article_id']; ?> id="article_id" type='text'/>
                            </div>
                        </div>
                        <div style="flex:20%;">
                            <div class="TextInputs"  >
                                <label class="Label">Qty</label>
                                <input class="InputField"  name="quantity" value=<?php echo $_GET['quantity']; ?> readonly id="quantity" type='text'/>
                            </div>
                        </div>                
                    </div>          
                    <div>

                    </div>
                    <div class="formtwoitem" style="min-height:200px;" >
                        <div style="flex:10%;">
                            <div class="TextInputs">
                                <label class="Label">Write complaint</label>
                                <textarea  name="complaint" style="min-height:100px; border-radius:5px;font-size:large;" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="formtwoitem" style="height:100px;justify-content:center;align-items:center;">
                        <input class='Button2' name='submit' type='submit' value='Send'/>  
                    </div>
                </div>
            </form>





    </body>
</html>

<?php
if (isset($_GET['msg'])) {
    echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
}
?>   
<div id="infoMsg" style="text-align: center;font-size: 18px;color:red;"></div>