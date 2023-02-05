
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="CSS/paymentpagestylenew.css">
    
    <title>Confirm Payment</title>
</head>
<body >
   
<?php 

include 'header.php';

    if(isset($_REQUEST['buy'])){

        $_SESSION['buy'] = $_REQUEST['buy'];
        $total = $_SESSION['buy'];
        $product = $_REQUEST['product'];
        $no_of_items = $_REQUEST['no_of_Products'];
    }
    else{
        $total = $_SESSION['totalamount'];
        $product = $_SESSION['product'] ; 
        $no_of_items =$_SESSION['no_of_items'];
    }
 ?>

<script src="JS/cardpayment.js"></script>

<div class='pay-row'>
    <div class='form-container'>

        <form id="paymentForm" method="post" action="paymentinfo_check.php" >

        

        <div class="row1">
            <div class='paymentinfo-col'>

                <h1 class="confirmPayment">Confirm Payment</h1> <br><br>

                <?php if (isset($_GET['error'])) { ?>
                    <p class="error" style="color:red";><?php echo $_GET['error']; ?></p>
                <?php } ?>
            
                <label id="firstnameLabel" for="firstName">Firstname <span style="color:red;">*</span></label>
                <input name='firstName' type="text" placeholder='Firstname' > <br><br>
                <label for="lastName">Lastname <span style="color:red;">*</span></label>
                <input name='lastName' type="text" placeholder='Lastname' ><br><br>
                <label for="paymentMode">Payment type <span style="color:red;">*</span>:</label><br>

                <div class="row2">

                    <div class="paymentinfo-col">

                        <label for="COD">Cash on delivery</label>   
                        
                        <div class="button-img-container">

                            <input type="radio" id="COD" name="paymentinfo" value="Cash-on-delivery" onclick="getPaymentinput()">

                            <div class="button-img">
                                    <img src="Images/codnew.png" alt="" style="width:1.8em; height:1.8em;">
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="paymentinfo-col">

                        <label for="cardpayment">Card Payment</label> 
                        
                        <div class="button-img-container">

                            <input type="radio" id="cardpayment" name="paymentinfo" value="Card-payment"  onclick="getPaymentinput()">

                            <div class="button-img">
                                <img src="Images/visamaster.png" alt="" style="width:1.5em; height:1.5em;">
                            </div>
                        </div>
                        
                        
                    </div>
                </div><br>
                
                
                <br><br><br><br>
                <span id="payment-part-cardtype-label" style="align-items: left;"></span>
                <span id="payment-part-cardtype" ></span>
                <span id="payment-part-nameoncard-label"></span>
                <span id="payment-part-nameoncard-input"></span>
                <span id="payment-part-cardno-label"></span>
                <span id="payment-part-cardno-input"></span>

                <div class="row3">
                    <div class="paymentinfo-col">

                        <span id="payment-part-expiremonth-label"></span>
                        <span id="payment-part-expiremonth-input"></span>
                    </div>   
                    <div class="paymentinfo-col">

                        <span id="payment-part-cvv-label"></span>
                        <span id="payment-part-cvv-input"></span>
                    </div>    
                    
                </div>
                
                    <template>  <!-- html part that used in cardpayment.js -->
                    
                        <style>@import url('paymentpagestylenew.css');</style>
                        

                            

                                <label for="nameoncard">Card holder name</label>
                                <input name="nameoncard" type="text" placeholder="Card holder name"><br><br>
                                <label for="cardno">Card Number</label>
                                <input name="cardno" type="text" placeholder="xxxx-xxxx-xxxx-xxxx"><br><br>
                                <label for="expiremonth">MM/YY</label>
                                <input type="month" name="expiremonth" id="expiremonth" min="2023-01"> <br><br>
                                <label for="cvv">CVV</label> 
                                <input name="cvv" type="text" placeholder="xxx">
                            

                        
                    </template>                
                   
                
            </div>
            
       
        
            <div class="paymentinfo-col">
                <h1>Delivery Details</h1><br><br>

                <label for="address">Address <span style="color:red;">*</span></label>
                <input name='address' type="text" placeholder='Address'> <br><br>
                <label for="city">City <span style="color:red;">*</span></label>
                <input name='city' type="text" placeholder='City'> <br><br>
                <label for="province">Province <span style="color:red;">*</span></label>
                <input name='province' type="text" placeholder='Province'> <br><br>
                <label for="zipcode">Zip-code <span style="color:red;">*</span></label>
                <input name='zipcode' type="text" placeholder='Zip-code'>
                <br><br>
                
                <?php
                
                    $_SESSION['totalamount'] = $total;
                    echo "<p><b>Total amount: Rs.".$total."</b></p>";
                    $_SESSION['product'] = $product ; 
                    $_SESSION['no_of_items'] = $no_of_items; 
                   
                ?>

            </div>
            <div class="submit-button">
                <input type="submit" value="Pay" name="submit">
            </div>
            
        </div>
        
         
           

        </form>
    </div>
    
    
</div>

<?php include 'footer.php'; ?>
</body>
</html>