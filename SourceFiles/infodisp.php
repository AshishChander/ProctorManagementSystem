<style type="text/css">
#tab{
		position:absolute;
		left:250px;
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
		width:600px;text-align: centre;
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
</style>		
<?php
session_start();
$name1='san';
$dbhost = 'localhost';     
$dbuser = 'root';   
$dbpass = '';
$dbname='abc';
$connection =mysqli_connect($dbhost, $dbuser,'',$dbname);

if(!$connection ) {  
die('Could not connect to Server ' );  
}

$query="SELECT * FROM procstud WHERE proc='$name1' ";
$result=mysqli_query($connection,$query);
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
	<ul>
  
	<li><a href="file:///home/swarna/Downloads/projecthtml/contact.html">Add student</a></li>
	<li><a href="file:///home/swarna/Downloads/projecthtml/about.html">Remove student</a></li>
	</ul><p>Students under your mentoring</p>
	<?php
		echo '<centre><table border="1px" id="tab">'; 
echo '<tr><th class="h">Name</th><th class="h">USN</th><th class="h">Proctor</th></tr>'; 
while($row = mysqli_fetch_array($result))
{
  echo "<tr><td>"; 
  echo $row['name'];
  echo "</td><td>";   
  echo $row['usn'];
  echo "</td><td>";    
  echo $row['proc'];
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