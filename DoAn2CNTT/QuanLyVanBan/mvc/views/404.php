<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lỗi Trang</title>
    <?php require_once('pages/style.php'); ?>
    <style>
    body {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMC8yOS8xMiKqq3kAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAABHklEQVRIib2Vyw6EIAxFW5idr///Qx9sfG3pLEyJ3tAwi5EmBqRo7vHawiEEERHS6x7MTMxMVv6+z3tPMUYSkfTM/R0fEaG2bbMv+Gc4nZzn+dN4HAcREa3r+hi3bcuu68jLskhVIlW073tWaYlQ9+F9IpqmSfq+fwskhdO/AwmUTJXrOuaRQNeRkOd5lq7rXmS5InmERKoER/QMvUAPlZDHcZRhGN4CSeGY+aHMqgcks5RrHv/eeh455x5KrMq2yHQdibDO6ncG/KZWL7M8xDyS1/MIO0NJqdULLS81X6/X6aR0nqBSJcPeZnlZrzN477NKURn2Nus8sjzmEII0TfMiyxUuxphVWjpJkbx0btUnshRihVv70Bv8ItXq6Asoi/ZiCbU6YgAAAABJRU5ErkJggg==);}
        .error-template {padding: 40px 15px;text-align: center;}
        .error-actions {margin-top:15px;margin-bottom:15px;}
        .error-actions .btn { margin-right:10px; }
        </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    Có lỗi xảy ra</h2>
                <div class="error-details">
                    Trang bạn yêu cầu không tồn tại, hoặc bạn không có quyền truy cập!
                </div>
                <div class="error-actions">
                    <?php if (isset($_SERVER['HTTP_REFERER'])) {
    echo '<a href="'.$_SERVER['HTTP_REFERER'].'" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            Quay trở trang trước</a><a href="" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Về trang chủ </a>';
} else {
    echo '<a href="'.$config->domain.'/home" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            Về trang chủ</a>';
}
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>