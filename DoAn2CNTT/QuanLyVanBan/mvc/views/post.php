<?php
    define("BBCODE", "bbcode");
    $_SESSION["secret"] = md5(rand(1, 100));
    $title = "Đăng văn bản";
    require_once("pages/header.php");
    $bc = array(
        "link" => ["/home"=>"Trang chủ"],
        "active" => "Đăng văn bản"
    );
    require_once("pages/breadcrumbs.php");
?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <strong>Đăng văn bản</strong>
                    </div>
                    <div class="card-body card-block">
                    <?php
                        if ($data['error']!=null) {
                            $error = $data['error'];
                            $show = array(
                                "success"=>"Đã đăng văn bản",
                                "fail"=>"văn bản chưa được đăng",
                                "title"=>"Tiêu đề không hợp lệ",
                                "category"=>"Loại văn bản không hợp lệ"
                            );
                            echo '<div class="alert alert-danger alert-dismissible fade show">
                                <strong>'.$show[$error].'!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                        }
                        ?>
                        <form action="" method="post" class="form-horizontal" id="frm">
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="title" class="form-control-label">Tiêu đề</label>
                                </div>
                                <div class="col col-md-10">
                                    <input type="text" id="title" name="title" value="" placeholder="Nhập tiêu đề văn bản" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="code" class="form-control-label">Mã số hiệu</label>
                                </div>
                                <div class="col col-md-10">
                                    <input type="text" id="code" name="code" value="" placeholder="Nhập mã số hiệu" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="content" class="form-control-label">Nội
                                        dung</label>
                                </div>
                                <div class="col col-md-10">
                                    <textarea name="content" id="content" rows="15" placeholder="Nhập nội dung..."
                                        class="form-control"></textarea>
                                    </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="description" class="form-control-label">Trích
                                        yếu</label>
                                </div>
                                <div class="col col-md-10">
                                    <textarea id="description" name="description" rows="6" placeholder="Nhập trích yếu..." class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="category" class="form-control-label">Loại văn
                                        bản</label>
                                </div>
                                <div class="col col-md-10">
                                    <select name="category" id="category" class="form-control">
                                        <?php
                                        foreach ($data['category'] as $row) {
                                            echo '<option value="'.$row['id'].'"';
                                            echo '>'.$row['category'].'</option>';
                                        }
                                        ?>
                                    </select> </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label class="form-control-label" id="date">Ngày ký văn bản</label>
                                </div>
                                <div class="col col-md-10">
                                    <input type="date" class="form-control" name="date_of_signature" id="date">
                                </div>
                            </div>
                            <input type="hidden" name="secret" value="<?php echo $_SESSION['secret'];?>">
                        </form>
                        <form action="<?php echo $config->domain;?>/ajax/upload" method="post" enctype="multipart/form-data" id="formUpload">
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="file" class="form-control-label">Tải lên</label>
                                </div>
                                <div class="col col-md-10">
                                    <div class="progress mb-2" style="display:none;">
                                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated">0%</div>
                                    </div>
                                    <div class="output alert alert-danger alert-dismissible fade show" style="display:none;">
                                        <strong>Lỗi! Không thể tải lên lúc này.</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                    <input type="file" id="file" name="file[]" multiple="true" class="fileupload form-control-file">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm" form="frm">
                            <i class="fa fa-save"></i> Xác nhận
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm" form="frm">
                            <i class="fa fa-ban"></i> Soạn lại
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once("pages/footer.php");
?>
