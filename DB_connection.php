
<?php
    
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'assignment-7';

    $connection = mysqli_connect($serverName, $userName, $password, $dbName);

    if(!$connection) {
        echo "connection faild";
        die();
    } 
    
?>