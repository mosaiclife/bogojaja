<?php
    $DBINFO['host']="localhost";
    $DBINFO['user']="bogojaja";
    $DBINFO['pass']="qhrhwkqhwk~1";
    $DBINFO['name']="bogojaja";
    
    $mysqli = new mysqli($DBINFO['host'], $DBINFO['user'], $DBINFO['pass'], $DBINFO['name']);
    
    if(mysqli_connect_errno())
    {
            echo "DB Connect Failed!!.<br>";
            exit();
    }
    
?>