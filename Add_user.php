<?php
require_once 'User_manager.php';
require_once 'Group_manager.php';
require_once  'DB_func.php';
require_once 'Menu.php';

$gm=new Group_manager();
$data=$_POST;
$user_manager=new User_manager();
if(isset($_GET['id'])){
    $user_id=$_GET['id'];
    $result=$user_manager->Show('id',$_GET['id']);
    $button='update';
}
if((isset($data['add_user'])&&$data['name']!='')){
    if($data['add_user']=='update'){
        $user_manager->Update($data);
    }
    else $user_manager->Add($data['name'],$data['group']);
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="all_users_style.css">
</head>
<body>
<form action="Add_user.php" enctype="multipart/form-data" method="post">

    <input hidden name="user_id" value="<?php isset($user_id) ? print($user_id):print('');?>">
    <p>
        <strong>Введите имя</strong>
        <input value="<?php isset($result['name']) ? print($result['name']): print('');?> " type="text" name="name"  required>
    </p>
    <p>
        <strong>Аватар</strong>
        <input type="file" name="image" required>
    </p>
    <p>
        <strong>Выберите группу</strong>
        <select name="group" required>
       <?php $gm->Groups_names();?>
        </select>
    </p>
    <button type="submit" name="add_user" value="<?php isset($button) ? print($button):print('');?>">Сохранить</button>
    </p>
</form>
</body>
</html>





