<?php
session_start();

include("db_config.php");

if ($_SESSION == null) {
  echo '<script> window.location.href = "index.php"; </script>';
}
else {
    $id = $_SESSION['id2'];
}

if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "en"; }
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }

require "lang/info-".$_SESSION["lang"].".php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
  <style>
    input[type=text],input[type=number],input[type=password],input[type=email]{
      text-align:<?=$_TXT[13]?>;
    }
   .form-group label{
    text-align:<?=$_TXT[13]?>;         display: inline-block;
        width: 100%;
    }
  ul{
  display: none;
}
ul li:hover ul{
  display: block;
  position: relative;
  right: 35px;
}


 ul .l:hover{
  background: #9c27b0;
  display: block;
  border-radius: 10px;
  padding: 5px 12px;

}
ul .l a p:hover{
  color: #fff;
  padding: 5px 12px;
}
.nav-item .nav-link i{
  float:<?=$_TXT[13]?>;
}
.nav-item .nav-link p{
  text-align:<?=$_TXT[13]?>;
}


  .card-body .table td {
    text-align:<?=$_TXT[13]?>;
}
.card-body .table th {
    text-align:<?=$_TXT[13]?>;
}
    
  </style>
</head>
<?php  
         if ($_GET == null) {

        }
        else {
            $username = $_GET['username'];
        }

         $query="select * from sign_up where email = '$username' or phone = '$username' and id='$id' limit 1";

         $result = mysqli_query($conn,$query);

        if (mysqli_num_rows($result) > 0){
          while ($row = mysqli_fetch_assoc($result)){
          $store_name = $row['store_name'];
          $store_logo = $row['store_logo'];
          $email = $row['email'];
          $phone = $row['phone'];
          $username1 = $row['username'];
          $password = $row['password'];
          $re_password = $row['re_password'];
          $payment = $row['payment'];	
          $first_card = $row['first_card'];
          $second_card = $row['second_card'];
          $third_card = $row['third_card'];
          $fourth_card = $row['fourth_card'];
          $location = $row['location'];
          $shop_category = $row[$_TXT[41]];
      }
    }
         ?>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
      <?=$_TXT[0]?> <br> <?php echo $store_name; ?>
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item   ">
            <a class="nav-link" href="./dashboard.php?username=<?php echo $username; ?>">
              <i class="material-icons">dashboard</i>
              <p><?=$_TXT[1]?></p>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="./store info.php?username=<?php echo $username; ?>">
              <i class="material-icons">person</i>
              <p><?=$_TXT[2]?></p>
            </a>
          </li>
          <li class="nav-item " >
            <a class="nav-link">
              <i class="fa fa-product-hunt" aria-hidden="true"></i>
              <p><?=$_TXT[3]?></p>
            </a>
            <ul style=" list-style-type: none;"> 
              <li class="l">
                <a class="nav-link" href="./Add New.php?username=<?php echo $username; ?>">

                  <p><?=$_TXT[4]?></p>
                </a>
              </li>
                <li class="l">
                  <a class="nav-link" href="./All Prodect.php?username=<?php echo $username; ?>">
                    <p><?=$_TXT[5]?></p>
                  </a>
                </li>
                  <li class="l">
                    <a class="nav-link" href="./products Views number.php?username=<?php echo $username; ?>">
                      <p><?=$_TXT[6]?></p>
                    </a>
                  </li>
            </ul>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./orders.php?username=<?php echo $username; ?>">
              <i class="material-icons">content_paste</i>
              <p><?=$_TXT[7]?></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./Ads Sponsor.php?username=<?php echo $username; ?>">
              <i class="fa fa-address-book" aria-hidden="true"></i>
              <p><?=$_TXT[8]?></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./views.php?username=<?php echo $username; ?>">
              <i class="fa fa-eye" style="font-size:24px"></i>
              <p><?=$_TXT[9]?></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./logout.php">
              <i class="material-icons">logout</i>
              <p><?=$_TXT[10]?></p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"><?=$_TXT[11]?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" style="text-align:<?=$_TXT[13]?>;" class="form-control" placeholder="<?=$_TXT[12]?>">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>


            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <?php
                  $query="SELECT pointer1 from  user_product  where pointer1 = 0 and id_store = '$id' ";
                   $result = mysqli_query($conn,$query);
                   if (mysqli_num_rows($result) > 0){ 
                    $num = mysqli_num_rows($result);
                   }else{
                    $num = 0;
                    }?>
                  <span class="notification"><?php echo $num; ?></span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <?php
                   $query="SELECT * from user_product where pointer1 = 0 and id_store = '$id' ";
                   $result = mysqli_query($conn,$query);
                   if (mysqli_num_rows($result) > 0){
                   while ($row1 = mysqli_fetch_assoc($result)){
                    $id2 = $row1['id'];
                    $product_name = $row1['product_name'];
                  ?>
                  <a class="dropdown-item" href="orders.php?id=<?php echo $id2; ?>&username=<?php echo $username ?>"><?php echo $product_name; ?></a>
                  <?php }
                  }
                   ?>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->      
      <div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="card-body">
                <div class="author">
                  <a href="#">
                  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($store_logo); ?>"  style="  display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width: 50%;
                    height: 50%; "alt="" >
                  
                    <h5 class="title" style="text-align: center;"><?php echo $store_name; ?></h5>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title" style="text-align:<?=$_TXT[13]?>; "><?=$_TXT[21]?></h5>
              </div>
              <div class="card-body" style="margin-bottom: 50px;">
                <form action="" method="POST" >
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label><?=$_TXT[22]?></label>
                        <input type="text" class="form-control" disabled="" value="<?php echo $phone; ?>">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label><?=$_TXT[23]?></label>
                        <input type="text" class="form-control" value="<?php echo $username1; ?>" disabled> 
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1"><?=$_TXT[24]?></label>
                        <input type="email" class="form-control" value="<?php echo $email; ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label><?=$_TXT[25]?></label>
                        <input type="password" class="form-control" value="<?php echo $password; ?>"  disabled>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label><?=$_TXT[26]?></label>
                        <input type="password" class="form-control" value="<?php echo $re_password; ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label><?=$_TXT[27]?></label>
                        <input type="text" class="form-control" value="<?php echo $payment; ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <p style="text-align:<?=$_TXT[13]?>;"><?=$_TXT[28]?></p>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label><?=$_TXT[29]?></label>
                        <input type="text" class="form-control" value="<?php echo $first_card; ?>" disabled>
                      </div>
                    </div>
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label><?=$_TXT[30]?></label>
                        <input type="text" class="form-control" value="<?php echo $second_card; ?>" disabled>
                      </div>
                    </div>
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label><?=$_TXT[31]?></label>
                        <input type="text" class="form-control" value="<?php echo $third_card; ?>" disabled>
                      </div>
                    </div>
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label><?=$_TXT[32]?></label>
                        <input type="text" class="form-control" value="<?php echo $fourth_card; ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group" style="text-align:<?=$_TXT[13]?>;">
                        <label><?=$_TXT[33]?></label><br>
                        <p style="color: red;">* <?=$_TXT[34]?><br>
                          1- <?=$_TXT[35]?><br>
                          2- <?=$_TXT[36]?><br>
                          3- <?=$_TXT[37]?></p>
                       <a href="<?php echo $location; ?>" target="_blank"><?=$_TXT[38]?></a>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row" >
                    <div class="col-md-12">
                      <div class="form-group" >
                        <label  style="color: #000; font-size: 20px; "><?=$_TXT[39]?></label><br>
                        <?php $shop_category = preg_replace('/\d/', '', $shop_category); ?>
                        <input type="text" class="form-control" value="<?php echo $shop_category; ?>" disabled>
                     <br>      
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                        <a href="edit_profile.php?id=<?php echo $id;?>" class="btn btn-primary btn-round"><?=$_TXT[40]?></a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
   
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <p><?=$_TXT[14]?></p>
            <form method="POST">
          <button type="submit" class="btn" name="lang" value="en"> <?=$_TXT[15]?> </button>
          <button type="submit" class="btn" name="lang" value="ar"> <?=$_TXT[16]?> </button>
        </form>
 
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, <?=$_TXT[17]?> <i class="material-icons">favorite</i> <?=$_TXT[18]?>
            <a href="https://www.creative-tim.com" target="_blank"><?=$_TXT[19]?></a> <?=$_TXT[20]?>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').php();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
    <script>
      var checkboxes = document.querySelectorAll('input.subOption'),
      checkall = document.getElementById('option');
  
  for(var i=0; i<checkboxes.length; i++) {
    checkboxes[i].onclick = function() {
      var checkedCount = document.querySelectorAll('input.subOption:checked').length;
  
      checkall.checked = checkedCount > 0;
      checkall.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
    }
  }
  
  checkall.onclick = function() {
    for(var i=0; i<checkboxes.length; i++) {
      checkboxes[i].checked = this.checked;
    }
  }
    </script>
</body>

</html>