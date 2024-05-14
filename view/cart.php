<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="front.css">
    <link rel="stylesheet" href="./navbar/style.css">
    <script src="/view/js/_hyperscript.min.js" > </script>
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
require "./navbar/nav.php";
?>

</header>

<body dir="rtl">
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
    <div class="bascket">
    <?php
        $db = new PDO('sqlite:db.db');
        $query = "SELECT * FROM basket UNION SELECT * FROM attributes";
        $result = $db->query($query);
        if ($result) {
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              echo '<div class="itemincart"&gt;';
              echo '<div class="image">';
              echo '<img src="picture/Untitled.jpg' /*. $row['value']*/ . '" alt="">';
              echo '</div>';
              echo '<div class="info">';
              echo '<p> tyguhljik</p>';
              echo '<a href="#">' . $row['basketid'] . '</a>';
              echo '<p>' . $row['itemid'] . '</p>';
              echo '<span>';
              echo '<button>+</button>';
              echo '<p>' . $row['itemcount'] . '</p>';
              echo '<button>-</button>';
              echo '</span>';
              echo '<p> 1 </p>';
              echo '</div>';
              echo '<div>';
              echo '<button>DELETE</button>';
              echo '</div>';
              echo '</div>';
          }
      } else {
          echo 'هیچ موردی در سبد خرید وجود ندارد.';
      }
      $db = null;
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
</body>

</html>
