<?php
if( $Services = selectDB2("`id`,{$titleDB} AS `title`,`imageurl`, {$detailsDB} AS `details`, `whatsappMsg`, `whatsappNumber`","services","`status` = '0' AND `hidden` = '1' ORDER BY `rank` ASC") ){
    $response["services"] = $Services;
}else{
    $response["services"] = array();
}

echo outputData($response);die();
?>