<?php
session_start();
include "db_conn.php";
if($_SESSION['Email']){
    $user_email=$_SESSION['Email'];
    $first_name=$_SESSION['Fname'];
    $last_name=$_SESSION['Lname'];
}
else{
    $admin_email = $_SESSION['admin_email'];
    $admin_fname = $_SESSION['admin_fname'];
    $admin_lname =  $_SESSION['admin_lname'];
}

if(isset($_POST['delete'])){
    if($_SESSION['Email']){
        $sql = "SELECT password FROM users WHERE Email ='$user_email'";
    }
    else{
        $sql = "SELECT password FROM admins WHERE Email ='$admin_email'";
    }
    
    $result = $conn->query($sql);
    $userpw = $result->fetch_all();
    $pass = $userpw[0][0];

    $password= $_POST['password'];

    if($password){
        if($pass == md5($password)){
            if($_SESSION['Email']){
                $sql = "DELETE FROM users WHERE Email ='$user_email'";
            }
            else{
                $sql = "DELETE FROM admins WHERE Email ='$admin_email'";
            }
            $conn->query($sql);
            echo "<script>alert('Account Deleted Successfully')</script>";
            session_unset();
            session_destroy();

            header("Location:index.php");
            
            
        }
        else{
            if($_SESSION['Email']){
                header("Location:account.php?error=Password is not matched!");
            }
            else{
                header("Location:adminpanel.php?category=profile&error=Password is not matched!");
            }
           
            
            
        }
    }
    else{
        if($_SESSION['Email']){
            header("Location:account.php?error=Enter your password to delete the account");
        }
        else{
            header("Location:adminpanel.php?category=profile&error=Enter your password to delete the account");
        }
   
           
        
        
    }
}

?>