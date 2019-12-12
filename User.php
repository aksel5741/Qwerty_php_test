<?php
require 'Group.php';
class User{
    public $Name;
    public $Group;
    public $Avatar;
    function __construct($name,$group_name,$avatar){
        $this->Group=new Group($group_name);
        $this->Name=$name;
        $this->Avatar=$avatar;
    }

}
