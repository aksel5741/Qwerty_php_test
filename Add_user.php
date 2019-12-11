<?php
require_once  'Class_User.php';
require_once  'DB_func.php';
require_once 'Menu.php';

$db=new DB_func();
$result=$db->Select('groups');
$rows=$result->num_rows;
$data=$_POST;
if(isset($data['add_user'])&&$data['name']!=''){

}
echo <<<_END
<form action="Add_user.php" method="post">
    <p>
        <strong>Введите имя</strong>
        <input type="text" name="name">
    </p>
    <p>
        <strong>Введите логин</strong>
        <input type="file" name="avatar">
    </p>
    <p>
    <strong>Выберите группу</strong>
    <select size='$rows'  name='group'>
_END;
for($i=0;$i<$rows;$i++) {
    $result->data_seek($i);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo "<option value='$row[group_name]'>$row[group_name]</option>";
}

echo <<<_END
</select>
        </p>
        <button type="submit" name="add_user">Добавить</button>
    </p>
</form>
_END;





