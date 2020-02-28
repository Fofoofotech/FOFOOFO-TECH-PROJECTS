<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Template">
    <meta name="keywords" content="admin dashboard, admin, flat, flat ui, ui kit, app, web app, responsive">
    <link rel="shortcut icon" href="media/img/ico/favicon.png">
    <title>themelock.com - Login</title>

    <!-- Base Styles -->
    <link href="media/css/font-awesome.css" rel="stylesheet"/>
    <link href="media/css/style.css" rel="stylesheet">
    <link href="media/css/style-responsive.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->


</head>

  <body class="login-body">
<div class="login-container">
      <div class="login-logo">
          <img src="media/img/login_logo.png" alt=""/>
      </div>
     
      <h2 class="form-heading">login</h2>
      <?php if(isset($attempt_in)){ ?>
<div class="alert alert-danger text-center alert-sm">
  <?php
            if($attempt_in < 3){
                echo 'Invalid user name or password.';
            }else if($attempt_in =='11'){
                echo 'Invalid Code entered.';
            }else if($attempt_in =='120'){
                echo 'Suspended account.';
            }else if($attempt_in =='140'){
                echo 'Locked. Wait for 5min and try again.';
            }else if($attempt_in =='110'){
                echo 'User account locked.';
            }
         ?>
</div>
<?php } ?>
      <div class="log-row">
          <form class="form-signin" action="#">

              <?php $strip = $session->get('logincount');?>
              <input type="hidden" name="doLogin" id="doLogin" value="systemPingPass" />
              <input type="hidden" name="passager" value="<?php if(isset($attempt_in)){echo $strip;} ;?>" />

          <div class="login-wrap">
                  <input type="text" class="form-control" name="uname" placeholder="User ID" autocomplete="off">
                  <input type="password" class="form-control" name="pwd" placeholder="Password" autocomplete="off">
                  <img class="pull-left" style="margin-le:20%;margin-top:2px;" src="plugins/turing/turing.php" width="125" height="37" id="turingimg"> <i class="fa fa-refresh" style="margin-left:15px;cursor: pointer; font-size:2.2rem; margin-right:0px !important; margin-top:7px;" title="Refresh or Reload turing" onClick="var rightnow = new Date();document.images.turingimg.src='plugins/turing/turing.php?'+ rightnow.getTime();return false;" height="100"></i>
                  <input type="text" class="form-control" style="font-size:14px; margin-top: " placeholder="enter code..." name="txtcaptha" autocomplete="off">
                  <button class="btn btn-lg btn-success btn-block" type="submit" name="viewpage" value="signin">LOGIN</button>
                  <!-- <div class="login-social-link">
                      <a href="index.html" class="facebook">
                          Facebook
                      </a>
                      <a href="index.html" class="twitter">
                          Twitter
                      </a>
                  </div> -->
                  <label class="checkbox-custom check-success">
                      <input type="checkbox" value="remember-me" id="checkbox1"> <label for="checkbox1">Remember me</label>
                      <a class="pull-right" data-toggle="modal" href="#forgotPass"> Forgot Password?</a>
                  </label>

                  <div class="registration">
                      Don't have an account yet?
                      <a class="" href="registration.html">
                          Create an account
                      </a>
                  </div>

              </div>

              <!-- Modal -->
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="forgotPass" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Forgot Password ?</h4>
                          </div>
                          <div class="modal-body">
                              <p>Enter your e-mail address below to reset your password.</p>
                              <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                              <button class="btn btn-success" type="button">Submit</button>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- modal -->

          </form>
      </div></div>

<!-- <img src="http://www.ten28.com/fref.jpg"> -->
      <!--jquery-1.10.2.min-->
      <script src="media/js/jquery-1.11.1.min.js"></script>
      <!--Bootstrap Js-->
      <script src="media/js/bootstrap.min.js"></script>
      <script src="media/js/jrespond..min.js"></script>

  </body>
</html>
