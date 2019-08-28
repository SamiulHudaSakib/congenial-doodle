<?php
session_start(); //starting session
require_once 'db.php';


//columns
$customer_name = $_POST['customer_name'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$retype_password = $_POST['retype_password'];

//sanitizing Email
$sanitized_mail = filter_var($email, FILTER_SANITIZE_EMAIL);

//SETTING PARAMETERS OF PASSWORD
$req_capital_letter = preg_match("@[A-Z]@", $password);
$req_small_letter = preg_match("@[a-z]@", $password);
$req_number = preg_match("@[0-9]@", $password);

//phone number validation
if(strlen($phone_number) < 11){
  $_SESSION['err_mesg_phone_number']= "Invalid Phone number";
  header("location: completeform.php");
}else{
  if(!filter_var($sanitized_mail, FILTER_VALIDATE_EMAIL)){
    $_SESSION['err_mesg_mail']= "Invalid email address";
    header("location: completeform.php");
  }else{
    if($req_capital_letter == 1 && $req_small_letter == 1 && $req_number == 1 && strlen($password) >= 8){
      if($password== $retype_password){
        //password encryption
        $encrypted_password = md5($password);

        //counting distinct Email
        $checkinng_number_of_mail = "SELECT COUNT(*) AS total_count FROM customers WHERE email = '$sanitized_mail'";
        $after_checking = mysqli_query($my_connect,$checkinng_number_of_mail);
        $after_assoc = mysqli_fetch_assoc($after_checking);
        if($after_assoc['total_count'] == 0){
          $insert_query = "INSERT INTO customers (customer_name,phone_number,email,password) VALUES ('$customer_name','$phone_number','$email','$password')";
          mysqli_query($my_connect,$insert_query);
          $_SESSION['success_mesg']= "Registration succesfull!";
          header("location: completeform.php");
        }else{
          $_SESSION['err_mesg_duplicate_mail']= "This email is already taken";
          header("location: completeform.php");

        }
      }else{
        $_SESSION['err_mesg_pass']= "Password did not match";
        header("location: completeform.php");
      }

      }
      else{
        $_SESSION['err_mesg_pass']= "Password must contain one capital letter, one small letter, one number and must be of at least 8 character";
        header("location: completeform.php");
      }
  }
}


 ?>
