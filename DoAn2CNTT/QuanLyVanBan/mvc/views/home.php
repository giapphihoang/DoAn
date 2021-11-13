<?php
    $title = "Văn bản";
    require_once("pages/header.php");
    $bc = array(
        "link" => ["/home"=>"Trang chủ"],
    );
    require_once("pages/breadcrumbs.php");
    $action = '/view/';
    ?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"><?php echo $title;?></strong>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" class="row">
                            <div class="form-group col-sm-4">
                                <label for="category" class="form-control-label">Loại văn bản</label>
                                <select name="category" class="form-control">
                                    echo '<option value="all" selected="selected">Tất cả</option>';
                                <?php
                                    foreach ($data['categorys'] as $category) {
                                        echo '<option value="'.$category['id'].'">'.$category['category'].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="ngaybatdau" class="form-control-label">Ngày bắt đầu</label>
                                <input type="date" id="ngaybatdau" name="ngaybatdau" value=""  class="form-control">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="ngayketthuc" class="form-control-label">Ngày kết thúc</label>
                                    <input type="date" id="ngayketthuc" name="ngayketthuc" value=""  class="form-control">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="ngayky" class="form-control-label">Ngày ký văn bản</label>
                                    <input type="date" id="ngayky" name="ngayky" value=""  class="form-control">
                            </div>
                            <div class="form-group col-sm-2">
                                <button type="submit" class="btn btn-primary btn-md mt-4" style="white-space: normal;"><i class="fa fa-glass"></i> Lọc</button>
                            </div>
                        </form>
                        <!-- văn bản -->
                        <?php
                        if (count($data['post'])>0) {
                            ?>
                            <div class="card-body">
                            <?php
                                require_once('pages/listPost.php'); ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once("pages/footer.php");
?>