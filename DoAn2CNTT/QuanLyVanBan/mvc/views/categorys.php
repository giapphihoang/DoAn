<?php
    $title = "Loại Văn Bản";
    include_once("pages/header.php");
    $bc = array(
        "link" => ["/home"=>"Trang chủ"],
        "active" => "Loại văn bản"
    );
    $action = '/category/';
    include_once("pages/breadcrumbs.php");
?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <!--danh sách bài viết -->
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Loại văn bản</strong>
                        </div>
                        <div class="card-body">
                            <?php
                            if (count($data['categorys'])>0) {
                                if (isset($_SESSION['user'])) {
                                    if ($data['add']) {
                                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>'.$data['add'].'!</strong></div>';
                                    }
                                    if ($data['delete']) {
                                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>'.$data['delete'].'!</strong></div>';
                                    }
                                    if ($data['edit']) {
                                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>'.$data['edit'].'!</strong></div>';
                                    } ?>
                                    <form action="" method="post" class="row">
                                        <input type="hidden" id="id" name="id" value="">
                                        <div class="form-group col-sm-10">
                                            <input type="text" id="name" required="required" name="name" placeholder="Nhập tên loại văn bản"  class="form-control">
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <button type="submit" id="btnSubmit" class="btn btn-primary btn-md" style="white-space: normal;"><i class="fa fa-pen"></i> Thêm mới</button>
                                        </div>
                                    </form>
                                    <?php
                                    echo '<table id="hklteam" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên loại văn bản</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    foreach ($data['categorys'] as $key => $category) {
                                        echo '<tr id="id'.$key.'">
                                            <form action="" method="post">
                                                <td>'.$key.'</td>
                                                <td>
                                                    <a href="'.$config->domain.$action.$category['id'].
                                                    '-'.$this->rwurl($category['category']).'.html"  id="a'.$key.'">'.mb_convert_case($category['category'], MB_CASE_TITLE, "UTF-8").'</a>
                                                    <input type="text" value="'.$category['category'].'" class="form-control" name="category" id="inp'.$key.'" style="display:none"/>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="id" value="'.$category['id'].'">
                                                    <a href="#" class="btn-sua btn btn-success btn-sm" onclick="changeditable(\''.$key.'\')">
                                                    <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <button type="submit" style="display: none;" class="btn-luu btn btn-primary btn-sm" name="edit" value="edit">
                                                    <i class="fa fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" type="submit" name="delete" value="delete">
                                                    <i class="fa fa-close"></i>
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>';
                                    }
                                    echo '</tbody>
                                    </table>';
                                } else {
                                    echo '<table id="hklteam" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên loại văn bản</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    foreach ($data['categorys'] as $key => $category) {
                                        echo '<tr>
                                        <td>'.$key.'</td>
                                        <td><a href="'.$config->domain.$action.$category['id'].
                                        '-'.$this->rwurl($category['category']).'.html">'.mb_convert_case($category['category'], MB_CASE_TITLE, "UTF-8").'</a></td>
                                        </tr>';
                                    }
                                    echo '</tbody>
                                    </table>';
                                }
                            } else {
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="fa fa-ban"></i> <strong>Không có bài viết nào!</strong>
                                </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <!-- .danh sách bài viết -->
        </div>
    </div>
</div>
<script>
    function changeditable(id){
        document.getElementById('a'+id).style.display = "none";
        document.getElementById('inp'+id).style.display = "inline-block";
        document.getElementById('id'+id).getElementsByClassName("btn-luu")[0].style.display = "inline-block";
        document.getElementById('id'+id).getElementsByClassName("btn-sua")[0].style.display = "none";
    }
</script>
<?php
    include_once("pages/footer.php");
?>