<?php

session_start();

include("db_config.php");

if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "en"; }
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }

require "lang/login-".$_SESSION["lang"].".php";


$_SESSION['error'] = '';

if($_SERVER['REQUEST_METHOD']== "POST")
{
	//something was posted
	$username1= $_POST['username'];
	$password= $_POST['password'];
	

	if(($username1)&&!empty($password))
{
	//read from the database
	$query="select * from end_user where username = '$username1' or phone = '$username1' limit 1";

	$result = mysqli_query($conn,$query);

    if($result && mysqli_num_rows($result) > 0)
    {
        $user_data =mysqli_fetch_assoc($result);
        
        if($user_data['password']===$password)
        {
            $_SESSION['id1'] = $user_data['id'];
            header("Location: index1.php");
            die;
        }else{
            
            $_SESSION['error'] = "$_TXT[79]";
            header("Location: login.php");
          
        }
    }else
    {
        $_SESSION['error'] = "$_TXT[80]";
        header("Location: login.php");
    }

}

}


?>