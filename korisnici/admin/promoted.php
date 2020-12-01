<?php

function promoted_articles() {
    $conn = konekcija();
    $promote = "";
    $queryshop = "SELECT * FROM articles where shop_window=1;";
    $result = mysqli_query($conn, $queryshop);

    while ($row3 = mysqli_fetch_array($result)) {
        $name = $row3['name'];
        $article_id = $row3['article_id'];

        $promote .= "<div class='listitem'>
                <div class='listitemname'>
                 <p>$name </p>
                </div>
                <div class='listitembutton'>  
                <a href='uredi_pocetnu_baza.php?id=$article_id&set=0'>            
                    <button class='buttonfancy'>               
                    X                    
                    </button>     
                </a>    
                </div>
            </div>";
    }
    return $promote;
}
?>

<script>

</script>