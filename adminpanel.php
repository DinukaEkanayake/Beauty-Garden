<?php include "db_conn.php";
 session_start();

 $admin_email = $_SESSION['admin_email'];
 $admin_fname = $_SESSION['admin_fname'];
 $admin_lname =  $_SESSION['admin_lname'];

?>


<?php //categories

$sql1 = "select distinct(category) from products";
$result1 = $conn->query($sql1);

?>

<?php //users

$sql2 = "select * from users";
$result2 = $conn->query($sql2);

?>
<?php //admins

$sql3 = "select * from admins";
$result3 = $conn->query($sql3);

?>

<?php //orders

$sql5 = "select * from paymentdetails";
$result5 = $conn->query($sql5);

?>

<?php //shipped orders

$sql6 = "select * from shippedorders";
$result6 = $conn->query($sql6);

?>


<?php
if (isset($_POST['submit'])) {
    $productname = $_POST['productname'];
    $description = $_POST['description'];
    $productprice = $_POST['productprice'];
    $category = $_POST['dropdown'];
    $howtouse = $_POST['howtouse'];
    $ingredients = $_POST['ingredients'];
    $essentials = $_POST['essentials'];
    $img1 = $_POST['img1'];
    $img2 = $_POST['img2'];
    $img3 = $_POST['img3'];
    $img4 = $_POST['img4'];

    $sqlq2 = "select max(item_id) as maxid from products;";
    $result = $conn->query($sqlq2);
    $row = $result->fetch_assoc();
    $maxid = $row['maxid'];
    if (empty($productname)) {
        header("Location:adminpanel.php?category=addproducts&error=Product Name is required");
        exit();
    } else if (empty($description)) {
        header("Location:adminpanel.php?category=addproducts&error=Description is required");
        exit();
    }
    if (empty($productprice)) {
        header("Location:adminpanel.php?category=addproducts&error=Product Price is required");
        exit();
    }else if (empty($category)) {
        header("Location:adminpanel.php?category=addproducts&error=Please choose a category");
        exit();
    } else if (empty($howtouse)) {
        header("Location:adminpanel.php?category=addproducts&error=please enter How to use ");
        exit();
    } else if (empty($ingredients)) {
        header("Location:adminpanel.php?category=addproducts&error=Ingredients are required");
        exit();
    } else if (empty($img1)) {
        header("Location:adminpanel.php?category=addproducts&error= Atleast two images are required for image 1 and image 2");
        exit();
    } else if (empty($img2)) {
        header("Location:adminpanel.php?category=addproducts&error=Atleast two images are required for image 1 and image 2");
        exit();
    } 
    else {

        $sql = "SELECT * FROM products WHERE item_name='$productname'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            header("Location:adminpanel.php?category=addproducts&error=This Product is already exists!");
            exit();
        }
        else{
            $sqlq = "insert into products(item_id,item_name,category,item_price,img_name1,img_name2,img_name3,img_name4,long_description,HowToUse,ingredients,essentials)values(
                $maxid+1,'$productname','$category','$productprice','Images/$img1','Images/$img2','Images/$img3','Images/$img4','$description','$howtouse','$ingredients','$essentials');";
        
            if ($conn->query($sqlq)) {
                header("Location:adminpanel.php?category=addproducts&success=product added successfully!");
            } else {
                header("Location:adminpanel.php?category=addproducts&error=can't add");
                exit();
            }
        }
    }

    
}
    
?>
<?php //add new admin
if (isset($_POST['sbmt'])) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        $fname = validate($_POST['adminfname']);
        $lname = validate($_POST['adminlname']);
        $email = validate($_POST['adminemail']);
        $pass = validate($_POST['adminpass']);
    
        if (empty($fname)) {
            header("Location:adminpanel.php?category=newuser&error=First Name is required");
            
            exit();
        } else if (empty($lname)) {
            header("Location:adminpanel.php?category=newuser&error=Last Name is required");
            exit();
        }
        if (empty($email)) {
            header("Location:adminpanel.php?category=newuser&error=Email is required");
            exit();
        }else if (empty($pass)) {
            header("Location:adminpanel.php?category=newuser&error=Password is required");
            exit();
        } else if (strlen($pass) <= 4) {
            header("Location:adminpanel.php?category=newuser&error=Password is too short");
        } else {
            $securedpass = md5($pass);
    
            $sql = "SELECT * FROM admins WHERE Email='$email'";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                header("Location:adminpanel.php?category=newuser&error=Email already exists!");
                exit();
            } else {
                $sql2 = "INSERT INTO admins VALUES ('$email', '$securedpass','$fname', '$lname')";
                $conn->query($sql2);
                header("Location:adminpanel.php?category=newuser&success=new admin added");
    
            }
        }
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="CSS/adminpanelstyle.css">
</head>
<body>
<main>
<div class="container" style="display:flex;">
    <div class="sidebar">
        <div class="image"><img src="Images/admin.png"></div> 
        <div class="sidenav">
            <a href="adminpanel.php?category=profile">Profile</a>
            <a href="adminpanel.php?category=categories">Categories</a>
            <a href="adminpanel.php?category=addproducts">Add Products</a>
            <a href="adminpanel.php?category=viewproducts">View Products</a>
            <a href="adminpanel.php?category=newuser">New Admin</a>
            <a href="adminpanel.php?category=viewuser">View users</a>
            <a href="adminpanel.php?category=viewadmin">View Admins</a>
            <a href="adminpanel.php?category=orders">Orders</a>
            <a href="adminpanel.php?category=shippedorders">Shipped Orders</a>
            <a href="index.php?category=orders">Back to Home</a>
        </div>
    </div>
    <div class="panal-container">
       <div class="dashname"> <h1><span class="f1">Admin</span><span class="f2"> Dashboard</span> </h1></div>
    <div class="row" style="background-color: white;">
                <?php if ($_GET['category'] == 'profile') { ?>
                    <div class="items">
                    <div class="heading"><h1 style="text-align: center;"><br>My Profile</h1><br><br></div>
                           <p class="point"><b> First Name: </b> <?php echo $admin_fname?> </p> 
                           <p class="point"><b> Last Name: </b> <?php echo $admin_lname?> </p>
                           <p class="point"><b> Email: </b> <?php echo $admin_email?> </p><br>
                           <div class="btns">
                           <button class="home" onclick="location.href='index.php'">Home</button>
                            <button class="log_out" onclick="location.href='logout.php'">Log out</button>
                            <button class="delete" onclick="deleteAccount()">Delete Account</button>
                            <p id="demo"></p></div>
                            <?php if (isset($_GET['success'])) { ?>
                                <p class="success"><?php echo $_GET['success']; ?></p>
                            <?php } ?>

                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p><br>
                            <?php } ?>
                </div>

                <?php }elseif($_GET['category']=='categories'){  ?>
                    <div class="heading"><h1 style="text-align: center;"><br>Categories</h1></div><br><br>
                    <div class="items" style="margin:100px;" >
                    <table border="1">

                        <?php  while($row1 = $result1->fetch_assoc()){  ?>
                                <tr>
                                    <td style="width:500px"><?php echo $row1['category']; ?></td>
                                </tr>
                            
                            <?php } ?>

                    </table><br>
                </div>
                <?php }elseif($_GET['category']=='addproducts'){ ?>
                    <div class="signup-items">
                    <div class="signup"><h1 style="text-align: center;"><br>Add Products</h1></div><br><br>
                    <div class="form">
                        <form name="addproducts" action="<?php $_SERVER['PHP_SELF']?>" method="POST">

                        <?php if (isset($_GET['success'])) { ?>
                                <h1 class="success"><?php echo $_GET['success']; ?></h1>
                            <?php } ?>

                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p><br>
                            <?php } ?>
                            <div class="form-group"><label for="productname" class="inputnames">Enter Product Name :</label>
                            <input type="text" name="productname" id="productname" class="form-control"></div><br><br>
                            <div class="form-group"><label for="productprice" class="inputnames">Enter Product Price :</label>
                            <input type="text" name="productprice" id="productprice" class="form-control"></div><br><br>
                            <div class="form-group"><label for="dropdown" class="inputnames" >Choose a Category :</label>
                            <select name="dropdown" class="form-control" value="Select Category">
                                <option value="Skin Care">Skin Care</option>
                                <option value="Make-up">Make-up</option>
                                <option value="Fragrance">Fragrance</option>
                                <option value="Bath & Body">Bath & Body</option>
                                <option value="Hair">Hair</option>
                                <option value="Men">Men</option>
                                <option value="Other">Other</option>
                            </select></div><br><br>
                            <div class="form-group"><label for="description" class="inputnames">Enter Description :</label>
                            <input type="text" name="description" id="description" class="form-control"></div><br><br>
                            <div class="form-group"><label for="howtouse" class="inputnames">HowToUse :</label>
                            <input type="text" name="howtouse" id="howtouse" class="form-control" ></div><br><br> 
                            <div class="form-group"><label for="ingredients" class="inputnames">Ingredients :</label>
                            <input type="text" name="ingredients" id="ingredients" class="form-control"></div><br><br>
                            <div class="form-group"><label for="essentials" class="inputnames">Essentials : </label>
                            <input type="text" name="essentials" id="essentials" class="form-control"></div><br><br>
                            
                            <span class="form-group"><label for="img1" class="inputnames">Image1 : </label><input type="file" id="img" name="img1" accept="image/*"></span>
                            <span class="form-group"><label for="img2" class="inputnames">Image2 : </label><input type="file" id="img" name="img2" accept="image/*"></span>
                            <span class="form-group"><label for="img3" class="inputnames">Image3 : </label><input type="file" id="img" name="img3" accept="image/*"></span>
                            <span class="form-group"><label for="img4" class="inputnames">Image4 : </label><input type="file" id="img" name="img4" accept="image/*"></span>
                            <br><br><span><input type="submit" id="signup" name="submit" value="Add Product"></span>

                        </form>
                    </div>
                </div>

                <?php }elseif($_GET['category']=='viewproducts'){ ?>
                    <div class="heading"><h1 style="text-align: center;"><br>Products Details</h1></div><br><br>
                    <div class="items" style="margin: 30px;" >
                    <?php  
                            $results_per_page = 25; 
                          
                        
                            $sql="select * from products"; 
                            $result4 = $conn->query($sql);
                            $number_of_result = $result4->num_rows; 
                            $result= $result4->fetch_all();
                            $st_no =  $result[0][0];
                            $end = $st_no+ $results_per_page ;
                            $sql = "SELECT * FROM products Where (item_id >= ".$st_no.") AND (item_id<=".$end.")"; 
                        
                            if(isset($_REQUEST["next"])){
                                $st_no =  $_REQUEST["hidden"];
                                $end = $st_no+ $results_per_page ;
                                $sql = "SELECT * FROM products Where (item_id >= ".$st_no.") AND (item_id <=".$end.")";
                            }
                            if(isset($_REQUEST["previos"])){
                                $st_no =  $_REQUEST["hidden"] -  $results_per_page ;
                                $end = $_REQUEST["hidden"];
                                $sql = "SELECT * FROM products Where (item_id >= ".$st_no.") AND (item_id <=".$end.")";   
                            }
                        
                                $result5 = $conn->query($sql);
                            
                            ?>
                            <table border="1">
                                <tr>
                                    <th>Item_ID</th>
                                    <th>Item Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    
                                </tr>
                                <?php foreach($result5 as $value){
                                echo " <tr>
                                    <td>".$value['item_id']."</td>
                                    <td>".$value['item_name']."</td>
                                    <td>".$value['category']."</td>
                                    <td>".$value['item_price']."</td>
                                    </tr>";
                                }?>
                                
                            </table>
                            <form action="adminpanel.php?category=viewproducts" method = "post">
                                    <input type="hidden" name = "hidden" value = "<?php echo $st_no ?>">
                                    
                                    <input type="submit" class="previous "name ="previous" value="previous">
                                    <input type="hidden" name = "hidden" value ="<?php echo $end ?>">                          
                                    <input type="submit" class="next" name ="next" value="next">

                                </form>
                            
                        
                </div>

                <?php }elseif($_GET['category']=='newuser'){ ?>
                    <div class="items">
                    <div class="heading"><h1 style="text-align: center;"><br>Add New Admin</h1></div><br><br>
                    <div class="form" style="margin-left: 50px;">
                        <form name="addadmin" action="<?php $_SERVER['PHP_SELF']?>" method="POST">

                        <?php if (isset($_GET['success'])) { ?>
                                <h1 class="success"><?php echo $_GET['success']; ?></h1>
                            <?php } ?>

                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p><br>
                            <?php } ?>
                            <div class="form-group"><label for="adminemail" class="inputnames">Enter Admin Email :</label>
                            <input type="text" name="adminemail" id="adminemail" class="form-control"></div><br><br>
                            <div class="form-group"><label for="adminfname" class="inputnames">Enter Admin First Name :</label>
                            <input type="text" name="adminfname" id="adminfname" class="form-control"></div><br><br>
                            
                            <div class="form-group"><label for="adminlname" class="inputnames">Enter Admin Last name :</label>
                            <input type="text" name="adminlname" id="adminlname" class="form-control"></div><br><br>
                            <div class="form-group"><label for="adminpassword" class="inputnames">Enter Admin Password :</label>
                            <input type="password" name="adminpass" id="adminpass" class="form-control"></div><br><br>
                        
                            <br><br><span><input type="submit" id="signup" name="sbmt" value="Add Admin"></span>
                        </form>
                    </div>
                </div>

                <?php }elseif($_GET['category']=='viewuser'){ ?>
                    <div class="heading"><h1 style="text-align: center;"><br>Users</h1></div><br><br>
                    <div class="items" style="margin: 40px;" >
                    <table border="1">
                            <tr>
                                <th>Email</th>
                                <th>Fname</th>
                                <th>Lname</th>
                        </tr>
                        <?php  while($row3=$result2->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $row3['Email']; ?></td>
                                    <td><?php echo $row3['Fname']; ?></td>
                                    <td><?php echo $row3['Lname']; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                </div>

                <?php }elseif($_GET['category']=='viewadmin'){ ?>
                    <div class="heading" style="text-align:center;"><br><h1>Admins</h1></div><br><br>
                    <div class="items" style="margin:40px;" >
                    <table border="1">
                            <tr>
                                <th>Email</th>
                                <th>Fname</th>
                                <th>Lname</th>
                        </tr>

                        <?php  while($row4=$result3->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $row4['Email']; ?></td>
                                    <td><?php echo $row4['Fname']; ?></td>
                                    <td><?php echo $row4['Lname']; ?></td>
                                </tr>

                            <?php } ?>
                        </table>
                </div>

                <?php }elseif($_GET['category']=='orders'){ ?>

                    <?php 
                         if(isset($_REQUEST["shipped"])){
                            $useremail = $_REQUEST["useremail"];
                            $orderID = $_REQUEST["doneID"];

                            $sql="INSERT INTO shippedorders VALUES(NULL,'$useremail','$orderID',curdate())";
                            $result = $conn->query($sql);

                         }
                        
                    ?>
                    <div class="heading" style="text-align:center;"><br><h1>Current Orders</h1></div><br><br>
                    <div class="items" >
                    <table border="1">
                            <tr>
                                <th>Order No</th>
                                <th>User_Mail</th>
                                <th>Fname</th>
                                <th>Lname</th>
                                <th>Pay type</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>province</th>
                                <th>Zip code</th>
                                <th>Done</th>
                                
                        </tr>

                        <?php $results_per_page = 25; 
                          
                          $number_of_result = $result5->num_rows; 
                          $result= $result5->fetch_all();
                          $st_no =  $result[0][0];
                          $end = $st_no+ $results_per_page ;
                          $sql = "SELECT * FROM paymentdetails Where (order_num >= ".$st_no.") AND (order_num<=".$end.")"; 
                      
                          if(isset($_REQUEST["next"])){
                              $st_no =  $_REQUEST["hidden"];
                              
                              $end = $st_no+ $results_per_page ;
                              
                              $sql = "SELECT * FROM paymentdetails Where (order_num >= ".$st_no.") AND (order_num<=".$end.")";
                              
                          }
                          if(isset($_REQUEST["previos"])){
                              $st_no =  $_REQUEST["hidden"] -  $results_per_page ;
                              $end = $_REQUEST["hidden"];
                              
                              $sql = "SELECT * FROM paymentdetails Where (order_num >= ".$st_no.") AND (order_num <=".$end.")";
                              
                          }
                      
                          $result5 = $conn->query($sql); ?>

                        <?php  while($row5=$result5->fetch_assoc()){ 
                            $orderID =  $row5['order_num']; 
                            $useremail = $row5['user_email'];
                            $sql = "SELECT orderID from shippedorders WHERE orderID=$orderID";
                            $result = $conn->query($sql);
                            $result = $result->fetch_all();
                                    if($result){
                                        echo "<tr style='background-color: #D7BDE2;'>";

                                    }
                                    else{
                                       echo" <tr>";

                                    }
                                
                                
                                ?>
                                

                                    <td><?php echo $row5['order_num']; ?></td>
                                    <td><?php echo $row5['user_email']; ?></td>
                                    <td><?php echo $row5['first_name']; ?></td>
                                    <td><?php echo $row5['last_name']; ?></td>
                                    <td><?php echo $row5['payment_type']; ?></td>
                                    <td><?php echo $row5['address']; ?></td>
                                    <td><?php echo $row5['city']; ?></td>
                                    <td><?php echo $row5['province']; ?></td>
                                    <td><?php echo $row5['zipcode']; ?></td>
                                    <?php 
                                        
                                        if($result){
                                            echo "<td>Shipped</td>";
    
                                        }
                                        else{
                                           echo" <td><form action='adminpanel.php?category=orders' method='POST'>
                                           <input type='hidden' name='doneID' value='$orderID'>
                                           <input type='hidden' name='useremail' value='$useremail'>
                                           <input type='submit' value='Done Shipping' name='shipped' class='shipped'>
                                       </form></td>";
    
                                        }
                                        
                                    ?>



                                    
                                </tr>

                            <?php } ?>


                        </table>
                        <form action="adminpanel.php?category=orders" method = "post">
                                    <input type="hidden" name = "hidden" value = "<?php echo $st_no ?>">
                                    
                                    <input type="submit" class="previous "name ="previous" value="previous">
                                    <input type="hidden" name = "hidden" value ="<?php echo $end ?>">
                                    
                                    <input type="submit" class="next" name ="next" value="next">
                            
                                </form>
                </div>
                <?php }
                elseif($_GET['category']=='shippedorders'){ ?>
                    <div class="heading" style="text-align:center;"><br><h1>Shipped Orders</h1></div><br><br>
                    <div class="items" >
                    <table border="1">
                            <tr>
                                <th>Order No</th>
                                <th>User_Mail</th>
                                <th>Shipped Date</th>
                                
                        </tr>

                        <?php $results_per_page = 25; 
                          
                          $number_of_result = $result6->num_rows; 
                          $result= $result6->fetch_all();
                          if($result){
                            $st_no =  $result[0][0];
                          }
                          else{
                            $st_no = 0;
                          }
                         
                          $end = $st_no+ $results_per_page ;
                          $sql = "SELECT * FROM shippedorders Where (ID >= ".$st_no.") AND (ID<=".$end.")"; 
                      
                          if(isset($_REQUEST["next"])){
                              $st_no =  $_REQUEST["hidden"];
                              
                              $end = $st_no+ $results_per_page ;
                              
                              $sql = "SELECT * FROM shippedorders Where (ID >= ".$st_no.") AND (ID<=".$end.")";
                              
                          }
                          if(isset($_REQUEST["previos"])){
                              $st_no =  $_REQUEST["hidden"] -  $results_per_page ;
                              $end = $_REQUEST["hidden"];
                              
                              $sql = "SELECT * FROM shippedorders Where (ID >= ".$st_no.") AND (ID<=".$end.")";
                              
                          }
                      
                          $result6 = $conn->query($sql); ?>

                        <?php  while($row6=$result6->fetch_assoc()){ 
                            ?>
                                <tr>

                                    <td><?php echo $row6['orderID']; ?></td>
                                    <td><?php echo $row6['userEmail']; ?></td>
                                    <td><?php echo $row6['Date']; ?></td>
                                  
                                    
                                    
                                </tr>


               <?php  }?>
                                       </table>
                                       <form action="adminpanel.php?category=shippedorders" method = "post">
                                                   <input type="hidden" name = "hidden" value = "<?php echo $st_no ?>">
                                                   
                                                   <input type="submit" class="previous "name ="previous" value="previous">
                                                   <input type="hidden" name = "hidden" value ="<?php echo $end ?>">
                                                   
                                                   <input type="submit" class="next" name ="next" value="next">
                                           
                                               </form>
              <?php }?>
            </div>
    </div>
    </div>
</main>
</body>
<script>

function deleteAccount(){
   let text = "Do you want to delete the Account\nEither OK or Cancel.";
   if (confirm(text) == true) {
       document.getElementById("demo").innerHTML = "<br><form action='deleteAccount.php' method='POST'><input type='password' class='pw' name='password' placeholder='Enter your password'><input type='submit' name='delete' class='submit' value='submit'> </form>"
   } else {
       
   }

   }


</script>
</html>