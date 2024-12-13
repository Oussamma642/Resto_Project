<?php

// header("location:../Dashbord-Menu/Classes/ReservationClasses/clsAddNewRes.php");

include_once 'Dashbord-Menu/Classes/ReservationClasses/clsAddNewRes.php';
include_once 'Dashbord-Menu/Classes/MenuClasses/clsMenu.php';


if (isset($_POST['reserver'])){
    clsAddNewReservation::AddNewReservation();
    // clsAddNewReservation::Test();    
}

$Menu_Items = clsMenu::ListMenu();

?>


<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Food and Restaurant Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- lien icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <link rel="stylesheet" href="main-main/assets/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="main-main/assets/css/font-awesome.min.css">
    <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


    <!--For Plugins external css-->
    <link rel="stylesheet" href="main-main/assets/css/animate/animate.css" />
    <link rel="stylesheet" href="main-main/assets/css/plugins.css" />

    <!--Theme custom css -->
    <link rel="stylesheet" href="main-main/assets/css/style.css">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="main-main/assets/css/responsive.css" />

    <script src="main-main/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

</head>

<body>

    <div class='preloader'>
        <div class='loaded'>&nbsp;</div>
    </div>
    <header id="home" class="navbar-fixed-top">
        <div class="header_top_menu clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-md-offset-3 col-sm-12 text-right">
                        <div class="call_us_text">
                            <a href=""><i class="fa fa-clock-o"></i> Order Foods 24/7</a>

                            <a href=""><i class="fa fa-phone"></i>06-----------</a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="head_top_social text-right">
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-pinterest-p"></i></a>
                            <a href=""><i class="fa fa-youtube"></i></a>
                            <a href=""><i class="fa fa-phone"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- End navbar-collapse-->

        <div class="main_menu_bg">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand our_logo" href="#"><img src="assets/images/logo.png"
                                        alt="" /></a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#slider">Home</a></li>
                                    <li><a href="#abouts">abouts</a></li>
                                    <li><a href="#features">Features</a></li>
                                    <li><a href="#portfolio">Menu</a></li>
                                    <li><a href="#footer_widget">contact us</a></li>
                                    <li><a href="#table-booking" class="booking">Table Booking</a></li>
                                    <li>
                                        <div id="cart-icon" style="cursor: pointer; ">
                                            <span id="cart-count">0</span>
                                        </div>
                                    </li>

                                </ul>
                                <!-- Modale Panier -->
                                <div id="cart-modal"
                                    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); display: flex; justify-content: center; align-items: center; z-index: 1000;">
                                    <div
                                        style="background-color: white; padding: 20px; border-radius: 8px; width: 600px; text-align: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                        <h3>Your Cart</h3>
                                        <div id="cart-modal-content" style="max-height: 200px; overflow-y: auto;"></div>
                                        <button id="close-modal"
                                            style="margin-top: 10px; padding: 10px 20px; background-color: red; color: white; border: none; border-radius: 5px; cursor: pointer;">Close</button>
                                        <!-- Ajouter un bouton "Voir Panier" en dehors des articles -->
                                        <button id="view-cart"
                                            style="margin-top: 10px; padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Voir
                                            Panier</button>
                                    </div>
                                </div>
                                <div id="login-form" style="display: none;">
                                    <h4>Please log in to proceed</h4>
                                    <form id="form-login">
                                        <label for="account-number">firstName:</label>
                                        <input type="text" id="firstName" name="firstName" required><br><br>

                                        <label for="password">lastName:</label>
                                        <input type="text" id="lastName" name="lastName" required><br><br>

                                        <label for="email">Email:</label>
                                        <input type="text" id="email" name="email" required><br><br>

                                        <label for="phone-number">Adress:</label>
                                        <input type="" id="adresse" name="adresse" required><br><br>

                                        <button type="submit"
                                            style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
                                    </form>
                                </div>


                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </div>
    </header> <!-- End Header Section -->

    <section id="slider" class="slider">
        <div class="slider_overlay">
            <div class="container">
                <div class="row">
                    <div class="main_slider text-center">
                        <div class="col-md-12">
                            <div class="main_slider_content" data-wow-duration="1s">
                                <p
                                    style="font-family:fantasy; font-size: xx-large; text-align: center; margin: 10px; color: yellow;">
                                    OWFS202 </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="abouts" class="abouts">
        <div class="container">
            <div class="row">
                <div class="abouts_content">
                    <div class="col-md-6">
                        <div class="single_abouts_text text-center wow slideInLeft" data-wow-duration="1s">
                            <img id="img_about" src="main-main//assets/images/ab.png" alt="img about" />

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">
                            <h4>About us</h4>
                            <h3>WE ARE TASTY</h3>
                            <p>At OWFS202, we bring the vibrant flavors of Morocco to your table. Our buffet showcases
                                the rich culinary traditions of Morocco, offering a diverse selection of freshly
                                prepared dishes that will transport your taste buds to the heart of North Africa. From
                                tender tagines and couscous to aromatic pastries and mint tea, each dish is crafted with
                                care and passion, using only the finest ingredients. Whether you're discovering Moroccan
                                cuisine for the first time or are a seasoned fan,
                                OWFS202 promises a memorable dining experience that celebrates the best of Moroccan food
                                and culture.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---- frame chatbot  -->
    <div class="chat-icon" id="chat-icon">💬</div>

    <!-- Chatbot Iframe (hidden by default) -->
    <iframe id="chatbot-frame"
        src="https://cdn.botpress.cloud/webchat/v2.2/shareable.html?configUrl=https://files.bpcontent.cloud/2024/12/12/19/20241212193309-5AWYXWSA.json"
        title="Botpress Chatbot"></iframe>

    <script>
    // Get the icon and iframe elements
    const chatIcon = document.getElementById('chat-icon');
    const chatbotFrame = document.getElementById('chatbot-frame');

    // Toggle the display of the chatbot iframe when the icon is clicked
    chatIcon.addEventListener('click', () => {
        if (chatbotFrame.style.display === 'none' || chatbotFrame.style.display === '') {
            chatbotFrame.style.display = 'block'; // Show the chatbot iframe
        } else {
            chatbotFrame.style.display = 'none'; // Hide the chatbot iframe
        }
    });
    </script>
    <!-- end Chatbot Iframe -->

    <section id="features" class="features">
        <div class="slider_overlay">
            <div class="container">
                <div class="row">
                    <div class="main_features_content_area  wow fadeIn" data-wow-duration="3s">
                        <div class="col-md-12">
                            <div class="main_features_content text-left">
                                <div class="col-md-6">
                                    <div class="single_features_text">
                                        <h4>Special Recipes</h4>
                                        <h3>Taste of Precious</h3>
                                        <p>At OWFS202, every dish is a journey
                                            into the heart of Moroccan heritage, where each bite is
                                            infused with the essence of tradition and the joy of discovery. Our Special
                                            Recipes are carefully crafted to
                                            offer a Taste of Precious, where the finest ingredients come together in
                                            perfect harmony. From the delicate flavors of our slow-braised tagines to
                                            the vibrant spices of harira soup, every recipe is a treasure waiting to be
                                            explored. Indulge in our mouthwatering briouats, expertly seasoned mechoui,
                                            and our signature couscous—each dish offering an unforgettable
                                            experience that speaks to the soul of Morocco. Come savor the precious
                                            flavors that make OWFS202 truly unique.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- menu -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="portfolio_content text-center  wow fadeIn" data-wow-duration="5s">
                    <div class="col-md-12">
                        <div class="head_title text-center">
                            <h4>Delightful</h4>
                            <h3>Experience</h3>
                        </div>

                        <div class="main_portfolio_content">


                            <?php
foreach($Menu_Items as $M){

    ?>
                            <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
                                <img src="main-main/<?=$M['picturePath']?>" alt="" />
                                <div class="portfolio_images_overlay text-center">
                                    <h6><?=$M['name']?></h6>
                                    <p class="product_price">$<?=$M['price']?></p>
                                    <button type="submit" class="btn btn-primary" onclick="AddCart"
                                        style="background-color: chocolate;">add to cart</button>
                                    <h1>Jell</h1>
                                </div>

                            </div>
                            <?php

}
                        ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Table Booking Section -->

    <section id="table-booking" class="py-5" style="display: none;">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="display-4" style="font-family: 'Times New Roman', serif;">Reservation</h2>
            </div>

            <div class="row justify-content-center align-items-center" if="forms">
                <div class="col-lg-12">
                    <!-- First Form Section -->
                    <div class="card shadow-lg border-0" id="form-section-1">
                        <div class="card-body p-4">
                            <h3 class="text-center mb-4">Reserve Your Table</h3>
                            <form method="post">
                                <div class="mb-3">
                                    <input type="number" name="nbrGuests" class="form-control mb-2"
                                        placeholder="Nombre de personnes" min="1" max="20" required>
                                    <!-- <select name="nbrGuests" class="form-select" required>
                                        <option value="" disabled selected>No. of Persons</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select> -->
                                </div>
                                <div class="mb-3">
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <input type="time" name="time" class="form-control" required>
                                </div>
                                <div class="text-center">
                                    <button type="button" class=" btn-warning btn-lg w-100"
                                        id="reserve-first">Reserve</button>
                                </div>

                        </div>
                    </div>

                    <!-- Second Form Section -->
                    <div class="card shadow-lg border-0 mt-4 d-none" id="form-section-2" style="display: none;">
                        <div class="card-body p-4">
                            <h3 class="text-center mb-4">Provide Your Details</h3>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" name="firstName" placeholder="First Name"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" name="lastName" placeholder="Last Name"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="E-Mail" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="tel" class="form-control" name="phoneNumber"
                                        placeholder="Contact Number" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" class=" btn-warning btn-lg w-100" id="back-first">Back</button>
                                <button type="submit" class=" btn-warning btn-lg w-100" name="reserver"
                                    id=" btn_forms">Submit</button>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Include Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


    <section id="footer_widget" class="footer_widget ">
        <div class="footer">
            <div class="row">
                <div class="row container-fluid">
                    <div class="footer_widget_content text-center">
                        <div class="col-md-6">
                            <div class="single_widget wow fadeIn" data-wow-duration="2s">
                                <h3>Take it easy with location</h3>
                                <div class="single_widget_info">
                                    <p>112-Legere ancillae vix ne.
                                        <span>Te elit putent propriae eum,</span>
                                        <span>owfs</span>
                                        <span class="phone_email">phone: 00 000 000</span>
                                        <span>Email: OWFS202@restaurant.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single_widget wow fadeIn" data-wow-duration="4s">
                                <h3>Take it easy with location</h3>
                                <div class="single_widget_info">
                                    <p><span class="date_day">Monday To Friday</span>
                                        <span>8:00am to 10:00pm(Breakfast)</span>
                                        <span>11:00am to 10:00pm(Lunch/Diner)</span>
                                        <span class="date_day">Saturday & Sunday</span>
                                        <span>10:00am to 11:00pm(Brunch)</span>
                                        <span>11:00am to 12:00pm(Lunch/Dinner)</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4" style="padding: 20px; margin: 20px;">
                                <div class="footer_socail_icon">
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                    <a href=""><i class="fa fa-pinterest-p"></i></a>
                                    <a href=""><i class="fa fa-youtube"></i></a>
                                    <a href=""><i class="fa fa-phone"></i></a>
                                    <a href=""><i class="fa fa-camera"></i></a>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--Footer-->
    <div class="scrollup">
        <a href="#"><i class="fa fa-chevron-up"></i></a>
    </div>

    <script src="main-main/addCart.js"></script>
    <script src="main-main/assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="main-main/assets/js/vendor/bootstrap.min.js"></script>
    <script src="main-main/reserve.js"></script>

    <script src="main-main/assets/js/jquery-easing/jquery.easing.1.3.js"></script>
    <script src="main-main/assets/js/wow/wow.min.js"></script>
    <script src="main-main/assets/js/plugins.js"></script>
    <script src="main-main/assets/js/main.js"></script>
</body>

</html>