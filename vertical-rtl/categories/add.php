<?php
try {
    include_once "functions/database.php";
    $connect = config();
    if (isset($_POST['exit'])) {
        header("location: dashboard.php?m=categories&p=list&exitdone");
    }
    if (isset($_POST['btn'])) {
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        if ( isset($_FILES['image']) ) {
            if ( file_exists($_FILES['image']['tmp_name']) ) {
                $filename = $_FILES['image']['name'];
                $path = 'categoryImages/' . $name . '/' . $filename;
                if (!is_dir($name)) {
                    mkdir('categoryImages/' . $name);
                }
                move_uploaded_file($_FILES['image']['tmp_name'] , $path);
            }
        }
        $result = $connect->prepare("INSERT INTO category (name , slug , image) VALUES (? , ? , ?)");
        $result->bindParam(1 , $name);
        $result->bindParam(2 , $slug);
        $result->bindParam(3 , $path);
        $result->execute();
        header("location: dashboard.php?m=categories&p=add&done");
    }
} catch (Exception $x) {
    echo $x->getMessage();
}
?>
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">اضافه کردن دسته بندی جدید</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-settings mr-1"></i> تنظیمات
                                </button>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                    <a class="dropdown-item" href="#">عملیات</a>
                                    <a class="dropdown-item" href="#">اقدام دیگر</a>
                                    <a class="dropdown-item" href="#">چیز های دیگر</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">پیوند جدا شده</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title-box -->
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <!--                <h4 class="mt-0 header-title">ورودی های متن</h4>-->
                    <!--                <p class="text-muted m-b-30 font-14">در اینجا نمونه هایی از <code-->
                    <!--                            class="highlighter-rouge">.form-control</code> به هر HTML5 متنی اعمال می شود <code class="highlighter-rouge">&lt;input&gt;</code> <code-->
                    <!--                            class="highlighter-rouge">تایپ</code>.</p>-->
                    <?php
                    if (isset($_GET['done'])):
                        ?>
                        <div class="alert alert-success" role="alert">
                            <strong>دسته بندی موردنظر با موفقیت اضافه شد!</strong>
                        </div>
                    <?php
                    endif;
                    ?>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">نام دسته</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="name" type="text" placeholder="لطفا نام دسته بندی موردنظر خودتان را وارد کنید" id="example-text-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">URL دسته</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="slug" type="text" placeholder="لطفا URL دسته بندی موردنظر را وارد کنید" id="example-text-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-file-input" class="col-sm-1 col-form-label">تصویر دسته بندی</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="example-text-input" name="image">
                        </div>
                    </div>


                    <button type="submit" name="btn" class="btn btn-success waves-effect waves-light">ثبت دسته</button>
                    <button type="reset" class="btn btn-warning waves-effect waves-light">بازنشانی اطلاعات</button>
                    <button type="submit" name="exit" class="btn btn-danger waves-effect waves-light" >انصراف</button>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</form>