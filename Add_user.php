<?php
require_once 'User_manager.php';
require_once 'Group_manager.php';
require_once  'DB_func.php';
require_once 'Menu.php';

$gm=new Group_manager();
$data=$_POST;
if(isset($data['add_user'])&&$data['name']!=''){
    if( !empty( $_FILES['image']['name'] ) ) {
        if ( $_FILES['image']['error'] == 0 ) {
            if( substr($_FILES['image']['type'], 0, 5)=='image' ) {
                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            }
        }
    }
    $user_manager=new User_manager();
    $user_manager->Add($data['name'],$data['group'],$image);
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<form action="Add_user.php" enctype="multipart/form-data" method="post">
    <p>
        <strong>Введите имя</strong>
        <input type="text" name="name">
    </p>
    <p>
        <strong>Аватар</strong>
        <input type="file" name="image">
    </p>
    <p>
        <strong>Выберите группу</strong>
       <?php $gm->Groups_names(); ?>
        </select>
    </p>
    <button type="submit" name="add_user">Добавить</button>
    </p>
</form>
</body>
</html>





