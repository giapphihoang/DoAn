<?php
    $title = "Thông tin cá nhân";
    require_once("pages/header.php");
    $profile = mysqli_fetch_assoc($data["profile"]);
    $bc = array(
        "link" => ["/home"=>"Trang chủ"],
    );
    require_once("pages/breadcrumbs.php");
?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body card-block">
                        <form action="" method="post" id="frm">
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="text-input" class=" form-control-label">Họ Tên</label>
                                </div>
                                <div class="col col-md-10">
                                    <input type="text" id="text-input" name="name" value="<?php echo $profile['name'];?>" placeholder="Họ tên không được để trống" class="form-control">
                                    <!-- <small class="form-text text-muted">Nhập tiêu đề</small> -->
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="text-input" class=" form-control-label">Mật khẩu hiện tại</label>
                                </div>
                                <div class="col col-md-10">
                                    <input type="password" id="text-input" name="oldpass" value="" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="text-input" class=" form-control-label">Mật khẩu mới</label>
                                </div>
                                <div class="col col-md-10">
                                    <input type="password" id="text-input" name="newpass" value="" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="text-input" class=" form-control-label">Nhập lại mật khẩu</label>
                                </div>
                                <div class="col col-md-10">
                                    <input type="password" id="text-input" name="repeatpass" value="" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm" form="frm">
                            <i class="fa fa-save"></i> Cập nhật
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm" form="frm">
                            <i class="fa fa-ban"></i> Huỷ bỏ
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