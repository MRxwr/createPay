<?php
require ("includes/config.php");
require ("includes/translate.php");

if( isset($_COOKIE[$cookieSession."A"]) ){
	header("Location: index");
}

if( isset ($_GET["error"]) ) {
  if( $_GET["error"] === "p" ) { 
    $errormsg = "Please enter details correctly.";
  }elseif ($_GET["error"] === "e" ) { 
    $errormsg = "Please enter email correctly."; 
  } 
} 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
    />
    <title><?php echo $settingsTitle ?> - Dashboard</title>
    <meta
      name="description"
      content="Droopy is a Dashboard & Admin Site Responsive Template by hencework."
    />
    <meta
      name="keywords"
      content="admin, admin dashboard, admin template, cms, crm, Droopy Admin, Droopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application"
    />
    <meta name="author" content="hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <!-- vector map CSS -->
    <link
      href="../vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css"
      rel="stylesheet"
      type="text/css"
    />

    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <!--Preloader-->
    <div class="preloader-it">
      <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->

    <div class="wrapper box-layout pa-0">
      <header class="sp-header">
        <div class="sp-logo-wrap pull-left">
          <a href="index">
            <img class="brand-img mr-10" src="../logos/<?php echo $settingslogo ?>" alt="brand" />
            <span class="brand-text"
              ><span style="font-size: 22px;"><?php echo $settingsTitle ?></span></span
            >
          </a>
        </div>
        <div class="clearfix"></div>
      </header>

      <!-- Main Content -->
      <div class="page-wrapper pa-0 ma-0 auth-page">
        <div class="container-fluid">
          <!-- Row -->
          <div class="table-struct full-width full-height">
            <div class="table-cell vertical-align-middle auth-form-wrap">
              <div class="auth-form ml-auto mr-auto no-float">
                <div class="row">
                  <div class="col-sm-12 col-xs-12">
                    <div class="mb-30">
                      <h3 class="text-center txt-dark mb-10">
                        Sign in to 
                        <b>
                        <?php echo $settingsTitle ?>
                        </b>
                      </h3>
                      <h6 class="text-center nonecase-font txt-grey">
                        Enter your details below
                      </h6>
                      <?php 
											if ( isset($_GET["temp"]) )
											{
												?>
                      <div class="text-center" style="color: red;">
                        <?php echo $errormsg ?>
                      </div>
                      <?php
											}
												?>
                    </div>
                    <div class="form-wrap">
                      <form action="includes/logindb.php" method="post">
                        <div class="form-group">
                          <label
                            class="control-label mb-10"
                            for="exampleInputEmail_2"
                            >Email address</label
                          >
                          <?php if ( isset($_GET["error"]) AND $_GET["error"] == "e" )
													{
														?>
                          <div style="color: red;"><?php echo $errormsg ?></div>
                          <?php
													}
													?>
                          <input
                            type="email"
                            name="email"
                            class="form-control"
                            required=""
                            id="exampleInputEmail_2"
                            placeholder="Enter email"
                          />
                        </div>
                        <div class="form-group">
                          <label
                            class="pull-left control-label mb-10"
                            for="exampleInputpwd_2"
                            >Password</label
                          >
                          <div class="clearfix">
                            <?php if ( isset($_GET["error"]) AND $_GET["error"] == "p" )
													{
														?>
                            <div style="color: red;">
                              <?php echo $errormsg ?>
                            </div>
                            <?php
													}
													?>
                          </div>
                          <input
                            type="password"
                            name="password"
                            class="form-control"
                            required=""
                            id="exampleInputpwd_2"
                            placeholder="Enter pwd"
                          />
                        </div>

                        <div class="form-group">
                          <div
                            class="checkbox checkbox-primary pr-10 pull-left"
                          >
                            <input
                              id="checkbox_2"
                              type="checkbox"
                            />
                            <label for="checkbox_2"> Keep me logged in</label>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                        <div class="form-group text-center">
                          <button
                            type="submit"
                            class="btn btn-danger btn-rounded"
                          >
                            sign in
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /Row -->
        </div>
      </div>
      <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->

    <!-- JavaScript -->

    <!-- jQuery -->
    <script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
  </body>
</html>
