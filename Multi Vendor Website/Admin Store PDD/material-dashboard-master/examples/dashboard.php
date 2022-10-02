<?php
session_start();

include("db_config.php");

if (isset($_SESSION['id2'])) {
  $id1 = $_SESSION['id2'];
 
}
else {
  echo '<script> window.location.href = "index.php"; </script>';
}

if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "en"; }
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }

require "lang/dash-".$_SESSION["lang"].".php";
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
.btns{
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 15px;
  cursor: pointer;
  
}
.btns:hover{
  background-color: #4CA000; /* Green */
}
.img1{
  width: 350px;
   height: 350px;
    position: relative;
     top: -30px;
      left: 500px;
         background-repeat: no-repeat;
      background-size: cover;
      margin-top: 50px;
      border-radius: 50%;
}

.nav-item .nav-link i{
  float:<?=$_TXT[14]?>;
}
.nav-item .nav-link p{
  text-align:<?=$_TXT[14]?>;
}


  .card-body .table td {
    text-align:<?=$_TXT[14]?>;
}
.card-body .table th {
    text-align:<?=$_TXT[14]?>;
}
                
  </style>
</head>
<?php  
         if ($_GET == null) {

        }
        else {
            $username = $_GET['username'];
        }

         $query="select * from sign_up where email = '$username' or phone = '$username' and id='$id1' limit 1";

         $result = mysqli_query($conn,$query);

        if (mysqli_num_rows($result) > 0){
          while ($row = mysqli_fetch_assoc($result)){
          $store_name = $row['store_name'];
          $store_logo = $row['store_logo'];

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
      <?=$_TXT[0]?> <br><?php echo $store_name; ?>
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link"  href="./dashboard.php?username=<?php echo $username; ?>">
              <i class="material-icons" >dashboard</i>
              <p ><?=$_TXT[1]?></p>
            </a>
          </li>
          <li class="nav-item  ">
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
          <?php  

         $query="select viedo from upload_video limit 1";

         $result = mysqli_query($conn,$query);

        if (mysqli_num_rows($result) > 0){
          while ($row = mysqli_fetch_assoc($result)){
          $viedo = $row['viedo'];
      }
    }
         ?>

          <a href="../../../Main Admin PDD/paper-dashboard-master/upload/<?php echo $viedo;?>" target=_blanck><button class="btns"><?=$_TXT[12]?></button></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" style="text-align:<?=$_TXT[14]?>;" placeholder="<?=$_TXT[13]?>">
                <button type="submit" class="btn btn-white btn-round btn-just-icon" >
                  <i class="material-icons" >search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>


            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <?php
                  $query="SELECT pointer1 from  user_product  where pointer1 = 0 and id_store = '$id1' ";
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
                   $query="SELECT * from user_product where pointer1 = 0 and id_store = '$id1' ";
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6" >
              <div class="card card-stats" >
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon" >
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category"><?=$_TXT[22]?></p>
                  <h3 class="card-title"><?=$_TXT[23]?>
                    <small>GB</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="javascript:;"><?=$_TXT[24]?></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category"><?=$_TXT[25]?></p>
                  <h3 class="card-title"><?=$_TXT[26]?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> <?=$_TXT[27]?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category"><?=$_TXT[28]?></p>
                  <h3 class="card-title"><?=$_TXT[29]?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> <?=$_TXT[30]?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category"><?=$_TXT[31]?></p>
                  <h3 class="card-title"><?=$_TXT[32]?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> <?=$_TXT[33]?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($store_logo); ?>" class="img1" alt="" >
     

      <p style="position: absolute; top: 450px; right: 950px; font-size: 35px; font-weight: 800;"><?php echo $store_name; ?></p>


          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary" >
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title" > <?=$_TXT[34]?></span>
                      <ul class="nav nav-tabs" data-tabs="tabs" >
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" data-toggle="tab">
                            <i class="material-icons" >bug_report</i>  <?=$_TXT[35]?>
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">code</i>  <?=$_TXT[36]?>
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">cloud</i>  <?=$_TXT[37]?>
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table">

                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td> <?=$_TXT[38]?></td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td> <?=$_TXT[39]?></td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td> <?=$_TXT[40]?>
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td><?=$_TXT[41]?></td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane" id="messages">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td><?=$_TXT[41]?>
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td><?=$_TXT[42]?></td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane" id="settings">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td><?=$_TXT[43]?></td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td><?=$_TXT[44]?>
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td><?=$_TXT[45]?></td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title" style="text-align:<?=$_TXT[14]?>;"><?=$_TXT[47]?></h4>
                  <p class="card-category" style="text-align:<?=$_TXT[14]?>;"><?=$_TXT[48]?></p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th><?=$_TXT[49]?></th>
                      <th><?=$_TXT[50]?></th>
                      <th><?=$_TXT[51]?></th>
                      <th><?=$_TXT[52]?></th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td><?=$_TXT[53]?></td>
                        <td><?=$_TXT[54]?></td>
                        <td><?=$_TXT[55]?></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td><?=$_TXT[56]?></td>
                        <td><?=$_TXT[57]?></td>
                        <td><?=$_TXT[58]?></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td><?=$_TXT[59]?></td>
                        <td><?=$_TXT[60]?></td>
                        <td><?=$_TXT[61]?></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td><?=$_TXT[62]?></td>
                        <td><?=$_TXT[63]?></td>
                        <td><?=$_TXT[64]?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer" >
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
          <p><?=$_TXT[15]?></p>
            <form method="POST">
          <button type="submit" class="btn" name="lang" value="en"> <?=$_TXT[16]?> </button>
          <button type="submit" class="btn" name="lang" value="ar"> <?=$_TXT[17]?> </button>
        </form>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, <?=$_TXT[18]?> <i class="material-icons">favorite</i> <?=$_TXT[19]?>
            <a href="https://www.creative-tim.com" target="_blank"><?=$_TXT[20]?></a> <?=$_TXT[21]?>
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
</body>

</html>