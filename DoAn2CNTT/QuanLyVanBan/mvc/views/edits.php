<?php
    $title = "Sửa Văn Bản";
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
                        <div class="card-header">
                            <strong class="card-title">Sửa văn bản</strong>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group col-md-3">
                                    <label for="text-input" class="form-control-label mt-2">Nhập ID văn bản</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" id="text-input" name="id" value="" placeholder="ID văn bản" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-primary btn-md">
                                            <i class="fa fa-pen"></i> Chỉnh sửa
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- .danh sách văn bản -->
        </div>
    </div>
</div>
<?php
    include_once("pages/footer.php");
?>