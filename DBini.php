<?php

	$DBSERVER	="localhost";
	$DBUSER		="pbrAdmin";
	$DBPASSWORD	="pbrAdmin";
	$DBNAME		="pbrdatabase";

	$con = mysql_connect($DBSERVER,$DBUSER,$DBPASSWORD);

	mysql_query("set names utf8");

	$selectdb = mysql_select_db($DBNAME,$con);

?>
