
<?php
require "../model/pdo.php";
$qu_items = "SELECT * FROM items ORDER BY rating DESC, click DESC, creation_date DESC ,ratingnum DESC LIMIT 5";
$stmt = $dbh->prepare($qu_items);
$stmt->execute();
$item = $stmt->fetchAll(PDO::FETCH_ASSOC);
$items = array();

?>
