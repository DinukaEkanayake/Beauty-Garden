<?php  
    include "db_conn.php";
    session_start();
    $total =$_SESSION['totalamount'];
    
    if(isset($_REQUEST['submit'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

        $buyerFirstName =validate($_REQUEST['firstName']) ;
        $buyerLastName = validate($_REQUEST['lastName']);
        $paymentMode =  validate($_REQUEST['paymentinfo']) ;
        $buyerLivingAddress =validate($_REQUEST['address']) ;
        $buyerLivingCity =validate($_REQUEST['city']) ;
        $buyerLivingProvince =validate($_REQUEST['province']) ;
        $buyerZipCode =validate($_REQUEST['zipcode']) ;


        

         if(empty($buyerFirstName)){

            header("Location: paymentpage.php?error=First name is required");
            
	        exit();
         }elseif(empty($buyerLastName)){

            header("Location: paymentpage.php?error=Last name is required");
	        exit();
         }elseif(empty($paymentMode)){

            header("Location: paymentpage.php?error=Enter a payment method");
	        exit();
         }elseif(empty($buyerLivingAddress)){

            header("Location: paymentpage.php?error=Address is required");
	        exit();
         }elseif(empty($buyerLivingCity)){

            header("Location: paymentpage.php?error=City is required");
	        exit();
         }elseif(empty($buyerLivingProvince)){

            header("Location: paymentpage.php?error=Province is required");
	        exit();
         }elseif(empty($buyerZipCode)){

            header("Location: paymentpage.php?error=Zip-code is required");
	        exit();
         }else{

            if($paymentMode=='Card-payment'){

               $cardholderName = validate($_REQUEST['nameoncard']);
               $cardType = validate($_REQUEST['paymentMode']);
               $buyercardNo = validate($_REQUEST['cardno']);
               $expiryDetail = validate($_REQUEST['expiremonth']);
               $cardCvv = validate($_REQUEST['cvv']);

               if(empty($cardType)){

                  header("Location: paymentpage.php?error=Enter the card type");
	               exit();
               }elseif(empty($cardholderName)){

                  header("Location: paymentpage.php?error=Please enter card holder name");
	               exit();
               }elseif(empty($buyercardNo) || strlen($buyercardNo)>16 || strlen($buyercardNo)<16){

                  header("Location: paymentpage.php?error=Please enter valid card number");
	               exit();
               }elseif(empty($expiryDetail)){

                  header("Location: paymentpage.php?error=Card expire detail required");
	               exit();
               }elseif(empty($cardCvv) || strlen($cardCvv)>3 || strlen($cardCvv)<3){

                  header("Location: paymentpage.php?error=Enter valid CVV");
	               exit();
               }

            }
                $buyerFirstName = $_REQUEST['firstName'];
                $buyerLastName = $_REQUEST['lastName'];
                $paymentMode = $_REQUEST['paymentinfo'];
                $buyerLivingAddress = $_REQUEST['address'];
                $buyerLivingCity = $_REQUEST['city'];
                $buyerLivingProvince = $_REQUEST['province'];
                $buyerZipCode = $_REQUEST['zipcode'];
                $product= $_SESSION['product'] ; 
                $no_of_items = $_SESSION['no_of_items'];
                $email = $_SESSION['Email'];
        
                $sql = "INSERT INTO paymentdetails (first_name,last_name,payment_type,address,city,province,zipcode,itemType,no_of_products,user_email)VALUES ('".$buyerFirstName."', '".$buyerLastName."', '".$paymentMode."', '".$buyerLivingAddress."', '".$buyerLivingCity."','".$buyerLivingProvince."','".$buyerZipCode."','".$product."','".$no_of_items."','".$email."')";
                
                $result = $conn->query($sql);
                $_SESSION['totalamount'] = $total;
                /* $_SESSION['firstname'] = $buyerFirstName;
                $_SESSION['address'] = $buyerLivingAddress;
                $_SESSION['city'] = $buyerLivingCity;
                $_SESSION['province'] = $buyerLivingProvince;
                $_SESSION['zipcode'] = $buyerZipCode;
                $_SESSION['paymentinfo'] = $paymentMode; */
                header("Location: paymentsuccess.php");
                exit();
           
            
         }
    }
?>