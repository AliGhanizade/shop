<?php 
require "../controller/signup.ctl.php" ;
require_once "../controller/login.php";
require_once "../model/user.php";
require_once "../model/pdo.php";
$username = false;
if (($userid = loggedin()) !== false) {
  if (($row = userid2username($dbh, $userid)) != false) {
    $username = $row["username"];
  }
}
if (isset($_GET['s'])) {
  $db = new PDO('sqlite:db.db');
  $searchTerm = $_GET['search'];
  $query = "SELECT name FROM items WHERE name LIKE '%$searchTerm%'";
  $result = $db->query($query);
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="result">';
    echo '<h3>' . $row['name'] . '</h3>';
    $itemId = $row['itemid'];
    $productsQuery = "SELECT itemid FROM items WHERE itemid = $itemId";
    $productsResult = $db->query($productsQuery);
    while ($product = $productsResult->fetch(PDO::FETCH_ASSOC)) {
      echo '<p>' . $product['name'] . '</p>';
    }
    echo '</div>';
  }
  $db = null;
}
  ?>
<!DOCTYPE html>
<style>
  label:empty {
    display: none;
  }
</style>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ثبت نام</title>
  <link rel="stylesheet" href="styleforlogin.css">
	<link rel="stylesheet" href="./navbar/style.css" />
<script src="/view/js/_hyperscript.min.js" > </script>
</head>

<body dir="ltr">
  <?php require "./navbar/nav.php";?>
  <div class="body">


    <div class="container">
      <div class="login-box">
        <div>
          <h2>ثبت نام</h2>
        </div>
        <form method=post>
          <main>
            <!-- Important parameters -->
            <div class="input-box">
              <input placeholder="" type="text" required name="user" value=<?= htmlentities($signins["needed"]["user"] ?? '') ?>>
              <label>نام کاربری</label>
            </div>
            <label class="danger"><?= $error["user"] ?? null ?></label>
            <div class="input-box">
              <input placeholder="" type=password required name="pass" value=<?= htmlentities($signins["needed"]["pass"] ?? '') ?>>
              <label> رمز </label>
            </div>
            <label class="danger"><?= $error["pass"] ?? null ?></label>
            <div class="input-box">
              <input placeholder="" type=password required name="passrpt" value=<?= htmlentities($signins["needed"]["passrpt"] ?? '') ?>>
              <label>تکرار رمز </label>
            </div>
            <label class="danger"><?= $error["passrpt"] ?? null ?></label>
            <div class="input-box">
              <input dir="ltr" placeholder="" type=email required name="email" value=<?= htmlentities($signins["needed"]["email"] ?? '') ?>>
              <label>ایمیل</label>
            </div>
            <label class="danger"><?= $error["email"] ?? null ?></label>
            <hr>
            <!-- Unmportant parameters -->
            <div class="input-box">
              <input type="text" name="name" placeholder="" value=<?= htmlentities($signins["optional"]["name"] ?? '') ?>>
              <label>نام </label>
            </div>
            <label class="danger"><?= $error["name"] ?? null ?></label>
            <div class="input-box">
              <input placeholder="" type="text" name="last" value=<?= htmlentities($signins["optional"]["last"] ?? '') ?>>
              <label>نام خانوادگی</label>
            </div>
            <label class="danger"><?= $error["last"] ?? null ?></label>
            <div class="input-box">
              <input placeholder="" type="text" name="phone" value=<?= htmlentities($signins["optional"]["phone"] ?? '') ?>>
              <label>شماره همراه</label>
            </div>
            <label class="danger"><?= $error["phone"] ?? null ?></label>

            <button type="submit" class="btn">ثبت نام</button>

            <div class="signup-link">
              <a href="login.php">قبلا حساب داشته‌ام</a>
            </div>
        </form>
      </div>

    </div>
</body>

</html>