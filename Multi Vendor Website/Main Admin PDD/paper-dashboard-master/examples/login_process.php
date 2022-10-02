<?php

session_start();

include("db_config.php");

$_SESSION['error'] = '';

if($_SERVER['REQUEST_METHOD']== "POST")
{
	//something was posted
	$username= $_POST['username'];
	$password= $_POST['password'];
	

	if(($username)&&!empty($password))
{
	//read from the database
	$query="select * from admin_infromation where email = '$username' or phone = '$username' limit 1";

	$result = mysqli_query($conn,$query);

    if($result && mysqli_num_rows($result) > 0)
    {
        $user_data =mysqli_fetch_assoc($result);
        
        if($user_data['password']===$password)
        {
            $_SESSION['id'] = $user_data['id'];
            header("Location: dashboard.php");
            die;
        }else{
            
            $_SESSION['error'] = "The username or password is wrong";
            header("Location: index.php?email=$username");
          
        }
    }else
    {
        $_SESSION['error'] = "The username or password is wrong";
        header("Location: index.php");
    }

}
else
{
	$error = "please enter valid data";
}

}


?>