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
	$query = "SELECT * FROM categories WHERE categoryname LIKE '%$searchTerm%'";
	$result = $db->query($query);
	while ($row = $result->fetch(PDO::FETCH_ASSOC)){
		echo '<div class="result">';
		echo '<h3>' . $row['categoryname'] . '</h3>';
		$categoryId = $row['categoryid'];
		$productsQuery = "SELECT * FROM categories WHERE categoryid = $categoryId";
		$productsResult = $db->query($productsQuery);
		while ($product = $productsResult->fetch(PDO::FETCH_ASSOC))
		{
			echo '<p>' . $product['categoryname'] . '</p>';
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
<?php require "./navbar/nav.php";?>
	<!-- <div class="second-row">
	    <a href="#" class="nav-item">دسته بندی</a>
	    <a href="#" class="nav-item">پیگیری سفارشات</a>
	    <a href="#" class="nav-item">درباره ما</a>
	</div> -->
	<img style="width: 100vw;    height: auto;    margin-top: 2px;" src="picture/1.jpg" alt="">
	<div class="categories" class="amir" style="margin-top: 50px; ">
	    <div class="category">
		<a href="category1.html">
		    <img src="picture/palette-svgrepo-com.svg" alt="Category 1">
		    <p>هنر</p>
		</a>
	    </div>
	    <div class="category">
		<a href="category1.html">
		    <img src="picture/img102.jpg" alt="Category 1">
		    <p>هنر</p>
		</a>
	    </div>
	    <div class="category">
		<a href="category1.html">
		    <img src="picture/palette-svgrepo-com.svg" alt="Category 1">
		    <p>هنر</p>
		</a>
	    </div>
	    <div class="category">
		<a href="category1.html">
		    <img src="picture/palette-svgrepo-com.svg" alt="Category 1">
		    <p>هنر</p>
		</a>
	    </div>
	    <div class="category">
		<a href="category1.html">
		    <img src="picture/palette-svgrepo-com.svg" alt="Category 1">
		    <p>هنر</p>
		</a>
	    </div>
	    <div class="category">
		<a href="category1.html">
		    <img src="picture/palette-svgrepo-com.svg" alt="Category 1">
		    <p>هنر</p>
		</a>
	    </div>
	    <div class="category">
		<a href="category1.html">
		    <img src="picture/palette-svgrepo-com.svg" alt="Category 1">
		    <p>هنر</p>
		</a>
	    </div>
	</div>
	<div class="separator" style="margin-top: 50px;">
	    <h1 class="hot-categories" style=" margin-top: 80px;">دسته های داغ</h1>
	    <div class="categories" class="amir">
<?php require "../view/hot-cate.php";
foreach ($rows as $row) {
	echo "<div class='category'>";
	echo "<a href=category/$row[categoryid] >";
	echo " <img src=' $row[categoryimage]'>";
	echo $categories[] = $row['categoryname'];
	echo " </a>  </div>";
}
?>

	</div>

	    <h1 class="hot-categories" style=" margin-top: 80px;">ایتم های داغ</h1>
	    <div class="categories" class="amir">
<?php
require"../view/hot-items.php";
foreach ($rows as $row) {

	echo "<div class='category'>";
	echo "<a href=''>";
	echo " <img src='picture/palette-svgrepo-com.svg'>";
	echo  $items[] = $row['name'] . "<br>" . $row['rating'] . "<br>";
	echo " </a>  </div>";

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
		<p>شماره تماس: 12345678</p>
		<p>amirhosseinfatemicod1385@gmail.com :ایمیل</p>
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
