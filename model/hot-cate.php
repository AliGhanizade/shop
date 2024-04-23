<?php
require "../model/pdo.php";
$qu_cate = "SELECT categoryname,categoryid,categoryimage FROM categories ORDER BY click DESC LIMIT 3";
$stmt = $dbh->prepare($qu_cate);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$categories = array();
        

     
