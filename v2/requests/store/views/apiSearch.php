<?php
$where = "";
if( isset($_POST["categoryId"]) && !empty($_POST["categoryId"]) ){
    $categories = selectDB2New("`productId`","category_products",[$_POST["categoryId"]],"`categoryId` = ?","");
    $productsList = array();
    for( $i = 0; $i < sizeof($categories); $i++ ){
        $productsList[] = $categories[$i]["productId"];
    }
    if ( !empty($productsList) ){
        $productsList = implode(",",$productsList);
        $where .= " AND t.id IN ({$productsList})";
    }else{
        echo outputError(array("msg" => errorResponse($lang,"No products found","لم يتم العثور على منتجات") ));die();
    }
}else{
    $where .= " AND t.id != '0'";
}
if( isset($_POST["brandId"]) && !empty($_POST["brandId"]) ){
    $where .= " AND t.brandId LIKE {$_POST["brandId"]}";
}else{
    $where .= " AND t.brandId != '0'"; 
}
if( isset($_POST["keyword"]) && !empty($_POST["keyword"]) ){
    $where .= " AND (t.enTitle LIKE '%{$_POST["keyword"]}%' OR t.arTitle LIKE '%{$_POST["keyword"]}%')";
}
if( $user = selectDBNew("users",[$token],"`keepMeAlive` = ?","") ){
    $favouritesList = "";
    $favourites = json_decode($user[0]["favo"], true);
    if (is_array($favourites)) {
        $favouritesList = implode(",", array_map('intval', $favourites));
    } else {
        $favouritesList = "";
    }
}else{
    $favouritesList = "";
}
$joinData["select"] = ["t.id","t5.id AS `attributeId`","t.{$titleDB} AS `productTitle`","t2.{$titleDB} AS `categoryTitle`","t3.{$titleDB} AS `brandTitle`","t4.imageurl AS `image`","t.{$preorderDB} AS `flag`","t.discountType","t.discount","t5.quantity","FORMAT(t5.price, 3) AS `price`","CASE WHEN FIND_IN_SET(t.id, '{$favouritesList}') > 0 THEN 1 ELSE 0 END AS `isLiked`","FORMAT(CASE WHEN t.discountType = 0 THEN t5.price * ((100 - t.discount) / 100) ELSE t5.price - t.discount END, 3) AS `finalPrice`"];
$joinData["join"] = ["category_products","categories","brands","images","attributes_products"];
$joinData["on"] = ["t.id = t1.productId","t1.categoryId = t2.id","t.brandId = t3.id","t.id = t4.productId","t.id = t5.productId"];
if( $products = selectJoinDB("products", $joinData, "t.hidden = 1 AND t.status = 0 {$where} GROUP BY t.id ORDER BY t.id DESC") ){
    echo outputData($products);die();
}else{
    echo outputError(array("msg" => errorResponse($lang,"No products found","لم يتم العثور على منتجات") ));die();
}
?>