<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
    <?php
		error_reporting(E_ALL ^ E_WARNING);
        session_start();
        //error_reporting(0);
        $qty = 0;
        $total = 0;
        
        //Get Product ID from url and store in hidden iframe
        $product_id = $_GET['prod'];
        echo "<iframe id='hidden-iframe'>".$product_id."</iframe>";
        if(isset($_SESSION["userPersist"])){
            echo "<iframe id='hidden-iframe1' class='hidden-frames'>".$_SESSION['user']."</iframe>";
            echo "<iframe id='hidden-iframe2' class='hidden-frames'>".$_SESSION['userID']."</iframe>";
        }
       
        //Initialize variables for product info
        $highlights = "";
        $description = "";
        $details = "";
        $name = "";

        //Load file containing Product Info
        $string = file_get_contents("ProductInfo/product_catalog.json");
        $catalog = json_decode($string, true);
        foreach ($catalog as $product) {
            if($product['asin']==$product_id){
                $highlights = $product["highlights"]; 
                $description = $product["description"];
                $details = $product["details"];
                $name = $product["name"];

            }
        }

        //Echo the script for filling Up page details "fillDetails()"
        echo "
            <script>
            function fillDetails(){
                document.getElementById('highlights-tab').innerHTML = \"".$highlights."\"
                document.getElementById('description').innerHTML = \"".$description."\"
                document.getElementById('details').innerHTML = \"".$details."\"
                document.getElementById('prod-name').innerHTML = \"".$name."\"
            }
            </script>
            ";
    ?>

    <head>
    <title>N-Air a E-commerce category Flat Bootstrap Responsive Website Template | Single :: w3layouts</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="N-Air Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<meta charset utf="8">
		<!--fonts-->
		<link href='//fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
		
		<!--fonts-->
		<!--bootstrap-->
			 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<!--coustom css-->
			<link href="css/style.css" rel="stylesheet" type="text/css"/>

        <!--shop-kart-js-->
        <script src="js/simpleCart.min.js"></script>
		<!--default-js-->
			<script src="js/jquery-2.1.4.min.js"></script>
		<!--bootstrap-js-->
			<script src="js/bootstrap.min.js"></script>
		<!--script-->
         <!-- FlexSlider -->
            <script src="js/imagezoom.js"></script>
            <script src="js/pager.js"></script>
            <script src="js/review.js"></script>
            <script src="js/cc_results.js"></script>
            <script src="js/stage_reviews.js"></script>
            <script src="js/cart_operations.js"></script>
            <script src="js/process_review.js"></script>

            <script defer src="js/jquery.flexslider.js"></script>
            <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
            <?php
                if(isset($_GET["cart_qty"])){
                    $qty = $_GET["cart_qty"];
                    $total = $_GET["total"];
                }

            ?>
            <script>
            // Can also be used with $(document).ready()
            $(window).load(function() {
              $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
              });
            });
            </script>
            
        <!-- //FlexSlider-->
        
    </head>
    <body onload="fillDetails()">
        <div class="header">
            <div class="container">
                <div class="header-top">
                    <div class="logo">
                        <a href="index.php">Tronica</a>
                    </div>
                    <div class="login-bars">
                        <a class="btn btn-default log-bar" href="register.html" role="button">Sign up</a>
                        <a class="btn btn-default log-bar" href="signup.html" role="button">Login</a>
                        <div class="cart box_1">
                            <a href="checkout.html">
                            <h3>
                                <div class="total">
<span class="simpleCart_total" id="simpleCart_total"></span>(<span id="simpleCart_quantity" class="simpleCart_quantity"></span>)</div></h3>
                            </a>
                            <p id="username"><?php if(isset($_SESSION["user"])){ echo "Hello, ".$_SESSION["user"];} ?></p>
                            <p><a href="javascript:;" class="simpleCart_empty"></a></p>
                            <div class="clearfix"> </div>
                        </div>	
                    </div>
        <div class="clearfix"></div>
                </div>
                <!---menu-bar--->
                <div class="header-botom">
                    <div class="content white">
                    <nav class="navbar navbar-default nav-menu" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!--/.navbar-header-->

                        <div class="collapse navbar-collapse collapse-pdng" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav nav-font">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="products.html">Shoes</a></li>
                                        <li><a href="products.html">Tees</a></li>
                                        <li><a href="products.html">Tops</a></li>
                                        <li class="divider"></li>
                                        <li><a href="products.html">Tracks</a></li>
                                        <li class="divider"></li>
                                        <li><a href="products.html">Gear</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Men<b class="caret"></b></a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="row">
                                            <div class="col-sm-4 menu-img-pad">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="products.html">Joggers</a></li>
                                                    <li><a href="products.html">Foot Ball</a></li>
                                                    <li><a href="products.html">Cricket</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="products.html">Tennis</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="products.html">Casual</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4 menu-img-pad">
                        <a href="#"><img src="images/menu1.jpg" alt="/" class="img-rsponsive men-img-wid" /></a>
                                            </div>
                                            <div class="col-sm-4 menu-img-pad">
                        <a href="#"><img src="images/menu2.jpg" alt="/" class="img-rsponsive men-img-wid" /></a>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Women<b class="caret"></b></a>
                                    <ul class="dropdown-menu multi-column columns-2">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="products.html">Tops</a></li>
                                                    <li><a href="products.html">Bottoms</a></li>
                                                    <li><a href="products.html">Yoga Pants</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="products.html">Sports</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="products.html">Gym</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6">
                        <a href="#"><img src="images/menu3.jpg" alt="/" class="img-rsponsive men-img-wid" /></a>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kids<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="products.html">Tees</a></li>
                                        <li><a href="products.html">Shorts</a></li>
                                        <li><a href="products.html">Gear</a></li>
                                        <li class="divider"></li>
                                        <li><a href="products.html">Watches</a></li>
                                        <li class="divider"></li>
                                        <li><a href="products.html">Shoes</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Catch</a></li>
                                <div class="clearfix"></div>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <!--/.navbar-collapse-->
                        <div class="clearfix"></div>
                    </nav>
                    <!--/.navbar-->   
                        <div class="clearfix"></div>
                    </div>
                    <!--/.content--->
                </div>
                    <!--header-bottom-->
            </div>
        </div>
        <div class="head-bread">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Men</a></li>
                    <li class="active">Shop</li>
                </ol>
            </div>
        </div>
        <div class="showcase-grid">
            <div class="container">
                <div class="col-md-8 showcase">
                    <div class="flexslider">
                          <ul class="slides">
                            <li data-thumb="" id="img1-thumb">
                                <div class="thumb-image"> <img id="img1" src="" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            <li data-thumb="" id="img2-thumb">
                                 <div class="thumb-image"> <img id="img2" src="" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            <li data-thumb="" id="img3-thumb">
                               <div class="thumb-image"> <img id="img3" src="" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            <li data-thumb="" id="img4-thumb">
                               <div class="thumb-image"> <img id="img4" src="" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                          </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 showcase">
                    <div class="showcase-rt-top">
                        <div class="pull-left shoe-name">
                            <h3 id="prod-name"></h3>
                            <p></p>
                            <h4>&#36;190</h4>
                        </div>
                        <div class="pull-left rating-stars">
                            <ul>
    <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
    <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
    <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
    <li><a href="#"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
    <li><a href="#"><span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <hr class="featurette-divider">
                    <div class="shocase-rt-bot">
                        <div class="float-qty-chart">
                        <ul>
                            <li class="qty" id="options1">
                                <h3>Size Chart</h3>
                                <select class="form-control siz-chrt" >
                                  <option>6 US</option>
                                  <option>7 US</option>
                                  <option>8 US</option>
                                  <option>9 US</option>
                                  <option>10 US</option>
                                  <option>11 US</option>
                                </select>
                            </li>
                            <li class="qty" id="options2">
                                <h4>QTY</h4>
                                <select class="form-control qnty-chrt" id="quantity">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                  <option>6</option>
                                  <option>7</option>
                                </select>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        </div>
                        <ul>
                            <li class="ad-2-crt simpleCart_shelfItem">
                                <a class="btn item_add" href="#" role="button" onclick="fillCart()">Add To Cart</a>
                                <a class="btn" href="#" role="button">Buy Now</a>
                            </li>
                        </ul>
                    </div>
                    <div class="showcase-last">
                        <h3>product details</h3>
                        <p id="details"></p>
                    </div>
                </div>
        <div class="clearfix"></div>
            </div>
        </div>
        
        <div class="specifications">
            <div class="container">
              <h3>Item Details</h3> 
                <div class="detai-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills tab-nike" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Highlights</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Description</a></li>
                    <li role="presentation" onclick="getCCResults()"><a href="#computer-critic" aria-controls="computer-critic" role="tab" data-toggle="tab">Computer Critic</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                    <p id="highlights-tab"></p> 
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                    <p id="description">Nike is one of the leading manufacturer and supplier of sports equipment, footwear and apparels. Nike is a global brand and it continuously creates products using high technology and design innovation. Nike has a vast collection of sports shoes for men at Snapdeal. You can explore our range of basketball shoes, football shoes, cricket shoes, tennis shoes, running shoes, daily shoes or lifestyle shoes. Take your pick from an array of sports shoes in vibrant colours like red, yellow, green, blue, brown, black, grey, olive, pink, beige and white. Designed for top performance, these shoes match the way you play or run. Available in materials like leather, canvas, suede leather, faux leather, mesh etc, these shoes are lightweight, comfortable, sturdy and extremely sporty. The sole of all Nike shoes is designed to provide an increased amount of comfort and the material is good enough to provide an improved fit. These shoes are easy to maintain and last for a really long time given to their durability. Buy Nike shoes for men online with us at some unbelievable discounts and great prices. So get faster and run farther with your Nike shoes and track how hard you can play.</p>    
                    </div>
                    <div role="tabpanel" class="tab-pane" id="computer-critic">
                        <div>
                        <blockquote id="summarised-text">
                            
                        </blockquote>
                        </div>   
                        <div id="sentiment-score">

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Review Section-->
        <div class="specifications">
            <div class="container">
              <h3>User Reviews</h3> 
                <div class="detai-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills tab-nike" role="tablist">
                    <li role="presentation" class="active"><a href="#user-reviews" aria-controls="user-reviews" role="tab" data-toggle="tab">Reviews</a></li>
                    <li role="presentation"><a href="#submit-review" aria-controls="#submit-review" role="tab" data-toggle="tab">Review Product</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="user-reviews">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Review</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php
                                    $product_id = $_GET['prod'];
                                    $all_reviews = "Reviews/Output/".$product_id.".json";

                                    $reviews = file_get_contents($all_reviews);
                                    $review_array = json_decode($reviews, true);
                                    foreach($review_array as $review) {
                                        if($review['asin']==$product_id){
                                ?>
                                <tr>
                                    <td><img src="images/man-placeholder.png"/></br><p align="center"><?php echo $review["reviewerName"];?></p></td>
                                    <td>
                                    
                                        <div style="height:150px; overflow:scroll">
                                        <span id="summarised"><?php echo $review["ccSummary"];?></span></br>
                                        <span id="review-sentiment">Our Rating: <?php echo $review["ccSentiment"];?> </span></br>
                                        <span id="review-overall">Their Rating: <?php echo $review["overall"];?> </span></br>
                                        <span id="review-text"><?php echo $review["reviewText"];?> </span></br>
                                        </div>
                                        
                                    </td>
                                </tr>
                                <?php
                                        }
                                }    
                                ?>
                            </tbody>
                            
                        </table>
                        <div class="col-md-12 text-center">
                          <ul class="pagination pagination-lg pager" id="myPager"></ul>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="submit-review">
                        <div id="review-form">
                          <textarea name="message" rows="2" class="question" id="msg" required autocomplete="off"></textarea>
                          <label for="msg"><span>What's your review?</span></label>
                          
                           <fieldset class="rating">
                                
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                            </fieldset>
  
                          <input type="submit" value="Submit Review" onclick="postReview()" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Review Section-->

        
        <div class="you-might-like">
            <div class="container">
                <h3 class="you-might">Products You May Like</h3>
                <div class="col-md-4 grid-stn simpleCart_shelfItem">
                     <!-- normal -->
                        <div class="ih-item square effect3 bottom_to_top">
                            <div class="bottom-2-top">
                    <div class="img"><img src="images/grid4.jpg" alt="/" class="img-responsive gri-wid"></div>
                            <div class="info">
                                <div class="pull-left styl-hdn">
                                    <h3 id="prod-rec-1-name">style 01</h3>
                                </div>
                                <div class="pull-right styl-price">
                                    <p><a  href="#" class="item_add"><span class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span> <span class=" item_price">$</span><span class=" item_price" id="price">190</span></a></p>
                                </div>
                                <div class="clearfix"></div>
                            </div></div>
                        </div>
                    <!-- end normal -->
                    <div class="quick-view">
                        <a href="single.html">Quick view</a>
                    </div>
                </div>
                <div class="col-md-4 grid-stn simpleCart_shelfItem">
                    <!-- normal -->
                        <div class="ih-item square effect3 bottom_to_top">
                            <div class="bottom-2-top">
                    <div class="img"><img src="images/grid6.jpg" alt="/" class="img-responsive gri-wid"></div>
                            <div class="info">
                                <div class="pull-left styl-hdn">
                                    <h3id="prod-rec-2-name">style 01</h3>
                                </div>
                                <div class="pull-right styl-price">
    <p><a  href="#" class="item_add"><span class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span> <span class=" item_price">$190</span></a></p>
                                </div>
                                <div class="clearfix"></div>
                            </div></div>
                        </div>
                    <!-- end normal -->
                    <div class="quick-view">
                        <a href="single.html">Quick view</a>
                    </div>
                </div>
                <div class="col-md-4 grid-stn simpleCart_shelfItem">
                    <!-- normal -->
                        <div class="ih-item square effect3 bottom_to_top">
                            <div class="bottom-2-top">
                    <div class="img"><img src="images/grid3.jpg" alt="/" class="img-responsive gri-wid"></div>
                            <div class="info">
                                <div class="pull-left styl-hdn">
                                    <h3 id="prod-rec-3-name">style 01</h3>
                                </div>
                                <div class="pull-right styl-price">
    <p><a  href="#" class="item_add"><span class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span> <span class=" item_price">$190</span></a></p>
                                </div>
                                <div class="clearfix"></div>
                            </div></div>
                        </div>
                    <!-- end normal -->
                    <div class="quick-view">
                        <a href="single.html">Quick view</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        
        <div class="footer-grid">
            <div class="container">
                <div class="col-md-2 re-ft-grd">
                    <h3>Categories</h3>
                    <ul class="categories">
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Kids</a></li>
                        <li><a href="#">Formal</a></li>
                        <li><a href="#">Casuals</a></li>
                        <li><a href="#">Sports</a></li>
                    </ul>
                </div>
                <div class="col-md-2 re-ft-grd">
                    <h3>Short links</h3>
                    <ul class="shot-links">
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Delivery</a></li>
                        <li><a href="#">Return Policy</a></li>
                        <li><a href="#">Terms & conditions</a></li>
                        <li><a href="contact.html">Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-md-6 re-ft-grd">
                    <h3>Social</h3>
                    <ul class="social">
                        <li><a href="#" class="fb">facebook</a></li>
                        <li><a href="#" class="twt">twitter</a></li>
                        <li><a href="#" class="gpls">g+ plus</a></li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="col-md-2 re-ft-grd">
                    <div class="bt-logo">
                        <div class="logo">
                            <a href="index.html" class="ft-log">N-AIR</a>
                        </div>
                    </div>
                </div>
        <div class="clearfix"></div>
            </div>
            <div class="copy-rt">
                <div class="container">
            <p>&copy;   2015 N-AIR All Rights Reserved. Design by <a href="http://www.w3layouts.com">w3layouts</a></p>
                </div>
            </div>
        </div>

   <?php
        
        
        echo "<script>updatePageCartDetails(".$qty.",".$total.")</script>";
        echo "
                <script>
                    document.getElementById('img1').src='catalog/".$product_id."/1.jpg'
                    document.getElementById('img1-thumb').setAttribute('data-thumb', 'catalog/".$product_id."/1.jpg')
                    document.getElementById('img2').src='catalog/".$product_id."/2.jpg'
                    document.getElementById('img2-thumb').setAttribute('data-thumb', 'catalog/".$product_id."/2.jpg')
                    document.getElementById('img3').src='catalog/".$product_id."/3.jpg'
                    document.getElementById('img3-thumb').setAttribute('data-thumb', 'catalog/".$product_id."/3.jpg')
                    document.getElementById('img4').src='catalog/".$product_id."/4.jpg'
                    document.getElementById('img4-thumb').setAttribute('data-thumb', 'catalog/".$product_id."/4.jpg')
                </script>
             ";
        

    ?>
    <script type="text/javascript">
        $('.txt').html(function(i, html) {
            var chars = $.trim(html).split("");
            return '<span>' + chars.join('</span><span>') + '</span>';
        });
            </script>
    </body>
    <?php

    ?>
</html>
    