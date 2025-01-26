<?php
if( isset($data) && is_array($data ) && !empty($data) ){
    for( $i = 0; $i < count($data); $i++ ){
        $category = selectDB("categories","`enTitle` LIKE '%{$data[$i]["category"]}%'");
        $brand = selectDB("brands","`enTitle` LIKE '%{$data[$i]["Brand"]}%'");
        $product = array(
            "enTitle" => $data[$i]["ItemName"],
            "arTitle" => $data[$i]["ItemName"],
            "enDetails" => "",
            "arDetails" => "",
            "categoryId" => $category[0]["id"],
            "brandId" => $brand[0]["id"],
            "hidden" => 1,
            "type" => 1,
            "extras" => "null",
        );
        if(insertDB("products",$product)){
            $productId = $dbconnect->insert_id;
        }else{
            echo outputError(array("msg" => "Failed to add product"));
        }

        $category = array(
            "productId" => $productId,
            "categoryId" => $category[0]["id"]
        );
        if( insertDB("category_products",$category) ){
        }else{
            echo outputError(array("msg" => "Failed to add product category"));
        }

        $variant = array(
            "productId" => $productId,
            "enTitle" => "",
            "arTitle" => "",
            "attribute" => "",
            "price" => "",
            "quantity" => $data[$i]["Qty"],
            "sku" => $data[$i]["Item"],
            "cost" => $data[$i]["KD"]
        );
        if( insertDB("attributes_products",$variant) ){
        }else{
            echo outputError(array("msg" => "Failed to add product variant"));
        }
    }
}
?>