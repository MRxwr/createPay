<?php
if( $user = selectDBNew("users",[$token],"`keepMeAlive` = ?","") ){
    $favouritesList = "";
    $favourites = json_decode($user[0]["favo"], true);
    if (is_array($favourites)) {
        $favouritesList = implode(",", array_map('intval', $favourites));
    } else {
        $favouritesList = "";
    }
    if( $notifications = selectDB2("COUNT(`id`) AS `count`","notifications","`status` = '0' AND `userId` = '{$user[0]["id"]}'") ){
        $response["notifications"] = $notifications[0]["count"];
    }else{
        $response["notifications"] = 0;
    }
}else{
    $response["notifications"] = 0;
    $favouritesList = "";
}

if( $user = selectDBNew("users",[$token],"`keepMeAlive` = ?","") ){
    if( $cartItems = selectDB2("SUM(`quantity`) AS `quantity`","cart","`userId` = '{$user[0]["id"]}'") ){
        $response["cartItems"] = $cartItems[0]["quantity"];
    }else{
        $response["cartItems"] = 0;
    }
}else{
    $response["cartItems"] = 0;
}


if( $banners = selectDB2("`id`,`image`,`link`,`type`,`popup`","banners","`status` = '0' AND `hidden` = '1' ORDER BY `rank` ASC") ){
    $response["banners"] = $banners;
}else{
    $response["banners"] = array();
}

if( $categories = selectDB2("`id`,{$titleDB} AS `title`,`imageurl`,`header`","categories","`status` = '0' AND `hidden` = '1' ORDER BY `rank` ASC") ){
    $response["categories"] = $categories;
}else{
    $response["categories"] = array();
}

if( $brands = selectDB2("`id`,{$titleDB} AS `title`,`imageurl`,`header`","brands","`status` = '0' AND `hidden` = '1' ORDER BY `rank` ASC") ){
    $response["brands"] = $brands;
}else{
    $response["brands"] = array();
}

$joinData["select"] = ["t.id","t5.id AS `attributeId`","t.{$titleDB} AS `productTitle`","t2.{$titleDB} AS `categoryTitle`","t3.{$titleDB} AS `brandTitle`","t4.imageurl AS `image`","t.{$preorderDB} AS `flag`","t.discountType","t.discount","t5.quantity","FORMAT(t5.price, 3) AS `price`","CASE WHEN FIND_IN_SET(t.id, '{$favouritesList}') > 0 THEN 1 ELSE 0 END AS `isLiked`","FORMAT(CASE WHEN t.discountType = 0 THEN t5.price * ((100 - t.discount) / 100) ELSE t5.price - t.discount END, 3) AS `finalPrice`"];
$joinData["join"] = ["category_products","categories","brands","images","attributes_products"];
$joinData["on"] = ["t.id = t1.productId","t1.categoryId = t2.id","t.brandId = t3.id","t.id = t4.productId","t.id = t5.productId"];
if( $bestSellers = selectJoinDB("products", $joinData, "t.hidden = 1 AND t.status = 0 AND t.bestSeller = '1' GROUP BY t.id ORDER BY RAND() LIMIT 6") ){
    $response["bestSellers"] = $bestSellers;
}else{
    $response["bestSellers"] = array();
}

$joinData["select"] = ["t.id","t5.id AS `attributeId`","t.{$titleDB} AS `productTitle`","t2.{$titleDB} AS `categoryTitle`","t3.{$titleDB} AS `brandTitle`","t4.imageurl AS `image`","t.{$preorderDB} AS `flag`","t.discountType","t.discount","t5.quantity","FORMAT(t5.price, 3) AS `price`","CASE WHEN FIND_IN_SET(t.id, '{$favouritesList}') > 0 THEN 1 ELSE 0 END AS `isLiked`","FORMAT(CASE WHEN t.discountType = 0 THEN t5.price * ((100 - t.discount) / 100) ELSE t5.price - t.discount END, 3) AS `finalPrice`"];
$joinData["join"] = ["category_products","categories","brands","images","attributes_products"];
$joinData["on"] = ["t.id = t1.productId","t1.categoryId = t2.id","t.brandId = t3.id","t.id = t4.productId","t.id = t5.productId"];
if( $recent = selectJoinDB("products", $joinData, "t.hidden = 1 AND t.status = 0 AND t.recent = '1' GROUP BY t.id ORDER BY RAND() LIMIT 6") ){
    $response["recent"] = $recent;
}else{
    $response["recent"] = array();
}

echo outputData($response);die();
?>