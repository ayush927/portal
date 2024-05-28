<?php
 function star_rating($stars){
     $render_ster = ' <i style="color: #CFB53B;" class="fa fa-star" aria-hidden="true"></i> ';
     $output = "";
    for($i = 0; $i < $stars;$i++){
        $output .= $render_ster;
    }
    return $output;
 }
?>