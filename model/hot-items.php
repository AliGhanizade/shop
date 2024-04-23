
<?php
require "../model/pdo.php";
$qu_items = "SELECT name, rating, price, click, creation_date FROM items where category LIKE '1/%' ORDER BY rating DESC, click DESC, creation_date DESC ,ratingnum DESC LIMIT 5";
$stmt = $dbh->prepare($qu_items);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$items = array();

echo '<p>';
foreach ($rows as $row) {
    echo 'Name: ' . $row['name'] . ', Rating: ' . $row['rating'] . ', Price: ' . $row['price'] . "\t\n" . ', click: ' . $row['click'] . $row['creation_date'] . '<br>';
    $items[] = $row['name'] . "<br>" . $row['rating'] . "<br>";

}
echo '</p>';
print_r($items);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="front.css">
    <link rel="stylesheet" href="var.css">
    <link rel="stylesheet" href="tap.bar footer.css">
</head>

<body dir="rtl">
    <div class="separator" style="margin-top: 50px;">
        <h1 class="hot-categories" style=" margin-top: 80px;">دسته های داغ</h1>
        <div class="categories" class="amir">
            <?php
            foreach ($rows as $row) {

                echo "<div class='category'>";
                echo "<a href='category1.html'>";
                echo " <img src='picture/palette-svgrepo-com.svg'>";
               echo  $items[] = $row['name'] . "<br>" . $row['rating'] . "<br>";
                echo " </a>  </div>";

            }
            ?>
        </div>
    </div>
</body>

</html>