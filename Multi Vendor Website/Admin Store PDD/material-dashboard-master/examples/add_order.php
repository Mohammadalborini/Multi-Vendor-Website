<?php
session_start();

include("db_config.php");

if ($_SESSION == null) {
  echo '<script> window.location.href = "index.php"; </script>';
}
else {
    $id = $_SESSION['id2'];
}

if (isset($_POST['submit'])){


    $name4 =  $_POST['pname'];
                 // File upload configuration 
                 $targetDir = "../upload/"; 
                 $allowTypes = array('jpg','png','jpeg','gif'); 
                  
                 $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
                 $fileNames = array_filter($_FILES['files']['name']); 
                 if(!empty($fileNames)){ 
                     foreach($_FILES['files']['name'] as $key=>$val){ 
                         // File upload path 
                         $fileName = basename($_FILES['files']['name'][$key]); 
                         $targetFilePath = $targetDir . $fileName; 
                          
                         // Check whether file type is valid 
                         $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                         if(in_array($fileType, $allowTypes)){ 
                             // Upload file to server 
                             if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                                 // Image db insert sql 

                      
                                 $insertValuesSQL .= "".$fileName.","; 
                             }else{ 
                                 $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                             } 
                         }else{ 
                             $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
                         } 
                     } 
                      
                      
                     if(!empty($insertValuesSQL)){ 
                         $insertValuesSQL = trim($insertValuesSQL, 'NOW()),');      
                         // Insert image file name into database 
                          //Now run update query 	
                     $insert =('INSERT INTO product_image
                      (store_id,
                      product_name,
                      file_name)
                        VALUES
                         ("'.$id.'",
                          "'.$name4.'",
                         "'.$insertValuesSQL.'")
                         ');

                       mysqli_query($conn, $insert);
                    
                         if($insert){ 
                             $statusMsg = "Files are uploaded successfully.".$errorMsg; 
                         }else{ 
                             $statusMsg = "Sorry, there was an error uploading your file."; 
                         } 
                     }else{ 
                         $statusMsg = "Upload failed! ".$errorMsg; 
                     } 
                 }else{ 
                     $statusMsg = 'Please select a file to upload.'; 
                 } 
             
             
             


  


  $valu= $_POST['valu'];

  $size = implode(',', $_POST['size']);

  $error = false;
  $status = "";

  $colors = implode(',', $_POST['colors']);




  //check if file is not empty
  if(!empty($_FILES["image1"]["name"])) { 
           //file info 
                      //file info 
                  $file_name1 = basename($_FILES["image1"]["name"]); 
                  $file_type1 = pathinfo($file_name1, PATHINFO_EXTENSION);
              
                  //make an array of allowed file extension
                  $allowed_file_types1 = array('jpg','jpeg','png');
              
              
                  //check if upload file is an image
                  if( in_array($file_type1, $allowed_file_types1) ){ 
              
                      $tmp_image1 = $_FILES['image1']['tmp_name']; 
                      $img_content1 = addslashes(file_get_contents($tmp_image1)); 



          $name1 =  $_POST['name'];
          $img_content1;
          $name3 =  $_POST['category'];

          $name6 =  $_POST['short'];
          $name7 =  $_POST['full'];
          $name8 =  $_POST['material'];
          $size;
          $colors;
          $name11 =  $_POST['price'];
          $name12 =  $_POST['Discount'];
          $name13 =  $_POST['Delivery'];
          $name14 =  $_POST['Return'];
          $name15 =  $_POST['rname'];
          $name16 =  $_POST['rcategory'];
          $name17 =  $_POST['rpname'];
          $name18 =  $_POST['rshort'];
          $name19 =  $_POST['rfull'];
          $name20 =  $_POST['rmaterial'];
          $name21 =  $_POST['rprice'];
          $name22 =  $_POST['rDiscount'];
          $name23 =  $_POST['rDelivery'];
          $name24 =  $_POST['rReturn'];

          //Now run update query 	
            $query =('INSERT INTO `orders`
            (`store_id`,
             `store_name`,
              `store_logo`,
               `product_category`,
                `product_name`,
                  `short_description`,
                   `full_description`,
                    `product_material`,
                     `products_sizes`,
                      `product_colors`,
                       `product_price`,
                        `discount`,
                         `policy`,
                          `return_policy`,
                           `ar_tore_name`,
                            `ar_product_category`,
                             `ar_product_name`,
                              `ar_short_description`,
                               `ar_full_description`,
                                `ar_product_material`,
                                 `ar_product_price`,
                                  `ar_discount`,
                                   `ar_policy`,
                                    `ar_return_policy`)
                                     VALUES
                                      (
                                      "'.$id.'",
                                      "'.$name1.'",
                                      "'.$img_content1.'",
                                      "'.$name3.'",
                                      "'.$name4.'",
                                      "'.$name6.'",
                                      "'.$name7.'",
                                      "'.$name8.'",
                                      "'.$size.'",
                                      "'.$colors.'",
                                      "'.$name11.'",
                                      "'.$name12.'",
                                      "'.$name13.'",
                                      "'.$name14.'",
                                      "'.$name15.'",
                                      "'.$name16.'",
                                      "'.$name17.'",
                                      "'.$name18.'",
                                      "'.$name19.'",
                                      "'.$name20.'",
                                      "'.$name21.'",
                                      "'.$name22.'",
                                      "'.$name23.'",
                                      "'.$name24.'")');

                          

                mysqli_query($conn, $query);


          
          echo "<script> alert('Add order successfully.') </script>";
          echo '<script> window.location.href = "Add New.php?username='.$valu.'"; </script>';
                
        }
 

      }else{ 
          $error = true;
          echo "<script> alert('Only support jpg, jpeg, png, gif format.') </script>";
      } 

  }


?>




