<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/newcontact.css">
    <title>Contact US</title>
</head>
<body>
    <header>
    <?php include "header.php" ?>
    </header>
    <div class="container">
        <div class="row">
                <h1 class="topic"><span class="con">Contact</span><span class="us"> us</span></h1>
        </div>
        <div class="row">
                <h4 style="text-align:center"><br>We encourage you to get in touch with us if you did not find the answers you were looking for here at Oriflame’s Customer Experience. <br>We value your opinion, and we look forward to hearing from you.<br>
            Contact us using following numbers for any concern.<br>
            
                Dinuka:<a href="tel:+94 77 072 3503">+94 77 072 3503</a><br>
                Himani:<a href="tel:+94 77 430 7771">+94 77 430 7771</a><br>
                Thakshila:<a href="tel:+94 77 838 8206">+94 77 838 8206</a><br>
                Apisathan:<a href="tel:+94 77 474 2174">+94 77 474 2174</a><br>
                Isuru:<a href="tel:+94 71 881 5874">+94 71 881 5874</a><br>
                Masith:<a href="tel:+94 76 968 0852">+94 76 968 0852</a><br><br>
           
         
            </h4>

        </div>
        <div class="row">
                <h1 class="category-name">Email us</h1>
        </div>
        <div class="row">
                <h4 style="text-align:center"><br>Please fill in the form below if you would like to email us. We will answer within 24 hours.</h4>
        </div>
        <div class="input-container">
            <form action="mailto:beautygarden@gmail.com" method="post" enctype="text/plain">
                <div class="col1">
                    <div class="styled-input wide">
                        <input type="text" name="Name" required />
                        <label>Name</label> 
                    </div>
                </div>
                <div class="col2">
                    <div class="styled-input">
                        <input type="text" name="Email" required />
                        <label>Email</label> 
                    </div>
                </div>
                <div class="col2">
                    <div class="styled-input" style="float:right;">
                        <input type="text" name="Phone number" required />
                        <label>Phone Number</label> 
                    </div>
                </div>
                <div class="col1">
                    <div class="styled-input wide">
                        <textarea required name="Message"></textarea>
                        <label>Message</label>
                    </div>
                </div>
                <div class="col1">
                    <div class="submit-btn"><input type="submit" class="sbmt" value="Send Message"></div>
                </div>
            </form>
                <p>&nbsp;</p>
                <div class="callrow">
                    <div class="row">
                        <h1 class="category-name">Call us</h1>
                    </div>
                    <div class="row">
                        <h4 style="text-align:center">If you wish to contact us you can call our customer service 
                           , Monday through Friday between the hours 
                            09:00 am to 6:00 pm. and Saturdays from 10:00 am to 03:00 pm. <a href="tel:1122244480">Call us at 112-224-4480</a> </h4>
                            
                    </div> 
                </div>
            
        </div>
    </div>
    <footer>
        <?php include "footer.php" ?>
</footer>
</body>
</html>