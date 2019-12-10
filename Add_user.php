<?php
require_once  'Class_User.php';
require_once  'DB_func.php';
require_once  'db.php';

$data=$_POST;
$conn=new mysqli($hm, $un, $pw, $db);
if($conn->connect_error)die($conn->error);
if(isset($data['add_user'])&&$data['name']!=''){
$user=new User($data['name'],$data['group']);
$db=new DB_func($user);
$db->Add_user_to_DB($conn);
}

?>

<form action="Add_user.php" method="post">
    <p>
        <strong>Введите имя</strong>
        <input type="text" name="name">
    </p>
    <p>
        <strong>Выберите группу</strong>
        <select size="3"  name="group" >
            <option value="Админ">Админ</option>
            <option value="Гость">Гость</option>
            <option value="Саппорт">Саппорт</option>
        </select>
    </p>
    <p>
        <strong>Введите логин</strong>
        <input type="file" name="avatar">
    </p>
        <button type="submit" name="add_user">Добавить</button>
    </p>
</form>
