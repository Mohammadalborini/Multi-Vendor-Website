<?php
session_start();

include("db_config.php");


if (isset($_POST['submit'])){

  $checkBox = implode(',', $_POST['shop']);
  $rcheckBox = implode(',', $_POST['rshop']);

  $error = false;
  $status = "";

  $chek2 = implode(',', $_POST['chek']);



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

          $name1 =  $_POST['store'];

          $name2 =  $_POST['email'];
          $name3 =  $_POST['number'];
          $name4 =  $_POST['user'];
          $name5 =  $_POST['psw'];
          $name6 =  $_POST['psw-repeat'];
        
          $name8 =  $_POST['card1'];
          $name9 =  $_POST['card2'];
          $name10 =  $_POST['card3'];
          $name11 =  $_POST['card4'];
          $name12 =  $_POST['add'];

          //Now run update query 	
            $query =('INSERT INTO sign_up
            ( `store_name`,
             `store_logo`,
             `email`,
              `phone`,
               `username`,
                `password`,
                 `re_password`,
                  `payment`, 
                  `first_card`,
                   `second_card`,
                    `third_card`,
                     `fourth_card`,
                      `location`,
                       `shop_category`,
                       `ar_shop_category`)
                         VALUES
                          (
                          "'.$name1.'",
                          "'.$img_content.'",
                          "'.$name2.'",
                          "'.$name3.'",
                          "'.$name4.'",
                          "'.$name5.'",
                          "'.$name6.'",
                          "'.$chek2.'",
                          "'.$name8.'",
                          "'.$name9.'",
                          "'.$name10.'",
                          "'.$name11.'",
                          "'.$name12.'",
                          "'.$checkBox.'",
                          "'.$rcheckBox.'")');

                          

                mysqli_query($conn, $query);
          
          echo "<script> alert('Sign up successfully.') </script>";
          echo '<script> window.location.href = "index.php"; </script>';
                
        }
 

      }else{ 
          $error = true;
          echo "<script> alert('Only support jpg, jpeg, png, gif format.') </script>";
      } 

  }


?>




