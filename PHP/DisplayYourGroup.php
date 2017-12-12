<?php
session_start();


$user = "No";

if(isset($_SESSION['user']))
{
    $user =  $_SESSION['user'];
}
echo $user;

?>