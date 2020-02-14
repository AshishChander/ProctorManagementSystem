<?php
session_start();
$usn=$_POST['usn'];
$name1=$_SESSION['username'];
$dbhost = 'localhost/orcl';     
$dbuser = 'system';   
$dbpass = 'oracle';
$dbname='procmgmtsys';
$c11=$POST['c11'];$r1=$_POST['r1'];
$c21=$POST['c21'];
$s1=$POST['s1'];
$ch1=$POST['ch1'];
$ca1=$POST['ca1'];

$c12=$POST['c12'];$r2=$_POST['r2'];
$c22=$POST['c22'];
$s2=$POST['s2'];
$ch2=$POST['ch2'];
$ca2=$POST['ca2'];

$c13=$POST['c13'];$r3=$_POST['r3'];
$c23=$POST['c23'];
$s3=$POST['s3'];
$ch3=$POST['ch3'];
$ca3=$POST['ca3'];

$c14=$POST['c14'];$r4=$_POST['r4'];
$c24=$POST['c24'];
$s4=$POST['s4'];
$ch4=$POST['ch4'];
$ca4=$POST['ca4'];

$c15=$POST['c15'];$r5=$_POST['r5'];
$c25=$POST['c25'];
$s5=$POST['s5'];
$ch5=$POST['ch5'];
$ca5=$POST['ca5'];
$connection =oci_connect($dbuser, $dbpass,$dbhost);

if(!$connection ) {  
die('Could not connect to Server ' );  
}
$query="update courseentry set  usn='$usn' ";
$result=oci_parse($connection,$query);
$c=oci_execute($result);