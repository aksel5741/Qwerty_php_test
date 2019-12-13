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
      return $this->DB->Result($this->DB->Select('groups','id','group_name','group_name', $group_name));
    }
    function Get_group_name($group_id){
        return $this->DB->Result($this->DB->Select('groups','group_name','id','id', $group_id));
    }
    function Groups_names(){
        $result=$this->DB->Select('groups','group_name');
        $rows=$result->num_rows;
        echo '<select size="$rows"  name="group" required>';
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
}