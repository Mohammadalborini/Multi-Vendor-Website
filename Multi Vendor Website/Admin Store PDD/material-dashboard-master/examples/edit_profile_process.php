<?php
session_start();

include("db_config.php");


if (isset($_POST['submit'])){
  $id = $_POST['id'];
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
            $query =("UPDATE `sign_up` SET `store_name`='$name1',`store_logo`='$img_content',
            `email`='$name2',`phone`='$name3',`username`='$name4',
            `password`='$name5',`re_password`='$name6',
            `payment`='$chek2',`first_card`='$name8',
            `second_card`='$name9',`third_card`='$name10',
            `fourth_card`='$name11',`location`='$name12',
            `shop_category`='$checkBox',`ar_shop_category`='$rcheckBox' WHERE id='$id' ");

                          

                mysqli_query($conn, $query);
          
          echo "<script> alert('Edit profile successfully.') </script>";
          echo '<script> window.location.href = "edit_profile.php?id='.$id.'"; </script>';
                
        }
 

      }else{ 
          $error = true;
          echo "<script> alert('Only support jpg, jpeg, png, gif format.') </script>";
      } 

  }


?>




