<!DOCTYPE html>
<html lang="en">
<?php require("template/header.php");
require ("includes/checksouthead.php"); ?>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper  theme-1-active pimary-color-green">
		
		<!-- Top Menu Items -->
		<?php require ("template/navbar.php") ?>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<?php require("template/leftSideBar.php") ?>
		<!-- /Left Sidebar Menu -->
	
		<!-- Right Sidebar Backdrop -->
		<div class="right-sidebar-backdrop"></div>
		<!-- /Right Sidebar Backdrop -->
        
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				<!-- Title -->
				<div class="row heading-bg">
				<a href="add-products.php?act=add"><button class="btn  btn-primary btn-rounded"><?php echo $Add_Product ?></button></a>
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark"><?php echo $Products ?></h5>
					</div>
				</div>
				<!-- /Title -->
				
				<!-- Product Row One -->
				<?php require ("template/products/view.php"); ?>
				<!-- /Product Row Four -->
				
			</div>
			
			<!-- Footer -->
			<?php require("template/footer.php") ?>
			<!-- /Footer -->
			
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- Data table JavaScript -->
	<script src="../vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="dist/js/productorders-data.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>

	<!-- Owl JavaScript -->
	<script src="../vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Sweet-Alert  -->
	<script src="../vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
	<script src="dist/js/sweetalert-data.js"></script>
		
	<!-- Switchery JavaScript -->
	<script src="../vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
		
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	
</body>

</html>
