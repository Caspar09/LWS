<?php
session_start();

$con = mysql_connect("localhost","Caspar09","wzadl1973");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("lmana", $con);

if(!isset($_POST['submit'])){
    exit('非法访问!');
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
//注册信息判断
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
    exit('错误：用户名不符合规定。<a href="javascript:history.back(-1);">返回</a>');
}
if(strlen($password) < 6){
    exit('错误：密码长度不符合规定。<a href="javascript:history.back(-1);">返回</a>');
}
if(!preg_match('/([\w\.\_]{2,10})@(\w{1,}).([a-z]{2,4})/', $email)){
    exit('错误：电子邮箱格式错误。<a href="javascript:history.back(-1);">返回</a>');
}

$check_query = mysql_query("select userid from user where username='$username' limit 1");
if(mysql_fetch_array($check_query)){
    echo '错误：用户名 ',$username,' 已存在。<a href="javascript:history.back(-1);">返回</a>';
    exit;
}
//写入数据
$password = MD5($password);
$regdate = time();
$sql = "INSERT INTO user(username,password,email)VALUES('$username','$password','$email')";
if(mysql_query($sql,$con)){
    echo('用户注册成功！点击此处 <a href="login.html">登录</a>');
} else {
    echo '抱歉！添加数据失败：',mysql_error(),'<br />';
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
}


$result  = mysql_query( "SELECT * FROM user where username = '$username'");
$rs=mysql_fetch_array($result);
$num = $rs['userid'];

echo $num;

$sql3 = "INSERT INTO RESOURCES(TOTAL_GOLD ,TOTAL_EXPERIENCE ,TOTAL_LP ,OWNER_GUID)VALUES(0,0,0,'$num')";
if(mysql_query($sql3,$con)){
    echo '资源添加成功';
} else {
    echo '资源添加失败';
}
mysql_close($con)
?>