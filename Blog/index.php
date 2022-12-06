<?php
    session_start();
    include_once "functions/database.php";
    $connect = config();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>صفحه‌ی اصلی قالب وب سایت (تسک آزمایشی گلرن)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="goto-here">

<!--header-->
<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pl-4 d-flex topper align-items-center">
                        <div class="icon ml-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text">02112345678</span>
                    </div>
                    <div class="col-md pl-4 d-flex topper align-items-center">
                        <div class="icon ml-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">email@website.com</span>
                    </div>
                    <?php
                        if (!isset($_SESSION['name'])):
                    ?>
                    <div class="col-md-5 pl-4 d-flex topper align-items-center text-lg-left">
                        <span class="text">خوش اومدی کاربر برای ورود <a href="../vertical-rtl/login.php" style="color: red;">کلیک</a> کن</span>
                    </div>
                    <?php
                        endif;
                    ?>
                    <?php
                        if (isset($_SESSION['name'])):
                    ?>
                    <div class="col-md-5 pl-4 d-flex topper align-items-center text-lg-left">
                        <span class="text">خوش اومدی  <?php echo $_SESSION['name']; ?></span>
                    </div>
                    <?php
                        endif;
                    ?>
                    <?php
                        if (isset($_SESSION['name'])):
                    ?>
                    <div class="col-md-2 pl-4 d-flex topper align-items-center text-lg-left">
                        <a href="logout.php"><button type="submit" name="exit" class="btn btn-danger waves-effect waves-light">خروج از حساب کاربری</button></a>
                    </div>
                    <?php
                        endif;
                    ?>
                    <?php
                        if (!isset($_SESSION['name'])):
                    ?>
                            <div class="col-md-2 pl-4 d-flex topper align-items-center text-lg-left">
                                <a href="../vertical-rtl/login.php"><button type="submit" name="exit" class="btn btn-outline-primary waves-effect waves-light">ورود از حساب کاربری</button></a>
                            </div>
                    <?php
                        endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!--header-->

<!--Start Nav-->

<form method="post">
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">تسک گلرن (تست)</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> منو
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.php" class="nav-link">خانه</a></li>
                <?php
                $result = $connect->prepare("SELECT * FROM category");
                $result->execute();
                $showCategories = $result->fetchAll(PDO::FETCH_OBJ);
                foreach ($showCategories as $items):
                ?>
                <li class="nav-item"><a href="<?php echo $items->slug . ".php"; ?>" class="nav-link"><?php echo $items->name; ?></a></li>
                <?php
                endforeach;
                ?>
            </ul>
        </div>
    </div>
</nav>

<!-- END nav -->

<!--Start Slider-->
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(pics/bg_1.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-12 ftco-animate text-center">
                        <h1 class="mb-2">تهیه میوه و سبزیجات تازه</h1>
                        <h2 class="subheading mb-4">میوه و سبزیجات ارگانیک</h2>
                        <p><a href="#" class="btn btn-primary">مشاهده جزییات</a></p>
                    </div>

                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url(pics/bg_2.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-sm-12 ftco-animate text-center">
                        <h1 class="mb-2">میوه های 100 درصد تازه و ارگانیک</h1>
                        <h2 class="subheading mb-4">تهیه میوه و سبزیجات ارگانیک</h2>
                        <p><a href="#" class="btn btn-primary">مشاهده جزییات</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--End Slider-->

<!--Tozihat-->
<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters ftco-services">
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-shipped"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">ارسال رایگان</h3>
                        <span>برای سفارش های بالای 100 هزارتومان</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-diet"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">تازگی محصولات</h3>
                        <span>بسته بندی مناسب</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-award"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">کیفیت برتر</h3>
                        <span>محصولات با کیفیت</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-customer-service"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">پشتیبانی</h3>
                        <span>پشتیبانی 24 ساعته</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Tozihat-->

<section class="ftco-section ftco-category ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 order-md-last align-items-stretch d-flex">
                        <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex"
                             style="background-image: url(pics/category.jpg);">
                            <div class="text text-center">
                                <h2>سبزیجات</h2>
                                <p>حفاظت از سلامت هر خانه</p>
                                <p><a href="#" class="btn btn-primary">خرید آنی</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                             style="background-image: url(pics/category-1.jpg);">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="#">سرزمین میوه</a></h2>
                            </div>
                        </div>
                        <div class="category-wrap ftco-animate img d-flex align-items-end"
                             style="background-image: url(pics/category-2.jpg);">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="#">توت فرنگی</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                     style="background-image: url(pics/category-3.jpg);">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#">آب میوه های طبیعی</a></h2>
                    </div>
                </div>
                <div class="category-wrap ftco-animate img d-flex align-items-end"
                     style="background-image: url(pics/category-4.jpg);">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#">میوه خشک</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading"> انتخاب هوشمند محصولات ارگانیک</span>
                <h2 class="mb-4">سرزمین میوه</h2>
                <p>پیشنهاد ما به شما</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $products = $connect->prepare("SELECT * FROM products WHERE status = '1'");
            $products->execute();
            $showProducts = $products->fetchAll(PDO::FETCH_OBJ);
            foreach ($showProducts as $row):
                ?>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="<?php echo $row->slug . ".php"; ?>" class="img-prod"><img class="img-fluid" src="<?php echo "../vertical-rtl/" . $row->image; ?>" alt="Colorlib Template">
                        <span class="status">30%</span>
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#"><?php echo $row->name; ?></a></h3>
                        <div class="d-flex">
                            <span class="description"><?php echo $row->description; ?></span>
                            <div class="pricing">
                                <p class="price">
                                    <span class="price-sale"> <?php echo $row->price; ?></span>
                                    <span class="price-sale"> تومان</span>
                                </p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="#"
                                   class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                    <span><i class="ion-ios-heart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                endforeach;
            ?>
<!--            <div class="col-md-6 col-lg-3 ftco-animate">-->
<!--                <div class="product">-->
<!--                    <a href="#" class="img-prod"><img class="img-fluid" src="pics/product-2.jpg" alt="Colorlib Template">-->
<!--                        <div class="overlay"></div>-->
<!--                    </a>-->
<!--                    <div class="text py-3 pb-4 px-3 text-center">-->
<!--                        <h3><a href="#"> توت فرنگی</a></h3>-->
<!--                        <div class="d-flex">-->
<!--                            <div class="pricing">-->
<!--                                <p class="price">-->
<!--                                    <span> 120.00</span>-->
<!--                                    <span> تومان</span>-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="bottom-area d-flex px-3">-->
<!--                            <div class="m-auto d-flex">-->
<!--                                <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">-->
<!--                                    <span><i class="ion-ios-menu"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">-->
<!--                                    <span><i class="ion-ios-cart"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="heart d-flex justify-content-center align-items-center ">-->
<!--                                    <span><i class="ion-ios-heart"></i></span>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6 col-lg-3 ftco-animate">-->
<!--                <div class="product">-->
<!--                    <a href="#" class="img-prod"><img class="img-fluid" src="pics/product-3.jpg" alt="Colorlib Template">-->
<!--                        <div class="overlay"></div>-->
<!--                    </a>-->
<!--                    <div class="text py-3 pb-4 px-3 text-center">-->
<!--                        <h3><a href="#">لوبیا سبز</a></h3>-->
<!--                        <div class="d-flex">-->
<!--                            <div class="pricing">-->
<!--                                <p class="price">-->
<!--                                    <span> 120.00</span>-->
<!--                                    <span> تومان</span>-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="bottom-area d-flex px-3">-->
<!--                            <div class="m-auto d-flex">-->
<!--                                <a href="#"-->
<!--                                   class="add-to-cart d-flex justify-content-center align-items-center text-center">-->
<!--                                    <span><i class="ion-ios-menu"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">-->
<!--                                    <span><i class="ion-ios-cart"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="heart d-flex justify-content-center align-items-center ">-->
<!--                                    <span><i class="ion-ios-heart"></i></span>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6 col-lg-3 ftco-animate">-->
<!--                <div class="product">-->
<!--                    <a href="#" class="img-prod"><img class="img-fluid" src="pics/product-4.jpg" alt="Colorlib Template">-->
<!--                        <div class="overlay"></div>-->
<!--                    </a>-->
<!--                    <div class="text py-3 pb-4 px-3 text-center">-->
<!--                        <h3><a href="#">کلم بنفش</a></h3>-->
<!--                        <div class="d-flex">-->
<!--                            <div class="pricing">-->
<!--                                <p class="price">-->
<!--                                    <span>120.00</span>-->
<!--                                    <span> تومان</span>-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="bottom-area d-flex px-3">-->
<!--                            <div class="m-auto d-flex">-->
<!--                                <a href="#"-->
<!--                                   class="add-to-cart d-flex justify-content-center align-items-center text-center">-->
<!--                                    <span><i class="ion-ios-menu"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">-->
<!--                                    <span><i class="ion-ios-cart"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="heart d-flex justify-content-center align-items-center ">-->
<!--                                    <span><i class="ion-ios-heart"></i></span>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-md-6 col-lg-3 ftco-animate">-->
<!--                <div class="product">-->
<!--                    <a href="#" class="img-prod"><img class="img-fluid" src="pics/product-5.jpg"-->
<!--                                                      alt="Colorlib Template">-->
<!--                        <span class="status">30%</span>-->
<!--                        <div class="overlay"></div>-->
<!--                    </a>-->
<!--                    <div class="text py-3 pb-4 px-3 text-center">-->
<!--                        <h3><a href="#">گوجه فرنگی</a></h3>-->
<!--                        <div class="d-flex">-->
<!--                            <div class="pricing">-->
<!--                                <p class="price">-->
<!--                                    <span class="mr-2 price-dc"> 120.00</span>-->
<!--                                    <span class="price-dc"> تومان</span>-->
<!--                                    <span class="price-sale"> 80.00</span>-->
<!--                                    <span class="price-sale"> تومان</span>-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="bottom-area d-flex px-3">-->
<!--                            <div class="m-auto d-flex">-->
<!--                                <a href="#"-->
<!--                                   class="add-to-cart d-flex justify-content-center align-items-center text-center">-->
<!--                                    <span><i class="ion-ios-menu"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">-->
<!--                                    <span><i class="ion-ios-cart"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="heart d-flex justify-content-center align-items-center ">-->
<!--                                    <span><i class="ion-ios-heart"></i></span>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6 col-lg-3 ftco-animate">-->
<!--                <div class="product">-->
<!--                    <a href="#" class="img-prod"><img class="img-fluid" src="pics/product-6.jpg" alt="Colorlib Template">-->
<!--                        <div class="overlay"></div>-->
<!--                    </a>-->
<!--                    <div class="text py-3 pb-4 px-3 text-center">-->
<!--                        <h3><a href="#">کلم بروکلی</a></h3>-->
<!--                        <div class="d-flex">-->
<!--                            <div class="pricing">-->
<!--                                <p class="price">-->
<!--                                    <span>120.00</span>-->
<!--                                    <span> تومان</span>-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="bottom-area d-flex px-3">-->
<!--                            <div class="m-auto d-flex">-->
<!--                                <a href="#"-->
<!--                                   class="add-to-cart d-flex justify-content-center align-items-center text-center">-->
<!--                                    <span><i class="ion-ios-menu"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">-->
<!--                                    <span><i class="ion-ios-cart"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="heart d-flex justify-content-center align-items-center ">-->
<!--                                    <span><i class="ion-ios-heart"></i></span>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6 col-lg-3 ftco-animate">-->
<!--                <div class="product">-->
<!--                    <a href="#" class="img-prod"><img class="img-fluid" src="pics/product-7.jpg" alt="Colorlib Template">-->
<!--                        <div class="overlay"></div>-->
<!--                    </a>-->
<!--                    <div class="text py-3 pb-4 px-3 text-center">-->
<!--                        <h3><a href="#">هویج</a></h3>-->
<!--                        <div class="d-flex">-->
<!--                            <div class="pricing">-->
<!--                                <p class="price">-->
<!--                                    <span> 120.00</span>-->
<!--                                    <span> تومان</span>-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="bottom-area d-flex px-3">-->
<!--                            <div class="m-auto d-flex">-->
<!--                                <a href="#"-->
<!--                                   class="add-to-cart d-flex justify-content-center align-items-center text-center">-->
<!--                                    <span><i class="ion-ios-menu"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">-->
<!--                                    <span><i class="ion-ios-cart"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="heart d-flex justify-content-center align-items-center ">-->
<!--                                    <span><i class="ion-ios-heart"></i></span>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6 col-lg-3 ftco-animate">-->
<!--                <div class="product">-->
<!--                    <a href="#" class="img-prod"><img class="img-fluid" src="pics/product-8.jpg"-->
<!--                                                      alt="Colorlib Template">-->
<!--                        <div class="overlay"></div>-->
<!--                    </a>-->
<!--                    <div class="text py-3 pb-4 px-3 text-center">-->
<!--                        <h3><a href="#">آبمیوه های طبیعی</a></h3>-->
<!--                        <div class="d-flex">-->
<!--                            <div class="pricing">-->
<!--                                <p class="price">-->
<!--                                    <span> 120.00</span>-->
<!--                                    <span> تومان</span>-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="bottom-area d-flex px-3">-->
<!--                            <div class="m-auto d-flex">-->
<!--                                <a href="#"-->
<!--                                   class="add-to-cart d-flex justify-content-center align-items-center text-center">-->
<!--                                    <span><i class="ion-ios-menu"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">-->
<!--                                    <span><i class="ion-ios-cart"></i></span>-->
<!--                                </a>-->
<!--                                <a href="#" class="heart d-flex justify-content-center align-items-center ">-->
<!--                                    <span><i class="ion-ios-heart"></i></span>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</section>

<section class="ftco-section img" style="background-image: url(pics/bg_3.jpg);">
    <div class="container">
        <div class="row justify-content-first">
            <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                <span class="subheading">بهترین قیمت</span>
                <h2 class="mb-4">فروش روز</h2>
                <p>سبد ارگانیک مخصوص شما</p>
                <h3><a href="#">اسفناج</a></h3>
                <span class="price"> 10 هزار تومان <a href="#">هم اکنون 5 هزارتومان</a></span>
                <div id="timer" class="d-flex mt-5 ">
                    <div class="time pr-4" id="days"></div>
                    <div class="time pr-4" id="hours"></div>
                    <div class="time pr-4" id="minutes"></div>
                    <div class="time pr-4" id="seconds"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--nazar Sanji-->
<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">تجربه خرید</span>
                <h2 class="mb-4">رضایت مشتری</h2>
                <p>تجربه خرید خود را با دیگران در میان بگذارید</p>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(pics/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">بسار تمیز و منصافانه</p>
                                <p class="name">محمد معدلی</p>
                                <span class="position">بسه بندی مناسب</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(pics/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">کیفیت منحصر </p>
                                <p class="name">رضا دل آرام</p>
                                <span class="position">طراحی کلی</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(pics/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">سلامتی حق شماست</p>
                                <p class="name">آرین میرزایی</p>
                                <span class="position">طراح</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(pics/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">کیفیت اتفاقی نیست</p>
                                <p class="name">محمد نجات پور</p>
                                <span class="position">توسعه دهنده وب</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(pics/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">تغییر مسیر زندگی</p>
                                <p class="name">علی رضایی</p>
                                <span class="position">آنالیز سیستم</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Nazarsanji-->
<hr>

<section class="ftco-section ftco-partner">
    <div class="container">
        <div class="row">
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="pics/partner-1.png" class="img-fluid"
                                                 alt="Colorlib Template"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="pics/partner-2.png" class="img-fluid"
                                                 alt="Colorlib Template"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="pics/partner-3.png" class="img-fluid"
                                                 alt="Colorlib Template"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="pics/partner-4.png" class="img-fluid"
                                                 alt="Colorlib Template"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="pics/partner-5.png" class="img-fluid"
                                                 alt="Colorlib Template"></a>
            </div>
        </div>
    </div>
</section>

<!--Start Subscribe-->
<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">مشترک شدن در خبرنامه ما</h2>
                <span>دریافت ایمیل درباره آخرین مغازه ها و پیشنهادات ویژه</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control" placeholder="ایمیل آدرس خود را وارد کنید">
                        <input type="submit" value="اشتراک" class="submit px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--End Subscribe-->

<!--Start Footer-->
<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row">
            <div class="mouse">
                <a href="#" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                </a>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">غذاهای گیاهی</h2>
                    <p>یکی از بهترین راهها انتخاب درست مسیر زندگی هست با ما بسلامتی خود اهمیت بدین</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">منو</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">خرید</a></li>
                        <li><a href="#" class="py-2 d-block">درباره ی ما </a></li>
                        <li><a href="#" class="py-2 d-block">کاتالوگ</a></li>
                        <li><a href="#" class="py-2 d-block">ارتباط با ما</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">سوالی هست؟</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li><a href="#" class="py-2 d-block">اطلاعات حمل و نقل</a></li>
                            <li><a href="#" class="py-2 d-block">شرایط بازگشت و تعویض</a></li>
                            <li><a href="#" class="py-2 d-block">شرایط و ضوابط</a></li>
                            <li><a href="#" class="py-2 d-block">سیاست حفظ حریم خصوصی</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">وب روبیک</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">ایران - شیراز - بلوار جمهوری</span>
                            </li>
                            <li><a href="#"><span class="icon icon-phone"></span><span
                                    class="text">02112345678</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">email@website.com</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="copyright">
                    <!-- Link back to webrubik can't be removed.  -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made by <a href="https://colorlib.com/" target="_blank">colorlib</a></br>
                    فارسی و راست چین شده &copy توسط حمید معلمی <i class="icon-heart text-danger" aria-hidden="true"></i>
                    از اعضای تیم <a href="https://webrubik.com/" target="_blank"> وب روبیک</a>
                    <!-- Link back to webrubik can't be removed.  -->
                </p>
            </div>
        </div>
    </div>
</footer>
<!--End Footer-->

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>
</form>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>