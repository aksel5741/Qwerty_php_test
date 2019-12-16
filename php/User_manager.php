<?php
require_once 'User.php';
require_once 'DB_func.php';
require_once 'Group_manager.php';

class User_manager
{
    private $User;
    private $Db;
    public $Group_managaer;

    function __construct()
{
    $this->Db=new Data_base();
    $this->Group_managaer=new Group_manager($this->Db);
}

    private function Img_format(){
        if( !empty( $_FILES['image']['name'] ) ) {
            if ( $_FILES['image']['error'] == 0 ) {
                if( substr($_FILES['image']['type'], 0, 5)=='image' ) {
                    return $avatar = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                }
            }
        }
    }
    private function Add($user_name,$group_name){
        $avatar=$this->Img_format();
        $this->User=new User($user_name,$group_name,$avatar);
        $this->Db->Insert('users',array($this->User->Name,$this->User->Avatar,$this->Group_managaer->Get_group_id($group_name)));
    }
    private function Update($data){
    $avatar=$this->Img_format();
    $data['name']='"'.$data['name'].'"';
    $avatar='"'.$avatar.'"';
    $query="UPDATE users SET name= ".$data['name'].", avatar= ".$avatar.", group_id=".$this->Group_managaer->Get_group_id($data['group'])." WHERE id=".$data['user_id'];
    $this->Db->Update($query);
}

    function Delete($user_id){
        $this->Db->Delete('users','id',$user_id);
    }
    function Page_state(){
        if(isset($_GET['id'])){
            $result=$this->Show('id',$_GET['id']);
            $result['button']='update';
            $result['avatar'] = base64_encode($result['avatar']);
            return $result;
        }
        if((isset($_POST['add_user'])&&$_POST['name']!='')){
            if($_POST['add_user']=='update'){
                $this->Update($_POST);
            }
            else $this->Add($_POST['name'],$_POST['group']);
        }
    }
    function Show($where=NULL,$value=NULL){
        if(isset($where)){
             $result=$this->Db->Select('users','*',$where,$value);
             return $result=$result->fetch_assoc();
        }
        $result=$this->Db->Select('users');
        if(is_bool($result))return;
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
                <td><img src="data:image/jpeg;base64, $show_img" alt="" width="45px"></td>
                <td><a href="./Add_group.php?group_name=$group_name">$group_name</a></td>
                <td> <button type="submit" name="$row[id]" value="$row[id]" >Удалить</button></td>
            </tr>
           </table>
_END;
        }
    }


}