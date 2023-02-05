<?php
session_start();//get session variables
include "db_conn.php";

if(isset($_POST['submit'])){

    function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
    }

    $email=validate($_POST['email']);
    $pass=validate($_POST['password']);

    
    if (empty($email)) {
		header("Location: sign_in.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: sign_in.php?error=Password is required");
	    exit();
	}else{
        $securedpassword=md5($pass);

        $sql_user="select * from users where Email='$email' and Password='$securedpassword';";
        $sql_admin="select * from admins where Email='$email' and Password='$securedpassword';";

        $result_user=$conn->query($sql_user);
        $result_admin=$conn->query($sql_admin);

        if ($result_user->num_rows>0) {
            $row=$result_user->fetch_assoc();
            if ($row['Email'] == $email && $row['Password'] == $securedpassword && $row['status']=="True") {
                 
                    $_SESSION['Email'] = $row['Email'];
                    $_SESSION['Fname'] = $row['Fname'];
                    $_SESSION['Lname'] = $row['Lname'];

                    header("Location: index.php");
                    exit();
            }
            else {
                header("Location: sign_in.php?error=Incorect email or password");
                exit();
            }   
        }
        elseif($result_admin->num_rows>0) {
            $row=$result_admin->fetch_assoc();
            if ($row['Email'] == $email && $row['Password'] == $securedpassword) {
                $_SESSION['admin_email'] = $row['Email'];
                $_SESSION['admin_fname'] = $row['Fname'];
                $_SESSION['admin_lname'] = $row['Lname'];

                header("Location: index.php");
                exit();
            } else {
                header("Location: sign_in.php?error=Incorect email or password");
                exit();
            }	
        }
        else{
            header("Location: sign_in.php?error=Invalid Login");
	        exit();
            
        }
    }

}

?>