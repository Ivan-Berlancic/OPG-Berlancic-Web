<?php

@include 'config.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $checkEmailQuery = "SELECT * FROM user_form WHERE email = '$email'";
   $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

   if(mysqli_num_rows($checkEmailResult) > 0){
      $error[] = 'Email already exists. Please choose a different email.';
   } else {
      if($pass != $cpass){
         $error[] = 'Passwords do not match!';
      } else {
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         $_SESSION['user'] = ['email' => $email, 'cart' => []];
         header('location:login_form.html');
      }
   }
}

?>