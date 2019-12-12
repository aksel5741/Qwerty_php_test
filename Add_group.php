<?php
require_once 'User.php';
require_once 'DB_func.php';
require_once 'User_manager.php';
$um=new User_manager();

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Загрузка картинки в БД</title>
</head>

<body>

<?php
$show_img=$um->Show();?>
<img src="data:image/jpeg;base64, <?=$show_img ?>" alt="">
</body>
</html>