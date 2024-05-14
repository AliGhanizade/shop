<nav id=nav>
	<input id=hamburger type=checkbox >
	<span id=tb></span>
	<span id=me></span>
	<span id=bb></span>
	<ul>
		<li><a href="/">test</a></li>
		<li><a href="/">test</a></li>
		<li><a href="/">test</a></li>
		<li><a href="cart.php">سبد خرید</a></li>
		<li>
		
		<?php if ($username == false) {
		echo '<a class="btn" href="sign-up.php">ورود / ثبت نام </a>';
		} else {
		$husername = htmlentities($username);
		echo '<a href="userpage/?=username"' . $husername . '>' . $husername . '</a>';
		} ?>
		</li>
		<li>
		
				<div class="theme-switch-wrapper">
					<label class="theme-switch" for="checkbox">
						<input type="checkbox" id="checkbox" />
						<div class="slider round"></div>
					</label>

				</div>
			
		</li>
		<li>
			<form id=searchbox method="get">
				<input id=search type=text name=s placeholder=Search title="Search the shop">
				<label>
				<input type=submit style="display:none;">
				<div id=searchbutton >
				<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 50 50">
					<path d="M 21 4 C 11.082241 4 3 12.082241 3 22 C 3 31.917759 11.082241 40 21 40 C 24.62177 40 27.99231 38.91393 30.820312 37.0625 L 43.378906 49.621094 L 47.621094 45.378906 L 35.224609 32.982422 C 37.581469 29.938384 39 26.13473 39 22 C 39 12.082241 30.917759 4 21 4 z M 21 8 C 28.756241 8 35 14.243759 35 22 C 35 29.756241 28.756241 36 21 36 C 13.243759 36 7 29.756241 7 22 C 7 14.243759 13.243759 8 21 8 z"></path>
				</svg>
				</div>
				</label>
				 </form></li>
	</ul>
</nav>
