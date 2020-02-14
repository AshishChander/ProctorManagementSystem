<script>confirm("do you want to delete ?");</script><?php
session_start();
$dbhost = 'localhost';     
$dbuser = 'root';   
$dbpass = '';
$dbname='abc';
$usn=$_SESSION['usn'];
$name=$_SESSION['username'];
$connection =mysqli_connect($dbhost, $dbuser,'',$dbname);

if(!$connection ) {  
die('Could not connect to Server ' );  
}
$query="SELECT *FROM procstud WHERE usn='$usn' AND name='$name'  ";
$result=mysqli_query($connection,$query);
$nurows=mysqli_num_rows($result);  
if($nurows==0)
{ 
	$res=mysqli_query($connection,"DELETE  FROM studinfo WHERE usn='$usn'");
	if(!res)
	{ die("could not");session_destroy();}
	else{
		$result2=mysqli_query($connection,"DELETE FROM otherinfo WHERE usn='$usn'");
			if(!$result2){
			die('Could not ' );  
			}
			else{
		
			$res1=mysqli_query($connection,"DELETE FROM proctermeet WHERE usn='$usn'");
					if(!$res1){
						die('Could not ' );  }
					else{
					?>
			<script>alert("account deleted");
			window.location.href="start.html";</script>
			<?php session_destroy();
					
				}
		}

	}
}
else
{
	?><script>window.location.href="studhomepage.php";
	alert("you are not authorised");
	</script>
<?php
	
}	

?>