<?php
session_start();

include("db_config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Paper Dashboard 2 by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    input[type=text],input[type=file]  {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    input[type=submit] {
      width: 100%;
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
    
    .divs {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
    .divs label{
      color: black;
      font-size: 15px;
      font-weight: 900;
    }


    .divb{
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      outline:none;
    }
    .divb{
      outline: none;
    }
    .divb:hover {
      background-color: #45a049;
      color:#fff;
      outline:none;
    }
    .divs:link, .divs:visited {
  text-align: center;
  text-decoration: none;
  display: inline-block;
  }
    .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 200px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content a:hover {background-color: #ddd;}

.show {display: block;}




.dropdown-content1 {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 200px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content1 a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content1 a:hover {background-color: #ddd;}

.show1 {display: block;}



.dropdown-content2 {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 200px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content2 a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content2 a:hover {background-color: #ddd;}

.show2 {display: block;}

.dropdown-content3 {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 200px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content3 a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content3 a:hover {background-color: #ddd;}

.show3 {display: block;}
    </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          Welcome <br> Zonan Admin
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./header.php">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Header</p>
            </a>
          </li>
          <li>
            <a href="./footer.php">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Footer</p>
            </a>
          </li>
          <li>
            <a onclick="myFunction()" class="dropbtn">
              <i class="nc-icon nc-bullet-list-67"></i>
              Slid bar
            </a>
                <div id="myDropdown" class="dropdown-content">
                  <a href="./add slid bar.php">
                    <i class="nc-icon nc-chat-33"></i>
                    <p>add slid bar</p>
                  </a>

                  <a href="./slid bar.php">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>Slid bar</p>
                  </a>
                </div>
          </li>
          <li class="active ">
            <a href="./Offer section 1 Under slide section.php">
              <i class="nc-icon nc-align-left-2"></i>
              <p>Offer section 1</p>
            </a>
          </li>
          <li>
            <a href="./Offer section 2 Under slide section.php">
              <i class="nc-icon nc-align-left-2"></i>
              <p>Offer section 2</p>
            </a>
          </li>
          <li>
            <a href="./best seller.php">
              <i class="nc-icon nc-cart-simple"></i>
              <p>best seller</p>
            </a>
          </li>
          <li>
            <a href="./all inner Sliders.php">
              <i class="nc-icon nc-diamond"></i>
              <p>all inner Sliders</p>
            </a>
          </li>
          <li>
            <a onclick="myFunction1()" class="dropbtn1">
              <i class="nc-icon nc-check-2"></i>
              feedback
            </a>
              <div id="myDropdown1" class="dropdown-content">
                  <a href="./add feedback.php">
                    <i class="nc-icon nc-trophy"></i>
                    <p>add feedback</p>
                  </a>

                  <a href="./feedback.php">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>Feedback</p>
                  </a>
              </div>
          </li>
          <li>
            <a href="./contact us.php">
              <i class="nc-icon nc-mobile"></i>
              <p>contact us</p>
            </a>
          </li>
          <li>
            <a href="./users.php">
              <i class="nc-icon nc-single-02"></i>
              <p>users</p>
            </a>
          </li>
          <li>
            <a href="./stores.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>stores</p>
            </a>
          </li>
          <li>
            <a href="./orders.php">
              <i class="nc-icon nc-bag-16"></i>
              <p>orders</p>
            </a>
          </li>
          <li>
            <a href="./intro for the admin store.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>intro for the admin store</p>
            </a>
          </li>
          <li>
            <a href="./messages.php">
              <i class="nc-icon nc-bell-55"></i>
              <p>messages</p>
            </a>
          </li>
          <li>
            <a onclick="myFunction2()" class="dropbtn2">
              <i class="nc-icon nc-chat-33"></i>
              FAQ: Q&A
            </a>
              <div id="myDropdown2" class="dropdown-content">
                <a href="./add FAQ.php">
                  <i class="nc-icon nc-chat-33"></i>
                  <p>Add Question</p>
                </a>
                  <a href="./FAQ.php">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>FAQ: Q&A</p>
                  </a>
              </div>
          </li>
          <li>
            <a href="./Security.php">
              <i class="nc-icon nc-touch-id"></i>
              <p>Security</p>
            </a>
          </li>
          <li >
            <a onclick="myFunction3()" class="dropbtn3">
              <i class="nc-icon nc-chat-33"></i>
              Delivery Address
            </a>
            <div id="myDropdown3" class="dropdown-content">
                <a href="./add address.php">
                  <i class="nc-icon nc-chat-33"></i>
                  <p>Add address</p>
                </a>
                  <a href="./address.php">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>Delivery address</p>
                  </a>
              </div>
          </li>
          <li>
            <a href="./logout.php">
            <i class="fa fa-sign-out" style="font-size:24px"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Offer section 1</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>

                  <?php
                  $query="SELECT porint from  end_user  where porint = 0 UNION All
                          SELECT pointer1 from  user_product  where pointer1 = 0";
                   $result = mysqli_query($conn,$query);
                   if (mysqli_num_rows($result) > 0){ 
                    $num = mysqli_num_rows($result);
                   }else{
                    $num = 0;
                    }?>

                  <span><?php echo $num; ?></span>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                
                  </p>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <?php
                   $query="SELECT * from end_user where porint = 0";
                   $result = mysqli_query($conn,$query);
                   if (mysqli_num_rows($result) > 0){
                   while ($row1 = mysqli_fetch_assoc($result)){
                    $id = $row1['id'];
                    $username = $row1['username'];
                  ?>
                  <a class="dropdown-item" href="users.php?id=<?php echo $id; ?>"><?php echo $username; ?>: User</a>
                  <?php  }
                }?>

                <?php
                   $query="SELECT * from user_product where pointer1 = 0";
                   $result = mysqli_query($conn,$query);
                   if (mysqli_num_rows($result) > 0){
                   while ($row1 = mysqli_fetch_assoc($result)){
                    $id = $row1['id'];
                    $product_name = $row1['product_name'];
                  ?>
                  <a class="dropdown-item" href="orders.php?id=<?php echo $id; ?>"><?php echo $product_name; ?>: Order</a>
                  <?php  }
                }?>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Offer section 1</h5>
              </div>
              <div class="divs">
                <form action="" method="POST" enctype="multipart/form-data">
                  <label for="name" > Title </label>
                    <input type="text" name="name" id="name" required>
                <label for="name1" >Arabic Title </label>
                    <input type="text" name="name1" id="name1" required>
                  <label for="logo2" > Image </label>
                    <input type="file" name="image" id="logo2" required><p style="color: red;">* the size of image is 1920*840</p>
  
                    <input type="submit" name="submit" value="Save">
                </form>
              </div>
              <hr style="height: 10px;">
              <div class="col-md-12" >
                <div class="card" >
                  <div class="card-body" >
                    <div class="table-responsive" style="overflow: hidden;">
                    <?php
                     $result = $conn->query("SELECT * FROM offer1") or die($conn->error);
                   ?>
                      <table class="table" >
                        <thead class=" text-primary">
                        <th>
                           ID
                          </th>
                          <th>
                            Title
                          </th>
                          <th>
                          Arabic  Title
                          </th>
                          <th>
                           Image
                          </th>
                          <th class="text-right">
                           Action
                          </th>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                      <?php while ($row = $result->fetch_assoc()):?> 
                          <tr>
                          <td>
                          <?php echo $i;?>
                            </td>
                            <td>
                            <?php echo $row['title'];?>
                            </td>
                            <td>
                            <?php echo $row['ar_title'];?>
                            </td>
                            <td>
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" width="150px" height="auto"  alt="#"/>
                            </td>
                            <td class="text-right">
                            <a href="edit_Offer section 1.php?id=<?php echo $row['id'];?>" class="divb"> Edit</a><br><br><br>
                             <a href="Offer section 1 Under slide section.php?id=<?php echo $row['id'];?>" onclick="javascript: return confirm('Are you sure?');" class="divb" style="background:red;"> Delete</a>
                            </td>
                          </tr>
                          <?php $i++; ?>
                        </tbody>
                        <?php endwhile; ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
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
  
  
  <script>
    /* When the user clicks on the button, 
  toggle between hiding and showing the dropdown content */
  function myFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show1");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn1')) {
      var dropdowns = document.getElementsByClassName("dropdown-content1");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show1')) {
          openDropdown.classList.remove('show1');
        }
      }
    }
  }
  </script>
  
  
  
  
  <script>
    /* When the user clicks on the button, 
  toggle between hiding and showing the dropdown content */
  function myFunction2() {
    document.getElementById("myDropdown2").classList.toggle("show2");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn2')) {
      var dropdowns = document.getElementsByClassName("dropdown-content2");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show2')) {
          openDropdown.classList.remove('show2');
        }
      }
    }
  }
  </script>

<script>
  /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction3() {
  document.getElementById("myDropdown3").classList.toggle("show3");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn3')) {
    var dropdowns = document.getElementsByClassName("dropdown-content3");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show3')) {
        openDropdown.classList.remove('show3');
      }
    }
  }
}
</script>
</body>

</html>

<?php
if (isset($_POST['submit'])){

  $error = false;
  $status = "";
  //check if file is not empty
  if(!empty($_FILES["image"]["name"])) { 
           //file info 
      $file_name = basename($_FILES["image"]["name"]); 
      $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

      //make an array of allowed file extension
      $allowed_file_types = array('jpg','jpeg','png');
      
  
      //check if upload file is an image
      if( in_array($file_type, $allowed_file_types) ){ 
  
          $tmp_image = $_FILES['image']['tmp_name']; 
          $img_content = addslashes(file_get_contents($tmp_image)); 

          $name1 =  $_POST['name'];
          $name2 =  $_POST['name1'];

          //Now run update query 		description	ar_description
          $query = $conn->query("INSERT INTO offer1(`title`, `ar_title`, `image`) VALUES ('$name1','$name2','$img_content')");
          echo "<script> alert('Offer section add.') </script>";
            echo '<script> window.location.href = "Offer section 1 Under slide section.php"; </script>';

      }else{ 
          $error = true;
          echo "<script> alert('Only support jpg, jpeg, png, gif format.') </script>";
      } 

  }
}

?>


<?php

if (isset($_GET['id'])){
  $id = $_GET['id'];
  $result = $conn->query("SELECT * FROM offer1 WHERE id='$id' ") or die($conn->error);
    while ($row = $result->fetch_assoc()){
      $id = $row['id'];
    $sql = "DELETE FROM offer1 WHERE id='$id' ";
            mysqli_query($conn, $sql); 
            echo "<script> alert('offer Deleted.') </script>";
}

}
?>