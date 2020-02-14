<?php
session_start();
$dbhost = 'localhost/orcl';     
$dbuser = 'system';   
$dbpass = 'oracle';
$dbname='procmgmtsys';
$fid=$_POST['username'];
$_SESSION['username']=$fid;
$phone=$_POST['passid'];
$_SESSION['passid']=$phone;
$connection =oci_connect($dbuser,$dbpass,$dbhost);

if(!$connection ) {  
die('Could not connect to Server ' );  
}
$query="SELECT fname FROM facultyinfo WHERE  fid='$fid' AND fph= '$phone' ";
$result=oci_parse($connection,$query);
$c=oci_execute($result);
$nrows=oci_fetch($result);
if($nrows==0)
{ session_destroy();?>
	<script>window.location.href="proclogin.html";
	alert("please enter valid credentials");
	</script><?php
	}	
else
{echo '<br />Logged In Successfully';?>
	<script>alert("loggin in!");
	window.location.href="prochomepage.php";
	</script>
	<?php
}	
	
?>