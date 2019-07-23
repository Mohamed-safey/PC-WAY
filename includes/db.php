<?php
    error_reporting(0);
	@mysql_connect("localhost","root","") or die("our website is unavaliable at the moment please try again later");
	@mysql_select_db("pc_way") or die("Database maintaince is in progress please try again later");

?>