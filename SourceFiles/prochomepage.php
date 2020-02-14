<style type="text/css">
#tab{
		position:absolute;
		left:100px;
		top:300px;
		border-width:5px;
		background-color:ivory;
		col-width:70px;
		font-size:18px;
		
		
	}
	p {font-size:25px;}
.h{
		background-color:rgb(198, 217, 236);
		color:red;
		font-size:20px;
}
th, td {
  padding: 10px;
  text-align: centre;
}
table{
		width:600px;text-align:centre;
		position: relative;
		left:-30px;
}
/* Style the header */
.header {
  background-color:powderblue;
  padding: 20px;
  text-align:left;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}


li .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li  .dropdown:hover .dropbtn {
  background-color: red;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}
#c{
	position:absolute;
	top:0px;
	left:0px;
}
#cc{
	position:absolute;
	top:0px;
	left:150px;
}
.b{
	width:30px;
	background-color:#333;
	width:150px;
	height:50px;
	color:white;
	display: inline-block;
	border:0px;
}
#l{
	position:absolute;
	top:0px;
	left:300px;
}
#dd{
	background-color:#333;
	width:1520px;
	height:50px;
	position:absolute;
	top:130px;
	}
#aa{
	position:absolute;
		top:170px;
}
#bb{
	position:absolute;
		top:240px;font-size:20px;
}
#ll{
	position:absolute;
		top:0px;
		left:450px;
}
#lll{
	position:absolute;
		top:0px;
		left:750px;	
		
}
#lllll{
	position:absolute;
		top:0px;
		left:600px;	
		
}
#bbb{
	position:absolute;
	top:180px;font-size:15px;
}
</style>		
<?php
session_start();
$name1=$_SESSION['username'];
$dbhost = 'localhost/orcl';     
$dbuser = 'system';   
$dbpass = 'oracle';
$dbname='procmgmtsys';
$connection =oci_connect($dbuser, $dbpass,$dbhost);

if(!$connection ) {  
die('Could not connect to Server ' );  
}

$query="SELECT* FROM facultyinfo  WHERE fid='$name1' ";
$result=oci_parse($connection,$query);
$c=oci_execute($result);
oci_fetch($result);
$name=oci_result($result,'FNAME');
if(!$result){
die('Could not ' );  
}	
else{
	?>
	<html><body background="bgg.jpg">
	<div class="header">
	<img style="position:relative;top:-15px;left:-10px;width:5%;height:10%;"src="logo.jpg"></img>
	<b style="font-size:30px;position:relative;top:-40px;left:50px;">BMSCE</b>
	</div>
	<div id="dd" >
	<form method="post"action="#">
	<input class="b"id="c"type="submit" value="Home"/></form>
	<form method="post" action="studentsignup.html">
	<input class="b"id="cc"type="submit" value="Add Student"/></form>
	<form method="post" action="procremove.php">
	<input class="b"id="ll"type="submit" value="Delete Reports"/></form>
	<form method="post" action="report.html">
	<input class="b"id="l"type="submit" value="Reports"/></form>
		<form action="marksreport.html">
	<input type="submit"class="b"id="lllll" onclick="all();" value="Update Record" ></form>
	<form action="logout.php">
	<input type="submit"class="b"id="lll" onclick="all();" value="Logout" ></form>
	</div><br/><br/>
	<p id="bbb"><b>Welcome  <?php echo $name ?>  !</b></p>
	<p id="bb"><b>Student Details:</b></p>
	<?php
		echo '<centre><table border="1px" id="tab">'; 
echo '<tr><th class="h">USN</th><th class="h">Student Name</th><th class="h">Contact no.</th></tr>'; 
$query="SELECT *FROM proctorview WHERE fid='$name1' ";
$result=oci_parse($connection,$query);
$c=oci_execute($result);
while(($row =oci_fetch_array($result,OCI_NUM)))
{
  echo "<tr><td>"; 
   echo ($row[0]);
  echo "</td><td>";   
   echo($row[1]);
  echo "</td><td>";
  echo ($row[2]);
  echo "</td></tr>";  
    
}
echo "</table></centre>"; 
	?>
	<br/><br /><br/>
	</body>
	</html>
<?php 
	}
?>