<?php
session_reset();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/ico" href="images/FullColor_IconOnly_1024x1024_72dpi.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="style/login.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>
<div class="wrapper fadeInDown">
    <div id="formContent">


        <!-- Icon -->
        <div class="fadeIn first">
            <img src="images/FullColor_IconOnly_1024x1024_72dpi.png" id="icon" alt="User Icon"/>
        </div>

        <!-- Login Form -->
        <form method="post" action="API/controller/Admin/logIn.php">
            <input type="text" id="user_name" class="fadeIn second" name="user_name" placeholder="user name">
            <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

    </div>
</div>
</body>
</html>
