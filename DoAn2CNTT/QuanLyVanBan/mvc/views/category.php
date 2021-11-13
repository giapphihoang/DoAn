<?php
    $title = $data['name'];
    require_once("pages/header.php");
    $bc = array(
        "link" => ["/home"=>"Trang chủ","/category"=>"Loại văn bản"],
        "active" => $data['name']
    );
    $action = '/view/';
    $pagination = '/category/'.$data['id'].'/';
    require_once("pages/breadcrumbs.php");
    ?>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Văn Bản</strong>
                        </div>
                        <div class="card-body">
    <?php
        require_once('pages/listPost.php');
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