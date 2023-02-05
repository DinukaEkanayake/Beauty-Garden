<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/home.css">
    <title>Beauty Garden-Srilanka</title>
</head>

<body>
    <header>

    <?php include "header.php" ?>

    </header>
        <?php if (isset($_GET['success'])) { ?>
            <h1 class="success"><?php echo $_GET['success']; ?></h1>
        <?php } ?>
        <section class="slideshow">
            <div class="slideshow-container">

                <div class="Slides">
                    <img src="Images/1.png">
                </div>
                <div class="Slides">
                    <img src="Images/3.png">
                </div>
                <div class="Slides">
                    <img src="Images/2.png">
                </div>
                <div class="Slides">
                    <img src="Images/4.png">
                </div>

        </div>
       
        <br>
        <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
        </div>
            <?php 
                include "db_conn.php";
                $sqlread = "select * from products;";
                $result_details = $conn->query($sqlread);
            ?>
        </section>
        <main>
                <section class="what'sNew">
                        <div class="category">
                            <div class="category-name">What's New</div>
                            <div class="item-row">
                            <div class="new-item-col">
                                <div class="new-item">
                                        <img src="Images/pexels-aog-pixels-12698454.jpg" alt=".." width="500px" >
                                        <a href="#"><div class="shopnowbtn">Shop Now</div></a>
                                                    <div class="text3">NEW THINGS INSIDE&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        
                                        </div>            
                            </div>
                            <div class="item-col">
                                <?php $row=$result_details->fetch_assoc(); ?>
                                <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="item">
                                        <img src="<?php echo $row['img_name1'] ?>" alt=".." width="200px" height="200px">
                                        <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="shopnow">Shop Now</div></a>
                                        <div class="description">
                                        <p><?php echo $row['item_name'] ?></p><br>
                                        <h4>LKR <?php echo $row['item_price'] ?></h4><br>
                                        <p>Rating : 
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span> </p>
                                        </div>
                                    </div></a>
                            </div>
                            <div class="item-col">
                            <?php $row=$result_details->fetch_assoc(); ?>
                            <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="item">
                                        <img src="<?php echo $row['img_name1'] ?>" alt=".." width="200px" height="200px">
                                        <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="shopnow">Shop Now</div></a>
                                        <div class="description">
                                        <p><?php echo $row['item_name'] ?></p><br>
                                        <h4>LKR <?php echo $row['item_price'] ?></h4><br>
                                        <p>Rating : 
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star-half-o"></i></span> </p>
                                        </div>
                                    </div></a>
                            </div>
                            <div class="item-col">
                            <?php $row=$result_details->fetch_assoc(); ?>
                            <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="item">
                                        <img src="<?php echo $row['img_name1'] ?>" alt=".." width="200px" height="200px">
                                        <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="shopnow">Shop Now</div></a>
                                        <div class="description">
                                        <p><?php echo $row['item_name'] ?></p><br>
                                        <h4>LKR <?php echo $row['item_price'] ?></h4><br>
                                        <p>Rating : 
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star-half-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span> </p>
                                        </div>
                                    </div></a>
                            </div>
                            </div>
                            <div class="item-row">
                            <div class="item-col">
                            <?php $row=$result_details->fetch_assoc(); ?>
                            <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="item">
                                        <img src="<?php echo $row['img_name1'] ?>" alt=".." width="200px" height="200px">
                                        <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="shopnow">Shop Now</div></a>
                                        <div class="description">
                                        <p><?php echo $row['item_name'] ?></p><br>
                                        <h4> LKR<?php echo $row['item_price'] ?></h4><br>
                                        <p>Rating : 
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span> </p>
                                        </div>
                                    </div></a>
                                </div>
                                <div class="item-col">
                            <?php $row=$result_details->fetch_assoc(); ?>
                            <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="item">
                                        <img src="<?php echo $row['img_name1'] ?>" alt=".." width="200px" height="200px">
                                        <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="shopnow">Shop Now</div></a>
                                        <div class="description">
                                        <p><?php echo $row['item_name'] ?></p><br>
                                        <h4>LKR <?php echo $row['item_price'] ?></h4><br>
                                        <p>Rating : 
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star-half-o"></i></span> </p>
                                        </div>
                                    </div></a>
                            </div>
                                <div class="item-col">
                                <?php $row=$result_details->fetch_assoc(); ?>
                                <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="item">
                                        <img src="<?php echo $row['img_name1'] ?>" alt=".." width="200px" height="200px">
                                        <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="shopnow">Shop Now</div></a>
                                        <div class="description">
                                        <p><?php echo $row['item_name'] ?></p><br>
                                        <h4>LKR <?php echo $row['item_price'] ?></h4><br>
                                        <p>Rating : 
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span> </p>
                                        </div>
                                    </div></a>
                                </div>
                                <div class="item-col">
                                <?php $row=$result_details->fetch_assoc(); ?>
                                <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="item">
                                        <img src="<?php echo $row['img_name1'] ?>" alt=".." width="200px" height="200px">
                                        <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="shopnow">Shop Now</div></a>
                                        <div class="description">
                                        <p><?php echo $row['item_name'] ?></p><br>
                                        <h4>LKR <?php echo $row['item_price'] ?></h4><br>
                                        <p>Rating : 
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span> </p>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                        </div>
        </section>
        <br> 
        <section class="best-offers">
                        <div class="category">
                            <div class="category-name">Best Offers</div>
                                <div class="item-row">
                                <div class="item-col">
                                <?php $row=$result_details->fetch_assoc(); ?>
                                <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="item">
                                        <img src="<?php echo $row['img_name1'] ?>" alt=".." width="200px" height="200px">
                                        <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="shopnow">Shop Now</div></a>
                                        <div class="description">
                                        <p><?php echo $row['item_name'] ?></p><br>
                                        <h4>LKR <?php echo $row['item_price'] ?></h4><br>
                                        <p>Rating : 
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star-half-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span> </p>
                                        </div>
                                    </div></a>
                            </div>
                            <div class="item-col">
                            <?php $row=$result_details->fetch_assoc(); ?>
                            <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="item">
                                        <img src="<?php echo $row['img_name1'] ?>" alt=".." width="200px" height="200px">
                                        <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="shopnow">Shop Now</div></a>
                                        <div class="description">
                                        <p><?php echo $row['item_name'] ?></p><br>
                                        <h4>LKR <?php echo $row['item_price'] ?></h4><br>
                                        <p>Rating : 
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span> </p>
                                        </div>
                                    </div></a>
                            </div>
                            <div class="item-col">
                            <?php $row=$result_details->fetch_assoc(); ?>
                            <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="item">
                                        <img src="<?php echo $row['img_name1'] ?>" alt=".." width="200px" height="200px">
                                        <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="shopnow">Shop Now</div></a>
                                        <div class="description">
                                        <p><?php echo $row['item_name'] ?></p><br>
                                        <h4>LKR <?php echo $row['item_price'] ?></h4><br>
                                        <p>Rating : 
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star-half-o"></i></span> </p>
                                        </div>
                                    </div></a>
                            </div>
                            <div class="item-col">
                            <?php $row=$result_details->fetch_assoc(); ?>
                            <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="item">
                                        <img src="<?php echo $row['img_name1'] ?>" alt=".." width="200px" height="200px">
                                        <a href="item-description.php?itemid=<?php echo $row['item_id'] ?>"><div class="shopnow">Shop Now</div></a>
                                        <div class="description">
                                        <p><?php echo $row['item_name'] ?></p><br>
                                        <h4>LKR <?php echo $row['item_price'] ?></h4><br>
                                        <p>Rating : 
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span> </p>
                                        </div>
                                    </div></a>
                            </div>
                            </div>
                        </div>
                    </section>
        <br>
        <section class="countdown">
                <div class="countdown-row" style="display:flex;">
                    <div class="col"><img src="Images/pexels-arsham-haghani-3387577.jpg" alt="img" width="700px"></div>
                    
                    <div class="countdown-col">
                        <div class="countdown-items">
                            <div class="countdown-text">DEALS OF THE WEEK</div>
                            <p id="demo"></p>
                        </div>
                        <div class="countdown-text">Days Hours Minutes Seconds</div>
                        <br><a href="item-description.php?itemid=10"><div class="countdown-shopnowbtn">Shop Now</div></a>
                    </div>
                        <script>
                                // Set the date we're counting down to
                                var countDownDate = new Date("Jan 25, 2023 15:37:25").getTime();

                                // Update the count down every 1 second
                                var x = setInterval(function() {

                                // Get today's date and time
                                var now = new Date().getTime();
                                    
                                // Find the distance between now and the count down date
                                var distance = countDownDate - now;
                                    
                                // Time calculations for days, hours, minutes and seconds
                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                
                                // Output the result in an element with id="demo"
                                document.getElementById("demo").innerHTML = days + " : " + hours + " : "
                                + minutes + " : " + seconds + " ";
                                days.style.setProperty('white');
                                    
                                // If the count down is over, write some text 
                                if (distance < 0) {
                                    clearInterval(x);
                                    document.getElementById("demo").innerHTML = "EXPIRED";
                                }
                                }, 1000);
                        </script>
                </div>
        </section><br>
        <section class="wellness">
                        <div class="category">
                            <div class="category-name">A Different View On Beauty</div>
                            <div class="item-row">
                                <video id="video1" width="100%"  height="700" autoplay muted>
                                <source src="Images/makeUp.mp4" type="video/mp4" >
                                Your browser does not support HTML video.
                                </video>
                            </div>
                        </div>
                        </section>
                    <br>
                    </div>
    </main>
    <section class="our-brands">
                        <div class="category">
                            <div class="category-name">Our Top Brands</div>
                                <div class="item-row">
                                <div class="item-col">
                                <a href="#"><div class="item">
                                        <img src="Images/brands1.png" alt=".." width="200px" height="200px" style="border-radius:50%">
                                    </div></a>
                                </div>
                                <div class="item-col">
                                <a href="#"><div class="item">
                                        <img src="Images/brands2.png" alt=".." width="200px" height="200px" style="border-radius:50%">
                                    </div></a>
                                </div>
                                <div class="item-col">
                                <a href="#"><div class="item">
                                        <img src="Images/brands3.png" alt=".." width="200px" height="200px" style="border-radius:50%">
                                    </div></a>
                                </div>
                                <div class="item-col">
                                <a href="#"><div class="item">
                                        <img src="Images/brands4.png" alt=".." width="200px" height="200px" style="border-radius:50%">
                                    </div></a>
                                </div>
                            </div>
                        </div>
                    </section>
    <section class="newsletter">
        <div class="new-container">
            <div class="row">
                <div class="col">
                    <div class="newsletter-text">
                        <h4>Newsletter</h4>
                        <p class="cl6">Subscribe to our Newsletter and get 20% off your first purchase</p>
                    </div>
                </div>
                <div class="column">
                    <form action="post">
                        <div class="newsletter-form">
                            <input id="newsletter-email" type="email" placeholder="Your Email" required="required">
                            <button id="newsletter-submit" type="submit" class="newsletter_submit" value="submit">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<script src="JS/home.js">

</script>
<footer>

        <?php include "footer.php" ?>
</footer>



</body>
</html>