<!DOCTYPE html>
<html>

<head>
    <title>Conquer</title>
    <!--
Conquer Template
http://www.templatemo.com/tm-476-conquer
-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/css/style.css">
</head>

<body>
<div id="section2">
    <!-- Start Feature Area -->
    <section id="feature-area" class="about-section">
        <div class="container">
            <div class="row text-center inner">
                <div class="col-sm-4">
                    <div class="feature-content">
                        <img src="Assets/img/1-1.jpg" alt="Image">
                        <h2 class="feature-content-title green-text">Bootstrap v3.3.6</h2>
                        <p class="feature-content-description">Morbi sagittis justo a velit placerat ullamcorper
                            quis quis velit. Sed convallis at risus ullamcorper auctor. Praesent quis velit neque.
                            Quisque semper porta nisi vitae suscipit. Duis lectus magna, ornare ac scelerisque.
                        </p>
                        <a href="#" class="feature-content-link green-btn">button green</a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="feature-content">
                        <img src="Assets/img/1-2.jpg" alt="Image">
                        <h2 class="feature-content-title blue-text">Responsive Design</h2>
                        <p class="feature-content-description">Conquer Template is provided by templatemo for free
                            of charge. You can use this template for any kind of website. No credit link is
                            required. All images by <a href="http://unsplash.com" target="_parent">Unsplash</a>.
                            Thank you for visiting our website. Please come again!</p>
                        <a href="#" class="feature-content-link blue-btn">See Details</a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="feature-content">
                        <img src="Assets/img/1-3.jpg" alt="Image">
                        <h2 class="feature-content-title red-text">Parallax Layout</h2>
                        <p class="feature-content-description">Morbi sagittis justo a velit placerat ullamcorper
                            quis quis velit. Sed convallis at risus ullamcorper auctor. Praesent quis velit neque.
                            Quisque semper porta nisi vitae suscipit. Duis lectus magna, ornare ac scelerisque.
                        </p>
                        <a href="#" class="feature-content-link red-btn">Button Red</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Feature Area -->
</div>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script> <!-- https://github.com/markgoodyear/scrollup -->
<script src="js/jquery.singlePageNav.min.js"></script> <!-- https://github.com/ChrisWojcik/single-page-nav -->
<script src="js/parallax.js-1.3.1/parallax.js"></script> <!-- http://pixelcog.github.io/parallax.js/ -->
<script>
    // HTML document is loaded. DOM is ready.
    $(function () {

        // Parallax
        $('.intro-section').parallax({
            imageSrc: 'Assets/img/bg-1.jpg',
            speed: 0.2
        });
        $('.services-section').parallax({
            imageSrc: 'Assets/img/bg-2.jpg',
            speed: 0.2
        });
        $('.contact-section').parallax({
            imageSrc: 'Assets/img/bg-3.jpg',
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
</body>

</html>