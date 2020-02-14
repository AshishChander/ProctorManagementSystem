<?php
	session_start();
	
setcookie(session_name(), '', 100);
session_unset();
session_destroy();
$_SESSION = array();


?><script>alert("log out successful");
		window.location.href="studentlogin.html";
		</script>
