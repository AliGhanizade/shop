<?php
require_once "../model/pdo.php";
require_once "../model/user.php";
require_once "../controller/login.php";

function signin_array()
{
	return [ 
		"needed"=>
		[
			"user" => $_POST["user"],
			"pass"=> $_POST["pass"],
			"passrpt"=>$_POST["passrpt"],
			"email"=>$_POST["email"],
		],
		"optional"=>
		[
			"name"=>$_POST["name"],
			"last"=>$_POST["last"],
			"phone"=>$_POST["phone"],
		]
	];
}
function insert_user (PDO $dbh,array $users){
	$rowuser=userrow($dbh,$users["needed"]["user"]);
	$rowemail=userrow($dbh,$users["needed"]["email"]);
	if($rowuser || $rowemail){
		$error = [];
		$error += $rowemail?["email"=>"Email exist"]:[];
		$error += $rowuser?["user"=>"User name exist"]:[];
		return $error;
	}
	$sth=pdo_prepare($dbh,
		"INSERT INTO users "
		. "(username,email,passhash,creation_date,online"	
		. (($users["optional"]["last"])?",lastname":"")
		. (($users["optional"]["name"])?",firstname":"")
		. (($users["optional"]["phone"])?",lastname":"")
		.")"
		."VALUES"
		."("
		.":user,:email,:passhash,:date,:online"
		. (($users["optional"]["last"])?",:last":"")
		. (($users["optional"]["name"])?",:name":"")
		. (($users["optional"]["phone"])?",:phone":"")
		.");"
	);
	$values["user"]=$users["needed"]["user"];
	$values["passhash"]=password_hash($users["needed"]["pass"],PASSWORD_DEFAULT);
	$values["email"]=$users["needed"]["email"];
	$values["date"]=time();
	$values["online"]=1;
	$values["name"]=$users["optional"]["name"];
	$values["last"]=$users["optional"]["last"];
	$values["phone"]=$users["optional"]["phone"];
	pdo_exec($sth,$values);
	$row=pdo_fetch($sth);
	return $row; 

}
function validate_signins(PDO $dbh,$signins)
{
	if ($error=array_filter($signins["needed"],function ($val){return !$val;}))
	{
		return	array_map(function (){return "Fill the input";},$error);
	}

	if (!ctype_alnum( $signins["needed"]["user"]	)) { $error["user"] = "Input alphanumeric charterers"; }
	if (!ctype_print( $signins["needed"]["pass"]	)) { $error["pass"] = "Input printable charterers"; }
	if (!ctype_print( $signins["needed"]["passrpt"]	)) { $error["passrpt"] = "Input printable charterers"; }
	if (!ctype_print( $signins["needed"]["email"]	)) { $error["email"] = "Input printable charterers"; }
	if (!filter_var(  $signins["needed"]["email"]	,FILTER_VALIDATE_EMAIL)) { $error["email"] = "Email is not valid"; }
	if ($signins["needed"]["passrpt"] !== $signins["needed"]["pass"]) { $error["passrpt"] = "Passwords do not match"; }

	if (isset ($signins["optional"]["name"])  && !ctype_alpha( $signins["optional"]["name"]	)) { $error["name"] = "Input only alphabetical charterers"; }
	if (isset ($signins["optional"]["last"])  && !ctype_alpha( $signins["optional"]["last"]	)) { $error["last"] = "Input only alphabetical charterers"; }
	if (isset ($signins["optional"]["phone"]) && !ctype_digit( $signins["optional"]["phone"])) { $error["phone"] = "Input numerical charterers"; }
	if (isset ($signins["optional"]["phone"]) && strlen( $signins["optional"]["phone"] ) !== 11 ) { $error["phone"] = "Input 11 digits"; }

	if ($error)
	{ return $error; }

	return insert_user ($dbh,$signins);
}
if ($_SERVER['REQUEST_METHOD']==='POST')
{
	$signins = signin_array();
	$error=validate_signins($dbh,$signins);
	if (!$error){
		$row=find_userid($dbh,$signins["needed"]["user"]);
		login($row["userid"]);
		header('location: /view/index.php');
	}

}
