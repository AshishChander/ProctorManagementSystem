<style type="text/css">
.header {
  background-color:powderblue;
  padding: 20px;
  text-align:left;
}
}
</style>
<?php
$dbhost = 'localhost/orcl';     
$dbuser = 'system';   
$dbpass = 'oracle';
$dbname='procmgmtsys';
$connection =oci_connect($dbuser, $dbpass,$dbhost);

if(!$connection ) {  
die('Could not connect to Server ' );  
}

$name=$_POST['name1'];
$usn=$_POST['usn'];
$dob=$_POST['dob'];
$phone=$_POST['cn'];
$email=$_POST['email'];
$fname=$_POST['fname'];
$contact1=$_POST['cname'];
$mname=$_POST['mname'];
$contact2=$_POST['cfname'];
$gname=$_POST['gname'];
$contact3=$_POST['ggname'];

$address=$_POST['a'];
$p10=$_POST['th'];
$p11=$_POST['th1'];
$p12=$_POST['pu'];
$p22=$_POST['pu1'];
$ecc=$_POST['message'];
$ach=$_POST['message1'];
$proc=$_POST['pr'];
$procid=$_POST['prid'];
$query1="SELECT *FROM studpriinfo WHERE usn='$usn' ";
$resu=oci_parse($connection,$query1);
$c=oci_execute($resu);
if(oci_fetch($resu)==0)
{
	$result1=oci_parse($connection,"INSERT INTO studpriinfo (usn,sname,dob,proctor,fid,phno) VALUES ('$usn','$name','$dob','$proc','$procid','$phone')");
	$c1=oci_execute($result1);
	if(!$c1){
	die('Could not ' );  
	}
	else
	{
	$result2=oci_parse($connection,"INSERT INTO studparentinfo (usn,fname,fno,mname,mno,gname,gno,address) VALUES ('$usn','$fname','$contact1','$mname','$contact2','$gname','$contact3','$address')");
	$c2=oci_execute($result2);
		if(!$c2){
		die('Could not ' );  
		}
		else{
			$result3=oci_parse($connection,"INSERT INTO studotherinfo(usn,cls10,cls12,cca,otherinfo) VALUES ('$usn','$p10','$p11','$ecc','$ach')");
			$c3=oci_execute($result3);
			if(!$c3){
				die('Could not ' );  
			}
			else{
					
					?><html><body background="bgg.jpg">
				<div class="header">
				<h1>BMSCE</h1>
				</div><p>Successfully Signed up!</p></body>
				<p><a href="prochomepage.php">Goto Homepage</a></p>
				</html><?php
				}
			}
	}
}	
else{
	?><script>window.location.href="prochomepage.php";
	alert("student with this USN already exists");</script>
	<?php
}
?>