<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/signinstyle.css">

</head>
<body>
    <div class="signin-container">
        <div class="row">
        <div class="items">
            <div class="col1" style="background-color: white;">
                <div class="signin-items">
                    <div class="login"><h2>LogIn</h2></div><br>
                    <div class="para1">See your growth and get consulting support!</div><br>
                    <a href="#"><div class="signin_google">Sign  In  With  Google</div></a><br>
                    <div class="para1">OR Sign in with Your Email</div><br>
                    <div class="form">
                        <form action="signin_check.php" method="POST">

                            <?php if (isset($_GET['success'])) { ?>
                                <p class="success"><?php echo $_GET['success']; ?></p>
                            <?php } ?>

                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <label for="email">Email*</label><br><input type="text" name="email" class="form-control"><br><br>
                            <label for="password">Password*</label><br><input type="password" name="password" id="password" class="form-control"><br><br>
                            <div class="remember"><span class="remeberme"><input type="checkbox" name="remember"><label for="remember">Remember me</label></span>
                            <span class="forgotpwd"><a href="#">Forgot your Password?</a></span></div><br>
                            <input type="submit" name="submit" value="Log In" id="login" >
                        </form>
                    </div>
                    <br><p style="text-align: center;" >OR</p><br>
                    
                        <a href="signup.php"><div class="signup_btn">Sign  Up  For  Free</div></a>
                </div>
            </div>
            <div class="col1">

                <div class="image"><img src="Images/download (1).png" width="30%" height="30%"></<div>
                <div class="image"><img src="Images/download.png" width="50%" height="50%" style="margin-left: 200px;"></div>
                <div class="image"><img src="Images/download2.png" width="30%" height="30%"></div>

                <div class="para3">Get Your products and make your fashion</div>

            </div>
            </div>
        </div>
    </div>

</body>
</html>


