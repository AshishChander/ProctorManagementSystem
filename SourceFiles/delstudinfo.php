<script>confirm("do you want to delete ?");</script><?php
session_start();
$name1=$_SESSION['username'];
$usn=$_POST['stusn'];
$name=$_POST['stname'];
$dbhost = 'localhost/orcl';     
$dbuser = 'system';   
$dbpass = 'oracle';
$dbname='procmgmtsys';
$connection =oci_connect($dbuser, $dbpass,$dbhost);

if(!$connection ) {  
die('Could not connect to Server ' );  
}
$query="select *from procmeet where usn='$usn' and fid='$name1'";
	$result=oci_parse($connection,$query);
	oci_execute($result);
	if(oci_fetch($result)==0)
	{
		?><script>alert("Reports doesnt exist ");
					window.location.href="prochomepage.php";		
								</script>
								<?php
	}
	
else{
	

		
		$query="delete from procmeet  where usn='$usn'";
		$result=oci_parse($connection,$query);
		oci_execute($result);
		echo "delprocmeet";echo $usn ;echo$name1 ;
		?>
								<script>alert("reports deleted ");
								window.location.href="prochomepage.php";	
								</script>
<?php
		$_SESSION['username']=$name1;
	}
	
	?>		