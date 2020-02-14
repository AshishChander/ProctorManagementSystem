<?php
session_start();
$usn=$_SESSION['username'];
$dbhost = 'localhost/orcl';     
$dbuser = 'system';   
$dbpass = 'oracle';
$dbname='procmgmtsys';

$sc1=$_POST['sc1'];
$sc2=$_POST['sc2'];
$sc3=$_POST['sc3'];
$sc4=$_POST['sc4'];
$sc5=$_POST['sc5'];
$connection =oci_connect($dbuser,$dbpass,$dbhost);
if(!$connection ) {  
die('Could not connect to Server ' );  
}
echo 'connected';
$test=oci_parse($connection,"select * from studpriinfo where usn='$usn' ");
oci_execute($test);
if(oci_fetch($test)==0)
{
	?><script>
	alert("USN dosnt exist");
	window.location.href="studreport.html";
		</script><?php
}
else{		
$r1=oci_parse($connection,"insert into courseentry (usn,ccode,cie1,cie2,cheld,cattend,attendance,cietot,see,tot,grade) values('$usn','$sc1','0','0','0','0','0','0','0','0','0')");
$c=oci_execute($r1);
if($sc2!=NULL){
$r1=oci_parse($connection,"INSERT INTO courseentry (usn,ccode,cie1,cie2,cheld,cattend,attendance,cietot,see,tot,grade) VALUES ('$usn','$sc2','0','0','0','0','0','0','0','0','0')");
$c=oci_execute($r1);}
if($sc3!=NULL){
$r1=oci_parse($connection,"INSERT INTO courseentry (usn,ccode,cie1,cie2,cheld,cattend,attendance,cietot,see,tot,grade) VALUES ('$usn','$sc3','0','0','0','0','0','0','0','0','0')");
$c=oci_execute($r1);}
if($sc4!=NULL){
$r1=oci_parse($connection,"INSERT INTO courseentry (usn,ccode,cie1,cie2,cheld,cattend,attendance,cietot,see,tot,grade)  VALUES ('$usn','$sc4','0','0','0','0','0','0','0','0','0')");
$c=oci_execute($r1);}
if($sc5!=NULL){
$r1=oci_parse($connection,"INSERT INTO courseentry (usn,ccode,cie1,cie2,cheld,cattend,attendance,cietot,see,tot,grade) VALUES ('$usn','$sc5','0','0','0','0','0','0','0','0','0')");
$c=oci_execute($r1);}
if(!$c){
die('Could not ' );  
}
else
{
	?>
<script>
window.location.href="studreport.html";
alert("saved");</script>
<?php
}
}

?>