<?php
define("PASSWORD",'password');
define('LOGIN','admin');
$data=$_POST;
if(isset($data['try_signin'])){
    if(isset($data['login']) && isset($data['password'])){
        $errors=array();
        if(LOGIN!=trim($data['login']))$errors[]='Неверний логин';
        if(PASSWORD!=$data['password'])$errors[]='Неверний пароль';
        if(empty($errors)){
            header('Location:Main.php');
        }
        else{
            echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
        }
    }
}
?>
<form action="login.php" method="post">
    <p>
        <strong>Введите логин</strong>
        <input type="text" name="login">
    </p>
    <p>
        <strong>Введите пароль</strong>
        <input type="password" name="password">
    </p>
    <div>
        <button type="submit" name="try_signin">Войти</button>
    </div>
</form>
