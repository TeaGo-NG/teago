<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adda - Social Network HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bicon.min.css">
    <!-- Flat Icon CSS -->
    <link rel="stylesheet" href="assets/css/vendor/flaticon.css">
    <!-- audio & video player CSS -->
    <link rel="stylesheet" href="assets/css/plugins/plyr.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <!-- nice-select CSS -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <!-- perfect scrollbar css -->
    <link rel="stylesheet" href="assets/css/plugins/perfect-scrollbar.css">
    <!-- light gallery css -->
    <link rel="stylesheet" href="assets/css/plugins/lightgallery.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!-- header area start -->
    <?php include("include/nav.php") ?>
    <!-- header area end -->

    <!-- mobile header area start -->
    <?php include("include/mobilenav.php") ?>
    <!--mobile header area end -->

    <main>

        <div class="main-wrapper pt-80">
            <div class="container">
                <div class="row">


                    <?php 
                    include("include/aside.php");
                    include("include/news.php");
                    include("include/notify.php");
                     ?>


                </div>
            </div>
        </div>

    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="bi bi-finger-index"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <footer class="d-none d-lg-block">
        <div class="footer-area reveal-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-wrapper">
                            <div class="footer-card position-relative">
                                <div class="friends-search">
                                    <form class="search-box">
                                        <input type="text" placeholder="Search Your Friends" class="search-field">
                                        <button class="search-btn"><i class="flaticon-search"></i></button>
                                    </form>
                                </div>
                                <div class="friend-search-list">
                                    <div class="frnd-search-title">
                                        <button class="frnd-search-icon"><i class="flaticon-settings"></i></button>
                                        <p>search friends</p>
                                        <button class="close-btn" data-close="friend-search-list"><i
                                                class="flaticon-cross-out"></i></button>
                                    </div>
                                    <div class="frnd-search-inner custom-scroll">
                                        <ul>
                                            <li class="d-flex align-items-center profile-active">
                                                <!-- profile picture end -->
                                                <div class="profile-thumb active">
                                                    <a href="#">
                                                        <figure class="profile-thumb-small">
                                                            <img src="assets/images/profile/profile-small-1.jpg"
                                                                alt="profile picture">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- profile picture end -->

                                                <div class="posted-author">
                                                    <h6 class="author">Jon Wilime</h6>
                                                    <p>Many desktop publishing</p>
                                                </div>
                                            </li>
                                            <li class="d-flex align-items-center profile-active">
                                                <!-- profile picture end -->
                                                <div class="profile-thumb active">
                                                    <a href="#">
                                                        <figure class="profile-thumb-small">
                                                            <img src="assets/images/profile/profile-small-2.jpg"
                                                                alt="profile picture">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- profile picture end -->

                                                <div class="posted-author">
                                                    <h6 class="author"><a href="profile.html">Jon Wileyam</a></h6>
                                                    <button class="add-frnd">add friend</button>
                                                </div>
                                            </li>
                                            <li class="d-flex align-items-center profile-active">
                                                <!-- profile picture end -->
                                                <div class="profile-thumb active">
                                                    <a href="#">
                                                        <figure class="profile-thumb-small">
                                                            <img src="assets/images/profile/profile-small-3.jpg"
                                                                alt="profile picture">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- profile picture end -->

                                                <div class="posted-author">
                                                    <h6 class="author"><a href="profile.html">Mili Raoulin</a></h6>
                                                    <button class="add-frnd">add friend</button>
                                                </div>
                                            </li>
                                            <li class="d-flex align-items-center profile-active">
                                                <!-- profile picture end -->
                                                <div class="profile-thumb active">
                                                    <a href="#">
                                                        <figure class="profile-thumb-small">
                                                            <img src="assets/images/profile/profile-small-4.jpg"
                                                                alt="profile picture">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- profile picture end -->

                                                <div class="posted-author">
                                                    <h6 class="author"><a href="profile.html">Jon Wilime</a></h6>
                                                    <button class="add-frnd">10 mutual friends</button>
                                                </div>
                                            </li>
                                            <li class="d-flex align-items-center profile-active">
                                                <!-- profile picture end -->
                                                <div class="profile-thumb active">
                                                    <a href="#">
                                                        <figure class="profile-thumb-small">
                                                            <img src="assets/images/profile/profile-small-5.jpg"
                                                                alt="profile picture">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- profile picture end -->

                                                <div class="posted-author">
                                                    <h6 class="author"><a href="profile.html">Robart faul</a></h6>
                                                    <button class="add-frnd">12 mutual friends</button>
                                                </div>
                                            </li>
                                            <li class="d-flex align-items-center profile-active">
                                                <!-- profile picture end -->
                                                <div class="profile-thumb active">
                                                    <a href="#">
                                                        <figure class="profile-thumb-small">
                                                            <img src="assets/images/profile/profile-small-3.jpg"
                                                                alt="profile picture">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- profile picture end -->

                                                <div class="posted-author">
                                                    <h6 class="author"><a href="profile.html">Mili Raoulin</a></h6>
                                                    <button class="add-frnd">add friend</button>
                                                </div>
                                            </li>
                                            <li class="d-flex align-items-center profile-active">
                                                <!-- profile picture end -->
                                                <div class="profile-thumb active">
                                                    <a href="#">
                                                        <figure class="profile-thumb-small">
                                                            <img src="assets/images/profile/profile-small-4.jpg"
                                                                alt="profile picture">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- profile picture end -->

                                                <div class="posted-author">
                                                    <h6 class="author"><a href="profile.html">Jon Wilime</a></h6>
                                                    <button class="add-frnd">10 mutual friends</button>
                                                </div>
                                            </li>
                                            <li class="d-flex align-items-center profile-active">
                                                <!-- profile picture end -->
                                                <div class="profile-thumb active">
                                                    <a href="#">
                                                        <figure class="profile-thumb-small">
                                                            <img src="assets/images/profile/profile-small-5.jpg"
                                                                alt="profile picture">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <!-- profile picture end -->

                                                <div class="posted-author">
                                                    <h6 class="author"><a href="profile.html">Robart faul</a></h6>
                                                    <button class="add-frnd">12 mutual friends</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-small mb-0 active-profile-wrapper">
                                <div class="active-profiles-wrapper">
                                    <div class="active-profile-carousel slick-row-20 slick-arrow-style">
                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="assets/images/profile/profile-small-1.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small">
                                                        <img src="assets/images/profile/profile-small-1.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small">
                                                        <img src="assets/images/profile/profile-small-2.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small">
                                                        <img src="assets/images/profile/profile-small-3.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small">
                                                        <img src="assets/images/profile/profile-small-4.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small">
                                                        <img src="assets/images/profile/profile-small-1.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small">
                                                        <img src="assets/images/profile/profile-small-5.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small">
                                                        <img src="assets/images/profile/profile-small-6.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small">
                                                        <img src="assets/images/profile/profile-small-7.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small">
                                                        <img src="assets/images/profile/profile-small-8.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small">
                                                        <img src="assets/images/profile/profile-small-9.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small">
                                                        <img src="assets/images/profile/profile-small-10.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small">
                                                        <img src="assets/images/profile/profile-small-11.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->
                                    </div>
                                </div>
                            </div>
                            <div class="footer-card position-relative">
                                <div class="live-chat-inner">
                                    <div class="chat-text-field">
                                        <textarea class="live-chat-field custom-scroll"
                                            placeholder="Text Message"></textarea>
                                        <button class="chat-message-send" type="submit" value="submit">
                                            <img src="assets/images/icons/plane.png" alt="">
                                        </button>
                                    </div>
                                    <div class="chat-output-box">
                                        <div class="live-chat-title">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb active">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="assets/images/profile/profile-small-15.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->
                                            <div class="posted-author">
                                                <h6 class="author"><a href="profile.html">Robart Marloyan</a></h6>
                                                <span class="active-pro">active now</span>
                                            </div>
                                            <div class="live-chat-settings ml-auto">
                                                <button class="chat-settings"><i class="flaticon-settings"></i></button>
                                                <button class="close-btn" data-close="chat-output-box"><i
                                                        class="flaticon-cross-out"></i></button>
                                            </div>
                                        </div>
                                        <div class="message-list-inner">
                                            <ul class="message-list custom-scroll">
                                                <li class="text-friends">
                                                    <p>Many desktop publishing packages and web page editors now use
                                                        Lorem Ipsum as their default model text</p>
                                                    <div class="message-time">10 minute ago</div>
                                                </li>
                                                <li class="text-author">
                                                    <p>Many desktop publishing packages and web page editors</p>
                                                    <div class="message-time">5 minute ago</div>
                                                </li>
                                                <li class="text-friends">
                                                    <p>packages and web page editors </p>
                                                    <div class="message-time">2 minute ago</div>
                                                </li>
                                                <li class="text-friends">
                                                    <p>Many desktop publishing packages and web page editors now use
                                                        Lorem Ipsum as their default model text</p>
                                                    <div class="message-time">10 minute ago</div>
                                                </li>
                                                <li class="text-author">
                                                    <p>Many desktop publishing packages and web page editors</p>
                                                    <div class="message-time">5 minute ago</div>
                                                </li>
                                                <li class="text-friends">
                                                    <p>packages and web page editors </p>
                                                    <div class="message-time">2 minute ago</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->
    <!-- footer area start -->
    <footer class="d-block d-lg-none">
        <div class="footer-area reveal-footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-footer-inner d-flex">
                            <div class="mobile-frnd-search">
                                <button class="search-toggle-btn"><i class="flaticon-search"></i></button>
                            </div>
                            <div class="mob-frnd-search-inner">
                                <form class="mob-frnd-search-box d-flex">
                                    <input type="text" placeholder="Search Your Friends" class="mob-frnd-search-field">
                                </form>
                            </div>
                            <div class="card card-small mb-0 active-profile-mob-wrapper">
                                <div class="active-profiles-mob-wrapper slick-row-10">
                                    <div class="active-profile-mobile">
                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="#">
                                                    <figure class="profile-thumb-small profile-active">
                                                        <img src="assets/images/profile/profile-small-1.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small profile-active">
                                                        <img src="assets/images/profile/profile-small-8.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small profile-active">
                                                        <img src="assets/images/profile/profile-small-2.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small profile-active">
                                                        <img src="assets/images/profile/profile-small-3.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small profile-active">
                                                        <img src="assets/images/profile/profile-small-4.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small profile-active">
                                                        <img src="assets/images/profile/profile-small-5.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->

                                        <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="profile-thumb active profile-active">
                                                <a href="javascript:void(0)">
                                                    <figure class="profile-thumb-small profile-active">
                                                        <img src="assets/images/profile/profile-small-9.jpg"
                                                            alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- nice select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- audio video player JS -->
    <script src="assets/js/plugins/plyr.min.js"></script>
    <!-- perfect scrollbar js -->
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!-- light gallery js -->
    <script src="assets/js/plugins/lightgallery-all.min.js"></script>
    <!-- image loaded js -->
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- isotope filter js -->
    <script src="assets/js/plugins/isotope.pkgd.min.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>