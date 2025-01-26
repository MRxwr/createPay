<?php
if( isset($_GET["newId"]) && !empty($_GET["newId"]) ){
	if( selectDB("products","`id` = '{$_GET["newId"]}' AND `recent` = '0'") ){
		updateDB("products",array("recent"=>1),"`id` = '{$_GET["newId"]}'");
	}else{
		updateDB("products",array("recent"=>0),"`id` = '{$_GET["newId"]}'");
	}
	header("LOCATION: ?v=Product");
}
if( isset($_GET["bestId"]) && !empty($_GET["bestId"]) ){
	if( selectDB("products","`id` = '{$_GET["bestId"]}' AND `bestSeller` = '0'") ){
		updateDB("products",array("bestSeller"=>1),"`id` = '{$_GET["bestId"]}'");
	}else{
		updateDB("products",array("bestSeller"=>0),"`id` = '{$_GET["bestId"]}'");
	}
	header("LOCATION: ?v=Product");
}
if ( isset($_POST["subId"]) ){
	for ( $i = 0 ; $i < sizeof($_POST["subId"]) ; $i++ ){
		updateDB("products",array("subId"=>$_POST["subId"][$i]),"`id`= '{$_POST["ids"][$i]}'");
	}
}

?>
<form action="" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default card-view">
			<div class="panel-heading">
			<div class="pull-left" style="width: 100%;">
				<div class="row">
					<div class="col-xs-6">
						<h6 class="panel-title txt-dark"><?php echo direction("Products List","قائمة المنتجات") ?></h6>
					</div>
					<div class="col-xs-6 text-right">
						<a href="?v=ProductAction" class="btn btn-primary"><?php echo direction("Add Product","اضافة منتج") ?></a>
					</div>
				</div>
			</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
			<div class="panel-body row">
			<div class="table-wrap">
			<div class="table-responsive">
			<table class="table display responsive product-overview mb-30" id="myTable" <?php // id="myAjaxTable" ?>>
				<thead>
					<tr>
					<th>#</th>
					<th><?php echo direction("Order","ترتيب") ?></th>
					<th><?php echo direction("Image","صورة") ?></th>
					<th><?php echo direction("English Title","العنوان بالإنجليزي") ?></th>
					<th><?php echo direction("Arabic Title","العنوان بالعربي") ?></th>
					<th><?php echo direction("Action","الخيارات") ?></th>
					</tr>
				</thead>
				<tbody>
				<?php 
				if( $products = selectDB("products","`status` = '0' AND `hidden` != '2' ORDER BY `id` DESC") ){
					for( $i = 0; $i < sizeof($products); $i++ ){
						$counter = $i + 1;
						$image = selectDB("images","`productId` = '{$products[$i]["id"]}' ORDER BY `id` ASC LIMIT 1");
					if ( $products[$i]["hidden"] == 2 ){
						$icon = "fa fa-eye";
						$link = "?v={$_GET["v"]}&show={$products[$i]["id"]}";
						$hide = direction("Show","إظهار");
					}else{
						$icon = "fa fa-eye-slash";
						$link = "?v={$_GET["v"]}&hide={$products[$i]["id"]}";
						$hide = direction("Hide","إخفاء");
					}
					?>
					<tr>
						<td><?php echo str_pad($products[$i]["id"], 4, "0", STR_PAD_LEFT) ?></td>
						<td>
							<input name="subId[]" class="form-control" type="number" value="<?php echo $products[$i]["subId"] ?>">
							<input name="ids[]" class="form-control" type="hidden" value="<?php echo $products[$i]["id"] ?>">
						</td>
						<td><img src="../logos/<?php echo $image[0]["imageurl"] ?>" style="width: 75px; height: 75px;"></td>
						<td><?php echo $products[$i]["enTitle"] ?></td>
						<td><?php echo $products[$i]["arTitle"] ?></td>
						<td class="text-nowrap">
							<?php
								if ( $products[$i]["type"] == 0 ){
									echo $action = '<a href="?v=AttributesProducts&id='.$products[$i]["id"].'" class="font-18 txt-grey mr-10 pull-left" data-toggle="tooltip" data-placement="top" title="'.direction("Attributes","المنتجات").'"><i class="fa fa-sitemap"></i></a>';
								}
								if ( $products[$i]["collection"] == 1 ){
									echo $action = '<a href="?v=Collection&id='.$products[$i]["id"].'" class="font-18 txt-grey mr-10 pull-left" data-toggle="tooltip" data-placement="top" title="'.direction("Collection","التجميع").'"><i class="fa fa-object-group"></i></a>';
								}
								echo $action ='<a href="?v=ProductAction&id='.$products[$i]["id"].'" class="font-18 txt-grey mr-10 pull-left" data-toggle="tooltip" data-placement="top" title="'.direction("Edit","تعديل").'"><i class="zmdi zmdi-edit"></i></a>';
								if ( $products[$i]["hidden"] == 0 ){
									echo $action = '<a href="includes/products/delete.php?id='.$products[$i]["id"].'" class="font-18 txt-grey mr-10 pull-left" data-toggle="tooltip" data-placement="top" title="'.$hide.'"><i class="fa fa-eye-slash"></i></a>';
								}else{
									echo $action = '<a href="includes/products/delete.php?id='.$products[$i]["id"].'&show=1" class="font-18 txt-grey mr-10 pull-left" data-toggle="tooltip" data-placement="top" title="'.$hide.'"><i class="fa fa-eye"></i></a>';
								}
								echo $action = '<a href="includes/products/delete.php?id='.$products[$i]["id"].'&forceDelete=1" class="font-18 txt-grey mr-10 pull-left" data-toggle="tooltip" data-placement="top" title="'.direction("Delete","حذف").'"><i class="fa fa-times"></i></a>';
								if( $products[$i]["bestSeller"] == 1 ){
									$color = "txt-success";
								}else{
									$color = "txt-grey";
								}
								echo $action = '<a href="?v=Product&bestId='.$products[$i]["id"].'" class="font-18 '.$color.' mr-10 pull-left" data-toggle="tooltip" data-placement="top" title="'.direction("Bestseller","الأكثر مبيعا").'"><i class="fa fa-usd"></i></a>';
								if( $products[$i]["recent"] == 1 ){
									$color = "txt-success";
								}else{
									$color = "txt-grey";
								}
								echo $action = '<a href="?v=Product&newId='.$products[$i]["id"].'" class="font-18 '.$color.' mr-10 pull-left" data-toggle="tooltip" data-placement="top" title="'.direction("Recent","جديدنا").'"><i class="fa fa-plus-square"></i></a>';
							?>
						</td>
					</tr>
					<?php
					}
				}
				?>
				</tbody>
			</table>
			</div>
			</div>	
			</div>	
			</div>
			</div>
		</div>
	</div>
	<input type="submit" value="submit" />
</form>