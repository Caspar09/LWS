<html lang="en">
  <head>
    <meta charset="gb2312">
    <title>Learning Workflow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Supported by toyhouse China">
    <meta name="author" content="LMANA">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  
 
  </head>

<?php
//��¼


$con = mysql_connect("localhost","Caspar09","wzadl1973");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("lmana", $con);


if(!isset($_POST['submit'])){
    exit('�Ƿ�����!');
}
$username = htmlspecialchars($_POST['username']);
$password = $_POST['password'];
$password = MD5($password);
session_start();
//����û����������Ƿ���ȷ
$check_query = mysql_query("select userid from user where username='$username' and password='$password' limit 1");
if($result = mysql_fetch_array($check_query)){
    //��¼�ɹ�
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['userid'];
    echo $username,' ��ӭ�㣡���� <a href="..\home.php">�û�����</a><br />';
    echo '����˴� <a href="login.php?action=logout">ע��</a> ��¼��<br />';
    exit;
} else {
    exit('��¼ʧ�ܣ�����˴� <a href="javascript:history.back(-1);">����</a> ����');
}




//ע����¼
if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo 'ע����¼�ɹ�������˴� <a href="login.html">��¼</a>';
    exit;
}
mysql_close($con)
?>
 