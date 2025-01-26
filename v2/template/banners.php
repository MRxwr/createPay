<div class="banner-slider swiper">
  <div class="swiper-wrapper">
    <?php $banners = selectDB("banners", "`status` = '0' ORDER BY `rank` ASC"); ?>
    <?php foreach ($banners as $banner) { ?>
      <div class="swiper-slide" style="background-image: url('logos/<?php echo $banner['image']; ?>')"></div>
    <?php } ?>
  </div>
  <div class="swiper-pagination"></div>
</div>