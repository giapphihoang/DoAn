    <!--/content -->
    <!-- /Right Panel -->
    <script src="<?php echo $config->domain;?>/public/js/jquery.js"></script>
    <script src="<?php echo $config->domain;?>/public/js/popper.min.js"></script>
    <script src="<?php echo $config->domain;?>/public/js/bootstrap.min.js"></script>
    <script src="<?php echo $config->domain;?>/public/js/jquery.form.js"></script>
    <script src="<?php echo $config->domain;?>/public/js/main.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#hklteam').DataTable(
                {
            <?php
                if (isset($_SESSION['user'])) {
                    echo "dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ],";
                }
            ?>

                    "language": {
                        "search":"Tìm kiếm",
                        "lengthMenu": "Hiện _MENU_ dòng mỗi trang",
                        "zeroRecords": "Không tìm thấy",
                        "info": "Hiện (_START_ - _END_) trong tổng số _TOTAL_ văn bản. Trang _PAGE_ / _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtered from _MAX_ total records)",
                        "paginate": {
                            "first":"Trang đầu",
                            "last":"Trang cuối",
                            "next":"Sau",
                            "previous":"Trước"
                        },
                    },
                }
            );
        } );
        $('#search').keypress(function(e) {
        if (e.which == 13) {
            $('form#frm-search').submit();
            return false;
        }
        });
    </script>
    <?php
    if (@BBCODE=="bbcode") {
        ?>
    <script src="<?php echo $config->domain; ?>/public/js/upload.js"></script>
    <script src='<?php echo $config->domain; ?>/public/js/jquery.bbcode.js' type='text/javascript'></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $("#content").bbcode({tag_bold:true,tag_italic:true,tag_underline:true,tag_link:true,tag_image:true,button_image:true,});
        process();
        });
    </script>
    <?php
    }
    ?>
</body>
</html>
