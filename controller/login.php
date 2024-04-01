<?php
require_once "../lib/config.php";
require_once "../lib/encrypt.php";
function loggedin()
{
	global $secretkey;
	if (!isset($_COOKIE)) { return false; }
	if (!isset($_COOKIE["usertoken"])) { return false; }
	$userid=decrypt($_COOKIE["usertoken"],$secretkey);
	if (!$userid){return false;}
	if (!ctype_digit($userid)){return false;}
	return $userid;
}

function login(string $userid)
{
	global $secretkey;
	global $domain;
	global $ishttps;
	setcookie("usertoken",encrypt($userid,$secretkey),time()+10000,'/',$domain,$ishttps,1);
}

