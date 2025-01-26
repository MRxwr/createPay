<?php
if( $brands = selectDB2("`id`,{$titleDB} AS `title`,`imageurl`,`header`","brands","`status` = '0' AND `hidden` = '1' ORDER BY `rank` ASC") ){
    $response["brands"] = $brands;
}else{
    $response["brands"] = array();
}

echo outputData($response);die();
?>