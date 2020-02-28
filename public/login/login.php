<!DOCTYPE html><html lang="en">
  
<!-- Mirrored from foxythemes.net/preview/products/maisonnette/pages-login.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jan 2020 00:58:06 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="media/assets/img/favicon.html">
    <title>F-Pay</title>
    <link rel="stylesheet" type="text/css" href="media/assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="media/assets/lib/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="media/assets/lib/theme-switcher/theme-switcher.min.css"/><link type="text/css" href="media/assets/css/app.css" rel="stylesheet">  </head>
  <body class="mai-splash-screen">
    <div class="mai-wrapper mai-login">
      <div class="main-content container">
        <div class="splash-container row">
          <div class="col-md-6 user-message"><span class="splash-message text-right">Hello!<br> is good to<br> see you again</span><span class="alternative-message text-right">Don't have an account? <a href="pages-sign-up.html">Sign Up</a></span></div>
          
          <div class="col-md-6 form-message"><img class="logo-img mb-4" src="media/assets/img/fofoofopay1.png" alt="F-Pay" width="169" height="28"><span class="splash-description text-center mt-5 mb-5">Login to your account</span>


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




            <form>

              
                      <?php $strip = $session->get('logincount');?>
                             <input type="hidden" name="doLogin" id="doLogin" value="systemPingPass" />
                              <input type="hidden" name="passager" value="<?php if(isset($attempt_in)){echo $strip;} ;?>" />



              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend"><i class="icon s7-user"></i></div>
                  <input class="form-control" name="uname"  id="username" type="text" placeholder="Username" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend"><i class="icon s7-lock"></i></div>
                  <input class="form-control" id="password" type="password"  name="pwd" placeholder="Password">
                </div>
              </div>

              <div class="form-group login-submit"><button class="btn btn-lg btn-primary btn-block" href="#" data-dismiss="modal" type="submit" name="viewpage" value="signin">Login</button></div>


              <div class="form-group row login-tools">
                <div class="col-sm-6 login-remember">
                  <label class="custom-control custom-checkbox mt-2">
                    <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember me</span>
                  </label>
                </div>
                <div class="col-sm-6 pt-2 text-sm-right login-forgot-password"><a href="pages-forgot-password.html">Forgot Password?</a></div>
              </div>
            </form>
            <div class="out-links"><a href="#">© 2020 Fofoo Pay</a></div>
          </div>
        </div>
      </div>
    </div>
    <script src="media/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="media/assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="media/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="media/assets/js/app.js" type="text/javascript"></script>
    <script src="media/assets/lib/theme-switcher/theme-switcher.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      });
      
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
      	App.livePreview();
      });
      
    </script>
    <div class="ft_theme_switcher ocult">
      <div class="toggle"><i class="icon s7-settings"></i></div>
      <div class="desc">
        <h3>Theme Switcher</h3>
        <p>Select a color scheme. You can create your own color theme with sass variables.</p>
      </div>
      <div class="style_list">
        <div class="style">
          <div class="colors">
            <div class="color" style="background: #2cc185;"></div>
            <div class="name"> Default</div>
          </div><a href="pages-logind976.html?theme=default"></a>
        </div>
        <div class="style">
          <div class="colors">
            <div class="color" style="background: #4db8ea;"></div>
            <div class="name">Blue Sky</div>
          </div><a href="pages-login8913.html?theme=blue-sky"></a>
        </div>
        <div class="style">
          <div class="colors">
            <div class="color" style="background: #fa6163;"></div>
            <div class="name">Passion</div>
          </div><a href="pages-login0d46.html?theme=passion"></a>
        </div>
        <div class="style">
          <div class="colors">
            <div class="color" style="background: #fe8458;"></div>
            <div class="name">Little Fox</div>
          </div><a href="pages-login7b75.html?theme=little-fox"></a>
        </div>
        <div class="style">
          <div class="colors">
            <div class="color" style="background: #FBAC4F;"></div>
            <div class="name">Orange Juice</div>
          </div><a href="pages-login4b45.html?theme=orange-juice"></a>
        </div>
        <div class="style">
          <div class="colors">
            <div class="color" style="background: #f3818e;"></div>
            <div class="name">Pink Love</div>
          </div><a href="pages-login7d48.html?theme=pink-love"></a>
        </div>
        <div class="style">
          <div class="colors">
            <div class="color" style="background: #9674c8;"></div>
            <div class="name">Night City</div>
          </div><a href="pages-logina318.html?theme=night-city"></a>
        </div>
      </div>
    </div>
  </body>

<!-- Mirrored from foxythemes.net/preview/products/maisonnette/pages-login.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jan 2020 00:58:11 GMT -->
</html>