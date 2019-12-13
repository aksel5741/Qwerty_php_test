<?php
require_once 'Menu.php';
require_once 'DB_func.php';
require_once 'Group_manager.php';

$gm=new Group_manager();
$data=$_POST;
if(isset($data['group_name'])&&isset($data['create'])){
$gm->Add_group($data['group_name']);
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Загрузка картинки в БД</title>
</head>
<form action="Add_group.php" method="post">
    <p>
        <strong>Имя группы</strong>
        <input type="text" name="group_name">
    </p>
    <div>
        <button type="submit" name="create">Создать</button>
    </div>
</form>

<body>

</body>
</html>