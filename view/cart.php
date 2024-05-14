<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="front.css">
    <link rel="stylesheet" href="./navbar/style.css">
</head>
<header dir="ltr">

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

require "./navbar/nav.php"
?>
</header>

<body dir="rtl">
    <div class="bascket">
        <div class="carts">
            <div class="itemincart">
                <div class="image">
                    <img src="picture/Untitled.jpg" alt="">
                </div>
                <div class="info">
                    <a href="">
                        موز
                    </a>
                    <p>
                        dfkdfmfkdm
                    </p>
                    <p>1ffffffff</p>
                    <p>fdsfsfsdsf</p>
                    <p>dfdsfdddddddddddddddddddddddfdsfgfdf</p>
                    <p>fsfdsfsdfsddfs</p>
                    <p>fddddddddddd</p>
                    <p>1ffffffff</p>
                    <p>fdsfsfsdsf</p>
                    <p>dfdsfdddddddddddddddddddddddfdsfgfdf</p>
                    <p>fsfdsfsdfsddfs</p>
                    <p>fddddddddddd</p>
                    <p>1ffffffff</p>
                    <p>fdsfsfsdsf</p>
                    <p>dfdsfdddddddddddddddddddddddfdsfgfdf</p>
                    <p>fsfdsfsdfsddfs</p>
                    <p>fddddddddddd</p>

                    <span>
                        <button>+</button>
                        <p>1</p>
                        <button>-</button>
                    </span>
                </div>
                <div>
                    <button>DELETE</button>
                </div>
            </div>
            <div class="itemincart">
                <div class="image">
                    <img src="picture/Cart.svg" alt="">
                </div>
                <div class="info">
                    <h3>موز</h3>
                    <p>cceeccec</p>
                    <h5>kcxndwwwwckn</h5>
                    <h5>kcxndwwwwckn</h5>
                    <span>
                        <button>+</button>
                        <p>1</p>
                        <button>-</button>
                    </span>
                </div>
                <div>
                    <button>DELETE</button>
                </div>
            </div>
        </div>
        <div class="checkout">
            <div>
                <div>
                    <p>اصل قیمت</p>
                    <p>تخفیف</p>
                    <p>سود شما</p>
                    <p>مبلغ پرداختی</p>
                </div>
                <div dir="ltr">
                  <p>15000000</p>
                  <p>15000</p>
                  <p>239000</p>
                  <p>15000000</p>
                </div>
            </div>
            <hr>
            <button>خرید</button>
        </div>

    </div>
</body>

</html>