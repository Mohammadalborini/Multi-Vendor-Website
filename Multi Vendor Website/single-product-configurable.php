<?php
session_start();

include("db_config.php");

if(!isset($_SESSION['id1'])){
  $_SESSION['id1'] = null;
}else {
  $id1 = $_SESSION['id1'];
  
}

$id_store = $_GET['id_store'];
$id_product = $_GET['id_product'];
$storename = $_GET['storename'];

if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "en"; header("Location: single-product-configurable.php?id_store=$id_store&id_product=$id_product&storename=$storename");}
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"];  header("Location: single-product-configurable.php?id_store=$id_store&id_product=$id_product&storename=$storename");}

require "lang/single-product-configurable-".$_SESSION["lang"].".php";


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
    <style>
      #zoomA {
        /* (A) OPTIONAL DIMENSIONS */
        width: 600px;
        height: auto;
       
        /* (B) ANIMATE ZOOM */
        /* ease | ease-in | ease-out | linear */
        transition: transform ease-in-out 0.3s;
      }
       
      /* (C) ZOOM ON HOVER */
      #zoomA:hover { transform: scale(1.2); }
      
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
        margin-top:10px;
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
        <style>
        input[type=text],input[type="range"] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 2px solid blue;
        border-radius: 4px;
        background-color: #3CBC8D;
        color: white;
      }
      textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #3CBC8D;
  resize: none;
  color:white;
}
input[type=text]:focus,input[type="range"]:focus {
  background-color: #45a049;
      }
      textarea:focus {
        background-color: #45a049;
}
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
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

<?php  

$id_store = $_GET['id_store'];
$id_product = $_GET['id_product'];
$query="SELECT * from orders where store_id = '$id_store' and id='$id_product' limit 1 ";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0){
    $sum = mysqli_num_rows($result);
while ($row = mysqli_fetch_assoc($result)){
$product_category = $row[$_TXT[66]];




$product_category1 = preg_replace('/\d/', '', $product_category);
      


    }
  }
?>



<!-- breadcrumb-section start -->
<?php 

$id_store = $_GET['id_store'] ;
$query="SELECT * from orders where store_id = '$id_store' limit 1";
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($result)){

    $store_name = $row[$_TXT[67]];
}



    $query="SELECT * from all_inner_sliders limit 1";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
    $image1 = $row['image1'];
      }
  }
  ?>
                                           
<nav class="breadcrumb-section theme1 breadcrumb-bg1" style="
        background-image: url('data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image1); ?>')">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title text-center my-20">
          <h2 class="title text-dark text-capitalize"><?php echo $store_name; ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol
          class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center"
        >
          <li class="breadcrumb-item"><a href="index1.php"><?=$_TXT[68]; ?></a></li>
          <li class="breadcrumb-item">
            <a href="shop-grid-4-column-store.php?id_store=<?php echo $id_store; ?>&store-name=<?php echo $store_name; ?>&rele=rele"><?=$_TXT[69]; ?></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <?php echo $product_category1; ?>
          </li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->

<!-- product-single start -->

<?php  

$id_store = $_GET['id_store'];
$id_product = $_GET['id_product'];
$query="SELECT * from orders where store_id = '$id_store' and id='$id_product' limit 1";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0):
    $sum = mysqli_num_rows($result);
while ($row = mysqli_fetch_assoc($result)):
$id = $row['id'];
$store_name = $row[$_TXT[67]];
$store_logo = $row['store_logo'];
$product_name = $row['product_name'];
$product_name1 = $row[$_TXT[70]];
$short_description = $row[$_TXT[71]];
$uploaded_on = $row['uploaded_on'];
$product_price = $row['product_price'];
$discount = $row['discount'];

$full_description = $row[$_TXT[72]];
$product_material = $row[$_TXT[73]];
$products_sizes = $row['products_sizes'];

$policy = $row[$_TXT[74]];
$return_policy = $row[$_TXT[75]];

$products_sizes = $row['products_sizes'];

$views = $row['views_product'];

$query1="SELECT * from product_image where store_id = '$id_store' and product_name='$product_name' ";
$result1 = mysqli_query($conn,$query1);
if (mysqli_num_rows($result1) > 0):
while ($row1 = mysqli_fetch_assoc($result1)):

?>

<?php

  
   
   $views = $views + 1;
    
    $query="UPDATE `orders` SET `views_product`='$views' WHERE store_id= '$id_store' and id = '$id_product' ";
    mysqli_query($conn,$query);







?>

<section class="product-single theme1">
    <div class="container grid-wraper">
        <div class="row">
            <div class="col-md-9 mx-auto col-lg-6 mb-5 mb-lg-0">
                <div class="position-relative">
                <?php
                      $uploaded_on = date_create($uploaded_on);

                      date_modify($uploaded_on,"+2 days");

                      $uploaded_on = date_format($uploaded_on,"Y-m-d");

                      $expire_time = strtotime($uploaded_on);

                      $today_time = strtotime(date("Y-m-d"));
                      if ($expire_time > $today_time) {
                      echo ' <span class="badge badge-danger top-left">'.$_TXT[105].'</span>';
                      }
                  ?> 
                </div>
                <div class="product-sync-init mb-30" >
                <?php
                    $pieces1 = $row1['file_name'];
                    $piece = explode(",", $pieces1);
                    for( $i=0; $i<count($piece); $i++ ) {
                      echo '
                      <div class="single-product-configurable">
                          <div class="product-thumb" >
                     <img src="Admin Store PDD/material-dashboard-master/upload/'.$piece[$i].'" style="width:600px; height:800px;"  alt="product-thumb" id="zoomA">
                          </div>
                     </div>
                     ';
                    }                
                ?>                      
                    
                </div>
                <div class="product-sync-nav slick-nav-sync">
                <?php
                    $pieces1 = $row1['file_name'];
                    $piece = explode(",", $pieces1);
                    for( $i=0; $i<count($piece); $i++ ) {
                      echo '
                      <div class="single-product-configurable">
                          <div class="product-thumb" >
                          <a href="javascript:void(0)">   <img src="Admin Store PDD/material-dashboard-master/upload/'.$piece[$i].'" style="width:360px; height:auto;"
                            alt="product-thumb" id="zoomA"></a>
                          </div>
                     </div>
                     ';
                    }                
                ?>               

                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-md-0">
                <div class="single-product-configurable-info">
                    <div class="single-product-configurable-head">
                      <h6><?php echo $store_name; ?></h6>
                      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($store_logo); ?>" style="width: 50px; height: 50px; position: relative; left: 90%; top: -40px;">
                        <h2 class="title mb-20"><?php echo $product_name1; ?></h2>
                        <div class="star-content mb-20">
                        <?php
                                $query="SELECT * from review where id_product='$id_product' ";
                                $result = mysqli_query($conn,$query);
                                $num_rate1 = mysqli_num_rows($result);

                                $query="SELECT SUM(rate) as 'reting1' from review where id_product='$id_product' ";
                                $result = mysqli_query($conn,$query);
                                if (mysqli_num_rows($result) > 0){
                                while ($row = mysqli_fetch_assoc($result)){
                                  $rate = $row['reting1'];
                                
                              if (!$num_rate1 == 0) {
                              $new_rate = $rate / $num_rate1;
                                
                              for ($j=1; $j<=round($new_rate, '0'); $j++ ) {
                              echo ' <span class="star-on"><i class="ion-ios-star" style="color:yellow;"></i> </span>'; 
                              }
                              $dis = 5 - $new_rate;
                              for ($y=1; $y<=round($dis, '0'); $y++ ) {
                              echo ' <span class="ion-android-star de-selected" ></span>'; 
                              }

                            }else {
                              for ($j=1; $j<=5; $j++ ) {
                                echo ' <span class="star-on"><i class="ion-ios-star" style="color:yellow;"></i> </span>'; 
                                }
                            }
                          }
                          }

                                ?>
                            <a href="#" id="write-comment"><span class="ml-2"><i class="far fa-comment-dots"></i></span>
                            <?=$_TXT[76]; ?> <span>(<?php echo $num_rate1; ?>)</span></a>

                            <a data-toggle="modal" data-target="#exampleModalCenter" id="myBtn"><span class="edite"><i
                                        class="far fa-edit"></i></span><?=$_TXT[77]; ?></a>
                        </div>
                    </div>
			<!-- The Modal -->
    
			<div id="myModal" class="modal">

				<!-- Modal content -->
				<div class="modal-content">
					<span class="close">&times;</span>

          <form method="POST" action="">
          <label for="vol"><?=$_TXT[78]; ?></label><br>
            <input type="range" id="vol" min="1" max="5" value="3" name="name1" required><br>
            <label for="name1"><?=$_TXT[79]; ?></label><br>
            <input type="text" id="name1" name="name2"  required><br>
            <label for="name2"><?=$_TXT[80]; ?></label><br>
            <input type="text" id="name2" name="name3"  required><br>
            <label for="name3"><?=$_TXT[81]; ?></label><br>
            <textarea type="text" id="name3" name="name4" required></textarea><br><br>
            <input type="submit" name="review" value="Send Review">  
          </form>
          <?php
          if (isset($_POST['review'])){
      if(!isset($_SESSION['id1'])){
        echo 'Login first to rateing the product;';
      }else {
        $name1 = $_POST['name1'];
        $name2 = $_POST['name2'];
        $name3 = $_POST['name3'];
        $name4 = $_POST['name4'];

        $id1 = $_SESSION['id1'];
        $query="SELECT * from review where id_user = '$id1' and id_product='$id_product' ";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
          $id_user = $row['id_user'];
          $rate = $row['rate'];
          $name = $row['name'];
          $title = $row['title'];
          $subject = $row['subject'];

          $query="UPDATE `review` SET `rate`='$name1',`name`='$name2',`title`='$name3',`subject`='$name4',`time_uploade`= NOW() WHERE id_user = '$id1' and id_product='$id_product' ";
          $result = mysqli_query($conn,$query);




          $query="SELECT * from review where id_product='$id_product' ";
          $result = mysqli_query($conn,$query);
          $num_rate1 = mysqli_num_rows($result);
          if (mysqli_num_rows($result) > 0){

            $query11="SELECT SUM(rate) as 'reting1' from review where id_product='$id_product' ";
            $result11 = mysqli_query($conn,$query11);
            
            if (mysqli_num_rows($result11) > 0){
            while ($row = mysqli_fetch_assoc($result11)){
            $rate1 = $row['reting1'];

              $rate2 = $rate1 / $num_rate1;

            
          $query="UPDATE `orders` SET `rate`='$rate2' WHERE store_id= '$id_store' and id = '$id_product' ";
          mysqli_query($conn,$query);

                }
              }
          }


          echo '<script> window.location.href = "single-product-configurable.php?id_store='.$id_store.'&id_product='.$id_product.'&storename='.$store_name.'"; </script>';



        }
      }else {
        $query="INSERT INTO `review`(`id_user`, `id_product`, `id_store`, `store_name`, `rate`, `name`, `title`, `subject`) VALUES
         ('$id1','$id_product','$id_store','$store_name','$name1','$name2','$name3','$name4') ";
        $result = mysqli_query($conn,$query);


          $query="SELECT * from review where id_product='$id_product' ";
          $result = mysqli_query($conn,$query);
          $num_rate1 = mysqli_num_rows($result);
          if (mysqli_num_rows($result) > 0){

            $query11="SELECT SUM(rate) as 'reting1' from review where id_product='$id_product' ";
            $result11 = mysqli_query($conn,$query11);
            
            if (mysqli_num_rows($result11) > 0){
            while ($row = mysqli_fetch_assoc($result11)){
            $rate1 = $row['reting1'];

              $rate3 = $rate1 / $num_rate1;

            
          $query="UPDATE `orders` SET `rate`='$rate3' WHERE store_id= '$id_store' and id = '$id_product' ";
          mysqli_query($conn,$query);

            }
          }
        }
        
        echo '<script> window.location.href = "single-product-configurable.php?id_store='.$id_store.'&id_product='.$id_product.'&storename='.$store_name.'"; </script>';

      }

        
      }


    }
      ?>
					
				</div>

			</div>

                    <div class="product-body mb-40">
                        <div class="d-flex align-items-center mb-30 border-bottom pb-30">
                        <?php
                             if (!($discount) == null) {

                              $new_dis = (1-($discount/$product_price)) * 100 ;

                               echo '<h6 class="product-price"><del class="del">'.$product_price.' '.$_TXT[82].'</del>
                               <span class="onsale">'.$discount.' '.$_TXT[82].'</span></h6>
                               <span class="badge my-badge position-static bg-dark rounded-0">Save '.round($new_dis, 0).'%</span>';
                               
                            }else {
                                echo '<h6 class="product-price"> <span class="onsale">'.$product_price.' '.$_TXT[82].'</span></h6>';
                            }
                            ?>

                            
                        </div>
                        <p class="font-size"><?php echo $short_description; ?></p>
                        <ul class="font-size">

                        </ul>
                    </div>
                    <div class="product-footer">

                    <form action="cart.php" method="POST">
                        <div class="product-size d-flex align-items-center mt-30">
                            <h3 class="title"><?=$_TXT[83]; ?></h3>
                            <div class="d-flex align-items-center check-box-wrap-list" >

                                 <?php 
                              $query="SELECT * from orders where store_id = '$id_store' and id='$id_product' limit 1";
                              $result = mysqli_query($conn,$query);
                              if (mysqli_num_rows($result) > 0){
                              while ($row = mysqli_fetch_assoc($result)){
                              $color = $row['product_colors'];
                              $piece1 = explode(",", $color);
                              foreach ($piece1 as $new_color)
                            {
                            echo '
                                <style>
                                .filter-check-box.color-black input[type="checkbox"] + label:before{
                                  background:'.$new_color.';

                                }
                                </style>
                                
                                <div class="filter-check-box color-black  modify mb-0" style="background:'.$new_color.';">
                                    <input type="radio" name="color" value="'.$new_color.'" id="'.$new_color.'" required>
                                    <label for="'.$new_color.'"></label>
                                </div>
                                
                                ';
                              }
                            }
                          }
                                ?>

                            </div>
                        </div>

                        <div class="product-count style d-flex flex-column flex-sm-row mt-30 mb-30">
                            <div class="count d-flex">
                      
                                <input type="number" min="1" max="100" step="1" name="qty" value="1"><br>
                                <input type="hidden" name="id1" value="<?php echo $id1; ?>">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                       
                            </div>
                            <div>
                              <a href="cart.php?id1=<?php echo $id1; ?>&id=<?php echo $id;?>">
                                <button class="btn theme-btn--dark3 btn--xl mt-30 mt-sm-0" name="product">
                                    <span class="mr-2"><i class="ion-bag"></i></span>
                                    <?=$_TXT[84]; ?>
                                  </button>
                        </a>
                        </form>
                            </div>
                        </div>
                        <div class="addto-whish-list">
                            <a href="Wish List.php?id1=<?php echo $id1; ?>&id=<?php echo $id;?>"><i class="icon-heart"></i> <?=$_TXT[85]; ?></a>
                            <a href="Wish List.php"><i class="icon-shuffle"></i> <?=$_TXT[86]; ?></a>
                        </div>
                        <div class="pro-social-links mt-30">
                            <ul class="d-flex align-items-center">
                                <li class="share"><?=$_TXT[87]; ?></li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                <li><a href="#"><i class="ion-social-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="block-reassurance">
                        <ul>
                          <li>
                            <img src="assets/img/icon/10.png" alt="img">
                            <?=$_TXT[88]; ?> <?php echo $return_policy; ?>
                          </li>
                          <li>
                            <img src="assets/img/icon/11.png" alt="img">
                            <?=$_TXT[89]; ?> <?php echo $policy; ?>
                          </li>
                          <li>
                            <img src="assets/img/icon/12.png" alt="img">
                            <?=$_TXT[90]; ?> <?php echo $return_policy; ?>
                          </li>
                        </ul>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile;?>
                 <?php endif;?>
    <?php endwhile;?>
<?php endif;?>
               
<!-- product-single end -->
<!-- product tab start -->
<div class="product-tab theme1 bg-white pt-70 pb-70">
    <div class="container">
        <div class="product-tab-nav">
            <div class="row align-items-center">
                <div class="col-12">
                    <nav class="product-tab-menu single-product-configurable">
                        <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                                    aria-controls="pills-home" aria-selected="true"><?=$_TXT[91]; ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-profile-tab" data-toggle="pill"
                                    href="#pills-profile" role="tab" aria-controls="pills-profile"
                                    aria-selected="false"><?=$_TXT[92]; ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                    role="tab" aria-controls="pills-contact" aria-selected="false"><?=$_TXT[93]; ?></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- product-tab-nav end -->
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    <!-- first tab-pane -->
                    <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="single-product-configurable-desc">
                            <ul>
                                <li>
                                    <?php echo $full_description; ?>
                                </li>
                                <li>
                                <?php echo $short_description; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- second tab-pane -->
                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <div class="single-product-configurable-desc">
                            <div class="studio-thumb">
                                <a href="#"><img class="mb-30" src="assets/img/stodio.jpg" alt="studio-thumb"></a>
                                <h6 class="mb-2"><?=$_TXT[94]; ?> <small><?=$_TXT[95]; ?></small> </h6>
                                <h6><?=$_TXT[96]; ?> <small><?=$_TXT[97]; ?></small> </h6>
                                <h3><?=$_TXT[98]; ?></h3>
                            </div>
                            <div class="product-features">
                                <ul>
                                    <li><span><?=$_TXT[99]; ?></span></li>
                                    <li><span><?php echo $product_material; ?></span></li>
                                    <li><span><?=$_TXT[100]; ?></span></li>
                                    <li><span><?php echo $products_sizes; ?></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- third tab-pane -->
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="single-product-configurable-desc">
                            <div class="grade-content">
                              <?php
                               $query="SELECT * from review where id_product='$id_product' ";
                               $result = mysqli_query($conn,$query);
                               $num_rate = mysqli_num_rows($result);
                               if (mysqli_num_rows($result) > 0){
                               while ($row = mysqli_fetch_assoc($result)){
                                 $id_user = $row['id_user'];
                                 $id_user = $row['id_product'];
                                 $name = $row['name'];
                                 $title = $row['title'];
                                 $subject = $row['subject'];
                                 $time_uploade = $row['time_uploade'];
                                 $rate = $row['rate'];
                              ?>
                            
                                <span class="grade"><?=$_TXT[101]; ?> </span>
                                <?php 

                                
                                for ($j=1; $j<=$rate; $j++ ) {
                                echo ' <span class="star-on"><i class="ion-ios-star"></i> </span>'; 
                                }
                                $dis = 5 - $rate;
                                for ($y=1; $y<=round($dis, '0'); $y++ ) {
                                echo ' <span class="ion-android-star de-selected" style="font-size:18px;"></span>'; 
                                }
                                ?>
                              
                                <h6 class="sub-title"><?php echo $name; ?></h6>
                                <p><?php echo $time_uploade; ?></p>
                                <h4 class="title"><?php echo $title; ?></h4>
                                <p><?php echo $subject; ?></p><br><br>

                                <?php 
                                
                              
                              
                            }
                            }
                            else {
                              echo '<h6 class="sub-title">'.$_TXT[102].'</h6>';
                            }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->

<!-- new arrival section start -->
<section class="theme1 bg-white pb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title text-center mb-30">
            <h2 class="title text-dark text-capitalize"><?=$_TXT[103]; ?></h2>
            <p class="text mt-10"><?=$_TXT[104]; ?></p>
          </div>
        </div>
        <div class="col-12">
          <div class="product-slider-init slick-nav">

                    <?php  

if(preg_match_all('/\d+/', $product_category, $numbers)){
  $lastnum = end($numbers[0]);
          $query3="SELECT * from orders";
          $result3 = mysqli_query($conn,$query3);
          if (mysqli_num_rows($result3) > 0):
          while ($row3 = mysqli_fetch_assoc($result3)):
            $product_category2 = $row3['product_category'];

        if(preg_match_all('/\d+/', $product_category2, $numbers1)){
          $lastnum1 = end($numbers1[0]);

          if ($lastnum ==  $lastnum1) {
            $id_product = $row3['id'];
          $id_store = $row3['store_id'];  
          $store_name = $row3['store_name'];
          $store_logo = $row3['store_logo'];
          $product_name = $row3['product_name'];
          $short_description = $row3['short_description'];
          $uploaded_on = $row3['uploaded_on'];
          $product_price = $row3['product_price'];
          $discount = $row3['discount'];
          $product = $row3['id'];

          $full_description = $row3['full_description'];
          $product_material = $row3['product_material'];
          $products_sizes = $row3['products_sizes'];

          $query1="SELECT * from product_image where store_id = '$id_store' and product_name='$product_name' ";
          $result1 = mysqli_query($conn,$query1);
          if (mysqli_num_rows($result1) > 0):
          while ($row3 = mysqli_fetch_assoc($result1)):

          ?>
                                <?php
                                      if (!($discount) == null) {

                                        $new_dis = (1-($discount/$product_price)) * 100 ;

                                      }else {
                                        $new_dis = 0;
                                      }
                                      ?>


            <div class="slider-item">
                <div class="card product-card">
                    <div class="card-body p-0">
                        <div class="media flex-column">
                            <div class="product-thumbnail w-100 position-relative">
                            <span class="badge badge-success top-left">-<?php echo round($new_dis, 1); ?>%</span>
                                <?php
                                  $uploaded_on = date_create($uploaded_on);

                                        date_modify($uploaded_on,"+2 days");

                                        $uploaded_on = date_format($uploaded_on,"Y-m-d");

                                        $expire_time = strtotime($uploaded_on);

                                        $today_time = strtotime(date("Y-m-d"));
                                        if ($expire_time > $today_time) {
                                        echo ' <span class="badge badge-danger top-left">'.$_TXT[105].'</span>';
                                        }
                                        ?> 
                                      <a href="single-product-configurable.php?id_store=<?php echo $id_store?>&id_product=<?php echo $product;  ?>&storename=<?php echo $store_name; ?>">
                                        <?php
                                           $pieces2 = $row3['file_name'];
                                           $piece = explode(",", $pieces2);
                                             echo '
                                             <img class="first-img" src="Admin Store PDD/material-dashboard-master/upload/'.$piece[0].'" style="width:360px; height:380px;" alt="thumbnail">
                                             ';
                                           
                                        ?>  
                                        </a>
  
                                <div class="product-links d-flex d-flex justify-content-between">
                                   
                                    <ul class="d-flex justify-content-center">
                                    
                                    <li>
                                                    <a href="#">
                                                        <span data-toggle="tooltip" data-placement="bottom" title="<?=$_TXT[106]; ?>" class="ion-bag"   data-original-title="Add to cart"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                        <a href="Wish List.php?id1=<?php echo $id1; ?>&id=<?php echo $id;?>">
                                                                <span data-toggle="tooltip" data-placement="bottom"
                                                                    title="<?=$_TXT[107]; ?>"
                                                                    class="ion-android-favorite">
                                                                   </span>
                                                            </a>
                                                        </li>
                                        <li>
                                            <a href="wishlist.php">
                                                <span data-toggle="tooltip" data-placement="bottom"
                                                    title="<?=$_TXT[108]; ?>"
                                                    class="ion-android-favorite-outline"> </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- product links end-->
                                </div>
  
                            </div>
                            <div class="media-body">
                                <div class="product-desc">
                                    <div class="star-rating">
                                    <?php
                                $query="SELECT * from review where id_product='$id_product' ";
                                $result = mysqli_query($conn,$query);
                                $num_rate1 = mysqli_num_rows($result);

                                $query="SELECT SUM(rate) as 'reting1' from review where id_product='$id_product' ";
                                $result = mysqli_query($conn,$query);
                                if (mysqli_num_rows($result) > 0){
                                while ($row = mysqli_fetch_assoc($result)){
                                  $rate = $row['reting1'];
                                
                              if (!$num_rate1 == 0) {
                              $new_rate = $rate / $num_rate1;
                                
                              for ($j=1; $j<=round($new_rate, '0'); $j++ ) {
                              echo ' <span class="star-on"><i class="ion-ios-star" style="color:yellow;"></i> </span>'; 
                              }
                              $dis = 5 - $new_rate;
                              for ($y=1; $y<=round($dis, '0'); $y++ ) {
                              echo ' <span class="ion-android-star de-selected" ></span>'; 
                              }

                            }else {
                              for ($j=1; $j<=5; $j++ ) {
                                echo ' <span class="star-on"><i class="ion-ios-star" style="color:yellow;"></i> </span>'; 
                                }
                            }
                          }
                          }

                                ?>
                                    </div>
                                    <h3 class="title my-10"><a href="single-product-configurable.php?id_store=<?php echo $id_store?>&id_product=<?php echo $id_product;  ?>&storename=<?php echo $store_name; ?>"><?php echo $product_name; ?></a></h3>
                                    <h3 class="title my-10"><a href="shop-grid-4-column.php?id_store=<?php echo $id ?>"><?php echo $store_name; ?></a></h3>
                                    <?php
                                      if (!($discount) == null) {

                                        $new_dis = (1-($discount/$product_price)) * 100 ;

                                        echo '<h6 class="product-price"><del class="del">'.$product_price.' '.$_TXT[82].'</del>
                                        <span class="onsale">'.$discount.' '.$_TXT[82].'</span></h6>
                                        ';
                                        
                                      }else {
                                          echo '<h6 class="product-price"> <span class="onsale">'.$product_price.' '.$_TXT[82].'</span></h6>';
                                      }
                                      ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
                 <?php endif; }
                
                 }?>
    <?php endwhile;?>
<?php endif;  } ?>
           
        </div>
        </div>
      </div>
    </div>
  </section>
  <!-- new arrival section end -->
  <!-- new arrival section start -->

  <section class="theme1 bg-white pb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title text-center mb-30">
            <h2 class="title text-dark text-capitalize"><?=$_TXT[109]; ?></h2>
            <p class="text mt-10"><?=$_TXT[110]; ?></p>
          </div>
        </div>
        <div class="col-12">
          <div class="product-slider-init slick-nav">


          <?php  

$id_store = $_GET['id_store'];
$query="SELECT * from orders where store_id = '$id_store' and id != '$id_product' ";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0):
while ($row = mysqli_fetch_assoc($result)):
$id = $row['id'];
$store_name = $row[$_TXT[67]];
$store_logo = $row['store_logo'];
$product_name = $row['product_name'];
$product_name1 = $row[$_TXT[70]];
$short_description = $row[$_TXT[71]];
$uploaded_on = $row['uploaded_on'];
$product_price = $row['product_price'];
$discount = $row['discount'];

$full_description = $row[$_TXT[72]];
$product_material = $row[$_TXT[73]];
$products_sizes = $row['products_sizes'];

$policy = $row[$_TXT[74]];
$return_policy = $row[$_TXT[75]];
$products_sizes = $row['products_sizes'];

$query1="SELECT * from product_image where store_id = '$id_store' and product_name='$product_name' ";
$result1 = mysqli_query($conn,$query1);
if (mysqli_num_rows($result1) > 0):
while ($row1 = mysqli_fetch_assoc($result1)):

?>
                      <?php
                             if (!($discount) == null) {

                              $new_dis = (1-($discount/$product_price)) * 100 ;

                            }else {
                              $new_dis = 0;
                            }
                            ?>
            <div class="slider-item">
                <div class="card product-card">
                    <div class="card-body p-0">
                        <div class="media flex-column">
                            <div class="product-thumbnail w-100 position-relative">
                                <span class="badge badge-success top-left">-<?php echo round($new_dis, 1); ?>%</span>
                                <?php
                                  $uploaded_on = date_create($uploaded_on);

                                        date_modify($uploaded_on,"+2 days");

                                        $uploaded_on = date_format($uploaded_on,"Y-m-d");

                                        $expire_time = strtotime($uploaded_on);

                                        $today_time = strtotime(date("Y-m-d"));
                                        if ($expire_time > $today_time) {
                                        echo ' <span class="badge badge-danger top-left">'.$_TXT[105].'</span>';
                                        }
                                        ?> 
                                        <a href="single-product-configurable.php?id_store=<?php echo $id_store; ?>&id_product=<?php echo $row['id'];  ?>&storename=<?php echo $store_name; ?>">
                                        <?php
                                           $pieces1 = $row1['file_name'];
                                           $piece = explode(",", $pieces1);
                                             echo '
                                             <img class="first-img" src="Admin Store PDD/material-dashboard-master/upload/'.$piece[0].'" style="width:360px; height:380px;" alt="thumbnail">
                                             ';
                                           
                                        ?>  
                             
                                      </a>
                                      <div class="product-links d-flex d-flex justify-content-between">
                                            <ul class="d-flex justify-content-center">
                                                <li>
                                                    <a href="#">
                                                        <span data-toggle="tooltip" data-placement="bottom" title="<?=$_TXT[106]; ?>" class="ion-bag"   data-original-title="Add to cart"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                        <a href="Wish List.php?id1=<?php echo $id1; ?>&id=<?php echo $id;?>">
                                                                <span data-toggle="tooltip" data-placement="bottom"
                                                                    title="<?=$_TXT[107]; ?>"
                                                                    class="ion-android-favorite">
                                                                   </span>
                                                            </a>
                                                        </li>
                                                <li>
                                                    <a href="wishlist.php?id_store=<?php echo $id_store; ?>&id_product=<?php echo $row['id']; ?>" tabindex="0">
                                                        <span data-toggle="tooltip" data-placement="bottom" title="<?=$_TXT[108]; ?>" class="ion-android-favorite-outline" data-original-title="add to wishlist"> </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        
                                            <!-- product links end-->
                                        </div>
  
                            </div>
                            <div class="media-body">
                                <div class="product-desc">
                                    <div class="star-rating">
                                    <?php
                                $query8="SELECT * from review where id_product='$id' ";
                                $result8 = mysqli_query($conn,$query8);
                                $num_rate10 = mysqli_num_rows($result8);

                                $query9="SELECT SUM(rate) as 'reting1' from review where id_product='$id' ";
                                $result9 = mysqli_query($conn,$query9);
                                if (mysqli_num_rows($result9) > 0){
                                while ($row = mysqli_fetch_assoc($result9)){
                                  $rate8 = $row['reting1'];
                                
                              if (!$num_rate10 == 0) {
                              $new_rate1 = $rate8 / $num_rate10;
                                
                              for ($j=1; $j<=round($new_rate1, '0'); $j++ ) {
                              echo ' <span class="star-on"><i class="ion-ios-star" style="color:yellow;"></i> </span>'; 
                              }
                              $dis = 5 - $new_rate1;
                              for ($y=1; $y<=round($dis, '0'); $y++ ) {
                              echo ' <span class="ion-android-star de-selected" ></span>'; 
                              }

                            }else {
                              for ($j=1; $j<=5; $j++ ) {
                                echo ' <span class="star-on"><i class="ion-ios-star" style="color:yellow;"></i> </span>'; 
                                }
                            }
                          }
                          }

                                ?>
                                    </div>
                                    <h3 class="title my-10"><a href="single-product-configurable.php?id_store=<?php echo $id_store; ?>&id_product=<?php echo $row['id'];  ?>&dstorename=<?php echo $store_name; ?>"><?php echo $product_name1; ?></a></h3>
                                            <?php
                                      if (!($discount) == null) {

                                        $new_dis = (1-($discount/$product_price)) * 100 ;

                                        echo '<h6 class="product-price"><del class="del">'.$product_price.' '.$_TXT[82].'</del>
                                        <span class="onsale">'.$discount.' '.$_TXT[82].'</span></h6>
                                        ';
                                        
                                      }else {
                                          echo '<h6 class="product-price"> <span class="onsale">'.$product_price.' '.$_TXT[82].'</span></h6>';
                                      }
                                      ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
                 <?php endif;?>
    <?php endwhile;?>
<?php endif;?>
                 
           
            <!-- slider-item end -->
        </div>
        </div>
      </div>
    </div>
  </section>
  <!-- new arrival section end -->


  
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
    <script>
      // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    
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