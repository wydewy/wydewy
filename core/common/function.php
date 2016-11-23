<?php
function p($v){
    if(is_array($v)){
        print_r($v);
        echo '<br>';
    }else if(is_object($v)){
        print_r($v.'<br>');
    }else{
        echo $v.'<br>';
    }
}
?>
