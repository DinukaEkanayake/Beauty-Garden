<?php
/* Exception class. */
require 'PHPMailer\src\Exception.php';

/* The main PHPMailer class. */
require 'PHPMailer\src\PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'PHPMailer\src\SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

   require 'C:\xampp\phpMyAdmin\vendor/autoload.php';


     try {
        $mail = new PHPMailer(true);
        $mail->SMTPOptions = array(
         'ssl' => array(
         'verify_peer' => false,
         'verify_peer_name' => false,
         'allow_self_signed' => true
         )
         );
         //Enable SMTP debugging.
        $mail->SMTPDebug = 2;                           
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();        
        //Set SMTP host name                      
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;                      
        //Provide username and password
        $mail->Username = "dinukaekanayaka18@gmail.com";             
        $mail->Password = "nsrhjkvtthittohs";                       
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";                       
        //Set TCP port to connect to
        $mail->Port = 587;
        $mail->TLS = true;
        $mail->ssl = true;
        $mail->authentication = true;
        $mail->From = "dinukaekanayaka18@gmail.com";
        $mail->FromName = "Beauty Garden";
        $mail->addAddress("$email", "Dinuka Ekanayake");
        $mail->isHTML(true);
        $mail->Subject = "Email Verification";
        $mail->Body = "
            <h1 style='color:pink;font-family: Arial, Helvetica, sans-serif;font-size:30px; text-align:center;line-height:2.5em;'>Welcome to Beauty Garden</h1>
                        <hr>
                        <table>
                        <tr><td style='text-align:center'>
                        <div>
                        <a href=''><img src='https://img.freepik.com/free-psd/make-up-banner-template_23-2148663849.jpg?w=1060&t=st=1672314358~exp=1672314958~hmac=35a9c195ec2290ee16e6ee38ffc14e4b98e4a536b2c5aa64c4484fe980bb00fb' align='left' style='width:600px;height:600px;' alt=''/></a>
                        <p style='color:#333; font-family: Allura,Arial, Helvetica, sans-serif; text-align:center; font-size:20px'>Thank you for creating an Beauty Garden account. Please verify your email here!</p>
                        <p style='font-size:20px;'>Please click this button to verify your account: </p><a id='verifybtn' href=http://localhost/Beauty-Garden/verify-email.php?mail='$email' style='background-color:yellowgreen;padding:10px;border-radius:20px;color:white;'>Verify Email</a>
                        </div>
                        </td>
                        </tr>
                        <tr>
                        <td><div style='float:left;'><p style='color:#999; text-align:center; font-family: Arial, Helvetica, sans-serif; font-size:20px'>Beauty Garden Online shopping platform for all your fashion items.</p></div></td>
                        </tr>
                        </table>
                        </div>";
                $mail->send();
     } catch (\Throwable $th) {
        throw $th;
     }

?>
