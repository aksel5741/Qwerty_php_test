<?php
require_once 'User.php';
require_once 'DB_func.php';
require_once 'Group_manager.php';

class User_manager
{
    private $User;
    private $Db;
    private $Group_managaer;

    function __construct()
    {
        $this->Db=new DB_func();
        $this->Group_managaer=new Group_manager();
    }
    function Add($user_name,$group_name,$avatar){
        $this->User=new User($user_name,$group_name,$avatar);
        $this->Db->Insert('users',array($this->User->Name,$this->User->Avatar,$this->Group_managaer->Get_group_id($group_name)));
    }
    function Delete($user_id){
        $this->Db->Delete('users','id',$user_id);
    }
    function Update($user_id){
    }
    function Show(){
        $result=$this->Db->Select('users');
        $rows=$result->num_rows;
        for($i=0;$i<$rows;$i++){
            $result->data_seek($i);
            $row = $result->fetch_assoc();
            $show_img = base64_encode($row['avatar']);
            $group_name=$this->Group_managaer->Get_group_name($row['group_id']);
        echo <<<_END
         <table border="1">
            <tr>
                <td >$row[id]</td>
                <td><a href="./Add_user.php?id=$row[id]">$row[name]</a></td>
                <td><img src="data:image/jpeg;base64, $show_img" alt="" width="20px"></td>
                <td>$group_name</td>
                <td> <button type="submit" name="$row[id]" value="$row[id]" >Удалить</button></td>
            </tr>
           </table>
_END;
        }
    }
}