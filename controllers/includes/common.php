<?php
    // connection variable ->mysqli_connect(host,username,password,dbname);
    $conn=mysqli_connect("localhost","root","","bodhamitest")or die(mysqli_error($conn));
    
    if(!isset($_SESSION)){
        session_start();
    } 
?> 