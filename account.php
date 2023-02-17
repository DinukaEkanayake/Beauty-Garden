<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/home.css">
    <link rel="stylesheet" type="text/css" href="CSS/account.css">
    <title>Account</title>
    <script>

         function deleteAccount(){
            let text = "Do you want to delete the Account\nEither OK or Cancel.";
            if (confirm(text) == true) {
                document.getElementById("demo").innerHTML = "<br><form action='deleteAccount.php' method='POST'><input type='password' class='pw' name='password' placeholder='Enter your password'><input type='submit' name='delete' class='submit' value='Submit'> </form>"
            }
        } 
    </script>
    
</head>
<body >
    <header>
    <?php include "header.php" ?>
    </header>
    <?php

    $user_email=$_SESSION['Email'];
    $first_name=$_SESSION['Fname'];
    $last_name=$_SESSION['Lname'];

    ?>

    <div class="account">
        <div class="col-1">
            <img src= "images/avatarpurple.png" style="width:5cm; height:4cm;"><br>  
            <h3><?php echo($first_name." ".$last_name); ?></h3>
        </div>
        <div class="col-2">
            <div class="col-2-items">
                
                <p> 
                <div class="col2-item-row">

                    <span id="usr-detail" ><b>First Name: </b><?php echo($first_name)?><br><br></span>

                </div>

                <div class="col2-item-row">

                    <span id="usr-detail"><b>Last Name: </b><?php echo($last_name)?><br><br> </span>
                </div>
                
                <div class="col2-item-row">

                    <span id="usr-detail"> <b>Email: </b><?php echo($user_email)?><br><br></span>
                </div>
                

                
            </div>
                <button class="cart" onclick="location.href='shopping_cart.php'">My Cart</button>
                <button class="log_out" onclick="location.href='logout.php'">Log out</button>
                <button class="delete" onclick="deleteAccount()">Delete Account</button>
                <p id="demo" style="border: aliceblue; margin-top: 0px;"></p>
                <?php if (isset($_GET['success'])) { ?>
                                <p class="success"><?php echo $_GET['success']; ?></p>
                            <?php } ?>

                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p><br>
                <?php } ?>
    
        </div>

    </div>

<footer>
        <?php include "footer.php" ?>
</footer>

    <script src="JS/home.js">

</script>

</body>
</html>