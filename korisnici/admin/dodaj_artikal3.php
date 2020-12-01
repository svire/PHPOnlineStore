<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <style>


        </style>
        <script type="text/javascript">
              function forma() {
                var naziv = document.getElementById('naziv');
                var description = document.getElementById('opiss');
                var cena = document.getElementById('cena');
                // var garancija=document.getELementById('garancija');
                var garancija = document.getElementById('garancija').value.trim();
                var kolicina = document.getElementById('kolicina').value.trim();
                if (naziv.value.trim() === '') {
                    naziv.focus();
                    naziv.classList.add("input_warning");
                    document.getElementById('poruka1').innerHTML = 'Enter name of the product.';
                    return false
                } else if (description.value.trim() === '') {

                    description.focus();
                    naziv.classList.add("input_warning");
                    document.getElementById('poruka2').innerHTML = 'Enter product description!';
                    return false
                } else if (cena.value.trim() === '') {
                    cena.focus();
                    cena.classList.add("input_warning");
                    document.getElementById('poruka3').innerHTML = 'Enter price!';
                    return false
                }
                if (garancija == '') {
                    //alert('aaa');
                    document.getElementById('garancija').focus();
                    document.getElementById('poruka4').innerHTML = 'Enter warrany duration!';
                    return false
                }
                /*
                 if (!/^[0-9]+$/.test(garancija)) {
                 alert('aaa');
                 document.getElementById('garancija').focus();
                 msg.innerHTML = 'Samo brojevi mogu biti u garanciji!';
                 return false
                 }
                 */
                if (kolicina == '') {
                    alert('aaa');
                    document.getElementById('kolicina').focus();
                    document.getElementById('poruka5').innerHTML = 'Enter quantity!';
                    return false
                }
                return true
            }
        </script> 
    </head>

    <body>
<?php //include 'admin_header.php';  ?>
        <h1 class="nicehead" style="text-align: center"><span class="promoted">***</span>Add product<span class="promoted">***</span></h1>
        <div class="admin_central">      
<?php
if (isset($_GET['msg'])) {
    echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
}
if (isset($_GET['message'])) {
    echo "<h3 style='text-align:center;'>" . $_GET['message'] . "</h3>";
}
?>
            <div id="infoMsg" style="text-align: center;font-size: 18px;color:red;"></div>

            <form enctype="multipart/form-data" action="aa2.php" method="post" >
                <div class="admin_form">
                    <div   class="formtwoitem" style="   flex:100%;min-height:180px; display:flex;flex-direction:row;   align-items:flex-start;  ">
                        <div  style=' display:flex;flex-direction:column; '  > 
                            <label class="Label">Upload picture</label>
                            <input  style='margin-top:20px;' name="fileToUpload" type="file" id="fileToUpload" />
                            <div style='width:100%; height:120px;'>
                                <div style=' width:100%;height:100px;display:flex;flex-direction:row;'>
<?php
session_start();

if (empty($_SESSION['pic_alo'])) {
    echo "<h3 style='margin-top:20px;'>Upload photos...</h3>";
} else {
    $neki = $_SESSION['pic_alo'];  //[0];                           
    //echo $neki[0];
    //echo '<br/>';
    for ($i = 0; $i < count($_SESSION['pic_alo']); $i++) {
        //echo $_SESSION['pic_alo'][$i].'<br/>';  
        ?>
                                            <div style='height:98%;width:100px;margin:10px;'>
                                                <img style='object-fit:contain; border:1px dotted gray;' src="<?php echo $_SESSION['pic_alo'][$i]; ?>" width="100%" height="100%"  />
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div> 


                    <div align='center'>
                        <input type='submit' class='Button' value='UPLOAD ' style='width:20%;text-align:center;' />
                    </div> 
            </form>
        </div>



        <form enctype="multipart/form-data" action="dodaj_artikal_baza.php" method="post" onsubmit="return forma()">
            <div class="admin_form">
                <div class="formtwoitem" style="flex:50%;">
                    <div>
                        <div class="TextInputs">
                            <label class="Label">Name</label>
                            <input class="InputField" name="naziv" type="text" id="naziv"   />
                            <div class="InputError" id="poruka1"></div>
                        </div>        
                    </div>
                    <div>
                        <div class="TextInputs">
                            <label class="Label">Category</label>
                            <select class="selection" name="kategorija">                                    
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
                            <textarea id="opiss"  name="opis" type="text" style="min-height:140px; border-radius:5px;font-size:large;" ></textarea>  
                            <div class="InputError" id="poruka2"></div>
                            <input type="hidden" value="<?php echo $row['image_url']; ?>" name="slika"/>
                        </div>             
                    </div>
                </div>

                <div class="formtwoitem" style="flex:33% 0;">
                    <div>
                        <div class="TextInputs">
                            <label class="Label">Price</label>
                            <input class="InputField" name="cena" type="text" id="cena"     />
                            <div class="InputError" id="poruka3"></div>
                        </div>  
                    </div>

                    <div>
                        <div class="TextInputs">
                            <label class="Label">Warranty(days)</label>
                            <input class="InputField" name="garancija" type="text" id="garancija"    />
                            <div class="InputError" id="poruka4"></div>
                        </div>  
                    </div>
                    <div>
                        <div class="TextInputs">
                            <label class="Label">In stock(type number)</label>

                            <input class="InputField" id='kolicina' name="kolicina" type="text"    />
                            <div class="InputError" id="poruka5"></div>

                        </div>  
                    </div>   
                </div>
                <div   class="formtwoitem" style="flex:100%;min-height:150px;  ">
                    <div   style=' display:flex;flex-direction:column;justify-content:center;'>

                        <label class="Label">Upload profile picture</label>
                        <div class='upload_image'  >
                            <input style='margin-left:20px;' name="fileToUpload" onclick=alert('amahe') type="file" id="fileToUpload" />
                        </div> 
                    </div>
                </div>
                <div align='center'>
                    <input type='submit' class='Button' value='Update ' style='width:30%;text-align:center;' />
                </div> 
        </form>

    </div>
</body>
</html>
