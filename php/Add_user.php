<?php
require_once 'User_manager.php';
require_once 'Menu.php';

$user_manager=new User_manager();
$result=$user_manager->Page_state();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/all_users_style.css">
</head>
<body>
<form action="Add_user.php" enctype="multipart/form-data" method="post">

    <input hidden name="user_id" value="<?php isset($result['id']) ? print($result['id']):print('');?>">
    <p>
        <strong>Введите имя</strong>
        <input value="<?php isset($result['name']) ? print($result['name']): print('');?> " type="text" name="name"  required>
        <?php if(isset($result['avatar'])):?>
            <img src="data:image/jpeg;base64,<?php echo $result['avatar'];?>" alt="" width="45px">
        <?php endif;?>
    </p>
    <p>
        <strong>Аватар</strong>
        <input type="file" name="image" required>


    </p>
    <p>
        <strong>Выберите группу</strong>
        <select name="group" required>
            <?php $user_manager->Group_managaer->Groups_names();?>
        </select>
    </p>
    <button type="submit" name="add_user" value="<?php isset($result['button']) ? print($result['button']):print('');?>">Сохранить</button>
    </p>
</form>
</body>
</html>





