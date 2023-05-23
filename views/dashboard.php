<?php
session_start();
require "../controllers/includes/common.php";
include "../controllers/includes/common.php";
if (!isset($_SESSION["login_email"])) {
    // echo $_SESSION["login_email"];
    header("location:../index.html");
    exit;
}
$user = mysqli_query($conn, "select * from users where email='{$_SESSION['login_email']}'");
$user_details = mysqli_fetch_array($user);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />

    <title>Dashboard</title>

    <style>
        #main {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            vertical-align: middle;
        }

        .spr {
            color: rgb(255, 136, 0);
            font-size: 30px;
            font-style: italic;
            font-family: algerian;
        }
    </style>

</head>

<body class="bgcolor">


    <div id="main">

        <div>
            Welcome back,
            <span class="spr">
                <?php echo $user_details['fname']; ?>
            </span>!
        </div>
        <a id="logout" class="btn solid" href="../controllers/logout.php"
            style="display:flex; align-items:center; justify-content:center;">Log Out</a> &nbsp;&nbsp;&nbsp;&nbsp;
        <a id="logout" class="btn transparent" style="display:flex; align-items:center; justify-content:center;"
            onclick="myFunction()">View info</a>

        <footer>Made with &#10084;&#65039; by Ivan Azim </footer>
    </div>


    <script>
        function myFunction() {
            alert("<?php echo 'Name:'.' '.$user_details['fname'].' '.$user_details['lname']; ?>\n<?php echo 'Email:'.' '.$user_details['email']; ?>\n<?php echo 'Contact:'.' '.$user_details['contact']; ?>");
        }
    </script>
</body>

</html>