<?php
require_once 'DB_func.php';
require_once 'Menu.php';


$db=new DB_func();
$result=$db->Select('users');
$rows=$result->num_rows;

echo  <<<_END
<table border="1">
   <tr>
    <th>id</th>
    <th>name</th>
    <th>group</th>
   </tr>
  </table>
_END;


for($i=0;$i<$rows;$i++){
    $result->data_seek($i);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo <<<_END
    <table border="1">
        <tr>
           <td>$row[id]</td>
           <td>$row[name]</td>
           <td>$row[groups]</td>
        </tr>
    </table>
_END;


/*
    echo 'id: ' . $row['id'] . '<br>';
    echo 'name: ' . $row['name'] . '<br>';
    echo 'group: ' . $row['groups'] . '<br><br>';*/
}


