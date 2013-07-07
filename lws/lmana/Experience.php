
<html lang="en">
  <head>
    <meta charset="utf-8">
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
$con = mysql_connect("localhost","Caspar09","wzadl1973");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("lmana", $con);
$userid = $_SESSION['userid'];

$result = mysql_query("SELECT * FROM resources where OWNER_GUID = $userid");
$rs = mysql_fetch_array($result);
echo "<br />";
 echo "Your total EXP is ",$rs['TOTAL_EXPERIENCE'];
echo "<br />","<br />","<br />";


$result = mysql_query("SELECT * FROM Record where RECORD_USERID = $userid AND rtype = 'Exp'");

echo "Here are your EXP records:","<br />","<br />";							
					
					
echo "<table border='1'>
<tr>
<th>Record</th>
<th>Startdate</th>
<th>Enddate</th>
<th>Description</th>
<th>Attribute</th>
<th>Link</th>";


while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['RECORD'] . "</td>";
  echo "<td>" . $row['STARTDATE'] . "</td>";
  echo "<td>" . $row['ENDDATE'] . "</td>";
  echo "<td>" . $row['DESCRIPTION'] . "</td>";
  echo "<td>" . $row['ATTRIBUTE'] . "</td>";
  echo "<td>" . $row['LINK'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


mysql_close($con)
?>