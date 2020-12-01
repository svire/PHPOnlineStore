<?php

function similar($cat,$name,$cat_name) {
    $conn = konekcija();
    $catname= strtolower($cat_name);
    $names="'".$name."'";
    $similar = "<div class='similar'>";     
    $queryshop = "SELECT * FROM articles where category=".$cat." AND name not like ".$names;
   
   
    $result = mysqli_query($conn, $queryshop);

    while ($row3 = mysqli_fetch_array($result)) {
        $name = $row3['name'];
        $price=$row3['price'];
        $article_id = $row3['article_id'];
        $imagePath = $row3['image_url'];
        $similar .= "<div  class='sim_cont'>
                 <div style='flex:40% 0;height:100%;'>
                    <div class='div_pic' style='width:95%'><img   class='div_image' src='$imagePath' ></div>
                 </div>
                 <div  style='flex:60% 0;height:100%;  display:flex; flex-direction:column;'>
                 <a class='sim_link' href='info.php?article_id=$article_id'>$name</a>
                 <div class='sim_cat'  >$catname</div>
                 <div class='sim_price'>$ $price</div>
                 </div>
                 </div>";
    }  
    $similar.="</div>";
    return $similar;
   // return $queryshop;
}


/*
<?php

function similar($cat,$name,$cat_name) {
    $conn = konekcija();
    $catname= strtolower($cat_name);
    $names="'".$name."'";
    $similar = "";     
    $queryshop = "SELECT * FROM articles where category=".$cat." AND name not like ".$names;
   
   
    $result = mysqli_query($conn, $queryshop);

    while ($row3 = mysqli_fetch_array($result)) {
        $name = $row3['name'];
        $price=$row3['price'];
        $article_id = $row3['article_id'];
        $imagePath = $row3['image_url'];
        $similar .= "<div class='similar'>
                 <div  class='sim_cont'>
                 <div style='flex:40% 0;height:100%;'>
                    <div class='div_pic' style='width:95%'><img   class='div_image' src='$imagePath' ></div>
                 </div>
                 <div  style='flex:60% 0;height:100%;  display:flex; flex-direction:column;'>
                 <a class='sim_link' href='info.php?article_id=.$article_id'>$name</a>
                 <div class='sim_cat'  >$catname</div>
                 <div class='sim_price'>$ $price</div>
                 </div>
                 </div>
            </div>";
    }  
    return $similar;
   // return $queryshop;
}

*/
?>
 
 