<?php
    define("BBCODE", "bbcode");
    $_SESSION["secret"] = md5(rand(1, 100));
    $post = mysqli_fetch_assoc($data["post"]);
    $title = $post['title'];
    include_once("pages/header.php");
    $bc = array(
        "link" => ["/home"=>"Trang chủ"],
        "active" => "Sửa văn bản"
    );
    include_once("pages/breadcrumbs.php");
?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <strong>Sửa văn bản</strong>
                        <?php
                            if (isset($_SESSION['user'])) {
                                echo '<span class="badge badge-light pull-right p-2"><a href="';
                                if (isset($_POST['callbackurl'])) {
                                    echo htmlentities($_POST['callbackurl']);
                                } else {
                                    echo @$_SERVER['HTTP_REFERER'];
                                }
                                echo '">Thoát chỉnh sửa</a> </span>';
                            }
                        ?>
                    </div>
                    <div class="card-body card-block">
                        <?php
                        if ($data['error']!=null) {
                            $error = $data['error'];
                            $show = array(
                                "success"=>"Đã chỉnh sửa",
                                "fail"=>"Không thể chỉnh sửa lúc này",
                                "title"=>"Tiêu đề không hợp lệ",
                                "category"=>"Loại văn bản không hợp lệ"
                            );
                            $alert = ($error=='success') ? 'success' : 'danger';
                            echo '<div class="alert alert-'.$alert.' alert-dismissible fade show">
                                <strong>'.$show[$error].'!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                        }
                        ?>
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" id="frm">
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="attribute" class="form-control-label">Thuộc tính</label>
                                </div>
                                <div class="col col-md-10">
                                    <select name="attribute" id="attribute" class="form-control">
                                        <option value="hidden"<?php if ($post['delete_at'] != null) {
                            echo ' selected="selected"';
                        }?>>Ẩn văn bản</option>
                                        <option value="show"<?php if ($post['delete_at'] == null) {
                            echo ' selected="selected"';
                        }?>>Hiển thị văn bản</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="title" class="form-control-label">* Tiêu đề</label>
                                </div>
                                <div class="col col-md-10">
                                    <input type="text" required="required" id="title" name="title" value="<?php echo $post['title'];?>"
                                        placeholder="Nhập tiêu đề văn bản" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="code" class="form-control-label">Mã số
                                        hiệu</label>
                                </div>
                                <div class="col col-md-10">
                                    <input type="text" id="code" name="code" value="<?php echo $post['code'];?>"
                                        placeholder="Nhập mã số hiệu" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="content" class="form-control-label">Nội
                                        dung</label>
                                </div>
                                <div class="col col-md-10">
                                    <textarea name="content" id="content" rows="15"
                                        placeholder="Nhập nội dung..."
                                        class="form-control"><?php echo $post['content'];?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="description" class="form-control-label">Trích
                                        yếu</label>
                                </div>
                                <div class="col col-md-10">
                                    <textarea name="description" id="description" rows="6"
                                        placeholder="Nhập trích yếu..."
                                        class="form-control"><?php echo $post['description'];?></textarea>
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
                                            if ($post['category']==$row['id']) {
                                                echo ' selected="selected"';
                                            }
                                            echo '>'.$row['category'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label class="form-control-label" for="date">Ngày ký văn bản</label>
                                </div>
                                <div class="col col-md-10">
                                    <input type="date" class="form-control" name="date_of_signature" id="date"
                                        value="<?php echo $post['date_of_signature'];?>">
                                </div>
                            </div>
                            <?php
                            if (mysqli_num_rows($data['files'])>0) {
                                echo '
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="file-multiple-input" class="form-control-label">Xoá tệp tin</label>
                                    </div>
                                    <div class="col col-md-10">
                                        <div class="form-check">';
                                while ($file = mysqli_fetch_array($data['files'])) {
                                    echo '
                                            <div class="checkbox">
                                                <label for="checkbox'.$file['idf'].'" class="form-check-label">
                                                    <input type="checkbox" id="checkbox'.$file['idf'].'" name="delete_file[]" value="'.$file['idf'].'" class="form-check-input">'.$file['name'].'
                                                </label>
                                            </div>';
                                }
                                echo '
                                        </div>
                                    </div>
                                </div>';
                            }?>
                            <input type="hidden" name="secret" value="<?php echo $_SESSION['secret'];?>">
                            <input type="hidden" name="callbackurl" value="<?php if (isset($_POST['callbackurl'])) {
                                echo htmlentities($_POST['callbackurl']);
                            } else {
                                echo @$_SERVER['HTTP_REFERER'];
                            }?>">
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
                        <button form="frm" type="submit" class="btn btn-primary btn-md">
                            <i class="fa fa-save"></i> Xác nhận
                        </button>
                        <button form="frm" type="reset" class="btn btn-danger btn-md">
                            <i class="fa fa-ban"></i> Soạn lại
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include_once("pages/footer.php");
?>