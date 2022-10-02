<?php 
session_start();

include("db_config.php");

if (isset($_POST['submit'])) {
   
    $name1 =  $_POST['name1'];
    $name2 =  $_POST['name2'];
    $name3 =  $_POST['name3'];
    $name4 =  $_POST['name4'];
    $name5 =  $_POST['name5'];
    $name6 =  $_POST['name6'];
    $name7 =  $_POST['name7'];
    $name8 =  $_POST['name8'];
    $name9 =  $_POST['name9'];
    $name10 =  $_POST['name10'];
    $name11 =  $_POST['name11'];
    $name12 =  $_POST['name12'];

    
    //Now run update query 	
    $query =("INSERT INTO `end_user`( `first_name`, `last_name`, `username`, `email`, `password`, `re_password`,`birthday`, `address`, `Area_name`, `Street_name`, `Building_number`, `Phone`) VALUES
     ('$name1','$name2','$name3','$name4','$name5','$name6','$name7','$name8','$name9','$name10','$name11','$name12')");

                  

        mysqli_query($conn, $query);

  echo "<script> alert('Sign up successfully.') </script>";
  echo '<script> window.location.href = "login.php"; </script>';

}

?>