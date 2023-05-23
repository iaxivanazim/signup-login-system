<?php
require 'includes/common.php';
// if (isset($_SESSION["login_email"])) {
//     session_unset();
//     session_destroy();
//     echo($_SESSION["login_email"]);
//     header("location:../index.html");
// }
date_default_timezone_set('Asia/Calcutta');
if (isset($_POST['login_submit']) && !empty($_POST['login_submit'])) {
    $email = $_POST['login_email'];
    $_SESSION["login_email"]=$email;
    $password = md5($_POST['login_password']);

    $check = mysqli_query($conn, "select u.email,concat(u.fname,' ',u.lname) as user from users u where u.email = '$email' ") or die(mysqli_error($conn));

    if (mysqli_num_rows($check) == 0) {
        echo '<script>alert("User not found, Please try again");window.location = history.back();</script>';
    } else {
        $check = mysqli_query($conn, "select u.email,concat(u.fname,' ',u.lname) as user from users u where u.email = '$email' && u.password='$password'") or die(mysqli_error($conn));
        if (mysqli_num_rows($check) == 0) {
            die('<script>alert("Incorrect Password, Please try again");window.location = history.back();</script>');
            // echo '<script>alert("Incorrect Password, Please try again");//window.location = history.back();</script>';   
        }
        session_start();
        $row = mysqli_fetch_array($check);
        $email = $row['email'];
        $user=$row['user'];


        $last_insert_id = mysqli_insert_id($conn);
        if (isset($_SESSION['login_email'])) {
            
            header("location:../views/dashboard.php");
        }
    }
}
?>