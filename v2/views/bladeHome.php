<?php require_once("template/banners.php"); ?>

    <h2 class="mt-4">Categories</h2>
    <div class="category-slider swiper">
      <div class="swiper-wrapper">
        <?php $categories = selectDB("categories", "`status` = '0' ORDER BY `rank` ASC"); ?>
        <?php foreach ($categories as $category) { ?>
          <div class="swiper-slide" role="group" aria-label="1 / 3" style="margin-right: 20px;">
            <?php echo direction($category['enTitle'], $category['arTitle']); ?><p></p>
            <img src="logos/<?php echo $category['imageurl']; ?>" alt="<?php echo $category['enTitle']; ?>" style="height:75px;width:75px" class="me-2">
          </div>
        <?php } ?>
      </div>
    </div>
    
    <h2 class="mt-4">Brands</h2>
    <div class="brand-slider swiper">
      <div class="swiper-wrapper">
        <?php $brands = selectDB("brands", "`status` = '0' ORDER BY `rank` ASC"); ?>
        <?php foreach ($brands as $brand) { ?>
          <div class="swiper-slide" role="group" aria-label="1 / 3" style="margin-right: 20px;">
            <?php echo direction($brand['enTitle'], $brand['arTitle']); ?><p></p>
            <img src="logos/<?php echo $brand['imageurl']; ?>" style="height:75px;width:75px" alt="<?php echo $brand['enTitle']; ?>" class="me-2">
          </div>
        <?php } ?>
      </div>
    </div>
    
    <h2 class="mt-4">Best Sellers</h2>
    <div class="row">
      <?php $best_sellers = selectDB("products", "`status` = '0' AND `bestSeller` = '1' ORDER BY RAND()"); ?>
      <?php foreach ($best_sellers as $product) {
      $image = selectDB("images", "`productId` = '{$product['id']}'"); 
      $attribute = selectDB("attributes_products", "`productId` = '{$product['id']}' ORDER BY `price` ASC LIMIT 1");
      ?>

        <div class="col-6 col-sm-3 col-md-4 col-lg-3 mb-4 position-relative">
          <div class="product-card">
            <img src="logos/<?php echo $image[0]['imageurl']; ?>" alt="<?php echo $product['enTitle']; ?>" class="w-100">
            <div class="position-absolute bottom-0 end-0" style="margin: 15px;margin-bottom: 100px;">
              <button class="btn btn-primary shadow rounded-circle" style="font-size: 20px;">+</button>
            </div>
            <div class="p-3">
              <h6><?php echo substr(direction($product['enTitle'], $product['arTitle']), 0, 20); ?></h6>
              <p class="mb-2"><?php echo $attribute[0]['price']; ?> KD</p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    
    <h2 class="mt-4">Recent</h2>
    <div class="row">
      <?php $recent = selectDB("products", "`status` = '0' AND `recent` = '1' ORDER BY RAND()"); ?>
      <?php foreach ($recent as $product) {
      $image = selectDB("images", "`productId` = '{$product['id']}'"); 
      $attribute = selectDB("attributes_products", "`productId` = '{$product['id']}' ORDER BY `price` ASC LIMIT 1");
      ?>

        <div class="col-6 col-sm-3 col-md-4 col-lg-3 mb-4 position-relative">
          <div class="product-card">
            <img src="logos/<?php echo $image[0]['imageurl']; ?>" alt="<?php echo $product['enTitle']; ?>" class="w-100">
            <div class="position-absolute bottom-0 end-0" style="margin: 15px;margin-bottom: 100px;">
              <button class="btn btn-primary shadow rounded-circle" style="font-size: 20px;">+</button>
            </div>
            <div class="p-3">
              <h6><?php echo substr(direction($product['enTitle'], $product['arTitle']), 0, 20); ?></h6>
              <p class="mb-2"><?php echo $attribute[0]['price']; ?> KD</p>
            </div>
          </div>
        </div> 
      <?php } ?>
    </div>