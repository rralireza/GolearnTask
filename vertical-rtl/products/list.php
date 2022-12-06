<?php
    include_once "functions/database.php";
    $connect = config();
?>
<div class="row">
    <div class="col-lg-14">
        <div class="card m-b-35">
            <div class="card-body">

                <!--                <h4 class="mt-0 header-title">گزینه های جدول</h4>-->
                <!--                <p class="text-muted m-b-30">از یکی از دو کلاس اصلاح کننده استفاده کنید-->
                <!--                    <code>&lt;thead&gt;</code>به نظر می رسد نور یا خاکستری تیره.-->
                <!--                </p>-->
                <h3 class="mt-4 header-title">صفحه‌ی مدیریت نوشته‌ها</h3>
                <p>در این قسمت می‌توانید نوشته‌های خودتان را مدیریت کنید. به طور کلی در این بخش می‌توان تمامی مطالب ثبت شده را مشاهده و همچنین، نوشته‌های قبلی را در صورت تمایل، ویرایش یا حذف کرد.</p>
                <?php
                    if (isset($_GET['deletedone'])):
                ?>
                <div class="alert alert-success" role="alert">
                    <strong>محصول مورد نظر با موفقیت حذف شد!</strong>
                </div>
                <?php
                    endif;
                ?>
                <div class="table-responsive">
                    <table class="table mb-3">
                        <thead class="thead-default">
                        <tr>
                            <th>نام</th>
                            <th>آدرس URL</th>
                            <th>تعداد</th>
                            <th>دسته بندی</th>
                            <th>وضعیت</th>
                            <th>قیمت</th>
                            <th>توضیحات</th>
                            <th>تصویر</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $result = $connect->prepare("SELECT * FROM products");
                                $result->execute();
                                $items = $result->fetchAll(PDO::FETCH_OBJ);
                                foreach ($items as $row):
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row->name; ?></th>
                                <td><?php echo $row->slug; ?></td>
                                <td><?php echo $row->count; ?></td>
                                <td><?php echo $row->category; ?></td>
                                <td><?php if ($row->status == 0) {echo "غیرفعال";} elseif ($row->status == 1) {echo "فعال";} ?></td>
                                <td><?php echo $row->price; ?></td>
                                <td><?php echo $row->description; ?></td>
                                <td><img src="<?php echo $row->image; ?>" width="100px" height="50px"></td>
                                <td><a href="dashboard.php?m=products&p=edit&id=<?php echo $row->id; ?>" class="btn btn-warning btn-xs"><i class="mdi mdi-pencil-outline"></i></a></td>
                                <td><a href="dashboard.php?m=products&p=delete&id=<?php echo $row->id; ?>" class="btn btn-danger btn-xs"><i class="mdi mdi-delete"></i></a></td>
                                </tr>
                        <?php
                            endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->