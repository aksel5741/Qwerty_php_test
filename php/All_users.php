<?php
require_once 'User_manager.php';
require_once 'Menu.php';


$um=new User_manager();
$data=$_POST;

if(count($data)!=0){
     $um->Delete(array_shift($data));
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
<form action="All_users.php" method="post">
    <table border="1">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>avatar</th>
            <th>group</th>
        </tr>
        <?php $um->Show()?>
    </table>
</form>

</body>
</html>





