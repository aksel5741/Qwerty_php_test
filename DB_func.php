<?php
require_once 'Class_User.php';

class DB_func{
    public $User;
    function __construct($user){
        $this->User=$user;
    }
    function Table_check($conn){
        $query = "SHOW TABLES FROM Data LIKE Users";
        $result=$conn->query($query);
        if(!$result){
            return TRUE;
        }
        else return FALSE;
    }
    function Table_create($conn){
        $query="CREATE TABLE Users (
                    id SMALLINT NOT NULL AUTO_INCREMENT,
                    name VARCHAR(32) NOT NULL,
                    group VARCHAR(32) NOT NULL,
                    )";
        $result=$conn->query($query);
        if (!$result) die ("Сбой при доступе к базе данных: " . $conn->error);
    }
    function Add_user_to_DB($conn){
        if(!($this->Table_check($conn))){
            $this->Table_create($conn);
        }
        $query="INSERT INTO Users VALUES"."('$this->User->Name','$this->User->Group->Name')";
        $result=$conn->query($query);
        if (!$result) die ("Сбой при доступе к базе данных: " . $conn->error);
    }

}