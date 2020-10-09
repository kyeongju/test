<?php
session_start();
include "connect.php";

$id=$_POST['id'];
$password=$_POST['pw'];

$query = "select * from members where id='$id' and pw='$password'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);


if($id==$row['id'] && $password==$row['pw'] ){ // id와 password가 맞다면 login

  $userid=$row['id'];
  $username=$row['name'];

  $_SESSION['id'] = $userid;
  $_SESSION['name'] = $username;

  echo "<script>location.href='index.php';</script>";

}else{ // id 또는 password가 다르다면 login 폼으로

   echo "<script>window.alert('아이디, 비밀번호를 확인해주세요.');</script>"; // 잘못된 아이디 또는 비빌번호 입니다
   echo "<script>location.href='login.php';</script>";
}

?>
