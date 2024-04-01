<?php
require_once "../lib/ppdo.php";
function userid2username(PDO $dbh,string $userid){
	$sth=pdo_prepare($dbh,"SELECT username FROM users WHERE userid=:userid");
	pdo_exec($sth,["userid"=> $userid]);
	$row=pdo_fetch($sth);
	return $row; 
}
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

/*
function userrow_name_or_email(PDO $dbh,string $user,$email){
	$sth=pdo_prepare($dbh,"SELECT username,passhash,userid FROM users WHERE username = :user OR email = :email ");
	pdo_exec($sth,["email"=> $email ,"user"=> $user]);
	$row=pdo_fetch($sth);
	return $row; 
}
 */
