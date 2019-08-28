<?php
session_start();
require_once 'db.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$checking_query = "SELECT COUNT(*) AS total_user FROM customers WHERE email = '$email' AND password = '$password'";

$from_db = mysqli_query($my_connect,$checking_query);

 $after_assoc = mysqli_fetch_assoc($from_db);
// print_r($after_assoc);
if($after_assoc['total_user']==1){
  header('location: dashboard.php');
}else{
  $_SESSION['login_error'] = "Your email or password is wrong";
  header('location: login.php');
}




 ?>
