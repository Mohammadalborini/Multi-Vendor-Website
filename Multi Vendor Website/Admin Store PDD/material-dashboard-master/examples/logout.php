<?php
session_start();

if(isset($_SESSION['id2']))
{
    unset($_SESSION['id2']);
}

header("Location: index.php");
die;