<?php
require 'includes/common.php';
// $dt = new DateTime($_SESSION['login_time']);
// echo $dt->format('Y-m-d H:i:s');
    if(isset($_SESSION["login_email"]))
    {
        session_unset();
        session_destroy();
    }
header("location: ..");
?>