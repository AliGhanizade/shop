<?php
require_once "../lib/ppdo.php";
function find_userid(PDO $dbh,string $useremail){
	$sth=pdo_prepare($dbh,"SELECT userid FROM users WHERE username = :useremail OR email = :useremail ");
	pdo_exec($sth,["useremail"=> $useremail]);
	$row=pdo_fetch($sth);
	return $row; 
}
function userrow(PDO $dbh,string $useremail){
	$sth=pdo_prepare($dbh,"SELECT username,passhash,userid FROM users WHERE username = :useremail OR email = :useremail ");
	pdo_exec($sth,["useremail"=> $useremail ]);
	$row=pdo_fetch($sth);
	return $row; 
}
