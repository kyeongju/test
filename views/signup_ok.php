<?php
 $host = 'localhost';
 $user = 'root';
 $password = 'apmsetup';
 $dbName = 'testphp';
 $mysqli = new mysqli($host, $user,$password, $dbName);

$name=$_POST['name']
 $id=$_POST['id'];
 $pw=$_POST['pw'];



 $sql = "insert into members (name,id,pw)";
 $sql = $sql. "values('$id','$password','$email','$phonenumber' )";
 if($mysqli->query($sql)){

  echo "<script>
    alert('회원가입이 완료되었습니다.');

    </script>
    ";
 }else{
  echo 'fail to insert sql';
 }
?>
