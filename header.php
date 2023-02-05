<?php 
     if(!isset($_SESSION)) 
     { 
         session_start(); //get session_variables
     }
     
include "db_conn.php";
$sqlread = "select * from products;";
$result_details = $conn->query($sqlread);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" type="text/css" href="CSS/headerstyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
            function openNav() {
                document.getElementById("mySidepanel").style.width = "300px";
                document.getElementById("mySidepanel").style.height = "100%";
            }

            function closeNav() {
                document.getElementById("mySidepanel").style.width = "0";
            }
    </script>

</head>
<body>
    <header>
        <div class="top-bar">
            <div class="topbar-items">
            
                <div class="text-item1">
                    <span class="text1">Island Wide Free Delivery </span>
                </div>
                <div class="text-item2">
                    <span class="text2" ><?php echo" Discounts for over LKR 10000 "?></span>
                    
                </div>
                <div class="FAQs">
                     
                            <span ><a href="#"> FAQs</a></span>
                        </div>
                <div class="account">
                    <?php if (isset($_SESSION['Email']) && isset($_SESSION['Fname'])
                                    && isset($_SESSION['Lname'])) {
                            ?> 
                                    <div class="image"><img src="images/user.png" alt="" height="20px" width="20px"></div>
                                    <div style="margin-left:5px;"><a href="account.php"><?php echo $_SESSION['Fname']." ". $_SESSION['Lname'] ?></a></div>
                                    <div class="dropdown">
                                            <a href="#" class="dropbtn">
                                                    <?php echo "My Account" ?>
                                            </a>
                                        <div class="dropdown-content">
                                            <a class="dropdown-item" href="shopping_cart.php">My Cart</a>
                                            <a class="dropdown-item" href="logout.php">Logout</a>
                                        </div>
                                    </div>
                                
                                
                            <?php }elseif(isset($_SESSION['admin_email']) && isset($_SESSION['admin_fname'])
                                    && isset($_SESSION['admin_lname'])){?>
                                     <div><img src="images/user.png" alt="" height="15px" width="15px"></div>
                                    <div style="margin-left:10px;"><a href="#"><?php echo $_SESSION['admin_fname']." ". $_SESSION['admin_lname'] ?></a></div>
                                    <div class="dropdown">
                                            <a href="#" class="dropbtn">
                                                    <?php echo "My Account" ?>
                                            </a>
                                        <div class="dropdown-content">
                                            <a class="dropdown-item" href="adminpanel.php?category=profile">Admin Panel</a>
                                            <a class="dropdown-item" href="logout.php">Logout</a>
                                        </div>
                                    </div>
                            <?php }else{?>
                                    <a href="sign_in.php" class="text1">
                                        <?php echo "Login" ?>
                                    </a>
                            <?php }?> 
                        </div>   
            </div>
        </div>
        <div class="navi-bar-container">
            <div class="navi-bar-items">
                <div class="categories">

                    <div id="mySidepanel" class="sidepanel">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                        <h2 style="text-align:center;">Beauty Garden</h3>
                        <?php $row=$result_details->fetch_assoc(); ?>
                        <a href="categories.php?category=SkinCare">Skin Care</a>

                        <?php $row=$result_details->fetch_assoc(); ?>
                        <a href="categories.php?category=BathAndBody">Bath & Body</a>

                        <?php $row=$result_details->fetch_assoc(); ?>
                        <a href="categories.php?category=Make-Up">Make-Up</a>

                        <?php $row=$result_details->fetch_assoc(); ?>
                        <a href="categories.php?category=Haircare">Haircare</a>

                        <?php $row=$result_details->fetch_assoc(); ?>
                        <a href="categories.php?category=Fragrance">Fragrance</a>

                        <?php $row=$result_details->fetch_assoc(); ?>
                        <a href="categories.php?category=Men">Men</a>
                      
                    </div>
                    <button class="openbtn" onclick="openNav()">☰ Categories</button>  
                </div>

                <div class="name">
                    <a href="index.php" ><img src="Images/logoNew.jpg" alt="" height="50px" width="170"></a>
                </div>
                <div class="search">
                    <form action="search_action.php">
                    <input type="text" name="search" placeholder="&#61442;  Search" style="font-family:FontAwesome;">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="login">
                    <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li> <a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="social">
                    <span class="icon"><a href="#" ><img src="images/facebook.png" alt="Facebook" height="20px" width="20px"></a></span>
                    <span class="icon"><a href="#" ><a href="#" ><img src="images/instagram.png" alt="Facebook" height="20px" width="20px"></a></a></span>
                    <span class="icon"><a href="#" ><a href="#" ><img src="images/twitter.png" alt="Facebook" height="20px" width="20px"></a></a></span>
                </div>
                </div>
        </div>
    </header>
</body>
</html>