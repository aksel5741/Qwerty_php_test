<?php
require_once 'Menu.php';
require_once 'User_manager.php';

$um=new User_manager();
$result=$um->Group_managaer->Page_state();

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Загрузка картинки в БД</title>
    <link rel="stylesheet" type="text/css" href="all_users_style.css">
</head>
<form action="Add_group.php" method="post">
    <input hidden name="old_name" value="<?php isset($_GET['group_name']) ? print($_GET['group_name']):print('');?>">
    <p>
        <strong>Имя группы</strong>
        <input value="<?php isset($_GET['group_name']) ? print($_GET['group_name']):print('');?>" type="text" name="group_name">
    </p>
    <div>
        <button type="submit" name="create" value="<?php isset($result['button']) ? print($result['button']):print('');?>">Сохранить</button>
    </div>
</form>

<body>

</body>
</html>