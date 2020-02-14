<?php
session_start();
$usn=$_SESSION['sid'];
$name1=$_SESSION['username'];
$dbhost = 'localhost/orcl';     
$dbuser = 'system';   
$dbpass = 'oracle';
$dbname='procmgmtsys';

$c11=$_POST['c11'];
$c21=$_POST['c21'];
$s1=$_POST['s1'];
$ch1=$_POST['ch1'];
$ca1=$_POST['ca1'];
$a1=($ca1/$ch1)*100;
$it1=($c11+$c21)/2;
$tot1=($s1/2)+$it1;
$g1=$tot1/10;

$c12=$_POST['c12'];
$c22=$_POST['c22'];
$s2=$_POST['s2'];
$ch2=$_POST['ch2'];
$ca2=$_POST['ca2'];
$it2=($c12+$c22)/2;
$a2=($ca2/$ch2)*100;
$tot2=($s2/2)+$it2;
$g2=$tot2/10;

$c13=$_POST['c13'];
$c23=$_POST['c23'];
$s3=$_POST['s3'];
$ch3=$_POST['ch3'];
$ca3=$_POST['ca3'];
$a3=($ca3/$ch3)*100;
$it3=($c13+$c23)/2;
$tot3=($s3/2)+$it3;
$g3=$tot3/10;

$c14=$_POST['c14'];
$c24=$_POST['c24'];
$s4=$_POST['s4'];
$ch4=$_POST['ch4'];
$ca4=$_POST['ca4'];
$a4=($ca4/$ch4)*100;
$it4=($c14+$c24)/2;
$tot4=($s4/2)+$it4;
$g4=$tot4/10;

$c15=$_POST['c15'];
$c25=$_POST['c25'];
$s5=$_POST['s5'];
$ch5=$_POST['ch5'];
$ca5=$_POST['ca5'];
$a5=($ca5/$ch5)*100;
$it5=($c15+$c25)/2;
$tot5=($s5/2)+$it5;
$g5=$tot5/10;

$connection =oci_connect($dbuser, $dbpass,$dbhost);
if(!$connection ) {  
die('Could not connect to Server ' );  
}
else{
$query="SELECT * FROM studcourse WHERE usn='$usn' ";
$result=oci_parse($connection,$query);
$c=oci_execute($result);
oci_fetch($result);
	$r1=oci_result($result,'CCODE');

oci_fetch($result);
	$r2=oci_result($result,'CCODE');
	
oci_fetch($result);
	$r3=oci_result($result,'CCODE');
	
oci_fetch($result);
	$r4=oci_result($result,'CCODE');
	
oci_fetch($result);
	$r5=oci_result($result,'CCODE');
$q=oci_parse($connection,"update courseentry set cheld='$ch1',attendance='$a1',cietot='$it1',tot='$tot1',grade='$g1' where usn='$usn' and ccode='$r1'");
oci_execute($q);
$q=oci_parse($connection,"update courseentry set cie1='$c11',cie2='$c21',see='$s1',cattend='$ca1' where usn='$usn' and ccode='$r1'");
oci_execute($q);

$q=oci_parse($connection,"update courseentry set cheld='$ch2',attendance='$a2',cietot='$it2',tot='$tot2',grade='$g2' where usn='$usn' and ccode='$r2'");
oci_execute($q);
$q=oci_parse($connection,"update courseentry set cie1='$c12',cie2='$c22',see='$s2',cattend='$ca2' where usn='$usn' and ccode='$r2'");
oci_execute($q);

$q=oci_parse($connection,"update courseentry set cheld='$ch3',attendance='$a3',cietot='$it3',tot='$tot3',grade='$g3' where usn='$usn' and ccode='$r3'");
oci_execute($q);
$q=oci_parse($connection,"update courseentry set cie1='$c13',cie2='$c23',see='$s3',cattend='$ca3' where usn='$usn' and ccode='$r3'");
oci_execute($q);

$q=oci_parse($connection,"update courseentry set cheld='$ch4',attendance='$a4',cietot='$it4',tot='$tot4',grade='$g4' where usn='$usn' and ccode='$r4'");
oci_execute($q);
$q=oci_parse($connection,"update courseentry set cie1='$c14',cie2='$c24',see='$s4',cattend='$ca4' where usn='$usn' and ccode='$r4'");
oci_execute($q);
	
$q=oci_parse($connection,"update courseentry set cheld='$ch5',attendance='$a5',cietot='$it5',tot='$tot5',grade='$g5' where usn='$usn' and ccode='$r5'");
oci_execute($q);
$q=oci_parse($connection,"update courseentry set cie1='$c15',cie2='$c25',see='$s5',cattend='$ca5' where usn='$usn' and ccode='$r5'");
oci_execute($q);
if(!$q)
{ echo $q;}
?>
		<script>alert("data successfully saved");
				window.location.href="marksreport.html";
					</script>
					<?php
	
}				
?>