<?php
require_once 'User_manager.php';
require_once 'Menu.php';

$db=new DB_func();
$um=new User_manager();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<table border="1">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>avatar</th>
        <th>group</th>
    </tr>
    <?php $um->Show()?>
</table>
</body>
</html>





