<?php
@include 'config.php';

session_start();

$error = []; // Initialize an empty array to store errors

if(isset($_POST['submit'])) {
    // Check if the required form fields are set
    if(isset($_POST['email'], $_POST['password'])) {

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['password']);

        $select = "SELECT * FROM user_form WHERE email = '$email'";
        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            // Verify the password
            if($row['password'] == $pass) {
                if($row['user_type'] == 'admin') {
                    $_SESSION['admin_name'] = $row['name'];
                    header('location:admin_page.html');
                    exit();
                } elseif($row['user_type'] == 'user') {
                    $_SESSION['user_name'] = $row['name'];
                    header('location:naslovnica.html');
                    exit();
                }
            } else {
                $error[] = 'Incorrect password!';
            }
        } else {
            $error[] = 'Incorrect email!';
        }
    } else {
        $error[] = 'All fields are required!';
    }
}

// Redirect back to the login page with error message, if any
if (!empty($error)) {
    $_SESSION['login_error'] = $error;
    header('location: login_form.html');
    exit();
}
?>
