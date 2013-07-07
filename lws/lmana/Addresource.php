
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
session_start();
$userid = $_SESSION['userid'];
$con = mysql_connect("localhost","Caspar09","wzadl1973");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("lmana", $con);

$sql="INSERT INTO RECORD (record,startdate,enddate,Description,Rtype,Attribute,Link,RECORD_USERID)
VALUES
('$_POST[record]','$_POST[startdate]','$_POST[enddate]','$_POST[description]','$_POST[rtype]','$_POST[attribute]','$_POST[link]','$userid')";
	$sql2="UPDATE RESOURCES SET TOTAL_GOLD = TOTAL_GOLD + '$_POST[record]' where OWNER_GUID = '$userid'";
	$sql3="UPDATE RESOURCES SET TOTAL_EXPERIENCE  = TOTAL_EXPERIENCE  + '$_POST[record]' where OWNER_GUID = '$userid'";
	$sql4="UPDATE RESOURCES SET TOTAL_LP = TOTAL_LP + '$_POST[record]' where OWNER_GUID = '$userid'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

if("$_POST[rtype]"=="Gold")
mysql_query($sql2);
if("$_POST[rtype]"=="Exp")
mysql_query($sql3);
if("$_POST[rtype]"=="LP")
mysql_query($sql4);
echo '1 record added';
$user_query = mysql_query("select * from resources where owner_guid = $userid limit 1");
					$result = mysql_fetch_array($user_query);
	echo '<br />', '<br />', '<br />','Your resources here:','<br />','<br />';
  echo "<p>", 'Gold:  ',$result['TOTAL_GOLD']. "</p>";
  echo "<p>", 'EXP :  ',$result['TOTAL_EXPERIENCE']. "</p>";
  echo "<p>", 'LP  :  ',$result['TOTAL_LP']. "</p>";

mysql_close($con)
?>