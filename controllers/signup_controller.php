<?php
    require "includes/common.php";
    include('includes/common.php');

// initialize variables
$fname = $lname = $email = $contact = $password = "";

$update = false;

if (isset($_POST['signup_submit'])) {
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = md5($_POST['password']);
    $repeat = md5($_POST['repeat']);
    
    // Check if the email already exists in the database
    $emailExistsQuery = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $emailExistsResult = mysqli_query($conn, $emailExistsQuery);
    if (mysqli_num_rows($emailExistsResult) > 0) {
        die('<script>alert("Email already exists in the database");window.location = history.back();</script>');
    }
    
    if ($password == $repeat) {
        mysqli_query($conn, "INSERT INTO users (fname, lname, email, contact, password) VALUES ('$fname', '$lname', '$email', '$contact', '$password')");
        $last_insert_id = mysqli_insert_id($conn);
    } else {
        die("Password does not match with re-entered password");
    }
    
    echo '<script>alert("Signup Success");</script>';
    header('location: ../index.html');
}

if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = md5($_POST['password']);
    $repeat = md5($_POST['repeat']);


    if($password==$repeat)
            {
                mysqli_query($conn, "INSERT INTO users (fname,lname,email,contact,password) VALUES ('$fname','$lname','$email','$contact','$password')");
        $last_insert_id = mysqli_insert_id($conn);
            }
            else
            {
                die("password does not match with re-entered password");
            }

    $_SESSION['message'] = "User Info Updated!";
    header('location: ../views/hrm/employee_table.php');
}

if (isset($_GET['del'])) {
    $emp_code = $_GET['del'];
    
    $_SESSION['message'] = "User Deleted!";
    header('location: ../views/hrm/employee_table.php');
}
?>