<?php
require 'Group.php';
class User{
    public $Name;
    public $Id;
    public $Group;
    function __construct($name,$group_name){
        $this->Group=new Group($group_name);
        $this->Name=$name;
    }

}