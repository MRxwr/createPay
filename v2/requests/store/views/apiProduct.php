<?php
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

if( !isset($_POST["id"]) || empty($_POST["id"]) ){
    echo outputError(array("msg" => errorResponse($lang,"Please set product id","يرجى تحديد رقم المنتج") ));die();
}else{
    if( $product = selectDB2New("`id`,`{$titleDB}` AS `title`, `{$detailsDB}` AS `details`, `{$preorderDB}` AS `flag`, `discountType`, `discount`, `video`, CASE WHEN FIND_IN_SET(id, '{$favouritesList}') > 0 THEN 1 ELSE 0 END AS `isLiked`,`brandId`,`categoryId`","products",[$_POST["id"]],"`id` = ? AND `hidden` = '1' AND `status` = '0'","") ){
        if( $images = selectDB2("imageurl","images","`productId` = '{$_POST["id"]}'") ){
            for( $i = 0; $i < sizeof($images); $i++ ){
                $images[$i] = $images[$i]["imageurl"];
            }
        }else{
            $images = array();
        }
        $product[0]["images"] = $images;
        if( $category = selectDB2New("`{$titleDB}` AS `title`","categories",[$product[0]["categoryId"]],"`id` = ?","") ){
            $product[0]["category"] = $category[0]["title"];
        }else{
            $product[0]["category"] = "";
        }
        if( $brand = selectDB2New("`{$titleDB}` AS `title`","brands",[$product[0]["brandId"]],"`id` = ?","") ){
            $product[0]["brand"] = $brand[0]["title"];
        }else{
            $product[0]["brand"] = "";
        }
        if( $attibutes = selectDB2New("`id`,`{$titleDB}` AS `title`, `price`, `quantity`, `sku`","attributes_products",[$_POST["id"]],"`productId` = ? AND `status` = '0' AND `hidden` = '0'","") ){
            $product[0]["variant"] = "";
            if( $attributeVariant = selectDB("attributes_variants","`productId` = '{$_POST["id"]}'","") ){
                if( $variantTitle = selectDB2New("`{$titleDB}` AS `title`","attributes",[$attributeVariant[0]["attributeId"]],"`id` = ?","") ){
                    for( $i = 0; $i < sizeof($variantTitle); $i++ ){
                        if( $i > 0 ){
                            $product[0]["variant"] .= " / ";
                        }
                        $product[0]["variant"] .= $variantTitle[$i]["title"];
                    }
                }
            }
            for ( $i=0 ; $i< sizeof($attibutes); $i++){
                if( $product[0]["discountType"] == 0 ){
                    $attibutes[$i]["price"] = $attibutes[$i]["price"] * ( (100 - $product[0]["discount"]) / 100 );
                }else{
                    $attibutes[$i]["price"] = $attibutes[$i]["price"] - $product[0]["discount"];
                }
                $attibutes[$i]["price"] = numTo3Float($attibutes[$i]["price"]);
            }
            $product[0]["attributes"] = $attibutes;
            unset($product[0]["brandId"]);
            unset($product[0]["categoryId"]);
            echo outputData($product);die();
        }else{
            echo outputError(array("msg" => errorResponse($lang,"No products found","لم يتم العثور على منتجات") ));die();
        }
    }else{
        echo outputError(array("msg" => errorResponse($lang,"No products found","لم يتم العثور على منتجات") ));die();
    }
}
?>