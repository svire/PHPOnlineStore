<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <style>


        </style>

    </head>

    <body>

        <h1 class="nicehead" style="text-align: center"><span class="promoted">***</span>Add image<span class="promoted">***</span></h1>
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
                    <div   class="formtwoitem" style="   flex:100%;min-height:220px; display:flex;flex-direction:row;   align-items:flex-start;   ">
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
                        <input type='submit' class='Button' value='UPLOAD ' style='width:30%;text-align:center;' />
                    </div> 
            </form>


        </div>


    </body>
</html>
