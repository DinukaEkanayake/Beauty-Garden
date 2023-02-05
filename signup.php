<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="CSS/signupstyle.css">
</head>
<body>
<main>  
<div class="signup-container">
    <div class="row" style="background-color: white;">
                <div class="signup-items">
                    <div class="signup"><h1 style="text-align: center;">SignUp</h1><br><h2>Welcome to Beauty Garden</h2></div>
                    <div class="para1">See your growth and get consulting support!</div><br><hr><br>
                    <div class="form">
                        <form name="signup" action="signupcheck.php" method="POST">

                        <?php if (isset($_GET['success'])) { ?>
                                <h1 class="success"><?php echo $_GET['success']; ?></h1><br>
                            <?php } ?>

                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p><br>
                            <?php } ?>
                           <div class="form-rows"><div class="form-group1"><label for="fname" class="inputnames">First Name* </label>
                            <input type="text" name="fname" id="fname" class="form-control"></div>
                            <div class="form-group2"><label for="lname" class="inputnames">Last Name* </label>
                            <input type="text" name="lname" id="lname" style="width:200px" class="form-control"></div><br><br></div><br>
                            <div class="form-group"><label for="email" class="inputnames">Email*</label>
                            <input type="text" name="email" id="email" class="form-control" style="width:490px"></div><br><br>
                            <div class="form-rows"><div class="form-group"><label for="Address" class="inputnames">Address Line 1 </label>
                            <input type="text" name="addressline1" id="address" class="form-control"></div>
                            <div class="form-group"><label for="Address" class="inputnames">Address Line 2 </label>
                            <input type="text" name="addressline2" id="address" class="form-control"></div></div><br>
                            <div class="form-rows"><div class="form-group"><label for="Address" class="inputnames">City </label>
                            <input type="text" name="city" id="address" class="form-control" ></div>
                            <div class="form-group" style="margin-left:70px;"><label for="Address" class="inputnames" style="width:100px">Postal Code </label>
                            <input type="text" name="postalcode" id="address" class="form-control" ></div></div><br>
                            <div class="form-group"><label for="password" class="inputnames">Password*</label>
                            <input type="password" name="password" id="password" class="form-control" style="width:490px"></div><br><br> 
                            <div class="form-group"><label for="confpwd" class="inputnames">Confirm Password* </label>
                            <input type="password" name="confpwd" id="confpwd" class="form-control" style="width:490px"></div><br><br>
                          
                            <span><input type="submit" id="signup" name="submit" value="CreateAccount"></span>
                            <span><a href="index.php" class="homebtn">Back To Home</a></span>

                        </form>
                        <div class="signin" >Aready have an account ? <a href="sign_in.php" style="color: blue;">Sign In</a></div>
                    </div>
                </div>
            </div>
    </div>
</main>
</body>
</html>