<?php
require_once "../controller/login.php";
require_once "../model/user.php";
require_once "../model/pdo.php";
$username = false;
if (($userid=loggedin())!==false) {
	if (($row=userid2username($dbh,$userid)) != false ){
	$username=$row["username"];
	}
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
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <div class="left-items">
<?php if($username==false){ 
                echo '<a class="btn" href="sign-up.php">ورود / ثبت نام </a>';
} else{
	$husername = htmlentities($username);
	echo '<a class="btn" href="userpage/?=username"' .$husername .'>' .$husername .'</a>';
} ?>

                <button class="btn">سبد خرید</button>
            </div>
            <div class="right-items">
                <input type="text" placeholder="جستجو...">
                <button class="btn">جستجو</button>
            </div>
        </div>
        <div class="second-row">
            <a href="#" class="nav-item">دسته بندی</a>
            <a href="#" class="nav-item">پیگیری سفارشات</a>
            <a href="#" class="nav-item">درباره ما</a>
        </div>
        <img style="width: 100vw;    height: auto;    margin-top: 20px;" src="picture/poster Up.webp" alt="">
         <div class="categories" style="margin-top: 50px; ">
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
         <div class="categories" style="display: flex; justify-content: center; flex-wrap: wrap;">
            <div class="category">
                <a href="category1.html">
                    <img src="picture/palette-svgrepo-com.svg" alt="">
                    <p>paint</p>
                </a>
            </div>
            <div class="category">
                <a href="category1.html">
                    <img src="picture/palette-svgrepo-com.svg" alt="">
                    <p>paint</p>
                </a>
            </div>
            <div class="category">
                <a href="category1.html">
                    <img src="picture/palette-svgrepo-com.svg" alt="">
                    <p>paint</p>
                </a>
            </div>
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
         <p >amirhosseinfatemicod1385@gmail.com :ایمیل</p>
           <p>آدرس: خیابان معلم ، معلم 53 ، بین قایم مقام 32 34</p>
        </div>
    </footer>
</body>
</html>
