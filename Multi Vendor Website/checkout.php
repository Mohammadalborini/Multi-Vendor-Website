<?php
session_start();

include("db_config.php");

if(!isset($_SESSION['id1'])){
    $_SESSION['id1'] = null;
}else {
    $id1 = $_SESSION['id1'];
    
}

    if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "en";  }
    if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }
    
    require "lang/checkout-".$_SESSION["lang"].".php";




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="" />
    <title><?=$_TXT[0]?> </title>
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
    <style>
      .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 99999999; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      }
      /* Modal Content */
      .modal-content {
        background-color: #fefefe;
        margin: auto;
        margin-top:120px;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
      }
      
      /* The Close Button */
      .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }
      
      .close:hover,
      .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        
      }
      </style>

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

<!-- header start -->
<?php  

         $query="select * from header limit 1";
         $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result) > 0){
          while ($row = mysqli_fetch_assoc($result)){
          $logo = $row['weblogo'];

      }
    }
         ?>
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
    $image9 = $row['image9'];
      }
  }
  ?>
                                           
<nav class="breadcrumb-section theme1 breadcrumb-bg1" style="
        background-image: url('data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image9); ?>')">
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
<section class="check-out-section pb-40">
    <div class="container grid-wraper">
        <div class="row">
            <div class="col-lg-8 mb-30">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    1 <?= $_TXT[69]; ?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body">
                                <?php if (!isset($_SESSION['id1'])){  ?>
                                <form action="" method="POST" class="personal-information">
                                    <div class="order-asguest mt-2 mb-4">
                                        <a href="#"><?= $_TXT[70]; ?></a> <span class="separator"></span>
                                        <a class="gray" href="login.php"><?= $_TXT[71]; ?></a>
                                    </div>

                                    <div class="form-group row">
                                        <label for="myText" class="col-md-3 col-form-label"><?= $_TXT[72]; ?></label>
                                        <div class="col-md-6">
                                            <input type="text" name="name1" id="myText" class="form-control" onkeyup="btnActivation()">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="myText2" class="col-md-3 col-form-label"><?= $_TXT[73]; ?></label>
                                        <div class="col-md-6">
                                            <input type="text" name="name2" id="myText2" class="form-control" onkeyup="btnActivation()">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="myText3" class="col-md-3 col-form-label"><?= $_TXT[74]; ?></label>
                                      <div class="col-md-6">
                                          <input type="text" name="name3" id="myText3" class="form-control"   onkeyup="btnActivation()" required>
                                      </div>
                                  </div>
                                    <div class="form-group row">
                                        <label for="myText4" class="col-md-3 col-form-label"><?= $_TXT[75]; ?></label>
                                        <div class="col-md-6">
                                            <input type="email" name="name4" id="myText4" class="form-control" onkeyup="btnActivation()">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="myText5" class="col-md-3 col-form-label"><?= $_TXT[76]; ?></label>
                                        <div class="col-md-6">
                                            <input type="text" name="name5" class="form-control" id="myText5"
                                                placeholder="MM/DD/YYYY" onkeyup="btnActivation()">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3"></div>
                                        <div class="col-12">
                                            <div class="sign-btn text-right">
                                                  <button class="btn theme-btn--dark1 btn--md" data-toggle="collapse" data-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo" id="start_button" disabled>
                                                        <?= $_TXT[77]; ?>
                                                  </button>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <?php }else { ?>
                                <form action="" method="POST" class="personal-information">
                                    <div class="order-asguest mt-2 mb-4">
                                        <a href="#"><?= $_TXT[70]; ?></a> <span class="separator"></span>
                                        <a class="gray" href="login.php"><?= $_TXT[71]; ?></a>
                                    </div>
                                    <?php
                                    $id1 = $_SESSION['id1'];
                                    $query="SELECT * from end_user where id = '$id1' ";
                                    $result = mysqli_query($conn,$query);
                                    if (mysqli_num_rows($result) > 0){
                                    while ($row = mysqli_fetch_assoc($result)){
                                       $firest_name = $row['first_name'];
                                       $last_name = $row['last_name'];
                                       $username= $row['username'];
                                       $email = $row['email'];
                                       $birthday = $row['birthday'];
                                    }
                                    }
                                    ?>
                                    <div class="form-group row">
                                        <label for="myText" class="col-md-3 col-form-label"><?= $_TXT[72]; ?></label>
                                        <div class="col-md-6">
                                            <input type="text" id="myText" name="name1" class="form-control" value="<?php echo  $firest_name; ?>" onkeyup="btnActivation()">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="myText2" class="col-md-3 col-form-label"><?= $_TXT[73]; ?></label>
                                        <div class="col-md-6">
                                            <input type="text" name="name2" id="myText2" class="form-control" value="<?php echo $last_name; ?>" onkeyup="btnActivation()">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="myText3" class="col-md-3 col-form-label"><?= $_TXT[74]; ?></label>
                                      <div class="col-md-6">
                                          <input type="text" name="name3" id="myText3" class="form-control" value="<?php echo $username; ?>"   onkeyup="btnActivation()" required>
                                      </div>
                                  </div>
                                    <div class="form-group row">
                                        <label for="myText4" class="col-md-3 col-form-label"><?= $_TXT[75]; ?></label>
                                        <div class="col-md-6">
                                            <input type="email" name="name4" id="myText4" value="<?php echo $email; ?>" class="form-control" onkeyup="btnActivation()">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="myText5" class="col-md-3 col-form-label"><?= $_TXT[76]; ?></label>
                                        <div class="col-md-6">
                                            <input type="text" name="name5" class="form-control" value="<?php echo $birthday; ?>" id="myText5"
                                                placeholder="MM/DD/YYYY" onkeyup="btnActivation()">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3"></div>
                                        <div class="col-12">
                                            <div class="sign-btn text-right">
                                                  <button class="btn theme-btn--dark1 btn--md" data-toggle="collapse" data-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo" id="start_button" >
                                                        <?= $_TXT[77]; ?>
                                                  </button>
                                            </div>
                                        </div>
                                    </div>
                              
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    2 <?= $_TXT[78]; ?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="checkout-inner border-0">
                                    <div class="checkout-address p-0">
                                        <p>
                                        <?= $_TXT[79]; ?>
                                        </p>
                                    </div>
                                    <div class="check-out-content">
                                    <?php if (!isset($_SESSION['id1'])){  ?>
                                        <form id="contact-form" class="p-0" action="" method="POST">
                                            <div class="form-group row">
                                              <label for="Address" class="col-md-3 col-form-label"><?= $_TXT[80]; ?></label>
                                              <div class="col-md-6">
                                                  <select class="form-control" name="name6">
                                                      <option value="Amman"><?= $_TXT[81]; ?></option>
                                                      <option value="Irbid"><?= $_TXT[82]; ?></option>
                                                      <option value="Mafraq"><?= $_TXT[83]; ?></option>
                                                      <option value="Jerash"><?= $_TXT[84]; ?></option>
                                                      <option value="Ajloun"><?= $_TXT[85]; ?></option>
                                                      <option value="Zarqa"><?= $_TXT[86]; ?></option>
                                                      <option value="Balqa"><?= $_TXT[87]; ?></option>
                                                      <option value="Madaba"><?= $_TXT[88]; ?></option>
                                                      <option value="Karak"><?= $_TXT[89]; ?></option>
                                                      <option value="Aqaba"><?= $_TXT[90]; ?></option>
                                                      <option value="Ma'an"><?= $_TXT[91]; ?></option>
                                                      <option value="Tafila"><?= $_TXT[92]; ?></option>
                                                    </select>
                                              </div>
                                          </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="zip"><?= $_TXT[93]; ?></label>
                                                <div class="col-md-6">
                                                    <input class="form-control" name="name7" id="zip" name="postcode" type="text"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                              <label class="col-md-3" for="Street"><?= $_TXT[94]; ?></label>
                                              <div class="col-md-6">
                                                  <input class="form-control" name="name8" id="Street" name="postcode" type="text"
                                                      required="">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-md-3" for="Building"><?= $_TXT[95]; ?></label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="name9" id="Building" name="postcode" type="text"
                                                    required="">
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="phone"><?= $_TXT[96]; ?></label>
                                                <div class="col-md-6">
                                                    <input class="form-control" name="name10" id="phone" type="text" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <div class="filter-check-box mb-0">
                                                        <input type="checkbox" id="20824" required="">
                                                        <label class="checkout" for="20824"><?= $_TXT[97]; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-12 text-right">
                                                  <button class="btn theme-btn--dark1 btn--md" data-toggle="collapse" data-target="#collapseThree"
                                                  aria-expanded="false" aria-controls="collapseTwo">
                                                  <?= $_TXT[98]; ?>
                                            </button>
                                                </div>
                                            </div>
                                       
                                        <?php }else { ?>
                                            <form id="contact-form" class="p-0" action="" method="POST">
                                            <div class="form-group row">
                                              <label for="Address" class="col-md-3 col-form-label"><?= $_TXT[80]; ?></label>
                                              <div class="col-md-6">
                                              <?php
                                                $id1 = $_SESSION['id1'];
                                                $query="SELECT * from end_user where id = '$id1' ";
                                                $result = mysqli_query($conn,$query);
                                                if (mysqli_num_rows($result) > 0){
                                                while ($row = mysqli_fetch_assoc($result)){
                                                $address = $row['address'];
                                                $Area_name = $row['Area_name'];
                                                $Street_name= $row['Street_name'];
                                                $Building_number = $row['Building_number'];
                                                $Phone = $row['Phone'];
                                                }
                                            }
                                                ?>
                                                  <select class="form-control" name="name6">
                                                      <option value="<?php echo $address; ?>"><?php echo $address; ?></option>
                                                    </select>
                                              </div>
                                          </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="zip"><?= $_TXT[93]; ?></label>
                                                <div class="col-md-6"> 
                                                    <input class="form-control" name="name7"  value="<?php echo $Area_name; ?>" id="zip" name="postcode" type="text"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                              <label class="col-md-3" for="Street"><?= $_TXT[94]; ?></label>
                                              <div class="col-md-6">
                                                  <input class="form-control" name="name8" value="<?php echo $Street_name; ?>" id="Street" name="postcode" type="text"
                                                      required="">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-md-3" for="Building"><?= $_TXT[95]; ?></label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="name9" value="<?php echo $birthday; ?>" id="Building" name="postcode" type="text"
                                                    required="">
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="phone"><?= $_TXT[96]; ?></label>
                                                <div class="col-md-6">
                                                    <input class="form-control" name="name10"  value="<?php echo $Phone; ?>" id="phone" type="text" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <div class="filter-check-box mb-0">
                                                        <input type="checkbox" id="20824" required="">
                                                        <label class="checkout" for="20824"><?= $_TXT[97]; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-12 text-right">
                                                  <button class="btn theme-btn--dark1 btn--md" data-toggle="collapse" data-target="#collapseThree"
                                                  aria-expanded="false" aria-controls="collapseTwo">
                                                  <?= $_TXT[98]; ?>
                                            </button>
                                                </div>
                                            </div>
                                       
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span>3</span> <?= $_TXT[99]; ?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordion">
                            <div class="card-body">
                                <div class="delivery-options-list">

                                
                                      <div class="filter-check-box mb-0">
                                        <input type="checkbox" id="cash" value="1" name="cash" onclick="terms_changed(this)">
                                        <label class="checkout" for="cash" ><?= $_TXT[100]; ?></label>
                                    </div><br>

                                    <?php
                                    $id1 = $_SESSION['id1'];
                                    $query="SELECT * from address where address = '$address' ";
                                    $result = mysqli_query($conn,$query);
                                    if (mysqli_num_rows($result) > 0){
                                    while ($row = mysqli_fetch_assoc($result)){
                                        if (isset($row['promo_code']) == null){
                                            $promo = 'there is no promo code';
                                        }else {
                                            $promo = $row['promo_code'];
                                            $price_descount =  $row['price'];
                                        }
                                    }
                                }
                                    ?>
                                    <h6 style="color:black;"><?= $_TXT[101]; ?> <?php echo $promo; ?></h6><br>
                                    <div class="filter-check-box mb-0">
                                      <input type="text" id="promo" name="name11">
                                      <label class="checkout"  for="promo"><?= $_TXT[102]; ?></label><br>
                                  </div><br>
                        
                                  <a href=""><?= $_TXT[103]; ?></a>
                                    <br><br>
                                      <h3 style="font-weight: 700; color: black;"><?= $_TXT[104]; ?></h3><br>
                                    
                                        <div class="delivery-option" aria-disabled="">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row align-items-center">
                                                      <p style="color: black; font-weight: 800; font-size: 20px;"><?= $_TXT[105]; ?></p>
                                                      <div class="col-md-6">
                                                        <input class="form-control" id="number" name="name12" type="text" required="" maxlength="19" minlength="16">
                                                      </div>
                                                      <img src="Icons and Images/Icons and Images/card-details-icon.jpg" style="width: 85%; height: 100px;">
                                                      <p><?= $_TXT[106]; ?></p>  <br><br>
                                                      <p style="color: black; font-weight: 800; font-size: 20px;"><?= $_TXT[107]; ?></p>
                                                      <p><?= $_TXT[108]; ?></p> 
                                                        <div style="display: inline;">
                                                      <p style="color: black; font-weight: 800; display: inline; margin-right: 15px;"><?= $_TXT[109]; ?></p>   /   <p style="display: inline; margin-left: 15px; color: black; font-weight: 800;"><?= $_TXT[110]; ?></p>
                                                      <div class="col-md-6">
                                                        <input class="form-control" name="name13" id="number2" type="text" required="" maxlength="2" minlength="2" style="width: 50px; display: inline; margin-right: 10px;">/
                                                        <input class="form-control" name="name14" id="number3" type="text" required="" maxlength="2" minlength="2" style="width: 50px; display: inline; margin-left: 10px;">
                                                      </div>
                                                    </div><br><br><br><br><br><br>
                                                    <p style="color: black; font-weight: 800; font-size: 20px;"><?= $_TXT[111]; ?></p>
                                                    <div class="col-md-6">
                                                      <input class="form-control" id="number4" name="name15" type="text" required="">
                                                    </div><br><br><br><br>
                                                    <p style="color: black; font-weight: 800; font-size: 20px;"><?= $_TXT[112]; ?></p>
                                                    <p><?= $_TXT[113]; ?></p> 
                                                    <div class="col-md-6">
                                                      <input class="form-control" id="number5" name="name16" type="text" required=""maxlength="3" minlength="3" style="width: 75px;">
                                                    </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-options">
                                            <div id="delivery" class="text-right">
                                              <button class="btn theme-btn--dark1 btn--md" data-toggle="collapse"  data-target="#collapseFour"
                                              aria-expanded="false" aria-controls="collapseTwo">
                                              <?= $_TXT[114]; ?>
                                        </button>
                                            </div>
                                        </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <span>4</span> <?= $_TXT[115]; ?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body pt-0">
                                <div class="custom-radio mb-4"> 
                                <?php
                                if (isset($_SESSION['id1'])){
                                if (!isset($_GET['id_product']) && !isset($_GET['qty'])) 
                            { 
                                $query5="SELECT *
                             FROM cart  where id_user = '$id1' ";
                             $result5 = mysqli_query($conn,$query5);
                             while ($row1 = mysqli_fetch_assoc($result5)){
                                
                                $query2="SELECT * from address where address = '$address' ";
                            $result2 = mysqli_query($conn,$query2);
                            if (mysqli_num_rows($result2) > 0){
                            while ($row10 = mysqli_fetch_assoc($result2)){
                                $price3 = $row10['price'];
                            }
                        }
                                $total_price3 = $row1['price'];
                                $total_price3 = $price3 + $total_price3;
                             }
                            }else {
                                $id_product = $_GET['id_product'];
                                $qty = $_GET['qty'];

                                $id1 = $_SESSION['id1'];
                                $query2="SELECT * from cart where id_product = '$id_product' ";
                                $result2 = mysqli_query($conn,$query2);
                                $count = mysqli_num_rows($result2);
                                if (mysqli_num_rows($result2) > 0){
                                while ($row1 = mysqli_fetch_assoc($result2)){


                                    $query2="SELECT * from address where address = '$address' ";
                                    $result2 = mysqli_query($conn,$query2);
                                    if (mysqli_num_rows($result2) > 0){
                                    while ($row10 = mysqli_fetch_assoc($result2)){
                                        
                                        $price2 = $row10['price'];
                                    }
                                }
                                  
                                    $total_price4 = $row1['price'];
                                    $total_price4 = $total_price4 * $qty;
                                    $total_price3 = $total_price4 + $price2;

                                }
                            }

                            }
                            echo '  <label for="test5">'.$_TXT[116].' '.$total_price3.' '.$_TXT[117].'<?php ?></label>';
                        }else {
                            echo '<label for="test5">'.$_TXT[118].'<?php ?></label>';
                        }
                                ?>
                                
                                  
                                </div>
                                <div class="filter-check-box mb-4">
                                  <input type="checkbox" id="terms_and_conditions" value="1" onclick="termschanged(this)" required="" >
                                  <label class="checkout" for="terms_and_conditions"><?= $_TXT[119]; ?></label>
                                </div>
                              <a class="btn theme-btn--dark1 btn--md text-capitalize" id="submit_button" disabled> 
                              <?= $_TXT[120]; ?>
                              </a>
                              
                              			<!-- The Modal -->
                                          <div id="myModal" class="modal">
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                              <span class="close">&times;</span><br>
                                                <?php $order_id = rand(1000000,9999999);
                                                ?>
                                              <h5 style="font-weight: 900;"><?= $_TXT[121]; ?> <?php echo $order_id; ?></h5></hr>
                                              <p style="font-size:20px;"></p><br>
                                              <h5 style="font-weight: 900;"><?= $_TXT[122]; ?><br><br>
                                              <?= $_TXT[123]; ?>
                                                </h5><hr>
                                                
                                                <button class="btn theme-btn--dark1 btn--md text-capitalize" type="submit" name="card1" >
                                                <?= $_TXT[124]; ?>
                                                </button>
                                               
                                              <p style="font-size:20px;"></p>
                                            </div>
                                          </div>

                                         
                                </div>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>



            <?php
                                        if (isset($_POST['card1'])){
                                            
                                            $name1 = $_POST['name1'];
                                            $name2 = $_POST['name2'];
                                            $name3 = $_POST['name3'];
                                            $name4 = $_POST['name4'];
                                            $name5 = $_POST['name5'];


                                            $name6 = $_POST['name6'];
                                            $name7 = $_POST['name7'];
                                            $name8 = $_POST['name8'];
                                            $name9 = $_POST['name9'];
                                            $name10 = $_POST['name10'];
                                            $name11 = $_POST['name11'];
                                        
                                        if (!isset($_GET['id_product']) && !isset($_GET['qty'])) {

                                            $id1 = $_SESSION['id1'];
                                            $query2="SELECT * from cart where id_user = '$id1' ORDER BY id DESC limit 1";
                                            $result2 = mysqli_query($conn,$query2);
                                            $count = mysqli_num_rows($result2);
                                            if (mysqli_num_rows($result2) > 0){
                                            while ($row1 = mysqli_fetch_assoc($result2)){

                                                $id_product = $row1['id_product'];

                                                $id_store = $row1['store_id'];
                                                
                                                $product_name = $row1['product_name'];
                                           
                                                $ar_product_name = $row1['ar_product_name'];
                                   
                                                $store_logo = base64_encode($row1['store_logo']);
                                         
                                                $store_name = $row1['store_name'];

                                                $ar_store_name = $row1['ar_store_name'];
                                  
                                                $sub_category = $row1['sub_category'];
                                        
                                                $category = $row1['category'];

                                                $color = $row1['color'];
                                         
                                                $total = $total_price3;
                                         
                                                $qty = $row1['qty'];
                                     
                                                $order_id = $order_id;

                                            }
                                 
                                        }

                                      

                                   
                                        if(isset($_POST['cash'])){
                                            $order_status = 'cash on delivery';
                                            $ar_order_status = 'دفع عند التوصيل';
                                        }else {
                                            $order_status = 'paid';
                                            $ar_order_status = 'تم الدفع';
                                        }



                                        if ($name11 == null) {
                                            $total = $total;
                                            $duscount = 0;
                                        }else {
                                            $query2="SELECT * from address where promo_code = '$name11' limit 1";
                                            $result2 = mysqli_query($conn,$query2);
                                            if (mysqli_num_rows($result2) > 0){
                                            while ($row1 = mysqli_fetch_assoc($result2)){
                                                $duscount = $row1['price'];
                                                $total = $total - $duscount;

                                            }
                                        }
                                        }

         
                        $query3="INSERT INTO `user_product`(`id_user`,`id_store`, `user_name`, `user_phone`, `product_name`,`ar_product_name`, `category`, `sub_category`,`color`, `total`, `order_id`, `qty`, `order_status`,`ar_order_status`, `store_name`,`ar_store_name`, `store_image`)
                        VALUES ('$id1','$id_store','$name1','$name10','$product_name','$ar_product_name','$category','$sub_category','$color','$total','$order_id','$qty','$order_status','$ar_order_status','$store_name','$ar_store_name','$store_logo')";
                                        
            
                                    
                                    $result2 = mysqli_query($conn,$query3);

                                    if(isset($_POST['cash'])){
                                
                                        $query2="SELECT * from card_details_or_cash where id_user = '$id1' limit 1";
                                        $result2 = mysqli_query($conn,$query2);
                                        if (mysqli_num_rows($result2) > 0){

                                            $query2="SELECT * from orders where id = '$id_product'";
                                            $result2 = mysqli_query($conn,$query2);
                                            if (mysqli_num_rows($result2) > 0){
                                            while ($row10 = mysqli_fetch_assoc($result2)){
                                                $number = $row10['numer_seller'];
                                                $number1 = $number + 1;

                                                $query20="UPDATE `orders` SET`numer_seller`='$number1' where id = '$id_product'";
                                                mysqli_query($conn,$query20);

                                            }
                                        }

                                            echo '<script> window.location.href = "checkout.php?duscount='.$duscount.'&id_product='.$id_product.'&qty='.$qty.'"; </script>';
                                        }else{

                                            $query2="INSERT INTO `card_details_or_cash`(`id_user`, `cash`) VALUES
                                            ('$id1','1') ";
                                           $result2 = mysqli_query($conn,$query2);

                                           $query2="SELECT * from orders where id = '$id_product'";
                                           $result2 = mysqli_query($conn,$query2);
                                           if (mysqli_num_rows($result2) > 0){
                                           while ($row10 = mysqli_fetch_assoc($result2)){
                                               $number = $row10['numer_seller'];
                                               $number1 = $number + 1;

                                               $query20="UPDATE `orders` SET`numer_seller`='$number1' where id = '$id_product'";
                                               mysqli_query($conn,$query20);

                                           }
                                       }

                                           echo '<script> window.location.href = "checkout.php?duscount='.$duscount.'&id_product='.$id_product.'&qty='.$qty.'"; </script>';
                                        }


                                           

                                        }
                                        
                                        else{

                                            $query2="SELECT * from card_details_or_cash where id_user = '$id1' limit 1";
                                            $result2 = mysqli_query($conn,$query2);
                                            if (mysqli_num_rows($result2) > 0){

                                                $name12 = $_POST['name12'];
                                                $name12 = $_POST['name13'];
                                                $name14 = $_POST['name14'];
                                                $name15 = $_POST['name15'];
                                                $name16 = $_POST['name16'];

                                            $query2="UPDATE `card_details_or_cash` SET
                                            `card_number`='$name12',`expiry_date_month`='$name12',`expiry_date_year`='$name14',`card_name`='$name15',`security_code`='$name16'";
                                            $result2 = mysqli_query($conn,$query2);

                                            $query2="SELECT * from orders where id = '$id_product'";
                                            $result2 = mysqli_query($conn,$query2);
                                            if (mysqli_num_rows($result2) > 0){
                                            while ($row10 = mysqli_fetch_assoc($result2)){
                                                $number = $row10['numer_seller'];
                                                $number1 = $number + 1;

                                                $query20="UPDATE `orders` SET`numer_seller`='$number1' where id = '$id_product'";
                                                mysqli_query($conn,$query20);

                                            }
                                        }

                                                echo '<script> window.location.href = "checkout.php?duscount='.$duscount.'&id_product='.$id_product.'&qty='.$qty.'"; </script>';
                                            }else{

                                            $name12 = $_POST['name12'];
                                            $name13 = $_POST['name13'];
                                            $name14 = $_POST['name14'];
                                            $name15 = $_POST['name15'];
                                            $name16 = $_POST['name16'];

                                            $query2="INSERT INTO `card_details_or_cash`(`id_user`, `cash`, `card_number`, `expiry_date_month`, `expiry_date_year`, `card_name`, `security_code`) VALUES
                                             ('$id1','0','$name12','$name13','$name14','$name15','$name16') ";
                                            $result2 = mysqli_query($conn,$query2);

                                            $query2="SELECT * from orders where id = '$id_product'";
                                            $result2 = mysqli_query($conn,$query2);
                                            if (mysqli_num_rows($result2) > 0){
                                            while ($row10 = mysqli_fetch_assoc($result2)){
                                                $number = $row10['numer_seller'];
                                                $number1 = $number + 1;

                                                $query20="UPDATE `orders` SET`numer_seller`='$number1' where id = '$id_product'";
                                                mysqli_query($conn,$query20);

                                            }
                                        }

                                            echo '<script> window.location.href = "checkout.php?duscount='.$duscount.'&id_product='.$id_product.'&qty='.$qty.'"; </script>';

                                        }
                                            }
                                     





                                        }

                                        else{

                                            $id_product = $_GET['id_product'];
                                            $qty = $_GET['qty'];

                                            $id1 = $_SESSION['id1'];
                                            $query2="SELECT * from cart where id_user = '$id1' and id_product = '$id_product' limit 1";
                                            $result2 = mysqli_query($conn,$query2);
                                            $count = mysqli_num_rows($result2);
                                            if (mysqli_num_rows($result2) > 0){
                                            while ($row1 = mysqli_fetch_assoc($result2)){

                                                $id_product = $row1['id_product'];

                                                $id_store = $row1['store_id'];
                                                
                                                $product_name = $row1['product_name'];
                                           
                                                $ar_product_name = $row1['ar_product_name'];
                                   
                                                $store_logo = base64_encode($row1['store_logo']);
                                         
                                                $store_name = $row1['store_name'];

                                                $ar_store_name = $row1['ar_store_name'];
                                  
                                                $sub_category = $row1['sub_category'];
                                        
                                                $category = $row1['category'];
                                         
                                                $color = $row1['color'];

                                                $total = $total_price3;
                                        
                                     
                                                $order_id = $order_id;

                                            }
                                 
                                        }

                                      


                                        $cash = $_POST['cash'];
                                        if($cash == 1  ){
                                            $order_status = 'cash on delivery';
                                            $ar_order_status = 'دفع عند التوصيل';
                                        }else {
                                            $order_status = 'paid';
                                            $ar_order_status = 'تم الدفع';
                                        }

                                        if ($name11 == null) {
                                            $total = $total;
                                            $duscount = 0;
                                        }else {
                                            $query2="SELECT * from address where promo_code = '$name11' limit 1";
                                            $result2 = mysqli_query($conn,$query2);
                                            if (mysqli_num_rows($result2) > 0){
                                            while ($row1 = mysqli_fetch_assoc($result2)){
                                                $duscount = $row1['price'];
                                                $total = $total - $duscount;

                                            }
                                        }
                                        }

         
                                        $query3="INSERT INTO `user_product`(`id_user`,`id_store`, `user_name`, `user_phone`, `product_name`,`ar_product_name`, `category`, `sub_category`,`color`, `total`, `order_id`, `qty`, `order_status`,`ar_order_status`, `store_name`,`ar_store_name`, `store_image`)
                                        VALUES ('$id1','$id_store','$name1','$name10','$product_name','$ar_product_name','$category','$sub_category','$color','$total','$order_id','$qty','$order_status','$ar_order_status','$store_name','$ar_store_name','$store_logo')";
                            
                                    
                                    $result2 = mysqli_query($conn,$query3);

                               
                                    if(isset($_POST['cash'])){

                                        $query2="SELECT * from card_details_or_cash where id_user = '$id1' limit 1";
                                        $result2 = mysqli_query($conn,$query2);
                                        if (mysqli_num_rows($result2) > 0){

                                            $query2="SELECT * from orders where id = '$id_product'";
                                            $result2 = mysqli_query($conn,$query2);
                                            if (mysqli_num_rows($result2) > 0){
                                            while ($row10 = mysqli_fetch_assoc($result2)){
                                                $number = $row10['numer_seller'];
                                                $number1 = $number + 1;

                                                $query20="UPDATE `orders` SET`numer_seller`='$number1' where id = '$id_product'";
                                                mysqli_query($conn,$query20);

                                            }
                                        }

                                            echo '<script> window.location.href = "checkout.php?duscount='.$duscount.'&id_product='.$id_product.'&qty='.$qty.'"; </script>';
                                        }else{

                                            $query2="INSERT INTO `card_details_or_cash`(`id_user`, `cash`) VALUES
                                            ('$id1','1') ";
                                           $result2 = mysqli_query($conn,$query2);

                                           $query2="SELECT * from orders where id = '$id_product'";
                                           $result2 = mysqli_query($conn,$query2);
                                           if (mysqli_num_rows($result2) > 0){
                                           while ($row10 = mysqli_fetch_assoc($result2)){
                                               $number = $row10['numer_seller'];
                                               $number1 = $number + 1;

                                               $query20="UPDATE `orders` SET`numer_seller`='$number1' where id = '$id_product'";
                                               mysqli_query($conn,$query20);

                                           }
                                       }
                                           echo '<script> window.location.href = "checkout.php?duscount='.$duscount.'&id_product='.$id_product.'&qty='.$qty.'"; </script>';
                                        }


                                           

                                        }
                                        
                                        else{

                                            $query2="SELECT * from card_details_or_cash where id_user = '$id1' limit 1";
                                            $result2 = mysqli_query($conn,$query2);
                                            if (mysqli_num_rows($result2) > 0){
                                                $query2="SELECT * from orders where id = '$id_product'";
                                                $result2 = mysqli_query($conn,$query2);
                                                if (mysqli_num_rows($result2) > 0){
                                                while ($row10 = mysqli_fetch_assoc($result2)){
                                                    $number = $row10['numer_seller'];
                                                    $number1 = $number + 1;
    
                                                    $query20="UPDATE `orders` SET`numer_seller`='$number1' where id = '$id_product'";
                                                    mysqli_query($conn,$query20);
    
                                                }
                                            }

                                                echo '<script> window.location.href = "checkout.php?duscount='.$duscount.'&id_product='.$id_product.'&qty='.$qty.'"; </script>';
                                            }else{

                                            $name12 = $_POST['name12'];
                                            $name13 = $_POST['name13'];
                                            $name14 = $_POST['name14'];
                                            $name15 = $_POST['name15'];
                                            $name16 = $_POST['name16'];

                                            $query2="INSERT INTO `card_details_or_cash`(`id_user`, `cash`, `card_number`, `expiry_date_month`, `expiry_date_year`, `card_name`, `security_code`) VALUES
                                             ('$id1','0','$name12','$name13','$name14','$name15','$name16') ";
                                            $result2 = mysqli_query($conn,$query2);

                                            $query2="SELECT * from orders where id = '$id_product'";
                                            $result2 = mysqli_query($conn,$query2);
                                            if (mysqli_num_rows($result2) > 0){
                                            while ($row10 = mysqli_fetch_assoc($result2)){
                                                $number = $row10['numer_seller'];
                                                $number1 = $number + 1;

                                                $query20="UPDATE `orders` SET`numer_seller`='$number1' where id = '$id_product'";
                                                mysqli_query($conn,$query20);

                                            }
                                        }

                                            echo '<script> window.location.href = "checkout.php?duscount='.$duscount.'&id_product='.$id_product.'&qty='.$qty.'"; </script>';

                                        }
                                            }
                                        }


                        
                                        }
                                        ?>
            <div class="col-lg-4 mb-30">
                <ul class="list-group cart-summary rounded-0">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php
                    if (isset($_SESSION['id1'])){
                    if (!isset($_GET['id_product']) && !isset($_GET['qty'])) 
                            { 
                                $id1 = $_SESSION['id1'];
                                $query2="SELECT * from cart where id_user = '$id1' ORDER BY id DESC limit 1";
                                $result2 = mysqli_query($conn,$query2);
                                $count = mysqli_num_rows($result2);
                                if (mysqli_num_rows($result2) > 0){
                                while ($row1 = mysqli_fetch_assoc($result2)){

                                }
                            }
                                ?>
                        <ul class="items">
                        <li><?= $_TXT[125]; ?></li>
                            <li><?php echo $count; ?> <?= $_TXT[126]; ?></li>
                            <li><?= $_TXT[127]; ?></li>
                        </ul>
                        <ul class="amount">
                            <?php 
                             $query5="SELECT *  
                             FROM cart  where id_user = '$id1' ORDER BY id DESC limit 1";
                             $result5 = mysqli_query($conn,$query5);
                             while ($row1 = mysqli_fetch_assoc($result5)){
                                $total_price1 = $row1['price'];
                             }
                            ?>
                            <li><?php echo $total_price1; ?> <?= $_TXT[128]; ?></li>
                            <?php
                            $query2="SELECT * from address where address = '$address' ";
                            $result2 = mysqli_query($conn,$query2);
                            if (mysqli_num_rows($result2) > 0){
                            while ($row1 = mysqli_fetch_assoc($result2)){
                                $price1 = $row1['price'];
                            }
                        }
                            ?>
                            <li><?php echo $price1; ?> <?= $_TXT[128]; ?></li>
                        </ul>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <ul class="items">
                            <li><?= $_TXT[129]; ?></li>
                            <li><?= $_TXT[130]; ?></li>
                            <?php if (isset($_GET['duscount'])){
                                echo '<li>'.$_TXT[131].'</li>';
                            } ?>
                        </ul>
                        <ul class="amount">
                            <li><?php
                            $total_price10 = $total_price1 + $price1;
                            echo $total_price10; ?> <?= $_TXT[128]; ?></li>
                            <li>0 <?= $_TXT[128]; ?></li>
                            <?php if (isset($_GET['duscount'])){
                                $duscount = $_GET['duscount'];
                                $total_price5 = $total_price10 - $duscount;
                                echo '<li>'. $total_price5. ' '.$_TXT[128].' </li>';
                            } ?>
                        </ul>
                            <?php 
                            }
                            else {
                                $id_product = $_GET['id_product'];
                                $qty = $_GET['qty'];

                                $query2="SELECT * from cart where id_product = '$id_product' and id_user='$id1' ";
                                $result2 = mysqli_query($conn,$query2);
                                $count = mysqli_num_rows($result2);
                                if (mysqli_num_rows($result2) > 0){
                                while ($row1 = mysqli_fetch_assoc($result2)){
                                    $prices = $row1['price'];
                                    $prices = $prices * $qty;

                                }
                            }

                            ?>
                            <ul class="items">
                            <li><?php echo $count; ?> <?= $_TXT[126]; ?></li>
                            <?php
                            $query2="SELECT * from address where address = '$address' ";
                            $result2 = mysqli_query($conn,$query2);
                            if (mysqli_num_rows($result2) > 0){
                            while ($row1 = mysqli_fetch_assoc($result2)){
                                $price1 = $row1['price'];
                            }
                        }
                            ?>
                            <li><?= $_TXT[127]; ?></li>
                        </ul>
                        <ul class="amount">
                            <li><?php echo $prices; ?> <?= $_TXT[128]; ?></li>
                            <li><?php echo $price1; ?> <?= $_TXT[128]; ?></li>
                        </ul>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <ul class="items">
                            <li><?= $_TXT[129]; ?></li>
                            <li><?= $_TXT[130]; ?></li>
                            <?php if (isset($_GET['duscount'])){
                                echo '<li>'.$_TXT[131].'</li>';
                            } ?>
                        </ul>
                        <ul class="amount">
                            <li><?php
                            $total_price2 = $prices + $price1;
                            echo $total_price2; ?> <?= $_TXT[128]; ?></li>
                            <li>0 <?= $_TXT[128]; ?></li>
                            <?php if (isset($_GET['duscount'])){
                                $duscount = $_GET['duscount'];
                                $total_price5 = $total_price2 - $duscount;
                                echo '<li>'. $total_price5. ' '.$_TXT[128].' </li>';
                            } ?>
                        </ul>
                        <?php
                        }
                     }else {
                        echo '<ul class="items">
                        <li> '.$_TXT[132].'</li>
                
                    </ul>';
                     }
                        ?>
                    </li>
                </ul>

                <div class="delivery-info mt-20">
                    <ul>
                        <li>
                            <img src="assets/img/icon/10.png" alt="icon"> <?= $_TXT[133]; ?>
                        </li>
                        <li>
                            <img src="assets/img/icon/11.png" alt="icon"> <?= $_TXT[134]; ?>
                        </li>
                        <li class="mb-0">
                            <img src="assets/img/icon/12.png" alt="icon"> <?= $_TXT[135]; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins/plugins.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
      // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("submit_button");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }



//JavaScript function that enables or disables a submit button depending
//on whether a checkbox has been ticked or not.
function termschanged(termsCheckBox){
    //If the checkbox has been checked
    if(termsCheckBox.checked){
        //Set the disabled property to FALSE and enable the button.
        document.getElementById("submit_button").disabled = false;
    } else{
        //Otherwise, disable the submit button.
        document.getElementById("submit_button").disabled = true;
    }
}

/* The card details  */
function terms_changed(termsCheckBox){
    //If the checkbox has been checked
    if(termsCheckBox.checked){
        //Set the disabled property to FALSE and enable the button.
        document.getElementById("number").disabled = true;
        document.getElementById("number2").disabled = true;
        document.getElementById("number3").disabled = true;
        document.getElementById("number4").disabled = true;
        document.getElementById("number5").disabled = true;
    } else{
        //Otherwise, disable the submit button.
        document.getElementById("number").disabled = false;
        document.getElementById("number2").disabled = false;
        document.getElementById("number3").disabled = false;
        document.getElementById("number4").disabled = false;
        document.getElementById("number5").disabled = false;
    }
}

    </script>

<script type="text/javascript">


  function btnActivation(){
      if(!(document.getElementById('myText').value.length) && !(document.getElementById('myText2').value.length) && !(document.getElementById('myText3').value.length) && !(document.getElementById('myText4').value.length) && !(document.getElementById('myText5').value.length) )  {
          document.getElementById("start_button").disabled = true;            
      }else if((document.getElementById('myText').value.length) && (document.getElementById('myText2').value.length) && (document.getElementById('myText3').value.length) && (document.getElementById('myText4').value.length) && (document.getElementById('myText5').value.length)){
          document.getElementById("start_button").disabled = false;

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


</body>

</html>