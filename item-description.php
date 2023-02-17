<?php

include "db_conn.php";


if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
else if(isset($_SESSION['admin_email'])) {
    $email = $_SESSION['admin_email'];
}

//get product id using incoming url
$productId = $_GET['itemid'];


//get that product details from database
$sqlQuery = "SELECT * FROM products WHERE item_id = '$productId'";

$result = $conn->query($sqlQuery);
$product = $result->fetch_assoc();

//get same category products for related products section
$sqlQuery2 = "select * from products WHERE category = '".$product['category']."' AND item_id != '$productId' ";
$result2 = $conn->query($sqlQuery2);

$sqlQuery3 = "SELECT * FROM products WHERE item_id = '$productId'";
$result3 = $conn->query($sqlQuery3);
$product3 = $result3->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" type="text/css" href="CSS/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
    <?php 
        $page = 'product'; 
        include 'header.php'; 
    ?>
    </header>
    <main>
    <section class="breadscrumb">
        <div class="breadscrumb-container">
            <div class="items">
                <a href="index.php">Shop
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>
                <a href="shopping_page.php">
                    <?php echo $product['category'] ?>
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>
                <span><?php echo $product['item_name'] ?></span>
            </div>
        </div>
    </section>

     <!-- Product Detail -->
     <section class="product-details">
        <div class="product-container">
            <div class="row">
                <div class="col-product-image">
                    <div class="small-img-row">
                        <?php if ($product['img_name1']) {  ?>
                            <div class="small-img-col">
                                <img src="<?php echo $product['img_name1'] ?>" alt="IMG" class = "small-img" onclick="document.getElementById('ProductImg').src='<?php echo $product['img_name1'] ?>'">
                            </div>
                        <?php } ?>
                        <?php if ($product['img_name2']) {  ?>
                            <div class="small-img-col">
                                <img src="<?php echo $product['img_name2'] ?>" alt="IMG" class = "small-img" onclick="document.getElementById('ProductImg').src='<?php echo $product['img_name2'] ?>'">
                            </div>
                        <?php } ?>
                        <?php if ($product['img_name3']) {  ?>
                            <div class="small-img-col">
                                <img src="<?php echo $product['img_name3'] ?>" alt="IMG" class = "small-img" onclick="document.getElementById('ProductImg').src='<?php echo $product['img_name3'] ?>'">
                            </div>
                        <?php } ?>
                        <?php if ($product['img_name4']) {  ?>
                            <div class="small-img-col">
                                <img src="<?php echo $product['img_name4'] ?>" alt="IMG" class = "small-img" onclick="document.getElementById('ProductImg').src='<?php echo $product['img_name4'] ?>'">
                            </div>
                        <?php } ?>
                    </div>
                        <div class="main-image"><img src="<?php echo $product['img_name1'] ?>" id = "ProductImg" alt="IMG" ></div>
                   
                </div>
                <div class="col-product-description">
                    <div class="product-section">
                        <h4 class="item-name">
                            <?php echo $product['item_name'] ?>
                        </h4>
                        <span>
							LKR <?php echo $product['item_price'] ?>/=
						</span>
                        <p>
                            <?php echo $product['long_description'] ?>
                        </p>
                            <div class="product-options">
                                <div class="product-amount">
                                        <form name="form" method="post">
                                            <div class="amount-counter">
                                                <div class="btn-num-product-down" onclick="decrement()">
                                                    <i class="fa fa-minus"></i>
                                                </div>
                                                <script>
                                                     function decrement(){
                                                        document.getElementById("num-product").stepDown(1);
                                                    }
                                                </script>
                                                <input class="num-product" type="number" name="num-product" id="num-product" value="1">

                                                <div class="btn-num-product-up" onclick="increment()">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <script>
                                                   function increment(){
                                                        document.getElementById("num-product").stepUp(1);
                                                    }
                                                </script>
                                            </div>
                                            <input type="hidden" name="id" value= "<?php echo $productId ?>" >
                                            <input type="submit" id="submit" name="submit" formaction="shopping_cart.php" value="Add to cart">


                                            <input type='hidden' name='no_of_Products' value='1'>
                                            <input type='hidden' name='product' value='<?php echo $product['item_id']?>'>
                                            
                                           
                                            <button type="submit" id="submit" name="buy" formaction="paymentpage.php" value="<?php echo $product['item_price']?>">Buy Now</button>
                                        </form>      
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="description-tabs">
            <div class="tab">
                <button class="tablinks" onclick="display(event, 'description')" id="defaultOpen">Description</button>
                <button class="tablinks" onclick="display(event, 'howtouse')">HowToUse</button>
                <button class="tablinks" onclick="display(event, 'ingredients')">Ingredients</button>
                <button class="tablinks" onclick="display(event, 'essentials')">Essentials</button>
                </div>

                <div id="description" class="tabcontent">
                <p><?php echo $product3['long_description'] ?></p>
                </div>

                <div id="howtouse" class="tabcontent">
               
                <p><?php echo $product3['HowToUse'] ?></p> 
                </div>

                <div id="ingredients" class="tabcontent">
                
                <p><?php echo $product3['ingredients'] ?></p>
                </div>
                <div id="essentials" class="tabcontent">
                
                <p><?php echo $product3['essentials'] ?></p>
                </div>

                <script>
                function display(evt, tabname) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabname).style.display = "block";
                evt.currentTarget.className += " active";
                }

                document.getElementById("defaultOpen").click();
                </script>
        </div>
        </div>
    </section>

     <!-- Related Products -->
     <section class="related-products">
        <div class="container">
            <div class="relate-product-header">
                <h3 class="main-text">
                    Related Products
                </h3>
                <hr>
            </div>
            <div class="row">
                <!-- Products -->
                <?php $count = 1;
                while($row = $result2->fetch_assoc()){
                    if($count <=4 ){
                        ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                            <div class="block2">
                                <div class="block2-pic hov-img1">
                                <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"
                                       class="block2-btn"><img src="<?php echo $row['img_name1'] ?>" alt="IMG-PRODUCT" width="200px" height="200px">
                                        View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <?php echo $row['item_name'] ?>
                                        <div class="stext-105 cl3">
                                        LKR <?php echo $row['item_price'] ?>
                                    </div>
                                    <p>Rating : 
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span> </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php
                        $count++;
                    }
                } ?>
            </div>
        </div>
    </section>
    <section class="ratings">
        <div class="category">
                        <div ><h3 class="main-text">Ratings & Reviews</h3></div>
                        <hr>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <button style="padding:10px" class="reviewbtn" >WRITE A REVIEW FOR THE PRODUCT</button>
        </div>
    </section>

    </main>
    <footer>
        <?php

            include "footer.php";
        ?>
    </footer>
</body>
</html>