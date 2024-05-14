<?php
require_once "../controller/login.php";
require_once "../model/user.php";
require_once "../model/pdo.php";
$username = false;
if (($userid = loggedin()) !== false) {
	if (($row = userid2username($dbh, $userid)) != false) {
		$username = $row["username"];
	}
}

if(isset($_GET['s'])){
	$db = new PDO('sqlite:db.db');
	$searchTerm = $_GET['search'];
	$query = "SELECT name FROM items WHERE name LIKE '%$searchTerm%'";
	$result = $db->query($query);
	while ($row = $result->fetch(PDO::FETCH_ASSOC)){
		echo '<div class="result">';
		echo '<h3>' . $row['name'] . '</h3>';
		$itemId = $row['itemid'];
		$productsQuery = "SELECT itemid FROM items WHERE itemid = $itemId";
		$productsResult = $db->query($productsQuery);
		while ($product = $productsResult->fetch(PDO::FETCH_ASSOC))
		{
			echo '<p>' . $product['name'] . '</p>';
		}
		echo '</div>';
	}
	$db = null;
}
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
    <link rel="stylesheet" href="search.php">
		<link rel="stylesheet" href="./navbar/style.css" />
</head>

<body>
	<!--navbar-->
<?php require "./navbar/nav.php";?>
<!----------------------------------->
	  <script >		
		 
const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
    }    
}

toggleSwitch.addEventListener('change', switchTheme, false);
function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark'); 
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light'); 
    }    
}

const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
    }
}

		</script>
	<img style="width: 100vw;    height: auto;    " src="picture/1.jpg" alt="">
	<div class="separator" style="margin-top: 50px;">
	    <h1 class="hot-categories" style=" margin-top: 80px;">دسته‌های داغ</h1>
	    <div dir="rtl" class="categories" class="amir">
<?php require "../view/hot-cate.php";
foreach ($rows as $row) {
	echo "<div class='category'>";
	echo "<a href=../category/$row[categoryid] >";
	echo " <img src=' $row[categoryimage]'>";
	echo $categories[] = $row['categoryname'];
	echo " </a>  </div>";
}
?>

	</div>

	    <h1 class="hot-categories" style=" margin-top: 80px;">کالا‌های داغ</h1>
	    <div dir="rtl" class="categories" class="amir">
<?php
require"../view/hot-items.php";
foreach ($item as $item_row) {
    $qu_attributes = "SELECT * from attributes where itemid ='$item_row[itemid]' AND key = 'pic' ";  
    $stmt = $dbh->prepare($qu_attributes);
    $stmt->execute();
    $attributes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<div class='category'>";
	echo "<a href=../$item_row[category]$item_row[name]>";
    foreach ($attributes as $attributes_row) {
       
         
         echo " <img src='$attributes_row[value]'>";
    }
	echo  $items[] = $item_row['name'] . "<br>" . $item_row['rating'] . "<br>";
	echo "</div>";

}
?>
	    </div>
	</div>
	<footer class="footer">
	    <div class="footer-left">
		<a href="#"><img src="picture/telegram-svgrepo-com.svg" alt="tel"></a>
		<a href="#"><img src="picture/instagram-svgrepo-com.svg" alt="insta"></a>
		<a href="#"><img src="picture/github-svgrepo-com.svg" alt="github"></a>
	    </div>
	    <div class="footer-center">
		<a href="#" style="margin-bottom: 8px;">درباره ما</a>
		<a href="#" style="margin-top: 8px;">خدمات مشتریان</a>
	    </div>
	    <div class="footer-right">
		<p>شماره تماس:36665666-051</p>
		<p>SiteforTest@gmail.com :ایمیل</p>
		<p>آدرس: خیابان معلم ، معلم 53 ، بین قایم مقام 32 34</p>
	    </div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
	$('#searchInput').on('input', function() {
		var searchTerm = $(this).val();
		$.get('search.php', {search: searchTerm}, function(data) {
			$('.search-results').html(data);
		});
	});
});
</script>



</body>

</html>
