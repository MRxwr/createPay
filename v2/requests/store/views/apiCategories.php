<?php
if( $categories = selectDB2("`id`,{$titleDB} AS `title`,`imageurl`,`header`","categories","`status` = '0' AND `hidden` = '1' ORDER BY `rank` ASC") ){
    $response["categories"] = $categories;
}else{
    $response["categories"] = array();
}

echo outputData($response);die();
?>