<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>

        <meta property="og:title" content=""/>
        <meta property="og:image" content=""/>
        <meta property="og:url" content=""/>
        <meta property="og:site_name" content=""/>
        <meta property="og:description" content=""/>
        <meta name="twitter:title" content="" />
        <meta name="twitter:image" content="" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:card" content="" />

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
        
        <!-- Animate.css -->
        <link rel="stylesheet" href="/public/education/css/animate.css">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="/public/education/css/icomoon.css">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="/public/education/css/bootstrap.css">

        <!-- Magnific Popup -->
        <link rel="stylesheet" href="/public/education/css/magnific-popup.css">

        <!-- Owl Carousel  -->
        <link rel="stylesheet" href="/public/education/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/public/education/css/owl.theme.default.min.css">

        <!-- Flexslider  -->
        <link rel="stylesheet" href="/public/education/css/flexslider.css">

        <!-- Pricing -->
        <link rel="stylesheet" href="/public/education/css/pricing.css">

        <!-- Theme style  -->
        <link rel="stylesheet" href="/public/education/css/style.css">

        <!-- Modernizr JS -->
        <script src="/public/education/js/modernizr-2.6.2.min.js"></script>
    </head>
    <body>

        <div class="fh5co-loader"></div>
    
        <div id="page">
            <nav class="fh5co-nav" role="navigation">
                <div class="top">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <p class="site">www.heygeek.com</p>
                                <p class="num">Call: +01 123 456 7890</p>
                                <ul class="fh5co-social">
                                    <li><a href="#"><i class="icon-facebook2"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter2"></i></a></li>
                                    <li><a href="#"><i class="icon-dribbble2"></i></a></li>
                                    <li><a href="#"><i class="icon-github"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-2">
                                <div id="fh5co-logo"><a href="/"><i class="icon-study"></i> HeyGeek<span>.</span></a></div>
                            </div>
                            <div class="col-xs-10 text-right menu-1">
                                <ul>
                                    <li class="active"><a href="/">Главная</a></li>
                                    <li><a href="/course/courses">Курсы</a></li>
                                    <li><a href="/course/teachers">Учителя</a></li>
                                    <li><a href="about">О нас</a></li>
                                    <li><a href="/messages/chat">Чат</a></li>
                                    <li class="has-dropdown">
                                        <a href="blog.html">Новости</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Веб дизайн</a></li>
                                            <li><a href="#">Front-End</a></li>
                                            <li><a href="#">Back-End</a></li>
                                            <li><a href="#">Full Stack</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact">Контакты</a></li>
                                    <li class="btn-cta"><a href="/account/login"><span>Войти</span></a></li>
                                    <li class="btn-cta"><a href="/account/register"><span>Создать аккаунт</span></a></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </nav>

                <?php
                    echo $content;
                ?>

            <footer id="fh5co-footer" role="contentinfo" style="background-image: url(/public/education/images/img_bg_4.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row row-pb-md">
                        <div class="col-md-3 fh5co-widget">
                            <h3>About Education</h3>
                            <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
                            <h3>Learning</h3>
                            <ul class="fh5co-footer-links">
                                <li><a href="#">Course</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Meetups</a></li>
                            </ul>
                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
                            <h3>Learn &amp; Grow</h3>
                            <ul class="fh5co-footer-links">
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Handbook</a></li>
                                <li><a href="#">Held Desk</a></li>
                            </ul>
                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
                            <h3>Engage us</h3>
                            <ul class="fh5co-footer-links">
                                <li><a href="#">Marketing</a></li>
                                <li><a href="#">Visual Assistant</a></li>
                                <li><a href="#">System Analysis</a></li>
                                <li><a href="#">Advertise</a></li>
                            </ul>
                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
                            <h3>Legal</h3>
                            <ul class="fh5co-footer-links">
                                <li><a href="#">Find Designers</a></li>
                                <li><a href="#">Find Developers</a></li>
                                <li><a href="#">Teams</a></li>
                                <li><a href="#">Advertise</a></li>
                                <li><a href="#">API</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row copyright">
                        <div class="col-md-12 text-center">
                            <p>
                                <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
                                <small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> &amp; <a href="https://www.pexels.com/" target="_blank">Pexels</a></small>
                            </p>
                        </div>
                    </div>

                </div>
            </footer>

            <div class="gototop js-top">
                <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
            </div>

        </div>

        <!-- jQuery -->
        <script src="/public/education/js/jquery.min.js"></script>
        <!-- jQuery Easing -->
        <script src="/public/education/js/jquery.easing.1.3.js"></script>
        <!-- Bootstrap -->
        <script src="/public/education/js/bootstrap.min.js"></script>
        <!-- Waypoints -->
        <script src="/public/education/js/jquery.waypoints.min.js"></script>
        <!-- Stellar Parallax -->
        <script src="/public/education/js/jquery.stellar.min.js"></script>
        <!-- Carousel -->
        <script src="/public/education/js/owl.carousel.min.js"></script>
        <!-- Flexslider -->
        <script src="/public/education/js/jquery.flexslider-min.js"></script>
        <!-- countTo -->
        <script src="/public/education/js/jquery.countTo.js"></script>
        <!-- Magnific Popup -->
        <script src="/public/education/js/jquery.magnific-popup.min.js"></script>
        <script src="/public/education/js/magnific-popup-options.js"></script>
        <!-- Count Down -->
        <script src="/public/education/js/simplyCountdown.js"></script>
        <!-- Main -->
        <script src="/public/education/js/main.js"></script>
        <script>
            var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

            // default example
            simplyCountdown('.simply-countdown-one', {
                year: d.getFullYear(),
                month: d.getMonth() + 1,
                day: d.getDate()
            });

            //jQuery example
            $('#simply-countdown-losange').simplyCountdown({
                year: d.getFullYear(),
                month: d.getMonth() + 1,
                day: d.getDate(),
                enableUtc: false
            });
        </script>
        <script src="/public/education/js/form.js"></script>
    </body>
</html>