<?php

session_start();

include("db_config.php");

if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "en"; }
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }
 
// (D) LOAD LANGUAGE FILE
require "lang/lang-".$_SESSION["lang"].".php";

$_SESSION['error'] = '';

if($_SERVER['REQUEST_METHOD']== "POST")
{
	//something was posted
	$username1= $_POST['username1'];
	$password= $_POST['password1'];
	

	if(($username1)&&!empty($password))
{
	//read from the database
	$query="select * from sign_up where email = '$username1' or phone = '$username1' limit 1";

	$result = mysqli_query($conn,$query);

    if($result && mysqli_num_rows($result) > 0)
    {
        $user_data =mysqli_fetch_assoc($result);
        
        if($user_data['password']===$password)
        {
            $_SESSION['id2'] = $user_data['id'];
            header("Location: dashboard.php?username=$username1");
            die;
        }else{
            
            $_SESSION['error'] = "$_TXT[9]";
            header("Location: index.php?username=$username1");
          
        }
    }else
    {
        $_SESSION['error'] = "$_TXT[10]";
        header("Location: index.php");
    }

}
else
{
	$error = "please enter valid data";
}

}


?>