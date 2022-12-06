<?php
$id = $_GET['id'];
include_once "functions/database.php";
$connect = config();
if (isset($_POST['exit'])) {
    header("location: dashboard.php?m=index&p=index");
}
$showData = $connect->prepare("SELECT * FROM products WHERE id = ?");
$showData->bindParam(1 , $id);
$showData->execute();
$showIt = $showData->fetchAll(PDO::FETCH_OBJ);
foreach ($showIt as $row):
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    if ( $_FILES['image']['name'] != '') {
        if ( file_exists($_FILES['image']['tmp_name']) ) {
            $filename = $_FILES['image']['name'];
            $path = 'productImages/' . $name . '/' . $filename;
            if (!is_dir($name)) {
                mkdir('productImages/' . $name);
            }
            move_uploaded_file($_FILES['image']['tmp_name'] , $path);
        }

    } else {
        $path = $row->image;
    }
    $result = $connect->prepare("UPDATE products SET name = ? , slug = ? , category = ? , count = ? , status = ? , price = ? , image = ? , description = ?");
    $result->bindParam(1 , $name);
    $result->bindParam(2 , $slug);
    $result->bindParam(3 , $category);
    $result->bindParam(4 , $amount);
    $result->bindParam(5 , $status);
    $result->bindParam(6 , $price);
    $result->bindParam(7 , $path);
    $result->bindParam(8 , $description);
    $result->execute();
    header("location: dashboard.php?m=products&p=edit&done");
}

?>
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0" style="font-size: 14pt; font-weight: bold;">ویرایش <?php echo "<strong>$row->name</strong>"; ?></h4>
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

                    <h4 class="mt-0 header-title">ویرایش محصول</h4>
                    <?php
                    if (isset($_GET['done'])):
                        ?>
                        <div class="alert alert-success mb-5" role="alert">
                            <strong>اطلاعات محصول موردنظر با موفقیت بروزرسانی شد!</strong>
                        </div>
                    <?php
                    endif;
                    ?>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">نام محصول</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="نام محصول را در اینجا وارد کنید" id="example-text-input" name="name" value="<?php echo $row->name; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">آدرس URL محصول</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="URL محصول را وارد کنید" id="example-text-input" name="slug" value="<?php echo $row->slug; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تعداد محصول</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="amount">
                                <?php
                                for ($i = 0; $i <= 10000; $i++) {
                                    echo "<option>$i</option>";
                                }
                                ?>

                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">انتخاب دسته‌بندی</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="category">
                                <option selected value="test">دسته‌بندی موردنظر خودتان را انتخاب کنید</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">وضعیت</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status">
                                <option value="1">فعال</option>
                                <option value="0">غیرفعال</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">قیمت محصول</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="قیمت محصول را در اینجا وارد کنید" id="example-text-input" name="price" value="<?php echo $row->price; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">



                                    <textarea style="width: 1175px; height: 200px;" name="description"><?php echo $row->description; ?></textarea>


                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <div class="form-group row">
                        <label for="example-file-input" class="col-sm-1 col-form-label">تصویر محصول</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="example-text-input" name="image">
                            <img src="<?php echo $row->image; ?>" height="50px" width="50px" style="border-radius: 50px;">
                        </div>
                    </div>


                    <button type="submit" name="btn" class="btn btn-success waves-effect waves-light">ویرایش محصول</button>
                    <button type="reset" class="btn btn-warning waves-effect waves-light">بازنشانی اطلاعات</button>
                    <button type="submit" name="exit" class="btn btn-danger waves-effect waves-light" >انصراف</button>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <?php
        endforeach;
    ?>
</form>