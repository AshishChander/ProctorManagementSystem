<?php
session_start();
$proc=$_SESSION['username'];
$dbhost = 'localhost/orcl';     
$dbuser = 'system';   
$dbpass = 'oracle';
$dbname='procmgmtsys';
$connection =oci_connect($dbuser, $dbpass,$dbhost);

if(!$connection ) {  
die('Could not connect to Server ' );  
}
echo 'connected';
$fid=$_POST['stname'];
$usn=$_POST['stusn'];
$date=$_POST['date'];
$outcome=$_POST['outcome'];
$purpose=$_POST['purpose'];
$result1=oci_parse($connection,"INSERT INTO procmeet (usn,fid,meeton,des,purpose) VALUES ('$usn','$fid','$date','$outcome','$purpose')");
$c=oci_execute($result1);
if(!$c){
die('Could not ' );  
}
else
{ ?>
<script>
window.location.href="prochomepage.php";
alert("saved");</script>
<?php

}
?>