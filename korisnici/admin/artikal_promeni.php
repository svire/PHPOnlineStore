<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <style>


        </style>
        <script type="text/javascript">
            function forma() {
                // alert('alo');

                var naziv = document.getElementById('naziv');
                var description = document.getElementById('opiss');
                var cena = document.getElementById('cena');
                var garancija = document.getElementById('garancija');
                var kolicina = document.getELementById('kolicina');


                if (naziv.value.trim() == '') {
                    naziv.focus();
                    naziv.classList.add("input_warning");
                    document.getElementById('poruka1').innerHTML = 'Enter name of the product.';
                    return false
                } else if (description.value.trim() === '') {

                    description.focus();
                    naziv.classList.add("input_warning");
                    document.getElementById('poruka2').innerHTML = 'Enter product description!';
                    return false
                }
                /*
                 else if(description.innerHTML.trim()===''){
                 description.focus();
                 naziv.classList.add("input_warning");  
                 document.getElementById('poruka2').innerHTML='Enter product description!';
                 return false
                 }*/
                else if (cena.value.trim() === '') {
                    cena.focus();
                    cena.classList.add("input_warning");
                    document.getElementById('poruka3').innerHTML = 'Enter price!';
                    return false
                } else if (garancija.value.trim() === '') {
                    garancija.focus();
                    garancija.classList.add("input_warning");
                    document.getElementById('poruka4').innerHTML = 'Enter warranty duration!';
                    return false
                } else if (kolicina.value.trim() === '') {
                    kolicina.focus();
                    kolicina.classList.add("input_warning");
                    document.getElementById('poruka5').innerHTML = 'Enter quantity!';
                    return false
                }



                return true
            }
            //https://i.pinimg.com/originals/c9/f5/24/c9f5247bc39944aa624a6678906f5889.png
            //http://localhost:1234/phponlinestore/korisnici/user/complaint.php?order_id=4&order_date=2020-11-11&order_time=01:40:29&name=HiLetgo%20ESP-WROOM-32%20ESP32%20ESP-32S%20Dev%20Board%202.4GHz%20Dual-Mode%20WiFi&article_id=6&quantity=1
        </script> 
    </head>

    <body>
<?php //include 'admin_header.php';  ?>
        <h1 class="nicehead" style="text-align: center";><span class="promoted">***</span>Update product<span class="promoted">***</span></h1> 

        <div class="admin_central">             
        <?php
        if (isset($_GET['msg'])) {
            echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
        }
        if (!isset($_GET['article_id'])) {
            die('Nema article_id-a!');
        }
        $name = 'Arduino Leonardo with Headers Microcontroller';
        ?>
            <?php
            include '../../baza.inc';
            $conn = konekcija();
            $query = "SELECT * FROM articles a INNER JOIN category c ON a.category=c.category_id WHERE article_id=" . $_GET['article_id'];
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            ?>
            <form   method="post" action="artikal_promeni_baza.php?article_id=<?php echo $_GET['article_id']; ?>" onsubmit="return forma()" >

                <div class="admin_form">
                    <div class="formtwoitem" style="flex:50%;">
                        <div>
                            <div class="TextInputs">
                                <label class="Label">Name</label>
                                <input class="InputField" name="naziv" type="text" id="naziv" value="<?php echo $row['name']; ?>"   />
                                <div class="InputError" id="poruka1"></div>
                            </div>        
                        </div>
                        <div>
                            <div class="TextInputs">
                                <label class="Label">Category</label>
                                <select class="selection" name="kategorija">
<?php
$query1 = "SELECT * FROM category WHERE category_id=" . $row['category'];
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_array($result1);
echo "<option value=" . $row1['category_id'] . ">" . $row1['category_name'] . "</option>";
?>
                                    <option value="1">Microprocessors</option> 
                                    <option value="2">Sensors</option> 
                                    <option value="3">Microcontrollers</option> 
                                    <option value="4">Drones</option> 
                                </select>
                            </div>        
                        </div>
                    </div>
                    <div class="formtwoitem" style="flex:100%;min-height:200px; ;">
                        <div>
                            <div class="TextInputs">
                                <label class="Label">Change description</label>
                                <textarea id="opiss"  name="opis" type="text" style="min-height:140px; border-radius:5px;font-size:large;" ><?php echo $row['notes']; ?></textarea>  
                                <div class="InputError" id="poruka2"></div>
                                <input type="hidden" value="<?php echo $row['image_url']; ?>" name="slika"/>
                            </div>             
                        </div>
                    </div>

                    <div class="formtwoitem" style="flex:33% 0;">
                        <div>
                            <div class="TextInputs">
                                <label class="Label">Price</label>
                                <input class="InputField" name="cena" type="text" id="cena"  value="<?php echo $row['price']; ?>"    />
                                <div class="InputError" id="poruka3"></div>
                            </div>  
                        </div>

                        <div>
                            <div class="TextInputs">
                                <label class="Label">Warranty(days)</label>
                                <input class="InputField" name="garancija" type="text" id="garancija" value="<?php echo $row['warranty']; ?>"   />
                                <div class="InputError" id="poruka4"></div>
                            </div>  
                        </div>
                        <div>
                            <div class="TextInputs">
                                <label class="Label">In stock(type number)</label>
                                <input class="InputField" id='kolicina' name="kolicina" type="text" value="<?php echo $row['for_sale']; ?>"   />
                                <div class="InputError" id="poruka5"></div>
                            </div>  
                        </div>


                    </div>
                    <div align='center'>
                        <input type='submit' class='Button' value='Update ' style='width:30%;text-align:center;' />
                    </div>


            </form>
        </div>

    </div>



</body>
</html>