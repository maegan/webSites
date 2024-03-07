<?php

	setcookie("id","1234",time()+60*60*24);
	
	echo $_COOKIE["id"];

?>