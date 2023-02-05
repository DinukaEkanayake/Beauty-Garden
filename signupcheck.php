<?php include "db_conn.php" ?>

<?php
session_start();
if (isset($_POST['submit'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
    $email = validate($_POST['email']);
    $addressline1 = validate($_POST['addressline1']);
    $addressline2 = validate($_POST['addressline2']);
    $city = validate($_POST['city']);
    $postalcode = validate($_POST['postalcode']);
    $pass = validate($_POST['password']);
    $confpass = validate($_POST['confpwd']);

    if (empty($fname)) {
        header("Location: signup.php?error=First Name is required");
        exit();
    } else if (empty($lname)) {
        header("Location: signup.php?error=Last Name is required");
        exit();
    }
    if (empty($email)) {
        header("Location: signup.php?error=Email is required");
        exit();
    }else if (empty($pass)) {
        header("Location: signup.php?error=Password is required");
        exit();
    } else if (strlen($pass) <= 4) {
        header("Location: signup.php?error=Password is short");
    } else if (empty($confpass)) {
        header("Location: signup.php?error=Confirm Your Password");
        exit();
    } else if ($pass != $confpass) {
        header("Location: signup.php?error=The confirmation password does not match");
        exit();
    } else {
        $securedpass = md5($pass);

        $sql = "SELECT * FROM users WHERE Email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            header("Location: signup.php?error=Try another email");
            exit();
        } else {
            //sending verification link
            $sql2 = "INSERT INTO users(Email,Fname,Lname,AddressLine1,AddressLine2,City,PostalCode, Password ,status) VALUES ('$email', '$fname', '$lname','$addressline1','$addressline2','$city','$postalcode','$securedpass' ,'False')";
            $conn->query($sql2);
            header("Location:signup.php?success=Activation Email Sent!");
            include "send-email.php";

        }
    }
}
else{
    header("Location: signup.php");
    exit();
}  

?>