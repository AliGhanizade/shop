
<?php
require "../model/pdo.php";
$qu_items = "SELECT name, rating, price, click, creation_date FROM items where category LIKE '1/%' ORDER BY rating DESC, click DESC, creation_date DESC ,ratingnum DESC LIMIT 5";
$stmt = $dbh->prepare($qu_items);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$items = array();
/*
foreach ($rows as $row) {
    $items[] = $row['name'] . "<br>" . $row['rating'] . "<br>";

}*/

?>
