<?php
	require_once('db.php');
	
	if	(!$dbconn = mysql_connect(hostname_winestore, username_winestore, password_winestore)) 
		{
		echo 'Could not connect to mysql on ' . hostname_winestore . '\n';
		exit;
		}
	
	echo 'Connected to mysql <br />';
	
	if	(!mysql_select_db(database_winestore, $dbconn)) 
		{
		echo 'Could not user database ' . database_winestore . '\n';
		echo mysql_error() . '\n';
		exit;
		}
	
	echo 'Connected to database ' . database_winestore;
?>
