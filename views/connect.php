<?php
$servername = "localhost";
$username = "root";
$password = "apmsetup";
$dbName = 'testphp';

// 접속
$conn = new mysqli($servername, $username, $password, $dbName );


// 접속성공 여부 확인
if($conn){
    echo "성공"
}else{
    echo "실패"
}
 ?>
