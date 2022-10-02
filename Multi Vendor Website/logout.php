<?php
session_start();

if(isset($_SESSION['id1']))
{
    unset($_SESSION['id1']);
}

header("Location: index1.php");
die;