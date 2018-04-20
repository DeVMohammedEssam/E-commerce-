<?php 
    //echos title if exists .. default title if not
    function title_printer(){
        global $title;
        if(isset($title)){
            echo $title;
        }else echo "EG Handmades";
    }


?>