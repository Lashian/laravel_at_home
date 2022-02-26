<?php
error_reporting(E_ERROR | E_PARSE);
include_once "app/models/UserModel.php";
//var_dump($_POST); this is the global variable that you can use when you submit data to a form
// the $_ sign means that we are calling a GLOBAL variable. meaning it is already an integral part of php and doesn't need to be defined by us

//this is in my opinion bad practice, but for the sake of science, we pre-defining useless variables, like the idiots we are
$user_login = null;
$user_password = null;
$user_name = null;
$user_email = null;

// we will have to see if the data, which is being submitted is legitimate. we need to validate the user inputs and make sure we never trust them
if((preg_match('/^[a-zA-Z0-9]{5,}$/', $_POST['user_login'])
        && preg_match('/^[a-zA-Z0-9]{5,}$/', $_POST['user_name']))
        && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
        && $_POST['user_password'] > 7) {


    $user_login = htmlspecialchars($_POST['user_login']);
    $user_password = htmlspecialchars($_POST['user_password']);
    $user_name = htmlspecialchars($_POST['user_name']);
    $user_email = htmlspecialchars($_POST['user_email']);

    //in the db file, we created a function called connect and we are using the function to create a new instance/object of the mysqli database.
    //$db = connect(DB_HOST, DB_NAME,DB_USERNAME, DB_PASSWORD);

    $dbCHeckForDuplicates = new UserModel();
    $isUserDuplicate = $dbCHeckForDuplicates->isUserLoginDuplicate($user_login);

    //before we insert anything into the database, we first need to make sure, that the user is unique and not already registered.
    if(!$isUserDuplicate){
        //the query function above, executed on the $db object, delivers us a result object saved as duplicateentry, we are checking to see
        //if the resulted object has any number of rows.
        //if it doesn't have any rows, it means, the user has not been registered yet, so we allow the database to save the validated user information and create a new user

        $userRegistrationInstance = new DatabaseConnection;
        $dbCHeckForDuplicates->registerUser($user_login,$user_password,$user_name,$user_email);

    }else{
        echo "USER IS ALREADY REGISTERED";
    }

}else{

    if($_POST){
        $err_message = "DON'T BE A SCUM, GIVE US THE PROPER DATA!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title> Registration </title>
    <!--
Conquer Template
http://www.templatemo.com/tm-476-conquer
-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='Assets/text/css'>
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/css/style.css">
</head>

<body>
<div id="selection2">
    <!-- Start Contact Area -->

    <section id="contact-area" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center inner">
                    <div class="contact-content">
                        <h1>Registration Form</h1>
                    </div>
                    <?php echo $err_message; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!–– this form is what we are submitting the data to. the fields need to be enclosed in the form tag for everything to get recieved.
                    the method of submitting the data to the form should mostly be a post method ––>
                    <form action="" method="post" class="contact-form">
                        <div class="col-sm-6 contact-form-left">
                            <div class="form-group">
                                <input name="user_login" class="form-control" id="user_login" placeholder="User Login">
                                <input name="user_password" type="password" class="form-control" id="user_password" placeholder="Password">
                                <input name="user_name" class="form-control" id="user_name" placeholder="User Name">
                                <input name="user_email" class="form-control" id="user_email" placeholder="Email">
                                <button type="submit" class="btn btn-default">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->
</div>
</script>
</body>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script> <!-- https://github.com/markgoodyear/scrollup -->
<script src="js/jquery.singlePageNav.min.js"></script> <!-- https://github.com/ChrisWojcik/single-page-nav -->
<script src="js/parallax.js-1.3.1/parallax.js"></script> <!-- http://pixelcog.github.io/parallax.js/ -->
<script>
    // HTML document is loaded. DOM is ready.
    $(function () {

        // Parallax
        $('.intro-section').parallax({
            imageSrc: 'img/bg-1.jpg',
            speed: 0.2
        });
        $('.services-section').parallax({
            imageSrc: 'img/bg-2.jpg',
            speed: 0.2
        });
        $('.contact-section').parallax({
            imageSrc: 'img/bg-3.jpg',
            speed: 0.2
        });

        // jQuery Scroll Up / Back To Top Image
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 1000, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 300, // Animation speed (ms)
            scrollText: '', // Text for element, can contain HTML
            scrollImg: true // Set true to use image
        });

        // ScrollUp Placement
        $(window).on('scroll', function () {

            // If the height of the document less the height of the document is the same as the
            // distance the window has scrolled from the top...
            if ($(document).height() - $(window).height() === $(window).scrollTop()) {

                // Adjust the scrollUp image so that it's a few pixels above the footer
                $('#scrollUp').css('bottom', '80px');

            } else {
                // Otherwise, leave set it to its default value.
                $('#scrollUp').css('bottom', '30px');
            }
        });

        $('.single-page-nav').singlePageNav({
            offset: $('.single-page-nav').outerHeight(),
            speed: 1500,
            filter: ':not(.external)',
            updateHash: true
        });

        $('.navbar-toggle').click(function () {
            $('.single-page-nav').toggleClass('show');
        });

        $('.single-page-nav a').click(function () {
            $('.single-page-nav').removeClass('show');
        });

    });
</script>
</html>

