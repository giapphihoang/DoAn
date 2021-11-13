<?php
    $post = mysqli_fetch_assoc($data["post"]);
    $title = $post['title'];
    require_once("pages/header.php");
    $bc = array(
        "link" => ["/home"=>"Trang chủ"],
        "link" => ['/category/'.$post['idc'].'-'.$this->rwurl($post['category']).'.html' => $post['category'] ],
        "active" => "Văn bản"
    );
    require_once("pages/breadcrumbs.php");
?>
<div class="content my-3">
    <div class="animated fadeIn">
        <div class="row">
            <!-- văn bản -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-primary">
                        <?php echo '<strong>'.$post['title'].'</strong>';
                        if (isset($_SESSION['user'])) {
                            echo '<span class="badge badge-light pull-right p-2"><a href="'.$config->domain.'/edit/'.$data['id'].'">Chỉnh sửa</a> </span>';
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text font-weight-light">
                            <i class="fa fa-clock-o"></i> Đăng ngày <?php echo date('d-m-Y', strtotime($post['date']));?>
                            <i class="fa fa-user pl-2"></i> Bởi <?php echo $post['name'];?>
                        </p>
                        <p class="card-text font-weight-light">
                        <i class="fa fa-file-code-o"></i> Mã số hiệu <span class="badge badge-warning"><?php echo $post['code'];?></span>
                        <i class="fa fa-pencil-square-o pl-2"></i> Ngày ký <?php echo $post['date_of_signature'];?>
                        </p>
                        <p class="card-text"><?php echo getHtml($post['content']); ?></p>
                    </div>
                </div>
                <?php
                    if (count($data['files'])>0) {
                        echo '<div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active"><i class="fa fa-download"></i> Tập tin</a>';
                        foreach ($data['files'] as $file) {
                            echo '<a class="list-group-item list-group-item-action" href="'.$config->domain.'/download/'.$file['idf'].'">'.$file['name'].'</a>';
                        }
                        echo '</div>';
                    }
                ?>
            </div>
            <!-- /văn bản -->
        </div>
    </div>
</div>
<?php
    require_once("pages/footer.php");
    function getHtml($str)
    {
        $bb[] = "#\[b\](.*?)\[/b\]#si";
        $html[] = "<b>\\1</b>";
        $bb[] = "#\[i\](.*?)\[/i\]#si";
        $html[] = "<i>\\1</i>";
        $bb[] = "#\[u\](.*?)\[/u\]#si";
        $html[] = "<u>\\1</u>";
        $bb[] = "#\[hr\]#si";
        $html[] = "<hr>";
        $str = preg_replace($bb, $html, $str);
        $patern="#\[url href=([^\]]*)\]([^\[]*)\[/url\]#i";
        $replace='<a href="\\1" target="_blank" rel="nofollow">\\2</a>';
        $str=preg_replace($patern, $replace, $str);
        $patern="#\[img\]([^\[]*)\[/img\]#i";
        $replace='<img src="\\1" alt=""/>';
        $str=preg_replace($patern, $replace, $str);
        $str=nl2br($str);
        return $str;
    }
?>