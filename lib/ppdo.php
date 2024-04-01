<?php

function pdo (string $dsn,?string $username = null ,?string $password = null,?array $option = null)
{
	return new PDO($dsn,$username,$password,$option);
}
function pdo_bind_param (PDOStatement $sth,string|int $param,mixed &$var,int $type = PDO::PARAM_STR,int $maxLength=0,mixed $driverOptions=null):bool
{
	return $sth->bindParam($param,$var,$type,$maxLength,$driverOptions);
}
function pdo_bind_val (PDOStatement $sth,string|int $param,mixed $value, int $type = PDO::PARAM_STR): bool
{
	return $sth->bindValue($param,$value,$type);
}
function pdo_exec (PDOStatement $sth,array $params=null):bool
{
	return $sth->execute($params);
}
function pdo_prepare(PDO $dbh,string $query,array $options=[]): PDOStatement|false
{
	return $dbh->prepare($query,$options);
}

function pdo_fetch(PDOStatement $sth,int $mode = PDO::FETCH_DEFAULT,int $cursorOrientation = PDO::FETCH_ORI_NEXT, int $cursorOffset=0):mixed
{
	return $sth->fetch($mode,$cursorOrientation,$cursorOffset);
}
function pdo_fetchall_default(PDOStatement $sth){
	return $sth->fetchAll();
}
