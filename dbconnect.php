<?php

$servername = "sql112.infinityfree.com";
$username = 'if0_37316556';
$password = 'vlZPHt21Ihfa';
$database = 'if0_37316556_findhome';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    echo "error in dbconnect";
}