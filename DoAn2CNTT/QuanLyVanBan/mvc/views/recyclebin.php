<?php
    $title = "Trang chủ";
    include_once("pages/header.php");
    $bc = array(
        "active" => "Trang chủ"
    );
    $action = '/view/';
    include_once("pages/breadcrumbs.php");
    ?>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <!--danh sách văn bản -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Văn Bản</strong>
                        </div>
                        <div class="card-body">
                                    <?php
                                    if (count($data['post'])>0) {
                                        if (isset($_SESSION['user'])) {
                                            echo '<table id="hklteam" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tên văn bản</th>
                                                    <th>Thể loại</th>
                                                    <th>Ngày đăng</th>
                                                    <th>Tệp tin</th>
                                                    <th>Chỉnh sửa</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                            foreach ($data['post'] as $key => $post) {
                                                echo '<tr>
                                                <td>'.$post['id'].'</td>
                                                <td><a href="'.$config->domain.$action.$post['id'].
                                                '-'.$this->rwurl($post['title']).'.html">'.mb_convert_case($post['title'], MB_CASE_TITLE, "UTF-8").'</a></td>
                                                <td>'.$post['category'].'</td>
                                                <td>'.$post['date'].'</td>
                                                <td>';
                                                if (isset($post['file'])) {
                                                    foreach ($post['file'] as $file) {
                                                        echo '<a href="'.$config->domain.'/download/'.$file['idf'].'">'.$file['name'].'</a>';
                                                    }
                                                }
                                                echo '</td>
                                                <td>
                                                    <a href="'.$config->domain.'/restore/'.$post['id'].'" class="btn btn-success btn-sm">
                                                    <i class="fa fa-reply-all"></i>
                                                    </a>
                                                    <a href="'.$config->domain.'/delete/'.$post['id'].'" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash-o"></i>
                                                    </a>

                                                </td>
                                                </tr>';
                                            }
                                        } else {
                                            echo '<table id="hklteam" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tên văn bản</th>
                                                    <th>Thể loại</th>
                                                    <th>Ngày đăng</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                            foreach ($data['post'] as $key => $post) {
                                                echo '<tr>
                                                <td>'.$post['id'].'</td>
                                                <td>'.mb_convert_case($post['title'], MB_CASE_TITLE, "UTF-8").'</td>
                                                <td>'.$post['category'].'</td>
                                                <td>'.$post['date'].'</td>
                                                </tr>';
                                            }
                                        }
                                    } else {
                                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <i class="fa fa-ban"></i> <strong>Không có văn bản nào!</strong>
                                        </div>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once("pages/footer.php");
?>