<?php
    session_start();
    include_once 'functions/database.php';
    $connect = config();
    try {
        if (isset($_POST['btn'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = $connect->prepare("SELECT * FROM users WHERE username = ?");
            $result->bindParam(1 , $username);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_OBJ);
            if ($row->password == $password) {
                $_SESSION['name'] = $row->name;
                header('location: dashboard.php');
            }
            else {
                header("location: login.php?failed");
            }
        }
    } catch (Exception $x) {
        echo $x->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>صفحه‌ی ورود به سایت</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div>

        <!-- Begin page -->
        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="mdi mdi-home h1"></i></a>
        </div>

        <div class="account-pages">
            
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 offset-lg-1">
                        <div class="text-left">
                            <div>
                                <a href="index.html" class="logo logo-admin"><img src="assets/images/logo_dark.png" height="28" alt="logo"></a>
                            </div>
                            <h5 class="font-14 text-muted mb-4">زینزر - داشبورد ادمین بوت استرپ 4 ریسپانسیو</h5>
                            <p class="text-muted mb-4">یک قالب مدیریتی حرفه ای برای انواع ادمین هایی که میخواهد شرکت و یا تجارت و مشتریان خود  را اداره کنند.</p>

                            <h5 class="font-14 text-muted mb-4">مقررات :</h5>
                            <div>
                                <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>ستفاده از طراحان گرافیک است..</p>
                                <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با ا.</p>
                                <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با ا .</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-2">
                                    <h4 class="text-muted float-right font-18 mt-4">ورود</h4>
                                    <div>
                                        <a href="index.html" class="logo logo-admin"><img src="assets/images/logo_dark.png" height="28" alt="logo"></a>
                                    </div>
                                </div>
        
                                <div class="p-2">
                                    <form class="form-horizontal m-t-20" method="post">
        
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="text" required="" placeholder="نام کاربری" name="username">
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="password" required="" placeholder="رمز عبور" name="password">
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">مرا به خاطر داشته باش</label>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="btn">ورود</button>
                                            </div>
                                        </div>

                                        <?php
                                        if (isset($_GET['failed'])):
                                            ?>
                                            <div class="alert alert-danger mb-0" role="alert">
                                                <strong>اوه! نام کاربری یا رمز عبور رو اشتباه وارد کردی</strong>
                                            </div>
                                        <?php
                                        endif;
                                        ?>

                                        <?php
                                            if (isset($_GET['failed2'])):
                                        ?>
                                        <div class="alert alert-danger mb-0" role="alert">
                                            <strong>برای ورود به پنل مدیریت، اول باید اطلاعات درست رو وارد کنی!</strong>
                                        </div>
                                        <?php
                                            endif;
                                        ?>

                                        <?php
                                            if (isset($_GET['logoutisdone'])):
                                        ?>
                                        <div class="alert alert-success mb-0" role="alert">
                                            <strong>تبریک میگم! خروج از پنل مدیریتی با موفقیت انجام شد</strong>
                                        </div>
                                        <?php
                                            endif;
                                        ?>
        
                                        <div class="form-group m-t-10 mb-0 row">
                                            <div class="col-sm-7 m-t-20">
                                                <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> فراموشی رمز عبور؟</a>
                                            </div>
                                            <div class="col-sm-5 m-t-20">
                                                <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> ایجاد حساب جدید</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

</html>