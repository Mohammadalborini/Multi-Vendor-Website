<?php
session_start();

include("db_config.php");

if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "en"; }
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }

require "lang/sign-".$_SESSION["lang"].".php";

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
  <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password],input[type=email],input[type=file],input[type=chekbox] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  text-align:<?=$_TXT[27]?>;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus,input[type=file]:focus,input[type=email]:focus,input[type=chekbox]:focus {
  background-color: #ddd;
  outline: none;

}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  align-items: center;
}

button:hover {
  opacity:1;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: block; /* Hidden by default */
  position: absolute; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
body {
color: #555;
font-size: 1.25em;
font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

ul {
list-style: none;
display: table;
table-layout: fixed;
}

li {
margin-top: 1em;

}

label {
font-weight: bold;
}

</style>
</head>

<body>
  <div class="wrapper " style="	border: 10px;
  border-radius: 15px;
  border-color: #0ad6e9;
  border-style: solid;">

<div class="modal">
<p><?=$_TXT[23]?></p>
            <form method="POST">
          <button type="submit" class="btn" name="lang" value="en"> <?=$_TXT[25]?> </button>
          <button type="submit" class="btn" name="lang" value="ar"> <?=$_TXT[24]?> </button>
        </form>
  <form class="modal-content" action="sign_up_process.php" method="POST" enctype="multipart/form-data"> 
    <div class="container" >

<div style="text-align:<?=$_TXT[27]?>;">
      <h1><?=$_TXT[0]?></h1>
      <p><?=$_TXT[1]?></p>
      <hr>
      <label for="store"><b><?=$_TXT[2]?></b></label>
      <input type="text" placeholder="<?=$_TXT[2]?>" name="store" required>

      <label for="image"><b><?=$_TXT[3]?></b></label><p style="color: red;">* <?=$_TXT[28]?></p>
      <input type="file" name="image" required>

      <label for="email"><b><?=$_TXT[4]?></b></label>
      <input type="email" placeholder="<?=$_TXT[5]?>" name="email" required>

      <label for="number"><b><?=$_TXT[6]?></b></label>
      <input type="text" placeholder="<?=$_TXT[6]?>" name="number" required>

      <label for="user"><b><?=$_TXT[7]?></b></label>
      <input type="text" placeholder="<?=$_TXT[7]?>" name="user" required>

      <label for="psw"><b><?=$_TXT[8]?></b></label>
      <input type="password" placeholder="<?=$_TXT[9]?>" name="psw" id="pass" onkeyup="active()" required>

      <label for="psw-repeat"><b><?=$_TXT[10]?></b></label>
      <input type="password" placeholder="<?=$_TXT[10]?>" name="psw-repeat" id="confirm_pass" onkeyup="active_2()" required>
      <span id="wrong_pass_alert" style="text-align: center;"></span><br>

      <label>
      <input type="checkbox" placeholder="wallet" style="margin-bottom:15px" value="wallet" name="chek[]" ><?=$_TXT[11]?>
      </label><br>
      <label>
      <input type="checkbox" placeholder="bank IBAN" style="margin-bottom:15px" value="bank IBAN" name="chek[]"><?=$_TXT[12]?>
    </label><br>

      <label for="card" style="color: #000; font-size: 20px;"><b><?=$_TXT[13]?></b></label>
      <input type="text" placeholder="<?=$_TXT[14]?>" name="card1" required>
      <input type="text" placeholder="<?=$_TXT[15]?>" name="card2" required>
      <input type="text" placeholder="<?=$_TXT[16]?>" name="card3" required>
      <input type="text" placeholder="<?=$_TXT[17]?>" name="card4" required>
      



   
      <label for="add"><b><?=$_TXT[18]?></b></label><p style="color: red;">* <?=$_TXT[19]?><br>
        1- <?=$_TXT[20]?><br>
        2- <?=$_TXT[21]?><br>
        3- <?=$_TXT[22]?></p>
      <input type="text" placeholder=" <?=$_TXT[26]?>" name="add" required>
</div>

      <div style="display: inline-block;">
      <label  style="color: #000; font-size: 20px;">Shop Category</label>
      <ul>
        <li><input type="checkbox" name="shop[]" id="option1" value="shose"><label for="option1"> SHOES</label>
            <ul>
              <li><label><input type="checkbox" class="subOption1" value="male1"  name="shop[]"> Male</label></li>
              <li><label><input type="checkbox" class="subOption1" value="female1"  name="shop[]"> Female</label></li>
              <li><label><input type="checkbox" class="subOption1" value="kids1"  name="shop[]"> Kids</label></li>
            </ul>
        </li>
        <li><input type="checkbox" name="shop[]" id="option2" value="clothing"><label for="option2"> CLOTHING</label>
            <ul>
              <li><label><input type="checkbox" class="subOption2" value="male2"  name="shop[]"> Male</label></li>
              <li><label><input type="checkbox" class="subOption2" value="female2"  name="shop[]"> Female</label></li>
              <li><label><input type="checkbox" class="subOption2" value="kids2"  name="shop[]"> Kids</label></li>
            </ul>
        </li>
        <li><input type="checkbox" name="shop[]" id="option3" value="bags"><label for="option3"> BAGS</label>
          <ul>
            <li><label><input type="checkbox" class="subOption3" value="male3"  name="shop[]"> Male</label></li>
            <li><label><input type="checkbox" class="subOption3" value="female3"  name="shop[]"> Female</label></li>
            <li><label><input type="checkbox" class="subOption3" value="kids3"  name="shop[]"> Kids</label></li>
          </ul>
      </li>

      <li><input type="checkbox" name="shop[]" id="option4" value="accessories"><label for="option4">ACCESSORIES</label>
        <ul>
          <li><label><input type="checkbox" class="subOption4" value="hand made5"  name="shop[]"> Hand Made</label></li>
        </ul>
    </li>

    <li><input type="checkbox" name="shop[]" id="option5" value="perfumes"><label for="option5"> PERFUMES</label>
      <ul>
        <li><label><input type="checkbox" class="subOption5" value="male4"  name="shop[]"> Male</label></li>
        <li><label><input type="checkbox" class="subOption5" value="female4"  name="shop[]"> Female</label></li>
        <li><label><input type="checkbox" class="subOption5" value="kids4"  name="shop[]"> Kids</label></li>
      </ul>
   </li>
        <li>
          <input type="checkbox" id="option6"  name="shop[]" value="gaming"><label for="option6"> GAMING</label>
          <ul>
            <li><label><input type="checkbox" class="subOption6" value="gaming accessories6"  name="shop[]"> Gaming Accessories</label></li>
            <li><label><input type="checkbox" class="subOption6" value="figurines6"  name="shop[]"> Figurines</label></li>
          </ul>
        </li>
        <li><input type="checkbox" name="shop[]" id="option7" value="makeup7"><label for="option7"> MAKEUP</label></li>
        <li><input type="checkbox" name="shop[]" id="option8" value="PHONE ACCESSORIES8"><label for="option8"> PHONE ACCESSORIES</label></li>
        <li><input type="checkbox" name="shop[]" id="option9" value="hand made9"><label for="option9"> HAND MADE</label></li>
        <li><input type="checkbox" name="shop[]" id="option10" value="arts10"><label for="option10"> Arts</label></li>
      </ul>
      </div>
      <div style="display: inline-block; text-align:right; float:right;">
      <label  style="color: #000; font-size: 20px;">فئة المتجر</label>
      <ul>
        <li><input type="checkbox" name="rshop[]" id="roption1" value="احذية"><label for="roption1"> احذية</label>
            <ul>
              <li><label><input type="checkbox" class="rsubOption1" value="1رجالي"  name="rshop[]">رجالي</label></li>
              <li><label><input type="checkbox" class="rsubOption1" value="نسائي1"  name="rshop[]"> نسائي</label></li>
              <li><label><input type="checkbox" class="rsubOption1" value="اطفال1"  name="rshop[]"> اطفال</label></li>
            </ul>
        </li>
        <li><input type="checkbox" name="rshop[]" id="roption2" value="ملابس"><label for="roption2"> ملابس</label>
            <ul>
              <li><label><input type="checkbox" class="rsubOption2" value="رجالي2"  name="rshop[]"> رجالي</label></li>
              <li><label><input type="checkbox" class="rsubOption2" value="نسائي2"  name="rshop[]"> نسائي</label></li>
              <li><label><input type="checkbox" class="rsubOption2" value="اطفال2"  name="rshop[]"> اطفال</label></li>
            </ul>
        </li>
        <li><input type="checkbox" name="rshop[]" id="roption3" value="حقائب"><label for="roption3"> حقائب</label>
          <ul>
            <li><label><input type="checkbox" class="rsubOption3" value="رجالي3"  name="rshop[]"> رجالي</label></li>
            <li><label><input type="checkbox" class="rsubOption3" value="نسائي3"  name="rshop[]"> نسائي</label></li>
            <li><label><input type="checkbox" class="rsubOption3" value="اطفال3"  name="rshop[]"> اطفال</label></li>
          </ul>
      </li>

      <li><input type="checkbox" name="rshop[]" id="roption4" value="ملحقات"><label for="roption4">ملحقات</label>
        <ul>
          <li><label><input type="checkbox" class="rsubOption4" value="5صنع يدوي"  name="rshop[]"> صنع يدوي</label></li>
        </ul>
    </li>

    <li><input type="checkbox" name="rshop[]" id="roption5" value="العطور"><label for="roption5"> العطور</label>
      <ul>
        <li><label><input type="checkbox" class="rsubOption5" value="رجالي4"  name="rshop[]"> رجالي</label></li>
        <li><label><input type="checkbox" class="rsubOption5" value="نسائي4"  name="rshop[]"> نسائي</label></li>
        <li><label><input type="checkbox" class="rsubOption5" value="اطفال4"  name="rshop[]"> اطفال</label></li>
      </ul>
   </li>
        <li>
          <input type="checkbox" id="roption6"  name="rshop[]" value="العاب"><label for="roption6"> العاب</label>
          <ul>
            <li><label><input type="checkbox" class="rsubOption6" value="6ملحفات العاب"  name="rshop[]"> ملحقات الألعاب</label></li>
            <li><label><input type="checkbox" class="rsubOption6" value="6التماثيل"  name="rshop[]"> التماثيل</label></li>
          </ul>
        </li>
        <li><input type="checkbox" name="rshop[]" id="option7" value="7مكياج"><label for="option7"> مكياج</label></li>
        <li><input type="checkbox" name="rshop[]" id="option8" value="8ملحقات الهواتف"><label for="option8"> ملحقات هواتف</label></li>
        <li><input type="checkbox" name="rshop[]" id="option9" value="9منتجات يدوية"><label for="option9"> صنع يدوي</label></li>
        <li><input type="checkbox" name="rshop[]" id="option10" value="10فنون"><label for="option10"> فنون</label></li>
      </ul> 
</div> 

<hr style="padding-bottom: 1px; background: #000;">
      <label>
        <input type="checkbox" name="remember" style="margin-bottom:15px">   I agree on the terms.
      </label>

      <div class="clearfix">
        <button type="submit" class="signupbtn" name="submit" id="create" onclick="wrong_pass_alert()" >Sign Up</button>
      </div>
    </div>
  </form>
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

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

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
      var checkboxes1 = document.querySelectorAll('input.subOption1'),
      checkall1 = document.getElementById('option1');
  
  for(var i=0; i<checkboxes1.length; i++) {
    checkboxes1[i].onclick = function() {
      var checkedCount = document.querySelectorAll('input.subOption1:checked').length;
  
      checkall1.checked = checkedCount > 0;
      checkall1.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
    }
  }
  
  checkall1.onclick = function() {
    for(var i=0; i<checkboxes1.length; i++) {
      checkboxes1[i].checked = this.checked;
    }
  }

  var checkboxes2 = document.querySelectorAll('input.subOption2'),
      checkall2 = document.getElementById('option2');
  
  for(var i=0; i<checkboxes2.length; i++) {
    checkboxes2[i].onclick = function() {
      var checkedCount = document.querySelectorAll('input.subOption2:checked').length;
  
      checkall2.checked = checkedCount > 0;
      checkall2.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
    }
  }
  
  checkall2.onclick = function() {
    for(var i=0; i<checkboxes2.length; i++) {
      checkboxes2[i].checked = this.checked;
    }
  }

  var checkboxes3 = document.querySelectorAll('input.subOption3'),
      checkall3 = document.getElementById('option3');
  
  for(var i=0; i<checkboxes3.length; i++) {
    checkboxes3[i].onclick = function() {
      var checkedCount = document.querySelectorAll('input.subOption3:checked').length;
  
      checkall3.checked = checkedCount > 0;
      checkall3.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
    }
  }
  
  checkall3.onclick = function() {
    for(var i=0; i<checkboxes3.length; i++) {
      checkboxes3[i].checked = this.checked;
    }
  }

  var checkboxes4 = document.querySelectorAll('input.subOption4'),
      checkall4 = document.getElementById('option4');
  
  for(var i=0; i<checkboxes4.length; i++) {
    checkboxes4[i].onclick = function() {
      var checkedCount = document.querySelectorAll('input.subOption4:checked').length;
  
      checkall4.checked = checkedCount > 0;
      checkall4.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
    }
  }
  
  checkall4.onclick = function() {
    for(var i=0; i<checkboxes4.length; i++) {
      checkboxes4[i].checked = this.checked;
    }
  }


  var checkboxes5 = document.querySelectorAll('input.subOption5'),
      checkall5 = document.getElementById('option5');
  
  for(var i=0; i<checkboxes5.length; i++) {
    checkboxes5[i].onclick = function() {
      var checkedCount = document.querySelectorAll('input.subOption5:checked').length;
  
      checkall5.checked = checkedCount > 0;
      checkall5.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
    }
  }
  
  checkall5.onclick = function() {
    for(var i=0; i<checkboxes5.length; i++) {
      checkboxes5[i].checked = this.checked;
    }
  }

  var checkboxes6 = document.querySelectorAll('input.subOption6'),
      checkall6 = document.getElementById('option6');
  
  for(var i=0; i<checkboxes6.length; i++) {
    checkboxes6[i].onclick = function() {
      var checkedCount = document.querySelectorAll('input.subOption6:checked').length;
  
      checkall6.checked = checkedCount > 0;
      checkall6.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
    }
  }
  
  checkall6.onclick = function() {
    for(var i=0; i<checkboxes6.length; i++) {
      checkboxes6[i].checked = this.checked;
    }
  }
    </script>






<script>
      var checkboxes10 = document.querySelectorAll('input.rsubOption1'),
      checkall10 = document.getElementById('roption1');
  
  for(var i=0; i<checkboxes10.length; i++) {
    checkboxes10[i].onclick = function() {
      var checkedCount = document.querySelectorAll('input.rsubOption1:checked').length;
  
      checkall10.checked = checkedCount > 0;
      checkall10.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
    }
  }
  
  checkall10.onclick = function() {
    for(var i=0; i<checkboxes10.length; i++) {
      checkboxes10[i].checked = this.checked;
    }
  }

  var checkboxes20 = document.querySelectorAll('input.rsubOption2'),
      checkall20 = document.getElementById('roption2');
  
  for(var i=0; i<checkboxes20.length; i++) {
    checkboxes20[i].onclick = function() {
      var checkedCount = document.querySelectorAll('input.rsubOption2:checked').length;
  
      checkall20.checked = checkedCount > 0;
      checkall20.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
    }
  }
  
  checkall20.onclick = function() {
    for(var i=0; i<checkboxes20.length; i++) {
      checkboxes20[i].checked = this.checked;
    }
  }

  var checkboxes30 = document.querySelectorAll('input.rsubOption3'),
      checkall30 = document.getElementById('roption3');
  
  for(var i=0; i<checkboxes30.length; i++) {
    checkboxes30[i].onclick = function() {
      var checkedCount = document.querySelectorAll('input.rsubOption3:checked').length;
  
      checkall30.checked = checkedCount > 0;
      checkall30.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
    }
  }
  
  checkall30.onclick = function() {
    for(var i=0; i<checkboxes30.length; i++) {
      checkboxes30[i].checked = this.checked;
    }
  }

  var checkboxes40 = document.querySelectorAll('input.rsubOption4'),
      checkall40 = document.getElementById('roption4');
  
  for(var i=0; i<checkboxes40.length; i++) {
    checkboxes40[i].onclick = function() {
      var checkedCount = document.querySelectorAll('input.rsubOption4:checked').length;
  
      checkall40.checked = checkedCount > 0;
      checkall40.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
    }
  }
  
  checkall40.onclick = function() {
    for(var i=0; i<checkboxes40.length; i++) {
      checkboxes40[i].checked = this.checked;
    }
  }


  var checkboxes50 = document.querySelectorAll('input.rsubOption5'),
      checkall50 = document.getElementById('roption5');
  
  for(var i=0; i<checkboxes50.length; i++) {
    checkboxes50[i].onclick = function() {
      var checkedCount = document.querySelectorAll('input.rsubOption5:checked').length;
  
      checkall50.checked = checkedCount > 0;
      checkall50.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
    }
  }
  
  checkall50.onclick = function() {
    for(var i=0; i<checkboxes50.length; i++) {
      checkboxes50[i].checked = this.checked;
    }
  }

  var checkboxes60 = document.querySelectorAll('input.rsubOption6'),
      checkall60 = document.getElementById('roption6');
  
  for(var i=0; i<checkboxes60.length; i++) {
    checkboxes60[i].onclick = function() {
      var checkedCount = document.querySelectorAll('input.rsubOption6:checked').length;
  
      checkall60.checked = checkedCount > 0;
      checkall60.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
    }
  }
  
  checkall60.onclick = function() {
    for(var i=0; i<checkboxes60.length; i++) {
      checkboxes60[i].checked = this.checked;
    }
  }
    </script>

    
<script>
  function active_2() {

    var pass = document.getElementById('pass').value;
    var confirm_pass = document.getElementById('confirm_pass').value;
    if (pass != confirm_pass) {
      document.getElementById('wrong_pass_alert').style.color = 'red';
      document.getElementById('wrong_pass_alert').innerHTML
      = '☒ Use same password';
      document.getElementById('create').disabled = true;
      document.getElementById('create').style.opacity = (0.4);
    } else {
      document.getElementById('wrong_pass_alert').style.color = 'green';
      document.getElementById('wrong_pass_alert').innerHTML =
        '🗹 Password Matched';
      document.getElementById('create').disabled = false;
      document.getElementById('create').style.opacity = (1);
    }
  }


</script>
</body>

</html>