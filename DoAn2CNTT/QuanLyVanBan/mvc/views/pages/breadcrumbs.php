<div class="breadcrumbs">
    <div class="col-sm-4">
        <!-- <div class="page-header float-left">
            <div class="page-title">
                <h1></h1>
            </div>
        </div> -->
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <?php
                    if (isset($bc['link'])) {
                        foreach ($bc['link'] as $bclink => $bctitle) {
                            echo '<li><a href="'.$config->domain.$bclink.'"> '.$bctitle.'</a></li>';
                        }
                    }
                    ?>
                    <li class="active">
                        <?php if (isset($bc['active'])) {
                        echo $bc['active'];
                            }
                            else{
                                echo $title;
                            }
                        ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
