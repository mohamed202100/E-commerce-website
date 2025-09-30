<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('front/images/favicon.png') }}" type="image/x-icon">

    <title>@yield('title', 'Giftos')</title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.css') }}" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('front/css/responsive.css') }}" rel="stylesheet" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
    <div class="hero_area">
        <!-- header section starts -->
        <header class="header_section">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <span>Giftos</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Why Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Testimonial</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                    </ul>
                    <div class="user_option">
                        <form class="form-inline ">
                            <button class="btn nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                    <div class="user_option">
                        @if (Auth::check())
                            <a href="{{ route('dashboard') }}">
                                <i class="fa fa-user" aria-hidden="true"></i> <span>Dashboard</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}">
                                <i class="fa fa-user" aria-hidden="true"></i> <span>Login</span>
                            </a>
                            <a href="{{ route('register') }}">
                                <i class="fa fa-user" aria-hidden="true"></i> <span>Sign Up</span>
                            </a>
                        @endif
                        <a href="{{ route('cartproducts') }}"><i class="fa fa-shopping-bag"
                                aria-hidden="true">{{ $count }}</i></a>
                    </div>
                </div>
            </nav>
        </header>
        <!-- end header section -->

        <!-- Dynamic Content -->
        <main>
            @yield('content')
        </main>
    </div>


    <section class="contact_section ">
        <div class="container px-0">
            <div class="heading_container ">
                <h2 class="">
                    Contact Us
                </h2>
            </div>
        </div>
        <div class="container container-bg">
            <div class="row">
                <div class="col-lg-7 col-md-6 px-0">
                    <div class="map_container">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                                width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 px-0">
                    <form action="#">
                        <div>
                            <input type="text" placeholder="Name" />
                        </div>
                        <div>
                            <input type="email" placeholder="Email" />
                        </div>
                        <div>
                            <input type="text" placeholder="Phone" />
                        </div>
                        <div>
                            <input type="text" class="message-box" placeholder="Message" />
                        </div>
                        <div class="d-flex ">
                            <button>
                                SEND
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <br><br><br>


    <!-- info section -->

    <section class="info_section  layout_padding2-top">
        <div class="social_container">
            <div class="social_box">
                <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="info_container ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            ABOUT US
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="info_form ">
                            <h5>
                                Newsletter
                            </h5>
                            <form action="#">
                                <input type="email" placeholder="Enter your email">
                                <button>
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            NEED HELP
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            CONTACT US
                        </h6>
                        <div class="info_link-box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span> Gb road 123 london Uk </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>+01 12345678901</span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span> demo@gmail.com</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer / info section -->
        <section class="info_section layout_padding2-top">
            <div class="social_container">
                <div class="social_box">
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-instagram"></i></a>
                    <a href=""><i class="fa fa-youtube"></i></a>
                </div>
            </div>

            <footer class="footer_section">
                <div class="container">
                    <p>&copy; <span id="displayYear"></span> All Rights Reserved By
                        <a href="https://html.design/">Web Tech Knowledge</a>
                    </p>
                </div>
            </footer>
        </section>

        <!-- Scripts -->
        <script src="{{ asset('front/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('front/js/bootstrap.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="{{ asset('front/js/custom.js') }}"></script>

        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>



        <script type="text/javascript">
            $(function() {



                /*------------------------------------------

                --------------------------------------------

                Stripe Payment Code

                --------------------------------------------

                --------------------------------------------*/



                var $form = $(".require-validation");



                $('form.require-validation').bind('submit', function(e) {

                    var $form = $(".require-validation"),

                        inputSelector = ['input[type=email]', 'input[type=password]',

                            'input[type=text]', 'input[type=file]',

                            'textarea'
                        ].join(', '),

                        $inputs = $form.find('.required').find(inputSelector),

                        $errorMessage = $form.find('div.error'),

                        valid = true;

                    $errorMessage.addClass('hide');



                    $('.has-error').removeClass('has-error');

                    $inputs.each(function(i, el) {

                        var $input = $(el);

                        if ($input.val() === '') {

                            $input.parent().addClass('has-error');

                            $errorMessage.removeClass('hide');

                            e.preventDefault();

                        }

                    });



                    if (!$form.data('cc-on-file')) {

                        e.preventDefault();

                        Stripe.setPublishableKey($form.data('stripe-publishable-key'));

                        Stripe.createToken({

                            number: $('.card-number').val(),

                            cvc: $('.card-cvc').val(),

                            exp_month: $('.card-expiry-month').val(),

                            exp_year: $('.card-expiry-year').val()

                        }, stripeResponseHandler);

                    }



                });



                /*------------------------------------------

                --------------------------------------------

                Stripe Response Handler

                --------------------------------------------

                --------------------------------------------*/

                function stripeResponseHandler(status, response) {

                    if (response.error) {

                        $('.error')

                            .removeClass('hide')

                            .find('.alert')

                            .text(response.error.message);

                    } else {

                        /* token contains id, last4, and card type */

                        var token = response['id'];



                        $form.find('input[type=text]').empty();

                        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

                        $form.get(0).submit();

                    }

                }



            });
        </script>
</body>

</html>
