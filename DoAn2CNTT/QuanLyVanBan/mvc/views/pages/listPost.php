<?php
if (count($data['post'])>0) {
    echo
        '<table id="hklteam" class="table table-striped table-bordered">
        <thead>
        <tr>
        <th>ID</th>
        <th>Tên văn bản</th>
        <th>Thể loại</th>
        <th>Ngày đăng</th>
        <th>Tệp tin</th>';
    if (isset($_SESSION['user'])) {
        echo
        '<th>Chỉnh sửa</th>';
    }
    echo
        '</tr>
        </thead>
        <tbody>';
    foreach ($data['post'] as $key => $post) {
        echo '<tr>
        <td>'.($key+1).'</td>
        <td><a href="'.$config->domain.$action.$post['id'].
        '-'.$this->rwurl($post['title']).'.html" title="'.$post['description'].'">'.mb_convert_case($post['title'], MB_CASE_TITLE, "UTF-8").'</a></td>
        <td>'.$post['category'].'</td>
        <td>'.$post['date'].'</td>
        <td>';
        if (isset($post['file'])) {
            foreach ($post['file'] as $file) {
                echo '<a href="'.$config->domain.'/download/'.$file['idf'].'" title="Size: '.$this->getSize($file['size']).' Type: '.$file['type'].'">'.$file['name'].'</a>';
            }
        }
        echo '</td>';
        if (isset($_SESSION['user'])) {
            echo
            '<td>
            <a href="'.$config->domain.'/edit/'.$post['id'].'" class="btn btn-success btn-sm">
            <i class="fa fa-pencil"></i>
            </a>
            <a href="'.$config->domain.'/move/'.$post['id'].'" class="btn btn-danger btn-sm">
            <i class="fa fa-close"></i>
            </a>
            </td>';
        }
        echo '</tr>';
    }
    echo '</tbody>
    </table>';
} else {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa fa-ban"></i> <strong>Không có bài viết nào!</strong>
    </div>';
}
