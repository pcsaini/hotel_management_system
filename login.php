<?php
/**
 * Created by PhpStorm.
 * User: vishal
 * Date: 10/23/17
 * Time: 1:45 PM
 */?>
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
<html>
<head>
<link rel="stylesheet" href="css/login.css"/>
    <script src="js/login.js"></script>
</head>
<body>


<div class="container">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" action="functionmis.php" method="post">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" id="inputEmail" name="username" class="form-control" placeholder="username" required autofocus>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login" value="Sign in"/>
        </form><!-- /form -->
        <a href="#" class="forgot-password">
            Forgot the password?
        </a>
    </div><!-- /card-container -->
</div><!-- /container -->
</body>
</html>