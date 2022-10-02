<?php
session_start();

include("db_config.php");

if(!isset($_SESSION['id1'])){
    $_SESSION['id1'] = null;
}else {
    $id1 = $_SESSION['id1'];
    
}

if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "en";  header("Location: myaccount.php");}
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"];  header("Location: myaccount.php");}

require "lang/myaccount-".$_SESSION["lang"].".php";

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

<!-- offcanvas-setting Start -->
<div id="offcanvas-setting" class="offcanvas offcanvas-cart theme1">
    <div class="inner">
        <div class="head d-flex justify-content-between">
            <span class="title"><?= $_TXT[39]; ?></span>
            <button class="offcanvas-close">×</button>
        </div>
    <?php if (isset($_SESSION['id1'])){ ?>
        <div class="content_setting">
            <div class="info_setting">
                <ul>
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

                </ul>
            </div>

            <div class="info_setting">
                <h3 class="title_setting"><?= $_TXT[44]; ?></h3>
                <ul>
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
                </ul>
                <div id="div1"></div>
            </div>
            <div class="info_setting">
                <div class="title_setting"><?= $_TXT[47]; ?></div>
                <ul>
                    <li class="active"><a href="#"><?= $_TXT[48]; ?></a></li>
                </ul>
            </div>

        </div>
<?php }else { ?>
    <div class="content_setting">
            <div class="info_setting">
                <h3 class="title_setting"><?= $_TXT[40]; ?></h3>
                <ul>
                    <li>
                        <a href="register.php"><?= $_TXT[49]; ?></a>
                    </li>
                    <li>
                        <a href="checkout.php"><?= $_TXT[41]; ?></a>
                    </li>
                    <li>
                     <a href="Admin Store PDD/material-dashboard-master/examples/index.php" style="font-size: 15px; font-weight: bold; "><?= $_TXT[43]; ?></a>
                    </li>

                </ul>
            </div>
           
            <div class="info_setting">
                <h3 class="title_setting"><?= $_TXT[44]; ?></h3>
                <ul>
                  
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
                </ul>
                <div id="div1"></div>
            </div>
           
            
            <div class="info_setting">
                <div class="title_setting"><?= $_TXT[47]; ?></div>
                <ul>
                    <li class="active"><a href="#"><?= $_TXT[48]; ?></a></li>
                </ul>
            </div>

        </div>
        <?php }?>

    </div>
</div>
<!--offcanvas-setting End -->


<?php  

         $query="select * from header limit 1";
         $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result) > 0){
          while ($row = mysqli_fetch_assoc($result)){
          $logo = $row['weblogo'];

      }
    }
         ?>


<!-- header start -->
<header id="sticky" class="header style2 theme1">
  <!-- header-middle satrt -->
  <div class="header-middle px-xl-4">
    <div class="container position-relative">
      <div class="row align-items-center">
        <div class="col-9 col-xl-7 position-xl-relative">
          <div class="d-flex align-items-center justify-content-lg-between">
            <div class="logo mr-lg-5 mr-xl-0">
              <a href="index1.php"
                ><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($logo); ?>" alt="logo"
              /></a>
            </div>
            <nav class="header-bottom theme1 d-none d-lg-block">
              <ul class="main-menu d-flex align-items-center">
                <li class="active">
                  <a href="index1.php" class="pl-0"
                    ><?= $_TXT[3]; ?> </a>
                
                </li>
                <li class="position-static">
                  <a href=" #"><?= $_TXT[4]; ?> <i class="ion-ios-arrow-down"></i></a>
                  <ul class="mega-menu mega-menu-custom-with row">

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
                                    <li class="col-12 mt-4">
                                        <a href="single-product-configurable.php" class="zoom-in overflow-hidden d-block">
                                        <?php 
                                             $query="SELECT * from all_inner_sliders limit 1";
                                             $result = mysqli_query($conn,$query);
                                             if (mysqli_num_rows($result) > 0){
                                             while ($row = mysqli_fetch_assoc($result)){
                                                $image1 = $row['image1'];
                                             }
                                            }
                                            ?>
                                            <img class="w-100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image1); ?>" style="width:1009px; height:208px;" alt="img">
                                        </a>
                                    </li>
                  </ul>
                </li>
              
                <li><a href="contact.php"><?= $_TXT[24]; ?></a></li>
                <li><a href="store.php"><?= $_TXT[25]; ?></a></li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="col-3 col-xl-5">
          <!-- search-form end -->
          <div class="d-flex align-items-center justify-content-end">
            <div class="cart-block-links theme1">
              <ul class="d-flex align-items-center">
                <li>
                  <a href="javascript:void(0)" class="search search-toggle">
                    <i class="ion-ios-search-strong"></i>
                  </a>
                </li>
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
                                        <span class="badge cbdg1" ><?php echo $num2?></span>
                                    </a>
                                </li>
                <li class="mr-0 cart-block">
                  <a class="offcanvas-toggle" href="#offcanvas-setting">
                    <i class="ion-android-settings"></i>
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
                    id="top"
                  ></path>
                  <path d="M300,320 L540,320" id="middle"></path>
                  <path
                    d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                    id="bottom"
                    transform="translate(480, 320) scale(1, -1) translate(-480, -318)"
                  ></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- header-middle end -->
</header>
<!-- header end -->

<!-- breadcrumb-section start -->
<?php 
    $query="SELECT * from all_inner_sliders limit 1";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
    $image3 = $row['image3'];
      }
  }
  ?>
                                           
<nav class="breadcrumb-section theme1 breadcrumb-bg1" style="
        background-image: url('data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image3); ?>')">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title text-center my-20">
        <h2 class="title text-dark text-capitalize"><?= $_TXT[66]; ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol
          class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center"
        >
          <li class="breadcrumb-item"><a href="index1.php"><?= $_TXT[67]; ?></a></li>
          <li class="breadcrumb-item active" aria-current="page">
          <?= $_TXT[68]; ?>
          </li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->

<!-- product tab start -->

<div class="my-account pb-40">
    <div class="container grid-wraper">
        <div class="row">
            <div class="col-12">
            <h3 class="title text-capitalize"><?= $_TXT[69]; ?></h3>
            </div>
            <!-- My Account Tab Menu Start -->
            <div class="col-lg-3 col-12 mb-30">
                <div class="myaccount-tab-menu nav" role="tablist">

                <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                    <?= $_TXT[70]; ?></a>

                    <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i>
                    <?= $_TXT[71]; ?></a>

                    <a href="#address-edit" data-toggle="tab" ><i class="fa fa-map-marker"></i>
                    <?= $_TXT[72]; ?></a>

                    <a href="#account-info" data-toggle="tab" class="active"><i class="fa fa-user"></i> <?= $_TXT[73]; ?></a>

                    <a href="logout.php"> <i class="fas fa-sign-out-alt"></i><?= $_TXT[74]; ?></a>
                </div>
            </div>
            <!-- My Account Tab Menu End -->

            <!-- My Account Tab Content Start -->
            <div class="col-lg-9 col-12 mb-30">
                <div class="tab-content" id="myaccountContent">

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <div class="myaccount-content">
                        <h3><?= $_TXT[75]; ?></h3>

                            <div class="myaccount-table table-responsive text-center">

                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><?= $_TXT[76]; ?></th>
                                            <th><?= $_TXT[77]; ?></th>
                                            <th><?= $_TXT[78]; ?></th>
                                            <th><?= $_TXT[79]; ?></th>
                                            <th><?= $_TXT[80]; ?></th>
                                        </tr>
                                    </thead>
                                    <?php
                                if(!isset($_SESSION['id1'])){
                                    echo ' <h3>'.$_TXT[89].'</h3>';
                                }else{
                                    $i=1;
                                    $id1 = $_SESSION['id1'];
                                    $query2="SELECT * from user_product where id_user = '$id1' ";
                                    $result2 = mysqli_query($conn,$query2);
                                    if (mysqli_num_rows($result2) > 0){
                                    while ($row1 = mysqli_fetch_assoc($result2)){
                                        $product_name = $row1[$_TXT[81]];
                                        $order_date = $row1['order_date'];
                                        $order_status = $row1[$_TXT[82]];
                                        $total = $row1['total'];
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $product_name; ?></td>
                                            <td><?php echo $order_date; ?></td>
                                            <td><?php echo $order_status; ?></td>
                                            <td><?php echo $total; ?> <?= $_TXT[83]; ?></td>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php 
                                $i++;    
                                }
                            }
                        }
                        ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="payment-method" role="tabpanel">
                        <div class="myaccount-content">
                        <h3><?= $_TXT[84]; ?></h3>
                            <?php
                                if(!isset($_SESSION['id1'])){
                                    echo ' <h3>'.$_TXT[89].'</h3>';
                                }else{
                          
                                    $id1 = $_SESSION['id1'];
                                    $query2="SELECT * from card_details_or_cash where id_user = '$id1' ";
                                    $result2 = mysqli_query($conn,$query2);
                                    if (mysqli_num_rows($result2) > 0){
                                        while ($row1 = mysqli_fetch_assoc($result2)){
                                            $pay = $row1['cash'];
                                            if ($pay == 1){
                                                echo '<p class="saved-message">'.$_TXT[85].'</p>';
                                            }else{
                                                echo '<p class="saved-message">'.$_TXT[86].'</p>';
                                            }
                                        
                                        }
                            }else{
                                echo '<p class="saved-message">'.$_TXT[87].'</p>';
                            }
                        }
                        ?>
                            
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                        <div class="myaccount-content">
                            <h3><?= $_TXT[88]; ?></h3>

                            <?php if (!isset($_SESSION['id1'])){ ?>
                                <address>
                                <p><strong><?= $_TXT[89]; ?></strong></p>

                            </address>
                                <?php }else{  
                                    $id1 = $_SESSION['id1'];
                                    $query="SELECT * FROM end_user where id = '$id1' limit 1";
                                    $result = mysqli_query($conn,$query);
                                   if (mysqli_num_rows($result) > 0){
                                     while ($row = mysqli_fetch_assoc($result)){
                                     $address = $row['address'];
                                     $Area_name = $row['Area_name'];
                                     $Street_name = $row['Street_name'];
                                     $Building_number = $row['Building_number'];
                                     $Phone = $row['Phone'];
                                 }
                               }?>
                            <address>
                                <p><strong><?php echo $address ?></strong></p>
                                <p><?php echo $Area_name; ?> <br>
                                <?php echo $Street_name; ?></p>
                                <p><?= $_TXT[103]; ?> <?php echo $Building_number; ?></p>
                                <p><?= $_TXT[104]; ?> <?php echo $Phone; ?></p>
                            </address>
                            <?php }?>

                            <a href="edit_address.php" class="ht-btn black-btn d-inline-block edit-address-btn"><i
                                    class="fa fa-edit"></i> <?= $_TXT[90]; ?></a>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade active show" id="account-info" role="tabpanel">
                        <div class="myaccount-content">
                            <h3><?= $_TXT[91]; ?></h3>
                            
                            <?php if (!isset($_SESSION['id1'])){ ?>    
                            <div class="account-details-form">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="first-name" placeholder="<?= $_TXT[92]; ?>" type="text">
                                        </div>

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="last-name" placeholder="<?= $_TXT[93]; ?>" type="text">
                                        </div>

                                        <div class="col-12 mb-30">
                                            <input id="display-name" placeholder="<?= $_TXT[94]; ?>" type="text">
                                        </div>

                                        <div class="col-12 mb-30">
                                            <input id="email" placeholder="<?= $_TXT[95]; ?>" type="email">
                                        </div>

                                        <div class="col-12 mb-30">
                                            <h4><?= $_TXT[96]; ?></h4>
                                        </div>

                                        <div class="col-12 mb-30">
                                            <input id="current-pwd" placeholder="<?= $_TXT[97]; ?>" type="password">
                                        </div>
                                        <div class="col-md-6">
  
                                                <div class="input-group-prepend">
                                                    <button type="button"
                                                        class="input-group-text  theme-btn--dark1 btn--md show-password" onclick="myFunction1()"><?= $_TXT[98]; ?></button>
                                                </div>
                                        

                  

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="new-pwd" placeholder="<?= $_TXT[99]; ?>" type="password">
                                        </div>

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="confirm-pwd" placeholder="<?= $_TXT[100]; ?>" type="password">
                                        </div>

                                        <div class="col-12">
                                            <button class="btn theme-btn--dark1 btn--md" disabled><?= $_TXT[101]; ?></button><br><br>
                                            
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <?php }else {?>
                                <?php
                                             $id1 = $_SESSION['id1'];
                                             $query="SELECT * FROM end_user where id = '$id1' limit 1";
                                             $result = mysqli_query($conn,$query);
                                            if (mysqli_num_rows($result) > 0){
                                              while ($row = mysqli_fetch_assoc($result)){
                                              $first_name = $row['first_name'];
                                              $last_name = $row['last_name'];
                                              $username = $row['username'];
                                              $email = $row['email'];
                                              $password = $row['password'];
                                    
                                          }
                                        } ?>
                                <div class="account-details-form">
                                <form action="#" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="first-name" name="name1" placeholder="<?= $_TXT[92]; ?>" type="text" value="<?php echo $first_name; ?>">
                                        </div>

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="last-name" name="name2" placeholder="<?= $_TXT[93]; ?>" type="text" value="<?php echo $last_name; ?>">
                                        </div>

                                        <div class="col-12 mb-30">
                                            <input id="display-name" name="name3" placeholder="<?= $_TXT[94]; ?>" type="text" value="<?php echo $username; ?>">
                                        </div>

                                        <div class="col-12 mb-30">
                                            <input id="email" name="name4" placeholder="<?= $_TXT[95]; ?>" type="email" value="<?php echo $email; ?>">
                                        </div>
                                        <div class="col-12">
                                            <button class="btn theme-btn--dark1 btn--md" name="submit2" ><?= $_TXT[96]; ?></button>
                                        </div><br><br>


                                        <div class="col-12 mb-30">
                                            <h4><?= $_TXT[97]; ?></h4>
                                        </div>

                                        <div class="col-12 mb-30">
                                            <input id="current-pwd"  placeholder="<?= $_TXT[97]; ?>"  type="password" value="<?php echo $password; ?>">
                                            <div class="input-group-prepend"><br>
                                                <button type="button"
                                                    class="input-group-text  theme-btn--dark1 btn--md show-password" onclick="myFunction1()"><?= $_TXT[98]; ?></button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="new-pwd" name="name5" placeholder="<?= $_TXT[99]; ?>"    type="password">
                                        </div>

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="confirm-pwd" name="name6" placeholder="<?= $_TXT[100]; ?>" onkeyup="active_2()"   type="password">
                                        </div>


                                        <span id="wrong_pass_alert" style="text-align: center;"></span>

                                        <div class="col-12">
                                            <button class="btn theme-btn--dark1 btn--md" id="create" name="submit3" onclick="wrong_pass_alert()" ><?= $_TXT[101]; ?></button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                </div>
            </div>
            <!-- My Account Tab Content End -->
        </div>
    </div>
</div>
<!-- product tab end -->


<!--Change the information-->
<?php
if (isset($_POST['submit2'])){
    $id1 = $_SESSION['id1'];
    $name1 = $_POST['name1'];
    $name2 = $_POST['name2'];
    $name3 = $_POST['name3'];
    $name4 = $_POST['name4'];

    $query="UPDATE `end_user` SET `first_name`='$name1',`last_name`='$name2',`username`='$name3',`email`='$name4' WHERE id = $id1";
    $result = mysqli_query($conn,$query);
    echo '<script> window.location.href = "myaccount.php"; </script>';
}


if (isset($_POST['submit3'])){
    $id1 = $_SESSION['id1'];
    $name5 = $_POST['name5'];
    $name6 = $_POST['name6'];

    $query="UPDATE `end_user` SET `password`='$name5',`re_password`='$name6' WHERE id = $id1";
    $result = mysqli_query($conn,$query);
    echo '<script> window.location.href = "myaccount.php"; </script>';
}


?>

<!--end change-->





  
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
  
  <!-- search-box and overlay start -->
  <div class="overlay">
    <div class="scale"></div>
    <form class="search-box" action="shop-grid-4-column-search.php" method="GET">
        <input type="text" name="search" placeholder="<?= $_TXT[62]; ?>" />
        <div class="dropdown" >
        <img src="Icons and Images/Icons and Images/22.png" onclick="myFunction()" class="dropbtn" width="20px" height="20px" style="position: relative; top: -60%; left: 93%; ">
        <div id="myDropdown" class="dropdown-content">
            <input type="checkbox" id="fruit1" name="check[]" value="Products">
            <label for="fruit1"><?= $_TXT[63]; ?></label>
            <input type="checkbox" id="fruit2" name="check[]" value="Shops">
            <label for="fruit2"><?= $_TXT[64]; ?></label>
            <input type="checkbox" id="fruit3" name="check[]" value="All" checked>
            <label for="fruit3"><?= $_TXT[65]; ?></label>
        </div>
</div>
        <button id="close" type="submit" name="submit"><i class="ion-ios-search-strong"></i></button>
    </form>
    <button class="close"><i class="ion-android-close"></i></button>
</div>






<script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }
    
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
    </script>


<style>



.dropdown {
  position: relative;
  top: -60%;
  left: 91%;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  overflow: hidden;
}

.dropdown-content input {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}


.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

input[type=checkbox] + label {
  display: block;
  margin: 0.2em;
  cursor: pointer;
  padding: 0.002em;
}

input[type=checkbox] {
  display: none;
}

input[type=checkbox] + label:before {
  content: "\2714";
  border: 0.1em solid #000;
  border-radius: 0.2em;
  display: inline-block;
  width: 20px;
  height: 20px;
  padding-left: 0.09em;
  padding-bottom: 0.1em;
  margin-right: 0.2em;
  vertical-align: bottom;
  color: transparent;
  transition: .2s;
}



input[type=checkbox]:checked + label:before {
  background-color: MediumSeaGreen;
  border-color: MediumSeaGreen;
  color: #fff;
}


 
</style>
  <!-- search-box and overlay end -->



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
        function myFunction1() {
          var x = document.getElementById("current-pwd");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }


        function active_2() {

var pass = document.getElementById('new-pwd').value;
var confirm_pass = document.getElementById('confirm-pwd').value;
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