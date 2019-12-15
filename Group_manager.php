<?php
require_once 'DB_func.php';

class Group_manager
{
    private $DB;
    function __construct()
    {
        $this->DB=new DB_func();
    }
    function Get_group_id($group_name){
        $result=$this->DB->Select('groups','id','group_name', $group_name);
        if(is_bool($result)) return $result;
        $result=$result->fetch_assoc();
        return array_shift($result);
    }
    function Get_group_name($group_id){
        $result=$this->DB->Select('groups','group_name','id', $group_id);
       if(is_bool($result)) return $result;
        $result=$result->fetch_assoc();
        return array_shift($result);
    }
    function Groups_names(){
        $result=$this->DB->Select('groups','group_name');
        $rows=$result->num_rows;
        for($i=0;$i<$rows;$i++) {
            $result->data_seek($i);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            echo "<option value='$row[group_name]'>$row[group_name]</option>";
        }
    }
    function Add_group($name){
        if(!$this->Get_group_id($name)){
            $this->DB->Insert('groups',array($name));
        }
        else echo "Группа ".$name." уже существует";
    }
    function Update($data){
        if(!$this->Get_group_id($data['group_name'])){
            foreach ($data as &$var){
                $var='"'.$var.'"';
            }
            $query="UPDATE groups SET group_name= ".$data['group_name']." WHERE group_name= ".$data['old_name'];
            $this->DB->Update($query);
        }
        else echo "Группа ".$data['group_name']." уже существует";
    }
}