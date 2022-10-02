<?php
session_start();

include("db_config.php");

if ($_SESSION == null) {
  echo '<script> window.location.href = "index.php"; </script>';
}
else {
    $id1 = $_SESSION['id2'];
}

if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "en"; }
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }

require "lang/add-".$_SESSION["lang"].".php";

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


input[type=text], select,input[type=file],input[type=color]  {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 20%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.di {
  margin-top: 100px;
  border-radius: 15px;
  background-color: #fff;
  padding: 20px;

}
.di label{
  color: black;
  font-weight: 800;
  
}

.di2{
  position: absolute;
   top: 175px;
    left: 650px;
}

.di2 input[type=text], .di2>select{
  width: 250%;
  text-align: right;
}

.di2>label{
    width: 247%;
    text-align: right;
}

.bts1{
  background-color: #4CAF50; /* Green */
          border: none;
          color: white;
          padding: 5px 7px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
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
         $shop_category = $row['shop_category'];
         $ar_shop_category = $row['ar_shop_category'];
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
      <?=$_TXT[0]?><br><?php echo $store_name; ?>
        </a></div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item  ">
              <a class="nav-link" href="./dashboard.php?username=<?php echo $username; ?>">
                <i class="material-icons">dashboard</i>
                <p><?=$_TXT[2]?></p>
              </a>
            </li>
            <li class="nav-item  ">
              <a class="nav-link" href="./store info.php?username=<?php echo $username; ?>">
                <i class="material-icons">person</i>
                <p><?=$_TXT[3]?></p>
              </a>
            </li>
            <li class="nav-item " >
              <a class="nav-link">
                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                <p><?=$_TXT[4]?></p>
              </a>
              <ul style=" list-style-type: none;"> 
                <li class="l nav-item active">
                  <a class="nav-link" href="./Add New.php?username=<?php echo $username; ?>">
                    <p><?=$_TXT[5]?></p>
                  </a>
                </li>
                  <li class="l">
                    <a class="nav-link" href="./All Prodect.php?username=<?php echo $username; ?>">
                      <p><?=$_TXT[6]?></p>
                    </a>
                  </li>
                    <li class="l">
                      <a class="nav-link" href="./products Views number.php?username=<?php echo $username; ?>">
                        <p><?=$_TXT[7]?></p>
                      </a>
                    </li>
              </ul>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./orders.php?username=<?php echo $username; ?>">
                <i class="material-icons">content_paste</i>
                <p><?=$_TXT[8]?></p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./Ads Sponsor.php?username=<?php echo $username; ?>">
                <i class="fa fa-address-book" aria-hidden="true"></i>
                <p><?=$_TXT[9]?></p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./views.php?username=<?php echo $username; ?>">
                <i class="fa fa-eye" style="font-size:24px"></i>
                <p><?=$_TXT[10]?></p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./logout.php">
                <i class="material-icons">logout</i>
                <p><?=$_TXT[11]?></p>
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
            <a class="navbar-brand" href="javascript:;"><?=$_TXT[1]?></a>
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
                <input type="text" value="" class="form-control" style="text-align:<?=$_TXT[14]?>;" placeholder="<?=$_TXT[12]?>">
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

      <div class="di">
        <p style="color: black; font-size: 20px; font-weight: 800;">Please enter all information in Arabic and English <span style="text-align: right; margin-left: 350px;">الرجاء ادخال جميع المعومات باللغتين العربية والانجليزية</span></p>
        <hr>
        <form action="add_order.php" method="POST" enctype="multipart/form-data">
          <label for="fname">Store name</label>
          <input type="text" id="fname" name="name" placeholder="Store name" required>
      
          <label for="logo">Store Logo</label>
          <input type="file" id="logo" name="image1" required>

          <label for="category">product category</label>
          <select id="category" name="category" required>
          <?php 

          $pieces = explode(",", $shop_category);
          for ($i=0; $i<count($pieces); $i++){

            if(preg_match_all('/\d+/', $pieces[$i], $numbers)){
            $lastnum = end($numbers[0]);

            if ($lastnum == 1){

              if (str_ends_with($pieces[$i], '/\d/')) {

                $pieces1 = preg_replace('/\d/', '', $pieces);
                echo '<optgroup label="Shose">
                <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
                </optgroup>
                ';
                
            }else {
              $pieces1 = preg_replace('/\d/', '', $pieces);
              echo '
              <optgroup label="Shose">
              <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
              </optgroup>
              ';
            }
              

           

            }else if($lastnum == 2){
              
              if (str_ends_with($pieces[$i], '/\d/')) {

                $pieces1 = preg_replace('/\d/', '', $pieces);
                echo '<optgroup label="clothing">
                <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
                </optgroup>
                ';
                
            }else {
              $pieces1 = preg_replace('/\d/', '', $pieces);
              echo '
              <optgroup label="clothing">
              <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
              </optgroup>
              ';
            }
            }else if($lastnum == 3){
             if (str_ends_with($pieces[$i], '/\d/')) {

                $pieces1 = preg_replace('/\d/', '', $pieces);
                echo '<optgroup label="Bags">
                <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
                </optgroup>
                ';
                
            }else {
              $pieces1 = preg_replace('/\d/', '', $pieces);
              echo '
              <optgroup label="Bags">
              <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
              </optgroup>
              ';
            }
            }else if($lastnum == 4){
              if (str_ends_with($pieces[$i], '/\d/')) {

                $pieces1 = preg_replace('/\d/', '', $pieces);
                echo '<optgroup label="Perfumes">
                <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
                </optgroup>
                ';
                
            }else {
              $pieces1 = preg_replace('/\d/', '', $pieces);
              echo '
              <optgroup label="Perfumes">
              <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
              </optgroup>
              ';
            }
            }else if($lastnum == 5){
              if (str_ends_with($pieces[$i], '/\d/')) {

                $pieces1 = preg_replace('/\d/', '', $pieces);
                echo '<optgroup label="Accessories">
                <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
                </optgroup>
                ';
                
            }else {
              $pieces1 = preg_replace('/\d/', '', $pieces);
              echo '
              <optgroup label="Accessories">
              <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
              </optgroup>
              ';
            }
            }else if($lastnum == 6){
              if (str_ends_with($pieces[$i], '/\d/')) {

                $pieces1 = preg_replace('/\d/', '', $pieces);
                echo '<optgroup label="Gaming">
                <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
                </optgroup>
                ';
                
            }else {
              $pieces1 = preg_replace('/\d/', '', $pieces);
              echo '
              <optgroup label="Gaming">
              <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
              </optgroup>
              ';
            }
 
  
          }else if($lastnum == 7){
            if (str_ends_with($pieces[$i], '/\d/')) {

              $pieces1 = preg_replace('/\d/', '', $pieces);
              echo '
              <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
              
              ';
              
          }else {
            $pieces1 = preg_replace('/\d/', '', $pieces);
            echo '
          
            <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
            
            ';
          }
        }else if($lastnum == 8){
          if (str_ends_with($pieces[$i], '/\d/')) {

            $pieces1 = preg_replace('/\d/', '', $pieces);
            echo '
            <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
            
            ';
            
        }else {
          $pieces1 = preg_replace('/\d/', '', $pieces);
          echo '
        
          <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
          
          ';
        }
      }else if($lastnum == 9){
        if (str_ends_with($pieces[$i], '/\d/')) {

          $pieces1 = preg_replace('/\d/', '', $pieces);
          echo '
          <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
          
          ';
          
      }else {
        $pieces1 = preg_replace('/\d/', '', $pieces);
        echo '
      
        <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
        
        ';
      }
    }else if($lastnum == 10){
      if (str_ends_with($pieces[$i], '/\d/')) {

        $pieces1 = preg_replace('/\d/', '', $pieces);
        echo '
        <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
        
        ';
        
    }else {
      $pieces1 = preg_replace('/\d/', '', $pieces);
      echo '
    
      <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
      
      ';
    }
  }



        }
      }
         
          
          ?>
          </select>

          <label for="pname">Product name</label>
          <input type="text" id="pname" name="pname" placeholder="Product name" required>


          <label for="iname">Product Pictures</label>
          <input type="file" id="image" name="files[]" required multiple>

          <label for="short">short description</label>
          <input type="text" id="short" name="short" placeholder="product short description" required>


      
          <label for="full">full description</label>
          <input type="text" id="full" name="full" placeholder="product short description" required>

      
          <label for="material">product material</label>
          <input type="text" id="material" name="material" placeholder="product material" required>



          <label for="size">products sizes</label>
          <input type="text" id="size" name="size[]" placeholder="products sizes" required>
          <div id="new_chq" style="display: inline-block; width: 50%;"></div><br>
          <input type="hidden" value="1" id="total_chq">

          <button onclick="add()" class="bts1" >Add anther size</button>
          <button onclick="remove()" class="bts1"> remove</button><br><br>
          
          <label for="colors">product colors</label>
          <input type="color" id="colors" name="colors[]" required style="height: 60px;">
          <div id="new_chq1"></div><br>
          <input type="hidden" value="1" id="total_chq1">

          <button onclick="add1()" class="bts1">Add anther colors</button>
          <button onclick="remove1()" class="bts1"> remove</button><br><br>

          <label for="price">product price</label>
          <input type="text" id="price" name="price" placeholder="product price" required>



          <label for="Discount">Discount (new price)</label>
          <input type="text" id="Discount" name="Discount" placeholder="Discount">


          <label for="Delivery">Delivery Policy time of arrived</label>
          <input type="text" id="Delivery" name="Delivery" placeholder="Delivery Policy time of arrived" required>



          <label for="Return">Return Policy</label>
          <input type="text" id="Return" name="Return" placeholder="Return Policy" required>




    <div class="di2">
          <label for="rfname">أسم المتجر</label>
          <input type="text" id="rfname" name="rname" placeholder="أسم المتجر" required>

          <label for="rcategory">فئة المنتج</label>
          <select id="rcategory" name="rcategory" required>
          <?php 

$pieces = explode(",", $ar_shop_category);
for ($i=0; $i<count($pieces); $i++){

  if(preg_match_all('/\d+/', $pieces[$i], $numbers)){
  $lastnum = end($numbers[0]);

  if ($lastnum == 1){

    if (str_ends_with($pieces[$i], '/\d/')) {

      $pieces1 = preg_replace('/\d/', '', $pieces);
      echo '<optgroup label="احذية">
      <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
      </optgroup>
      ';
      
  }else {
    $pieces1 = preg_replace('/\d/', '', $pieces);
    echo '
    <optgroup label="احذية">
    <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
    </optgroup>
    ';
  }
    

 

  }else if($lastnum == 2){
    
    if (str_ends_with($pieces[$i], '/\d/')) {

      $pieces1 = preg_replace('/\d/', '', $pieces);
      echo '<optgroup label="ملابس">
      <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
      </optgroup>
      ';
      
  }else {
    $pieces1 = preg_replace('/\d/', '', $pieces);
    echo '
    <optgroup label="ملابس">
    <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
    </optgroup>
    ';
  }
  }else if($lastnum == 3){
   if (str_ends_with($pieces[$i], '/\d/')) {

      $pieces1 = preg_replace('/\d/', '', $pieces);
      echo '<optgroup label="حقائب">
      <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
      </optgroup>
      ';
      
  }else {
    $pieces1 = preg_replace('/\d/', '', $pieces);
    echo '
    <optgroup label="حقائب">
    <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
    </optgroup>
    ';
  }
  }else if($lastnum == 4){
    if (str_ends_with($pieces[$i], '/\d/')) {

      $pieces1 = preg_replace('/\d/', '', $pieces);
      echo '<optgroup label="عطور">
      <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
      </optgroup>
      ';
      
  }else {
    $pieces1 = preg_replace('/\d/', '', $pieces);
    echo '
    <optgroup label="عطور">
    <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
    </optgroup>
    ';
  }
  }else if($lastnum == 5){
    if (str_ends_with($pieces[$i], '/\d/')) {

      $pieces1 = preg_replace('/\d/', '', $pieces);
      echo '<optgroup label="مُكَمِّلات">
      <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
      </optgroup>
      ';
      
  }else {
    $pieces1 = preg_replace('/\d/', '', $pieces);
    echo '
    <optgroup label="مُكَمِّلات">
    <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
    </optgroup>
    ';
  }
  }else if($lastnum == 6){
    if (str_ends_with($pieces[$i], '/\d/')) {

      $pieces1 = preg_replace('/\d/', '', $pieces);
      echo '<optgroup label="العاب">
      <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
      </optgroup>
      ';
      
  }else {
    $pieces1 = preg_replace('/\d/', '', $pieces);
    echo '
    <optgroup label="العاب">
    <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
    </optgroup>
    ';
  }


}else if($lastnum == 7){
  if (str_ends_with($pieces[$i], '/\d/')) {

    $pieces1 = preg_replace('/\d/', '', $pieces);
    echo '
    <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
    
    ';
    
}else {
  $pieces1 = preg_replace('/\d/', '', $pieces);
  echo '

  <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
  
  ';
}
}else if($lastnum == 8){
if (str_ends_with($pieces[$i], '/\d/')) {

  $pieces1 = preg_replace('/\d/', '', $pieces);
  echo '
  <option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>
  
  ';
  
}else {
$pieces1 = preg_replace('/\d/', '', $pieces);
echo '

<option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>

';
}
}else if($lastnum == 9){
if (str_ends_with($pieces[$i], '/\d/')) {

$pieces1 = preg_replace('/\d/', '', $pieces);
echo '
<option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>

';

}else {
$pieces1 = preg_replace('/\d/', '', $pieces);
echo '

<option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>

';
}
}else if($lastnum == 10){
if (str_ends_with($pieces[$i], '/\d/')) {

$pieces1 = preg_replace('/\d/', '', $pieces);
echo '
<option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>

';

}else {
$pieces1 = preg_replace('/\d/', '', $pieces);
echo '

<option value="'.$pieces[$i].'">'.$pieces1[$i].'</option>

';
}
}



}
}


          ?>
          </select>
          
          <label for="rpname">أسم المنتج</label>
          <input type="text" id="rpname" name="rpname" placeholder="أسم المنتج" required>

          <label for="rshort">شرح مختصر عن المنتج</label>
          <input type="text" id="rshort" name="rshort" placeholder="شرح مختصر" required>

          <label for="rfull">شرح كامل عن المنتج</label>
          <input type="text" id="rfull" name="rfull" placeholder="شرح كامل" required>

          <label for="rmaterial">مادة المنتج</label>
          <input type="text" id="rmaterial" name="rmaterial" placeholder="مادة المنتج" required>

          <label for="rprice">سعر المنتج</label>
          <input type="text" id="rprice" name="rprice" placeholder="سعر المنتج" required>

          <label for="rDiscount">التخفيضات (الرجاء ادخال السعر الجديد)</label>
          <input type="text" id="rDiscount" name="rDiscount"  placeholder="التخفيضات">

          <label for="rDelivery">وقت وصول سياسة التسليم</label>
          <input type="text" id="rDelivery" name="rDelivery" placeholder="وقت وصول سياسة التسليم" required>

          <label for="rReturn">سياسة الإرجاع</label>
          <input type="text" id="rReturn" name="rReturn" placeholder="سياسة الإرجاع" required>

        </div>
          <input type="submit" value="Add" name="submit">
          <input type="hidden" name="valu" value="<?php echo $username; ?>">
        </form>
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
        demo.initGoogleMaps();
      });
    </script>
      <script>
        function add(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
      var new_input="<label id='new_"+new_chq_no+"'><input type='text' id='siz' name='size[]' placeholder='size' required > </label>";
      $('#new_chq').append(new_input);
      $('#total_chq').val(new_chq_no)
    }
    function remove(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
    }
      </script>



<script>
  function add1(){
var new_chq_no1 = parseInt($('#total_chq1').val())+1;
var new_input1="<label id='new_"+new_chq_no1+"'><input type='color' id='colors' name='colors[]' required style='height: 60px; width:100px;'> </label>";
$('#new_chq1').append(new_input1);
$('#total_chq1').val(new_chq_no1)
}
function remove1(){
var last_chq_no1 = $('#total_chq1').val();
if(last_chq_no1>1){
  $('#new_'+last_chq_no1).remove();
  $('#total_chq1').val(last_chq_no1-1);
}
}
</script>


<script>
  function add2(){
var new_chq_no2 = parseInt($('#total_chq2').val())+1;
var new_input2="<label id='new_"+new_chq_no2+"'> <input type='file' id='image' name='image[]' style='display: inline-block; width: 100%;' required> </label>";
$('#new_chq2').append(new_input2);
$('#total_chq2').val(new_chq_no2)
}
function remove2(){
var last_chq_no2 = $('#total_chq2').val();
if(last_chq_no2>1){
  $('#new_'+last_chq_no2).remove();
  $('#total_chq2').val(last_chq_no2-1);
}
}
</script>
</body>

</html>