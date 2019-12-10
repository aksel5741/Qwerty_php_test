<?php
require 'Menu.php';
require_once 'db.php';

$conn=new mysqli($hm, $un, $pw, $db);
if($conn->connect_error)die($conn->error);

