<?php

include "db_conn.php";


if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
else if(isset($_SESSION['admin_email'])) {
    $email = $_SESSION['admin_email'];
}

//get product category from url
$string = $_GET['search'];


//get that product details from database
$sqlQuery = "SELECT * FROM products WHERE (item_name LIKE '%$string%') OR (long_description LIKE '%$string%' )";

$result = $conn->query($sqlQuery);
$product = $result->fetch_assoc();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" type="text/css" href="CSS/categories.css">
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
                    <?php if($product) { ?>
                    <?php echo $product['category'] ?>
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                    <?php } ?>
                </a>
                <!--<span><?php echo $product['item_name'] ?></span>-->
            </div>
        </div>
    </section>

     
     <section class="related-products">
        <div class="container">
            <div class="relate-product-header">
                <h3 class="main-text">
                     Products
                </h3>
                <hr>
            </div>
            <div class="row">
                <!-- Products -->
                <?php 
                while($row = $result->fetch_assoc()){
                        ?>
                        <div class="row-child">
                            <div class="">
                                <div class="">
                                <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"
                                       class=""><img src="<?php echo $row['img_name1'] ?>" alt="IMG-PRODUCT" width="200px" height="200px">
                                    </a>
                                </div>

                                
                                    <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="view">View</div></a>
                                

                                <div class="">
                                    <div class="">
                                        <?php echo $row['item_name'] ?>
                                        <div class="price">
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
                    }
                 ?>
            </div>
        </div>
    </section>
    <section class="ratings">
        <div class="category">
                        <div class="category-name">Ratings & Reviews</div>
                        <hr>
                        <h2>Reviews</h2>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <button style="padding:15px" class = "btn" >BE THE FIRST TO REVIEW THIS PRODUCT</button>
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