<?php
session_start();

$con = mysql_connect("localhost","Caspar09","wzadl1973");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("lmana", $con);

if(!isset($_POST['submit'])){
    exit('�Ƿ�����!');
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
//ע����Ϣ�ж�
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
    exit('�����û��������Ϲ涨��<a href="javascript:history.back(-1);">����</a>');
}
if(strlen($password) < 6){
    exit('�������볤�Ȳ����Ϲ涨��<a href="javascript:history.back(-1);">����</a>');
}
if(!preg_match('/([\w\.\_]{2,10})@(\w{1,}).([a-z]{2,4})/', $email)){
    exit('���󣺵��������ʽ����<a href="javascript:history.back(-1);">����</a>');
}

$check_query = mysql_query("select userid from user where username='$username' limit 1");
if(mysql_fetch_array($check_query)){
    echo '�����û��� ',$username,' �Ѵ��ڡ�<a href="javascript:history.back(-1);">����</a>';
    exit;
}
//д������
$password = MD5($password);
$regdate = time();
$sql = "INSERT INTO user(username,password,email)VALUES('$username','$password','$email')";
if(mysql_query($sql,$con)){
    echo('�û�ע��ɹ�������˴� <a href="login.html">��¼</a>');
} else {
    echo '��Ǹ���������ʧ�ܣ�',mysql_error(),'<br />';
    echo '����˴� <a href="javascript:history.back(-1);">����</a> ����';
}


$result  = mysql_query( "SELECT * FROM user where username = '$username'");
$rs=mysql_fetch_array($result);
$num = $rs['userid'];

echo $num;

$sql3 = "INSERT INTO RESOURCES(TOTAL_GOLD ,TOTAL_EXPERIENCE ,TOTAL_LP ,OWNER_GUID)VALUES(0,0,0,'$num')";
if(mysql_query($sql3,$con)){
    echo '��Դ��ӳɹ�';
} else {
    echo '��Դ���ʧ��';
}
mysql_close($con)
?>