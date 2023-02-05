<?php
include "db_conn.php";
        
            $mail = $_GET['mail'];
            $sqlactivation = "update users set status='True' where Email=$mail";
            if ($conn->query($sqlactivation)) {
                header("Location:index.php?success=Account Activated!");
            }
    
?>
   
   