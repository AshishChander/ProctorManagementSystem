<?php
session_start();
$dbhost = 'localhost/orcl';     
$dbuser = 'system';   
$dbpass = 'oracle';
$dbname='procmgmtsys';
$usn=$_POST['username'];
$_SESSION['username']=$usn;
$phone=$_POST['passid'];
$_SESSION['passid']=$phone;
$connection =oci_connect($dbuser,$dbpass,$dbhost);

if(!$connection ) {  
die('Could not connect to Server ' );  
}
$query="SELECT sname FROM studpriinfo WHERE  usn='$usn' AND phno= '$phone' ";
$result=oci_parse($connection,$query);
$c=oci_execute($result);

if(oci_fetch($result)==0)
{ session_destroy();?>
	<script>window.location.href="studentlogin.html";
	alert("please enter valid credentials");
	</script><?php
	}	
else
{echo '<br />Logged In Successfully';?>
	<script>alert("loggin in!");
	window.location.href="studhomepage.php";
	</script>
	<?php
}	
	
?>