<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link rel="stylesheet" type="text/css" href="CSS/paymentsuccess.css"> 
</head>
<body >
    <?php include 'header.php'; ?>

<section>
<div>
    <h2><i>Payment Successful!</i></h2>
</div>
<div>
    <h4>Thank you for your order, 
        <?php 

            $sql_firstname = "SELECT first_name, last_name from paymentdetails ORDER BY order_num DESC LIMIT 1";
            $stmt =  $conn->prepare($sql_firstname);
            $stmt->execute();
            $stmt->bind_result($firstname, $lastname);
            $stmt->fetch(); 
            $stmt->close();
            echo $firstname." ".$lastname; 
        ?> 
    </h4>
    <p id="para"><br>Below you can see the order summary. Your package has been start to proceesed and shipped.</p>
    <hr >
</div>
<?php
    include 'db_conn.php';
    
    $sql = "SELECT order_num from paymentdetails ORDER BY order_num DESC LIMIT 1";
    $stmt =  $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($orderid);
    $stmt->fetch();
    $stmt->close();

    $total = $_SESSION['totalamount'];
    
    /* $address = $_SESSION['address'];
    $city = $_SESSION['city'];
    $province = $_SESSION['province'];
    $zipcode = $_SESSION['zipcode'];
    $paymentinfo = $_SESSION['paymentinfo']; */

?>
<div class="orderdetail">
    <p class="od">Order Date and Time: 
        <span id='current_date'>
            <script>
                document.getElementById("current_date").innerHTML = Date();
            </script>
        </span> 
    </p>
    <p class="od">Order No: 
        <span>
            <?php 
                echo "#" .$orderid;
            ?>
        </span>
    </p>
    <p class="od">Shipping Address: 
        <span>
            <?php 

                $sql_address = "SELECT address, city, province, zipcode from paymentdetails ORDER BY order_num DESC LIMIT 1";
                $stmt =  $conn->prepare($sql_address);
                $stmt->execute();
                $stmt->bind_result($address, $city, $province, $zipcode);
                $stmt->fetch();
                $stmt->close();        
                    
                echo $address.", ".$city.", ".$province.", ".$zipcode;              
            ?>
        </span>
    </p>
    <p class="od">Payment Method: 
        <span>
            <?php
                $sql_payment = "SELECT payment_type from paymentdetails ORDER BY order_num DESC LIMIT 1";
                $stmt =  $conn->prepare($sql_payment); 
                $stmt->execute();
                $stmt->bind_result($paymentinfo);
                $stmt->fetch(); 
                $stmt->close();       
                echo $paymentinfo;
            ?>
        </span>
    </p>
    <p class="od">Total Amount: <span><?php echo "LKR " .$total?></span></p>
</div>
<hr>

<div>
    <p id="message">Thanks for Shopping with Beauty Garden! Please allow 5-10 working days (due to the unfortunate fuel crisis in the country) to process and get your order delivered to your doorstep. Our Courier Partners will contact you prior to the delivery.<br><br>-Team Beauty Garden</p>
</div>

<div id="logo"><img src="Images/whitelogo.png"></div>

<div id="btn"><button><a href="index.php">Back to Home</a></button></div>
</section>
</body>

<footer>
    <?php  include 'footer.php';  ?>
</footer>

</html>




 