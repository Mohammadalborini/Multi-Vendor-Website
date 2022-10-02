<?php
session_start();

include("db_config.php");

if(!isset($_SESSION['id1'])){
    $_SESSION['id1'] = null;
}else {
    $id1 = $_SESSION['id1'];
    
}

if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "en"; header("Location: register.php");}
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"];  header("Location: register.php");}

require "lang/register-".$_SESSION["lang"].".php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="" />
    <title><?=$_TXT[0]?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <!--********************************** 
        all css files 
    *************************************-->

    <!--*************************************************** 
       fontawesome,bootstrap,plugins and main style css
     ***************************************************-->

    <!-- cdn links -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/css/ionicons.min.css" />
    <link rel="stylesheet" href="assets/css/simple-line-icons.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/plugins.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->

    <!--**************************** 
         Minified  css 
    ****************************-->

    <!--*********************************************** 
       vendor min css,plugins min css,style min css
     ***********************************************-->

    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/style.min.css" /> -->
    <style>
        
    
    
    /* strong password */
     .message.weak {
      color: rgb(239, 68, 68) !important;
    }
    
     .message.medium {
      color: rgb(251, 191, 36) !important;
    }
    
    .message.strong {
      color: rgb(34, 197, 94) !important;
    }
    
    .message {
      position: absolute;
      top: 100%;
      font-size: 15px;
    
    
    }
    
    </style>
    

</head>

<body>
    

<!-- offcanvas-overlay start -->
<div class="offcanvas-overlay"></div>
<!-- offcanvas-overlay end -->
<!-- offcanvas-mobile-menu start -->
<div id="offcanvas-mobile-menu" class="offcanvas theme1 offcanvas-mobile-menu">
    <div class="inner">
        <div class="border-bottom mb-4 pb-4 text-right">
            <button class="offcanvas-close">×</button>
        </div>
        <div class="offcanvas-head mb-4">
            <nav class="offcanvas-top-nav">
                <ul class="d-flex justify-content-center align-items-center">
                <?php
            if(!isset($_SESSION['id1'])) {
              $number = 0;
            }else {
             $id1 = $_SESSION['id1'];
             $query2="SELECT * from wishlist where id_user = '$id1' ";
             $result2 = mysqli_query($conn,$query2);
             $number = mysqli_num_rows($result2);
            }
            ?>
          <li class="mx-3">
            <a href="Wish List.php"
              ><i class="ion-ios-loop-strong"></i> <?= $_TXT[1]; ?> <span>(<?php echo $number; ?>)</span>
            </a>
          </li>
          <?php
            if(!isset($_SESSION['id1'])) {
              $number1 = 0;
            }else {
             $id1 = $_SESSION['id1'];
             $query2="SELECT * from favorite where id_user = '$id1' ";
             $result2 = mysqli_query($conn,$query2);
             $number1 = mysqli_num_rows($result2);
            }
            ?>
          <li class="mx-3">
          <a href="Favorite.php"> <i class="ion-android-favorite-outline"></i> <?= $_TXT[2]; ?>
                            <span>(<?php echo $number1; ?>)</span></a>
          </li>
                </ul>
            </nav>
        </div>
        <nav class="offcanvas-menu">
            <ul>
                <li><a href="index1.php"><span class="menu-text"><?= $_TXT[3]; ?></span></a>

                </li >
                <li><a href="#"><span class="menu-text"><?= $_TXT[4]; ?></span></a>
                    <ul class="offcanvas-submenu">
                        <li>
                            <a href="#"><span class="menu-text"><?= $_TXT[5]; ?></span></a>
                            <ul class="offcanvas-submenu">
                                <li><a href="shop-grid-4-column.php?product=female2"><?= $_TXT[6]; ?></a></li>
                                <li><a href="shop-grid-4-column.php?product=male2"><?=$_TXT[7]; ?></a></li>
                                <li><a href="shop-grid-4-column.php?product=kidsl2"><?= $_TXT[8]; ?></a>
                                </li>
                                <li class="active"><a href="shop-grid-4-column.php?product=clothing"><?= $_TXT[9]; ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text"><?= $_TXT[10]; ?>
                            </span></a>
                            <ul class="offcanvas-submenu">
                                <li><a href="shop-grid-4-column.php?product=female1"><?= $_TXT[6]; ?></a></li>
                                <li><a href="shop-grid-4-column.php?product=male1"><?= $_TXT[7]; ?></a></li>
                                <li><a href="shop-grid-4-column.php?product=kids1"><?= $_TXT[8]; ?></a>
                                </li>
                                <li class="active"><a href="shop-grid-4-column.php?product=shose"><?= $_TXT[9]; ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text"><?= $_TXT[11]; ?>
                            </span></a>
                            <ul class="offcanvas-submenu">
                                <li><a href="shop-grid-4-column.php?product=female3"><?= $_TXT[6]; ?></a></li>
                                <li><a href="shop-grid-4-column.php?product=male3"><?= $_TXT[7]; ?></a></li>
                                <li><a href="shop-grid-4-column.php?product=kids3"><?= $_TXT[8]; ?></a>
                                </li>
                                <li class="active"><a href="shop-grid-4-column.php?product=bags"><?= $_TXT[9]; ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text"><?= $_TXT[12]; ?>
                            </span></a>
                            <ul class="offcanvas-submenu">
                                <li><a href="shop-grid-4-column.php?product=hand made5"><?= $_TXT[13]; ?></a></li>
                                </li>
                                <li class="active"><a href="shop-grid-4-column.php?product=accessories"><?= $_TXT[14]; ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <li>
                                <a href="#"><span class="menu-text"><?= $_TXT[15]; ?>
                                </span></a>
                                <ul class="offcanvas-submenu">
                                    <li><a href="shop-grid-4-column.php?product=female4"><?= $_TXT[6]; ?></a></li>
                                    <li><a href="shop-grid-4-column.php?product=male4"><?= $_TXT[7]; ?></a></li>
                                    <li><a href="shop-grid-4-column.php?product=kids4"><?= $_TXT[8]; ?></a>
                                    </li>
                                    <li class="active"><a href="shop-grid-4-column.php?product=perfumes"><?= $_TXT[9]; ?></a></li>
                                </ul>
                            </li>
                            <li>
                            <a href="#"><span class="menu-text"><?= $_TXT[16]; ?></span></a>
                            <ul class="offcanvas-submenu">
                                <li><a href="shop-grid-4-column.php?product=gaming accessories6"><?= $_TXT[17]; ?></a></li>
                                <li><a href="shop-grid-4-column.php?product=figurines6"><?= $_TXT[18]; ?></a></li>
                                <li class="active"><a href="shop-grid-4-column.php?product=gaming"><?= $_TXT[19]; ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="shop-grid-4-column.php?product=makup7"><span class="menu-text"><?= $_TXT[20]; ?></span></a>
                        </li>
                        <li>
                            <a href="shop-grid-4-column.php?product=PHONE ACCESSORIES8"><span class="menu-text"><?= $_TXT[21]; ?>
                            </span></a>
                        </li>
                        <li>
                            <a href="shop-grid-4-column.php?product=hand made9"><span class="menu-text"><?= $_TXT[22]; ?>
                            </span></a>
                        </li>
                        <li>
                            <a href="shop-grid-4-column.php?product=arts10"><span class="menu-text"><?= $_TXT[23]; ?>
                            </span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="contact.php"><?= $_TXT[24]; ?></a></li>
                <li><a href="store.php"><?= $_TXT[25]; ?></a></li>
            </ul>
        </nav>
        <div class="offcanvas-social py-30">
            <ul>
                <li>
                    <a href="#"><i class="icon-social-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-instagram"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-google"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- offcanvas-mobile-menu end -->
<!-- OffCanvas Wishlist Start -->
<div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist theme1">
    <div class="inner">
        <div class="head d-flex flex-wrap justify-content-between">
            <span class="title"><?= $_TXT[26]; ?></span>
            <button class="offcanvas-close">×</button>
        </div>
        <ul class="minicart-product-list">
<?php
 if(!isset($_SESSION['id1'])){
    echo '  <span class="title">'.$_TXT[27].'</span>';
}else{
        $id1 = $_SESSION['id1'];
        $query2="SELECT * from favorite where id_user = '$id1' ";
        $result2 = mysqli_query($conn,$query2);
        if (mysqli_num_rows($result2) > 0){
        while ($row1 = mysqli_fetch_assoc($result2)){
          $id2 = $row1['id'];
          $store_id = $row1['store_id'];
          $id_product= $row1['id_product'];
          $product_image= $row1['product_image'];
          $product_name = $row1[$_TXT[28]];
          $price = $row1['price'];
          $store_logo = $row1['store_logo'];
          $store_name = $row1[$_TXT[29]];
    
?>
            <li>
                <a href="single-product-configurable.php?id_store=<?php echo $store_id?>&id_product=<?php echo $id_product;  ?>&storename=<?php echo $store_name; ?>" class="image"><img src="Admin Store PDD/material-dashboard-master/upload/<?php echo $product_image; ?>"
                        alt="Cart product Image" style="width:100px; height:100px;"></a>
                        <br>
                <div class="content">
                    <a href="single-product-configurable.php?id_store=<?php echo $store_id?>&id_product=<?php echo $id_product;  ?>&storename=<?php echo $store_name; ?>" class="title"><?php echo $product_name; ?></a>
                    <br>
                    <br>
                    <a href="shop-grid-4-column-store.php?id_store=<?php echo $store_id; ?>&store-name=<?php echo $store_name; ?>&rele=rele">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo $store_logo; ?>" style="width: 40px; height: 40px;">
                    </a>
                    <br>
                    <br>
                    <a href="shop-grid-4-column-store.php?id_store=<?php echo $store_id; ?>&store-name=<?php echo $store_name; ?>&rele=rele">
                    <h5> <?php echo $store_name; ?> </h5>
                    </a>
                    <form action="" method="POST">
                        <input type="hidden" name="name1" value="<?php echo $id1; ?>">
                        <input type="hidden" name="name2" value="<?php echo $id2; ?>">
                        <button type="submit" name="submit1">
                        <p class="remove">×</p>
                        </button>
                    </form>

                    
                    
                </div>
            </li>
            <?php
        
         
        }
    }else{
echo '  <span class="title">'.$_TXT[30].'</span>';
    }
}
        ?>
<?php
if (isset($_POST['submit1'])){
  $id1 = $_POST['name1'];
  $id2 = $_POST['name2'];

$query4="SELECT * from cart where id = '$id2' ";
$result4 = mysqli_query($conn,$query4);
$sdf = mysqli_num_rows($result4);
if (mysqli_num_rows($result4) > 0){

  while ($row3 = mysqli_fetch_assoc($result4)){
          $id2 = $row3['id'];

  $query3="DELETE FROM `cart` where id_user = '$id1' and id = '$id2' ";
  $result3 = mysqli_query($conn,$query3);

  echo '<script> window.location.href = "index1.php"; </script>';
}
}

}
?>



        </ul>
        <a href="Favorite.php" class="btn theme--btn1 btn--lg text-uppercase  d-block d-sm-inline-block mt-30"><?= $_TXT[31]; ?></a>
    </div>
</div>
<!-- OffCanvas Wishlist End -->

<!-- OffCanvas Cart Start -->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart theme1">
    <div class="inner">
        <div>
            <span class="title"><?= $_TXT[32]; ?></span>
            <button class="offcanvas-close">×</button>
        </div>
        <ul class="minicart-product-list">
        <?php
 if(!isset($_SESSION['id1'])){
    echo '  <span class="title">'.$_TXT[27].'</span>';
}else{
        $id1 = $_SESSION['id1'];
        $query2="SELECT * from cart where id_user = '$id1' ";
        $result2 = mysqli_query($conn,$query2);
        if (mysqli_num_rows($result2) > 0){
        while ($row1 = mysqli_fetch_assoc($result2)){
          $id2 = $row1['id'];
          $store_id = $row1['store_id'];
          $id_product= $row1['id_product'];
          $product_image= $row1['product_image'];
          $product_name = $row1[$_TXT[28]];
          $price = $row1['price'];
          $store_logo = $row1['store_logo'];
          $store_name = $row1[$_TXT[29]];
          $qty = $row1['qty'];
    
?>
            <li>
                <a href="single-product-configurable.php?id_store=<?php echo $store_id?>&id_product=<?php echo $id_product;  ?>&storename=<?php echo $store_name; ?>" class="image">
                    <img src="Admin Store PDD/material-dashboard-master/upload/<?php echo $product_image; ?>"
                        alt="Cart product Image" style="width:100px; height:100px;"></a>
                <div class="content">
                    <a href="single-product-configurable.php?id_store=<?php echo $store_id?>&id_product=<?php echo $id_product;  ?>&storename=<?php echo $store_name; ?>" class="title"><?php echo $product_name; ?></a>

                    <span class="quantity-price"><?php echo $qty ?> x<span class="amount"><?php echo $price ?> JD</span></span>
                    <a href="shop-grid-4-column-store.php?id_store=<?php echo $store_id; ?>&store-name=<?php echo $store_name; ?>&rele=rele">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo $store_logo; ?>" style="width: 40px; height: 40px;"><br>
                    </a>
                    <a href="shop-grid-4-column-store.php?id_store=<?php echo $store_id; ?>&store-name=<?php echo $store_name; ?>&rele=rele">
                    <p> <?php echo $store_name; ?> </p>
                    </a>
                    <form action="" method="POST">
                        <input type="hidden" name="name1" value="<?php echo $id1; ?>">
                        <input type="hidden" name="name2" value="<?php echo $id2; ?>">
                        <button type="submit" name="submit2">
                        <p class="remove">×</p>
                        </button>
                    </form>

                </div>
            </li>
            <?php
        
         
        }
    }else{
echo '  <span class="title">'.$_TXT[30].'</span>';
    }
}
        ?>

        <?php

if(!isset($_SESSION['id1'])){
    $total_price = 0;
}else{
         $query5="SELECT SUM(price) AS 'Total product cart'  
         FROM cart  where id_user = '$id1' ";
         $result5 = mysqli_query($conn,$query5);
         while ($row1 = mysqli_fetch_assoc($result5)){
            $total_price = $row1['Total product cart'];
         }

        ?>
          <div class="sub-total d-flex flex-wrap justify-content-between">
            <strong><?= $_TXT[33]; ?></strong>
            <span class="amount"><?php echo $total_price; ?> <?= $_TXT[34]; ?></span>
        </div>


<?php

if (isset($_POST['submit2'])){
  $id1 = $_POST['name1'];
  $id2 = $_POST['name2'];

$query4="SELECT * from favorite where id = '$id2' ";
$result4 = mysqli_query($conn,$query4);
$sdf = mysqli_num_rows($result4);
if (mysqli_num_rows($result4) > 0){

  while ($row3 = mysqli_fetch_assoc($result4)){
          $id2 = $row3['id'];

  $query3="DELETE FROM `favorite` where id_user = '$id1' and id = '$id2' ";
  $result3 = mysqli_query($conn,$query3);

  echo '<script> window.location.href = "index1.php"; </script>';
}
}

}
?>
        </ul>
        <a href="cart.php" class="btn theme--btn1 btn--lg text-uppercase  d-block d-sm-inline-block mr-sm-2"><?= $_TXT[35]; ?></a>

        <a href="checkout.php"
            class="btn theme--btn1 btn--lg text-uppercase  d-block d-sm-inline-block mt-4 mt-sm-0"><?= $_TXT[36]; ?></a>
            <br><br>
            <a href="Your_Orders.php"
            class="btn theme--btn1 btn--lg text-uppercase  d-block d-sm-inline-block mt-4 mt-sm-0" style="margin-left: 25%;"><?= $_TXT[37]; ?></a>
        <p class="minicart-message"><?= $_TXT[38]; ?></p>
        <?php }?>

    </div>
</div>
<!-- OffCanvas Cart End -->

<!-- header start -->
<header>
    <!-- header top start -->
    <div class="header-top theme1 bg-dark py-15">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7 order-last order-md-first">
                    <div class="static-info text-center text-md-left">
                        <p class="text-white"><?= $_TXT[66]; ?> <span class="theme-color"><?= $_TXT[67]; ?></span>
                         <?= $_TXT[68]; ?> <span class="theme-color"><?= $_TXT[69]; ?></span></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <nav class="navbar-top pb-2 pb-md-0 position-relative">
                        <ul class="d-flex justify-content-center justify-content-md-end align-items-center">
                            <li>
                                <a href="#" id="dropdown1" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" STYLE="color:white; margin-right:25px;"><?= $_TXT[39]; ?> <i class="ion ion-ios-arrow-down"></i></a>
                                <ul class="topnav-submenu dropdown-menu" aria-labelledby="dropdown1">
                                    <?php if(isset($_SESSION['id1'])){ ?>
                                        <li>
                                            <a href="myaccount.php"><?= $_TXT[40]; ?></a>
                                        </li>
                                        <li>
                                            <a href="checkout.php"><?= $_TXT[41]; ?></a>
                                        </li>
                                        <li>
                                            <a href="logout.php"><?= $_TXT[42]; ?></a>
                                        </li>
                                        <li>
                                        <a href="Admin Store PDD/material-dashboard-master/examples/index.php" style="font-size: 15px; font-weight: bold; "><?= $_TXT[43]; ?></a>
                                        </li>
                                    <?php }else { ?>
                                        <li>
                                            <a href="register.php"><?= $_TXT[49]; ?></a>
                                        </li>
                                        <li>
                                            <a href="checkout.php"><?= $_TXT[41]; ?></a>
                                        </li>
                                        <li>
                                        <a href="Admin Store PDD/material-dashboard-master/examples/index.php" style="font-size: 15px; font-weight: bold; "><?= $_TXT[43]; ?></a>
                                        </li>

                                        <?php }?>
                                </ul>
                            </li>
                            <li>
                                <a href="#" id="dropdown2" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" STYLE="color:white; margin-right:25px;"><?= $_TXT[48]; ?> <i class="ion ion-ios-arrow-down"></i> </a>
                                <ul class="topnav-submenu dropdown-menu" aria-labelledby="dropdown2">
                                    <li class="active"><a href="#"><?= $_TXT[48]; ?></a></li>
                         
                                </ul>
                            </li>

                            <form method="POST">
                <button type="submit" name="lang" value="en">
                  <?php if ($_SESSION["lang"] == 'en'){ $active = 'active';} ?>
                    <li class="<?php echo $active; ?>">
                        <a>
                            <img src="http://demo.posthemes.com/pos_zonan/img/l/1.jpg" alt="img" />
                            <?= $_TXT[45]; ?>
                        </a>
                    </li>
                  
                    </button>
                <br>
                    <button type="submit" name="lang" value="ar">
                    <?php if($_SESSION["lang"] == 'ar') { $active1 = 'active'; }?>
                    <li class="<?php echo $active1; ?>">
                   
                        <a>
                            <img src="assets/img/logo/jordan.png" alt="img" /><?= $_TXT[46]; ?>
                        </a>
                    </li>
                    </button>
                   
                    </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- header top end -->
    <!-- header-middle satrt -->
    <div class="header-middle pt-20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6 col-lg-2 order-first">
                    <div class="logo text-center text-sm-left mb-30 mb-sm-0">
                    <?php  

$query="select * from header limit 1";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0){
 while ($row = mysqli_fetch_assoc($result)){
 $logo = $row['weblogo'];

?>
                        <a href="index1.php"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($logo); ?>" alt="logo"></a>
             <?php }} ?>          
                    </div>
                </div>
                <div class="col-sm-6 col-lg-5 col-xl-4">
                    <!-- search-form end -->
                    <div class="d-flex align-items-center justify-content-center justify-content-sm-end">
                        <div class="media static-media mr-50 d-none d-lg-flex">
                            <img class="mr-3 align-self-center" src="assets/img/icon/1.png" alt="icon">
                            <div class="media-body">
                                <div class="phone">
                                    <span class="text-muted"><?= $_TXT[70]; ?></span>
                                </div>
                                <div class="phone">
                                <?php  

                                    $query="select * from contact_us limit 1";
                                    $result = mysqli_query($conn,$query);
                                    if (mysqli_num_rows($result) > 0){
                                    while ($row = mysqli_fetch_assoc($result)){
                                    $phone = $row['phone'];
                                    $phone = explode("/", $phone);
                                    
                                    ?>
                                    <a href="tel:(+123)4567890" class="text-dark"><?php echo $phone[0] ?></a>
                                    <?php }
                                }?>
                                </div>
                            </div>
                        </div>
                        <!-- static-media end -->
                        <div class="cart-block-links theme1">
                            <ul class="d-flex">
                            <?php
                                if(!isset($_SESSION['id1'])){
                                    $num = 0;
                                }
                                else{
                                  $query="SELECT * from wishlist where id_user = '$id1' ";
                                  $result = mysqli_query($conn,$query);
                                  if (mysqli_num_rows($result) > 0){
                                    $num = mysqli_num_rows($result);
                                   }else {
                                    $num = 0;
                                   }}
                                 ?>
                                <li class="position-relative d-none d-sm-block">
                                    <a href="Wish List.php">
                                        <img src="Icons and Images/Icons and Images/wishlist icon.png">
                                        <span class="badge cbdg1"><?php echo $num; ?></span>
                                    </a>
                                </li>
                                <?php
                                if(!isset($_SESSION['id1'])){
                                    $num1 = 0;
                                }
                                else{
                                  $query="SELECT * from favorite where id_user = '$id1' ";
                                  $result = mysqli_query($conn,$query);
                                  if (mysqli_num_rows($result) > 0){
                                    $num1 = mysqli_num_rows($result);
                                   }else {
                                    $num1 = 0;
                                   }}
                                 ?>
                                <li class="position-relative d-none d-sm-block">
                                    <a class="offcanvas-toggle" href="#offcanvas-wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                        <span class="badge cbdg1"><?php echo $num1; ?></span>
                                    </a>
                                </li>
                                <?php
                                if(!isset($_SESSION['id1'])){
                                    $num2 = 0;
                                }
                                else{
                                  $query="SELECT * from cart where id_user = '$id1' ";
                                  $result = mysqli_query($conn,$query);
                                  if (mysqli_num_rows($result) > 0){
                                    $num2 = mysqli_num_rows($result);
                                   }else {
                                    $num2 = ' <p  style="color: red; font-size: 20px;">.</p>';
                                   }}
                                 ?>
                                <li class="cart-block position-relative d-none d-sm-block">
                                    <a class="offcanvas-toggle" href="#offcanvas-cart">
                                        <i class="ion-bag"></i>
                                        <span class="cart-total position-relative"><?php echo $total_price; ?><?= $_TXT[34]; ?></span>
                                        <span class="badge cbdg1" ><?php echo $num2?></span>
                                    </a>
                                    
                                </li>
                                <!-- cart block end -->
                            </ul> 
                        </div>
                        <div class="mobile-menu-toggle theme1 d-lg-none">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewbox="0 0 800 600">
                                    <path
                                        d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                        id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path
                                        d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                        id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318)">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-6 order-lg-first">
                    <div class="search-form pt-30 pt-lg-0">
                        <form class="form-inline position-relative" action="shop-grid-4-column-search.php" method="GET">
                            <input class="form-control theme1-border" type="search" name="search"
                                placeholder="<?= $_TXT[62]; ?>">
                            <button class="btn search-btn theme-bg btn-rounded" name="submit" type="submit"><i
                                    class="icon-magnifier"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-middle end -->

    <!-- header bottom start -->
    
    <nav id="sticky" class="header-bottom theme1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10 offset-lg-2 d-flex flex-wrap align-items-center position-relative">
                    <ul class="main-menu d-flex">
                        <li class="active ml-0">
                            <a href="index1.php" class="pl-0"><?= $_TXT[3]; ?></a>

                        </li>
                        <li class="position-static">
                            <a href=" #"><?= $_TXT[4]; ?> <i class="ion-ios-arrow-down"></i></a>
                            <ul class="mega-menu row">

                    <li class="col-3">
                      <ul class="border-right h-100 pr-20">
                      <li class="mega-menu-title"><a href="#"><?= $_TXT[5]; ?></a></li>
                            <li><a href="shop-grid-4-column.php?product=female2"><?= $_TXT[6]; ?></a></li>
                            <li><a href="shop-grid-4-column.php?product=male2"><?= $_TXT[7]; ?></a></li>
                            <li><a href="shop-grid-4-column.php?product=kids2"><?= $_TXT[8]; ?></a>
                            </li>
                            <li class="active"><a href="shop-grid-4-column.php?product=clothing"><?= $_TXT[9]; ?></a></li>
                      </ul>
                  </li>



                  <li class="col-3">
                                        <ul class="border-right h-100 pr-20">
                                            <li class="mega-menu-title"><a href="#"><?= $_TXT[10]; ?></a></li>
                                            <li><a href="shop-grid-4-column.php?product=female1"><?= $_TXT[6]; ?></a></li>
                                            <li><a href="shop-grid-4-column.php?product=male1"><?= $_TXT[7]; ?></a></li>
                                            <li><a href="shop-grid-4-column.php?product=kids1"><?= $_TXT[8]; ?></a>
                                            </li>
                                            <li class="active"><a href="shop-grid-4-column.php?product=shose"><?= $_TXT[9]; ?></a></li>
                                        </ul>
                                    </li>
                                    <li class="col-3">
                                        <ul class="border-right h-100 pr-20">
                                            <li class="mega-menu-title"><a href="#"><?= $_TXT[11]; ?></a></li>
                                            <li><a href="shop-grid-4-column.php?product=female3"><?= $_TXT[6]; ?></a></li>
                                            <li><a href="shop-grid-4-column.php?product=male3"><?= $_TXT[7]; ?></a></li>
                                            <li><a href="shop-grid-4-column.php?product=kids3"><?= $_TXT[8]; ?></a>
                                            </li>
                                            <li class="active"><a href="shop-grid-4-column.php?product=bags"><?= $_TXT[9]; ?></a></li>
                                        </ul>
                                    </li>
                                    <li class="col-3">
                                        <ul class="border-right h-100 pr-20">
                                            <li class="mega-menu-title"><a href="#"><?= $_TXT[12]; ?></a></li>
                                            <li><a href="shop-grid-4-column.php?product=hand made5"><?= $_TXT[13]; ?></a></li>
                                            <li class="active"><a href="shop-grid-4-column.php?product=accessories"><?= $_TXT[14]; ?></a></li>
                                        </ul>
                                    </li>

                                    <li class="col-3">
                                        <ul class="border-right h-100 pr-20">
                                            <li class="mega-menu-title"><a href="#"><?= $_TXT[15]; ?></a></li>
                                            <li><a href="shop-grid-4-column.php?product=female4"><?= $_TXT[6]; ?></a></li>
                                            <li><a href="shop-grid-4-column.php?product=male4"><?= $_TXT[7]; ?></a></li>
                                            <li><a href="shop-grid-4-column.php?product=kids4"><?= $_TXT[8]; ?></a>
                                            </li>
                                            <li class="active"><a href="shop-grid-4-column.php?product=perfumes"><?= $_TXT[9]; ?></a></li>
                                        </ul>
                                    </li>
                                    <li class="col-3">
                                        <ul class="border-right h-100 pr-20">
                                            <li class="mega-menu-title"><a href="#"><?= $_TXT[16]; ?></a></li>
                                            <li><a href="shop-grid-4-column.php?product=gaming accessories6"><?= $_TXT[17]; ?></a></li>
                                            <li><a href="shop-grid-4-column.php?product=figurines6"><?= $_TXT[18]; ?></a></li>
                                            <li class="active"><a href="shop-grid-4-column.php?product=gaming"><?= $_TXT[19]; ?></a></li>
                                        </ul>
                                    </li>
                                    <li class="col-3" style="margin-top: 25px;">
                                        <ul class="border-right h-100 pr-20">
                                            <li class="mega-menu-title" style="margin-bottom: 30px;"><a href="shop-grid-4-column.php?product=makup7"><?= $_TXT[20]; ?></a></li>
                                            <li class="mega-menu-title"  style="margin-bottom: 30px;"><a href="shop-grid-4-column.php?product=PHONE ACCESSORIES8"><?= $_TXT[21]; ?></a></li>
                                            <li class="mega-menu-title"  style="margin-bottom: 30px;"><a href="shop-grid-4-column.php?product=hand made9"><?= $_TXT[22]; ?></a></li>
                                            <li class="mega-menu-title"><a href="shop-grid-4-column.php?product=arts10"><?= $_TXT[23]; ?></a></li>
                                        </ul>
                                    </li>
                                <li class="col-6 mt-4">
                                    <a href="single-product-configurable.php" class="zoom-in overflow-hidden">
                                    <?php 
                                             $query="SELECT * from all_inner_sliders limit 1";
                                             $result = mysqli_query($conn,$query);
                                             if (mysqli_num_rows($result) > 0){
                                             while ($row = mysqli_fetch_assoc($result)){
                                                $image1 = $row['image1'];
                                             }
                                            }
                                            ?>
                                            <img class="w-100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image1); ?>" style="width:1009px; height:208px;" alt="img"></a>
                                </li>
                                <li class="col-6 mt-4">
                                    <a href="single-product-configurable.php" class="zoom-in overflow-hidden">
                                    <?php 
                                             $query="SELECT * from all_inner_sliders limit 1";
                                             $result = mysqli_query($conn,$query);
                                             if (mysqli_num_rows($result) > 0){
                                             while ($row = mysqli_fetch_assoc($result)){
                                                $image1 = $row['image1'];
                                             }
                                            }
                                            ?>
                                            <img class="w-100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image1); ?>" style="width:1009px; height:208px;" alt="img"></a>
                                </li>
                            </ul>
                        </li>
                      
                        <li><a href="contact.php"><?= $_TXT[24]; ?></a></li>
                                <li><a href="store.php"><?= $_TXT[25]; ?></a></li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>
    <!-- header bottom end -->
</header>
<!-- header end -->
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize"><?= $_TXT[71]; ?></h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index1.php"><?= $_TXT[72]; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $_TXT[71]; ?></li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<!-- product tab start -->
<div class="register pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title text-capitalize mb-30 pb-25"><?= $_TXT[73]; ?></h3>
                <div class="log-in-form">
                    <form action="end_user_process.php" method="POST" class="personal-information">
                        <div class="order-asguest theme1 mb-3">
                            <span><?= $_TXT[74]; ?></span>
                            <a class="text-muted hover-color" href="login.php"><?= $_TXT[75]; ?></a>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-md-3 col-form-label"><?= $_TXT[76]; ?></label>
                            <div class="col-md-6">
                                <input type="text" name="name1" id="firstname" class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-3 col-form-label"><?= $_TXT[77]; ?></label>
                            <div class="col-md-6">
                                <input type="text"  name="name2" id="lastname" class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-3 col-form-label"><?= $_TXT[78]; ?></label>
                            <div class="col-md-6">
                                <input type="text"  name="name3" id="username" class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label"><?= $_TXT[79]; ?></label>
                            <div class="col-md-6">
                                <input type="email"  name="name4" id="email" class="form-control"  required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pswrd_1" class="col-md-3 col-form-label"><?= $_TXT[80]; ?></label>
                            <div class="col-md-6">
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="password"  name="name5" class="form-control" id="pass" onkeyup="active()"  required>
                                    <span class='passTypeToggle'></span>
                                <div class="message"></div>

                                    <div class="input-group-prepend">
                                        <button type="button"
                                            class="input-group-text theme-btn--dark1 btn--md show-password" onclick="myFunction()"><?= $_TXT[81]; ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pswrd_2" class="col-md-3 col-form-label"><?= $_TXT[82]; ?></label>
                            <div class="col-md-6">
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="password" class="form-control"  name="name6" id="confirm_pass" onkeyup="active_2()" required>
                          

                                    <div class="input-group-prepend">
                                        <button type="button"
                                            class="input-group-text theme-btn--dark1 btn--md show-password" onclick="myreFunction()"><?= $_TXT[81]; ?></button>
                                    </div>
                                </div>
                            </div>
                            <span id="wrong_pass_alert" style="text-align: center;"></span>
                        </div>
                       
                        <div class="form-group row">
                            <label for="birthdate" class="col-md-3 col-form-label"><?= $_TXT[83]; ?></label>
                            <div class="col-md-6">
                                <input type="text"  name="name7" class="form-control" id="birthdate" placeholder="MM/DD/YYYY">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Address" class="col-md-3 col-form-label"><?= $_TXT[84]; ?></label>
                            <div class="col-md-6">
                                <select class="form-control"  name="name8">
                                    <?php
                                    $query4="SELECT * from address";
                                    $result4 = mysqli_query($conn,$query4);
                                    if (mysqli_num_rows($result4) > 0){
                                      while ($row4 = mysqli_fetch_assoc($result4)){
                                        $address = $row4['address'];
                                    ?>
                                    <option value="<?php echo $address; ?>"><?php echo $address; ?></option>
                                    <?php
                                    }
                                } ?>
                                  </select>
                            </div>
                        </div>
                         <div class="form-group row">
                                                <label class="col-md-3" for="zip"><?= $_TXT[85]; ?></label>
                                                <div class="col-md-6">
                                                    <input class="form-control"  name="name9" id="zip" name="postcode" type="text"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                              <label class="col-md-3" for="Street"><?= $_TXT[86]; ?></label>
                                              <div class="col-md-6">
                                                  <input class="form-control"  name="name10" id="Street" name="postcode" type="text"
                                                      required="">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-md-3" for="Building"><?= $_TXT[87]; ?></label>
                                            <div class="col-md-6">
                                                <input class="form-control"  name="name11" id="Building" name="postcode" type="text"
                                                    required="">
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="phone"><?= $_TXT[88]; ?></label>
                                                <div class="col-md-6">
                                                    <input class="form-control"  name="name12" id="phone" type="text" required>
                                                </div>
                                            </div>
                        
                        <div class="col-12">
                            <div class="sign-btn text-right">
                                <button type="submit" name="submit" id="create" onclick="wrong_pass_alert()" class="btn theme-btn--dark1 btn--md"><?= $_TXT[89]; ?></button>
                            </div>
                        </div>
                    </form>
          
                </div>
            </div>
        </div>
    </div>
</div>


<!-- product tab end -->
<!-- footer strat -->
<?php  

$query="select * from footer limit 1";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0):
 while ($row = mysqli_fetch_assoc($result)):
 $url1 = $row['url1'];
 $url2 = $row['url2'];
 $url3 = $row['url3'];
 $text = $row[$_TXT[50]];
 $image = $row['image'];
?>
<footer class="bg-lighten2 theme1 position-relative">
<!-- footer bottom start -->
<div class="footer-bottom pt-70 pb-30">
<div class="container">
   <div class="row">
       <div class="col-12 col-sm-6 col-lg-6 mb-30">
           <div class="footer-widget">
               <div class="footer-logo mb-30">
                   <a href="index1.php">
                       <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="footer logo">
                   </a>
               </div>
              
               <div class="social-network">
                   <h2 class="title text mb-20 text-capitalize"><?php echo $text; ?></h2>
                   <ul class="d-flex">
                       <li><a href="<?php echo $url1; ?>" target="_blank"><span
                                   class="ion-social-facebook"></span></a></li>
                       <li><a href="<?php echo $url3; ?>" target="_blank"><span
                                   class="ion-social-whatsapp"></span></a></li>
                       <li class="mr-0"><a href="<?php echo $url2; ?>" target="_blank"><span
                                   class="ion-social-instagram-outline"></span></a></li>
                   </ul>
               </div>
           </div>
       </div>
       <div class="col-12 col-sm-6 col-lg-2 mb-30">
           <div class="footer-widget">
               <div class="section-title mb-20">
                   <h2 class="title text-dark text-capitalize"> <a href="Security.php"> <?= $_TXT[51]; ?> </a> </h2>
               </div>
           </div>
       </div>
       <div class="col-12 col-sm-6 col-lg-2 mb-30">
           <div class="footer-widget">
               <div class="section-title mb-20">
                   <h2 class="title text-dark text-capitalize"><a href="FAQ Q&A.php"><?= $_TXT[52]; ?></a></h2>
               </div>
              
           </div>
       </div>
       <div class="col-12 col-sm-6 col-lg-2 mb-30">
           <div class="footer-widget">
               <div class="section-title mb-20">
                   <h2 class="title text-dark text-capitalize"> <a href="contact.php"><?= $_TXT[53]; ?></a> </h2>
               </div>
           </div>
       </div>
   </div>
</div>
</div>
<!-- footer bottom end -->

<!-- coppy-right start -->
<div class="coppy-right">
<div class="container">
   <div class="row">
       <div class="col-12">
           <div class="border-top py-20">
               <div class="row">
                   <div class="col-12 col-md-5 col-lg-4 col-xl-3 order-last order-md-first">
                       <div class="text-center text-lg-left">
                           <p class="mb-3 mb-md-0">
                           <?= $_TXT[54]; ?> &copy; <?= $_TXT[55]; ?></p>
                       </div>
                   </div>
                   <div class="col-12 col-md-7 col-lg-8 col-xl-9">
                       <ul
                           class="footer-menu copyright-menu d-flex flex-wrap justify-content-center justify-content-md-end">
                           <li><a href="#"><?= $_TXT[56]; ?></a></li>
                           <li><a href="#"><?= $_TXT[57]; ?></a></li>

                           <li><a href="#"><?= $_TXT[58]; ?></a></li>

                           <li><a href="#"><?= $_TXT[59]; ?></a></li>

                           <li><a href="login.php"><?= $_TXT[60]; ?></a></li>

                           <li><a href="myaccount.php"><?= $_TXT[61]; ?></a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
</div>
<!-- coppy-right end -->
</footer>
<?php endwhile; ?>
<?php endif; ?>
  <!-- footer end -->
  

<!-- footer end -->



    <!--*********************** 
        all js files
     ***********************-->

    <!--****************************************************** 
        jquery,modernizr ,poppe,bootstrap,plugins and main js
     ******************************************************-->
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins/plugins.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function myFunction() {
          var x = document.getElementById("pass");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
    
        function myreFunction() {
          var y = document.getElementById("confirm_pass");
          if (y.type === "password") {
            y.type = "text";
          } else {
            y.type = "password";
          }
        }
    </script> 

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->

    <!--*************************** 
          Minified  js 
     ***************************-->

    <!--*********************************** 
         vendor,plugins and main js
      ***********************************-->

    <!-- <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    <script src="assets/js/main.js"></script> -->

    <script>
		function active_2() {

			var pass = document.getElementById('pass').value;
			var confirm_pass = document.getElementById('confirm_pass').value;
			if (pass != confirm_pass) {
				document.getElementById('wrong_pass_alert').style.color = 'red';
				document.getElementById('wrong_pass_alert').innerHTML
				= '☒ <?= $_TXT[90]; ?>';
				document.getElementById('create').disabled = true;
				document.getElementById('create').style.opacity = (0.4);
			} else {
				document.getElementById('wrong_pass_alert').style.color = 'green';
				document.getElementById('wrong_pass_alert').innerHTML =
					'🗹 <?= $_TXT[91]; ?>';
				document.getElementById('create').disabled = false;
				document.getElementById('create').style.opacity = (1);
			}
		}


	</script>

<script> 
    let input = document.querySelector('#pass')
let formGroup = document.querySelector('.form-group')
let message = document.querySelector('.message')
let passTypeToggle = document.querySelector('.passTypeToggle')
let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')

document.body.addEventListener('click', function (e) {
    if (input.contains(e.target)) {
        formGroup.classList.add('focus')
    } else {
        if(input.value == ''){
            formGroup.classList.remove('focus')
        }
    }
});

let checkPasswordStrength = (password) => {
    let message = {}

    if(strongPassword.test(password)) {
        message = {
            strength : 'strong'
        }
    } else if(mediumPassword.test(password)) {
        message = {
            strength : 'medium'
        }
    } else {
        message = {
            strength : 'weak'
        }
    }
    return message
}

input.addEventListener('keyup', e => {
    let password = e.target.value

    password != "" ? passTypeToggle.style.display = 'block' : passTypeToggle.style.display = 'none'

    if(password == ''){
        message.classList.remove('weak')
        message.classList.remove('medium')
        message.classList.remove('strong')

        formGroup.classList.remove('weak')
        formGroup.classList.remove('medium')
        formGroup.classList.remove('strong')

        message.innerHTML = ''
    }else{
        let result = checkPasswordStrength(password)

        if(result.strength == 'weak'){
            message.classList.remove('medium')
            message.classList.remove('strong')
            formGroup.classList.remove('medium')
            formGroup.classList.remove('strong')
            message.classList.add('weak')
            formGroup.classList.add('weak')
            message.innerHTML = '<?= $_TXT[92]; ?>'
        }else if(result.strength == 'medium'){
            formGroup.classList.remove('weak')
            formGroup.classList.remove('strong')
            message.classList.remove('weak')
            message.classList.remove('strong')
            message.classList.add('medium')
            formGroup.classList.add('medium')
            message.innerHTML = '<?= $_TXT[93]; ?>'
        }else{
            formGroup.classList.remove('weak')
            formGroup.classList.remove('medium')
            message.classList.remove('weak')
            message.classList.remove('medium')
            message.classList.add('strong')
            formGroup.classList.add('strong')
            message.innerHTML = '<?= $_TXT[94]; ?>'
        }
    }

})
</script>

</body>

</html>