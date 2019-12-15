<?php
require_once 'db.php';

define("SERVER_NAME",$hm);
define("PASSWORD",$pw);
define("DB_NAME",$db);
define("USER_NAME",$un);

class DB_func{
    private $server;
    private $user;
    private $db_name;
    private $pass;
    public $connection;

    /*    function Table_create($conn){
           $query="CREATE TABLE Users (
                       id SMALLINT NOT NULL AUTO_INCREMENT,
                       name VARCHAR(32) NOT NULL,
                       group VARCHAR(32) NOT NULL,
                       )";
           $result=$conn->query($query);
           if (!$result) die ("Сбой при доступе к базе данных: " . $conn->error);
       }*/
    function __construct(){
        $this->server=SERVER_NAME;
        $this->db_name=DB_NAME;
        $this->user=USER_NAME;
        $this->pass=PASSWORD;
        $this->Connect_to_db();
    }
    private function Connect_to_db(){
        if(!$this->connection){
            $this->connection= new mysqli($this->server,$this->user,$this->pass,$this->db_name);
            if ($this->connection->connect_error) {
                die($this->connection->connect_error);
            }
            else {
                return true;
            }
        }
        else return true;
    }
    private function Table_check($table){
        $query = "DESCRIBE ".$table;
        $result=$this->connection->query($query);
        if($result){
            $rows = $result->num_rows;
            if($rows>0)return true;
            else return false;
        }
        else {
             die($this->connection->connect_error);
        }
    }
    function Select($table,$rows='*',$where=NULL,$value=NULL){
        if($this->Table_check($table))
        {
                if($where!=''){
                    $query="SELECT ".$rows." FROM ".$table." WHERE ".$where."= "."'".$value."'";
                }
            else $query="SELECT ".$rows." FROM ". $table;
            $result=$this->connection->query($query);
            if(!$result)die($this->connection->connect_error);
            else return $this->Result($result);
        }
    }
    function Insert($table,$data){
        if($this->Table_check($table)){
        $query="INSERT INTO ".$table. " VALUES(NULL,";
        for($i=0;$i<count($data);$i++){
            if(is_string($data[$i])){
                $data[$i]='"'.$data[$i].'"';
            }
        }
        $data=implode(',',$data);
        $query.=$data.")";

        $result=$this->connection->query($query);
        if(!$result)die($this->connection->connect_error);
        else return true;
        }
    }
    function Update($query){
        $result=$this->connection->query($query);
        if(!$result)die($this->connection->connect_error);
    }
    function Delete($table,$where,$value){
        if($this->Table_check($table)){
            $query="DELETE FROM ".$table." WHERE ".$where."=";
            if(is_string($value)) {
                $value = '"' . $value . '"';
            }
            $query.=$value;
            $result=$this->connection->query($query);
            if(!$result)die($this->connection->connect_error);
            else return true;
        }
    }
    private function Result($var){
        if($var->num_rows==0){
           return false;
        }
           return $var;

    }
}