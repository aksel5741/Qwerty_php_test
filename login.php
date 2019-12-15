<?php
require_once 'db.php';
define("PASSWORD",'password');
define('LOGIN','admin');
$data=$_POST;
if(isset($data['try_signin'])){
    if(isset($data['login']) && isset($data['password'])){
        $errors=array();
        if(LOGIN!=trim($data['login']))$errors[]='Неверний логин';
        if(PASSWORD!=$data['password'])$errors[]='Неверний пароль';
        if(empty($errors)){
            $_SESSION['logged_user']=$_POST['login'];
            header('Location:All_users.php');
        }
        else{
            echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
        }
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="login_style.css">
</head>
<body>
<form  action="login.php" method="post">
    <p>
        <strong>Логин</strong>
        <input type="text" name="login">
    </p>
    <p>
        <strong>Пароль</strong>
        <input type="password" name="password">
    </p>
    <div>
        <button type="submit" name="try_signin">Войти</button>
    </div>
</form>
</body>
</html>