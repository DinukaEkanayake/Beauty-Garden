<?php
//get session variables
    session_start(); 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/home.css">
    <link rel="stylesheet" type="text/css" href="CSS/shoppingcart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <title>Cart</title>
   

</head>
<body class="bg-light">
    <?php 
    include "db_conn.php";
    ?>

</head>
<body>

    <?php
        $item_count=0;
       if(isset($_SESSION['Email']) && isset($_SESSION['Fname']) && isset($_SESSION['Lname'])) {

        include "header.php";
        $userEmail =$_SESSION['Email'];
        if (isset($_POST['submit'])){
            $id=$_POST['id'];
            $email = $_SESSION['Email'];
            $noItem =$_POST['num-product'];

            $sqlQuery = "SELECT * FROM products WHERE item_id = $id";
            $result1 = $conn->query($sqlQuery);
            $product = $result1->fetch_assoc();

            $sql = "INSERT INTO cart(useremail,item_id,no_of_items) VALUES ('$email', $id, $noItem)";
            $conn->query($sql);

            }

            $sql = "SELECT COUNT(item_id) FROM cart WHERE useremail ='$userEmail'";
            $result = $conn->query($sql);
            $isEmpty = $result->fetch_all();
            $count = $isEmpty[0][0];
           
        }
        else{
            header("Location:sign_in.php");
            exit();
        }
        if(isset($_POST['delete'])){

            $RemoveItem = $_POST['delete'];
            $sql = "DELETE FROM cart WHERE item_id ='$RemoveItem' AND useremail='$userEmail'";
            //echo $sql;
            $conn->query($sql);
        }
    ?>
<main>
    <div class="cart">
                        <div class="titleCart"><h1><br>My Cart</h1>
                        <hr><br></div>
        <div class="container-fluid">
            <div class="row px-5">
                <div class="col-md-7">
                    <div class="shopping-cart">
                        
                        <?php

                        $total = 0;
                            if ($count){
                                $sql = "SELECT item_id,no_of_items FROM cart WHERE useremail ='$userEmail'";
                                $result2 = $conn->query($sql);
                                $cartProduct = $result2->fetch_all();

                                echo "<table  padding='5px'>";
                                $item_count=0;
                                foreach ($cartProduct as $p){
                                    $itemId = $p[0];
                                    $itemCount = $p[1];
                                    $sql = "SELECT * FROM products WHERE item_id = '$itemId'";
                                    $result3 = $conn->query($sql);
                                    $productDetails = $result3->fetch_all();
                                    $name = $productDetails[0][1];
                                    $price=$productDetails[0][3];
                                    $src=$productDetails[0][4];
                                    $price_for_item = $price * $itemCount;
                                    $total += $price_for_item; 
                                    $item_count += $itemCount;
                                    echo "<tr><td><img src='$src'  width='100%'></td>
                                    <td>$name</td>
                                    <td>LKR$price/=</td>
                                    <td>Quantiy: $itemCount</td>
                                    <td><form action = 'paymentpage.php' method='POST'><input type='hidden' name='no_of_Products' value=' $itemCount'>
                                    <input type='hidden' name='product' value='$itemId'>
                                    <button name='buy' class='btn' value='$price_for_item'>Buy</button></form>
                                    <form method='POST' action='shopping_cart.php'><button type='delete'  class='btn' name='delete' value='$itemId'>Remove</button>
                                    </form></td>
                                    </tr>";

                                }
                                echo "</table>";  
                            }else{
                            
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="pt-4" >
                        <?php if($item_count){ ?>
                        <h3>PRICE DETAILS<br></h3>
                        <hr><br>
                        <div class="row-price-details">
                            <div class="col-md-6">
                                <?php
                                    if ($count){
                                        
                                        echo "<p style='font-size:medium; font-weight: bold;'>Price ($count items)</p>";
                                    }else{
                                        echo "<p style='font-size:medium; font-weight: bold;'>Price (0 items)</p>";
                                    }
                                ?>
                                <hr><br>
                                <p style="font-size:medium;">Delivery Charges: <span class="text-success">FREE</span></p><br>
                                
                                <hr>
                            </div>
                            <div class="col-md-6">
                            <p style="font-size:medium;"><br>Amount Payable
                                : LKR <?php echo $total; ?></p><br>
                                
                                <hr>
                                <p style="font-size:medium;"><br>Total Price:LKR <?php
                                    echo $total;
                                    ?></p>
                                <form action = "paymentpage.php" method="POST">
                                    <input type='hidden' name='product' value='cart'>
                                    <input type="hidden" name="no_of_Products" value="<?php echo $item_count?>">
                                    <button name="buy" class="btn" value="<?php echo $total?>">Buy</button>
                                </form>
                                <?php } else{?>
                                    <div class="empty"><h3>Oops! Cart is Empty! <br> Add some products from the shop.</h3><br><br><br></div>
                                    <div class="emptypic"><img src="Images/empty.jpg" alt="picture" width="500px" ></div>
                                    <?php }?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</main>

<footer>
        <?php include "footer.php" ?>
</footer>

<script src="JS/home.js">

</script>

</body>
</html>