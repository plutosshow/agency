<?php
//require_once "php/conect.php"
?>
<html lang="en">
<head>
    <title>Real Estate Agency</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href=" {{ url('bootstrap/dist/css/bootstrap.min.css') }} " rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    {{--    <link rel="stylesheet" href="fonts/icomoon/style.css">--}}
    {{--    <link rel="stylesheet" href="css/magnific-popup.css">--}}
    {{--    <link rel="stylesheet" href="css/jquery-ui.css">--}}
    {{--    <link rel="stylesheet" href="css/owl.carousel.min.css">--}}
    {{--    <link rel="stylesheet" href="css/owl.theme.default.min.css">--}}
    {{--    <link rel="stylesheet" href="css/bootstrap-datepicker.css">--}}
    {{--    <link rel="stylesheet" href="css/mediaelementplayer.css">--}}
    {{--    <link rel="stylesheet" href="css/animate.css">--}}
    {{--    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">--}}
    {{--    <link rel="stylesheet" href="css/fl-bigmug-line.css">--}}
    {{--    <link rel="stylesheet" href="css/aos.css">--}}
    {{--    <link rel="stylesheet" href="css/style.css">--}}

</head>
<body>

<div class="site-loader"></div>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="border-bottom bg-white top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-6">
                    <p class="mb-0">
                        <a href="#" class="mr-3"><span class="text-black fl-bigmug-line-phone351"></span> <span class="d-none d-md-inline-block ml-2">+ 7 953 188 18 44</span></a>
                        <a href="#"><span class="text-black fl-bigmug-line-email64"></span> <span class="d-none d-md-inline-block ml-2">plutosshow@gmail.com</span></a>
                    </p>
                </div>
                <div class="col-6 col-md-6 text-right">
                    <!--<a href="#" class="mr-3">Log in</a>-->
                    <!--<a href="#" class="mr-3">Registration</span></a>-->
                </div>
            </div>
        </div>

    </div>
    <div class="site-navbar">
        <div class="container py-1">
            <div class="row align-items-center">
                <div class="col-8 col-md-8 col-lg-4">
                    <h1 class=""><a href="index.php" class="h5 text-uppercase text-black"><strong>HomeSpace<span class="text-danger">.</span></strong></a></h1>
                </div>
                <div class="col-4 col-md-4 col-lg-8">
                    <nav class="site-navigation text-right text-md-right" role="navigation">

                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class="active">
                                <a href="index.php">Главная</a>
                            </li>
                            <li class="has-children">
                               <a href="properties.html">Возможности</a>
                               <ul class="dropdown">
                                 <li><a href="#">Покупка</a></li>
                                 <li><a href="#">Продажа</a></li>
                               </ul>
                             </li>
                            <li><a href="admin.php">Админ панель</a></li>
                        </ul>
                    </nav>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <form class="row mb-5">

            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="Lived_square" id="offer-types" class="form-control d-block rounded-0" name="">
                        <option value="">Жилая площадь</option>
                        <option value="110">>110</option>
                        <option value="80">80-110</option>
                        <option value="50">50-80</option>
                        <option value="20"><50</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="Common_square" id="offer-types" class="form-control d-block rounded-0" >
                        <option value="">Общая площадь</option>
                        <option value="110">>110</option>
                        <option value="80">80-110</option>
                        <option value="50">50-80</option>
                        <option value="20"><50</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="Adress" id="offer-types" class="form-control d-block rounded-0">
                        <option value="">Адресс</option>
                        <?php
                                               $result=mysqli_query($conn, "SELECT DISTINCT Region FROM `Flats`;");
                                               while($row = mysqli_fetch_array($result)){
                                                   $Region=$row['Region'];
                                                   echo '<option value="'.$Region.'">'.$Region.'</option>';
                                               }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="Number_of_rooms" id="offer-types" class="form-control d-block rounded-0">
                        <option value="">Количество комнат</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5+</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="mb-4">
                    <label>Цена от</label>
                    <input type="year" class="form-control" name="Price_min" placeholder="0">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <label>Цена до</label>
                <input type="year" class="form-control" name="Price_max" placeholder="0">
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <label> </label>
                <input type="submit" class="btn btn-primary btn-block form-control-same-height rounded-0" value="Search">
            </div>

        </form>

        <div class="row">
            <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                <div class="feature d-flex align-items-start">
                    <span class="icon mr-3 flaticon-house"></span>
                    <div class="text">
                        <h2 class="mt-0">Большое количество предложений</h2>
                        <p>Недвижимость от бюджетной до элитной.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                <div class="feature d-flex align-items-start">
                    <span class="icon mr-3 flaticon-location"></span>
                    <div class="text">
                        <h2 class="mt-0">Расположение недвижимости</h2>
                        <p>Выбери город, в котором ищешь недвижимость</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section site-section-sm bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="site-section-title">
                    <h2>Последние предложения для вас</h2>
                </div>
            </div>
        </div>
        <div class="row mb-5">

            <?php
                include ("php/main_page_showcase.php");
            ?>

        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="site-pagination">
                    <a href="#" class="active">1</a>
                    <a href="page2.php">2</a>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- Footer -->
<footer class="page-footer font-small special-color-dark pt-4">

    <!-- Footer Elements -->
    <div class="container">

        <!-- Social buttons -->
        <ul class="list-unstyled list-inline text-center">
            <li class="list-inline-item">
                <a class="btn-floating btn-fb mx-1">
                    <i class="fab fa-facebook-f"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-tw mx-1">
                    <i class="fab fa-twitter"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-gplus mx-1">
                    <i class="fab fa-google-plus-g"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-li mx-1">
                    <i class="fab fa-linkedin-in"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-dribbble mx-1">
                    <i class="fab fa-dribbble"> </i>
                </a>
            </li>
        </ul>
        <!-- Social buttons -->

    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="http://121171.defiska.tmweb.ru/121171-15/agency/index.php">Homespace</a>
        by Yuri Shcherba
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/mediaelement-and-player.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>

<script src="js/main.js"></script>

</body>
</html>
