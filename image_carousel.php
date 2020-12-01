<script language="javascript">
    var current = 0;

    function navigate(direc) {

        var imagestring = document.getElementById('aro').value;
        var imagearray = imagestring.split(" ");
        var arraylength = imagearray.length - 1;
        var image = document.getElementById('imagec');

        if (arraylength == 0) {
            console.log('skip');
            alert('no more images');
        } else {
            if (direc == 1) {
                current = current - 1;
                if (current < 0) {
                    current = arraylength;
                }
            } else {
                current = current + 1;
                if (current > arraylength) {
                    current = 0;
                }
            }
            image.src = imagearray[current];
        }



    }

</script> 

<?php

function carousel($imagePath, $articleid) {
    $conn = konekcija();
    $imagearray = [];
    $queryimgs = 'select * from images where article_id=' . $articleid;
    $result = mysqli_query($conn, $queryimgs);
    while ($row = mysqli_fetch_array($result)) {

        array_push($imagearray, $row['naziv']);
    }

    $imploded = implode(' ', $imagearray);


    $carousel = "<div class='div_pic2' style=' margin-top:30px; width:100%;height:300px;position:relative;' >
        <div class='image_cont'>
            <img id='imagec' class='div_image2' src='$imagePath' >
            <input type='hidden'  id='aro' value='$imploded'/>
        </div>        
        <div class='image_carousel'>
          <div class='carousel_nav'>
            <div  onclick='navigate(1)'  class='next_time'>
              <
            </div>
          </div>
          <div onclick='navigate(2)' class='carousel_nav'>
            <div class='next_time'>
             >
            </div>
          </div>
        </div>   
        </div>";
    return $carousel;
}
?>
  

