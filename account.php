<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Личный кабинет">
	<title>Личный кабинет</title>
	<link rel="canonical" href="https://cookingmsk.ru/account" />
	<link rel="stylesheet" type="text/css" href="styles/header.css?"/>
	<link rel="stylesheet" type="text/css" href="styles/account.css?"/>
	<link rel="stylesheet" type="text/css" href="styles/footer.css?"/>
	<link rel="icon" type="image/png" href="photo/logo.jpg" />
    <script src="jquery.js"></script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(87605223, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/87605223" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GXY6BKB6ZB"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GXY6BKB6ZB');
</script>


<!-- Скрипт регистрации -->
<script type="text/javascript">
	function funa () {
		  event.preventDefault();
	};
	function funca (data) {
		$("form[name='reg_form'] input").val('');
			if (data == 'good') {
				alert ('Регистрация прошла успешно. Теперь Вы можете войти в личный кабинет');
			}	else {
				alert ('Электронная почта занята');
			}
	};

	$(document).ready (function () {
		$("button[name='registration']").bind("click", function () {
			var aa = $("form[name='reg_form'] input[name='login']").val();
			var bb = $("form[name='reg_form'] input[name='password']").val();
			var cc = $("form[name='reg_form'] input[name='name']").val();
			var dd = $("form[name='reg_form'] input[name='email']").val();
			var ee = $("form[name='reg_form'] input[name='telephone']").val();
			$.ajax ({
				url: "https://cookingmsk.ru/registration",
				type: "POST",
				data: ({login: aa, password: bb, name: cc, email: dd, telephone: ee}),
				beforeSend: funa,
				success: funca

			});
		});
	});
</script>

<!-- Скрипт авторизации -->
<script type="text/javascript">
	function funaa () {
		event.preventDefault();
	};
	function funcaa (data) {
		$("form[name='auth_form'] input").val('');
		$('button[name="leave"]').show();
			if (data == 'good') {
				alert ('Вы вошли в личный кабинет');
			}	else {
				alert ('Вы ввели неправильно логин или пароль') ;
			}
	};

	$(document).ready (function () {
		$("button[name='auth']").bind("click", function () {
			var ff = $("form[name='auth_form'] input[name='login']").val();
			var gg = $("form[name='auth_form'] input[name='password']").val();
			$.ajax ({
				url: "https://cookingmsk.ru/auth",
				type: "POST",
				data: ({login: ff, password: gg}),
				beforeSend: funaa,
				success: funcaa

			});
		});
	});
</script>

<!-- Скрипт выхода из личного кабинета-->
<script type="text/javascript">
	function funnaa () {
		  event.preventDefault();
	};

	function funccaa () {
		$('button[name="leave"]').hide();
	};

	$(document).ready (function () {
		$("button[name='leave']").bind("click", function () {

			$.ajax ({
				url: "https://cookingmsk.ru/leave",
				type: "POST",
				beforeSend: funnaa,
				success: funccaa
			});
		});
	});
</script>


</head>
<body>
	<?php include 'header.html' ?>
	<main class="content">
		<article>
			<div>
				<h1>Личный кабинет</h1>
				<div>
					<div>
						<h3>Войти в личный кабинет</h3>
						<form name="auth_form">
							<p><input type="text" name="login" placeholder="Логин"></p>
							<p><input type="password" name="password" placeholder="Пароль"></p>
							<button name="auth">Войти</button>
						</form>
						<?php 
							foreach ($_COOKIE as $key => $value) {
								$user = $_COOKIE[$key];
									};
								if (isset($_COOKIE['PHPSESSID'])) {
								echo '<button name="leave" class="leave">Выйти из личного кабинета</button>';
						 	};
						 ?>
					</div>
					<div>
						<h3>Регистрация</h3>
						<form name="reg_form">
							<p><input type="text" name="login" placeholder="Логин"></p>
							<p><input type="password" name="password" placeholder="Пароль"></p>
							<p><input type="text" name="name" placeholder="ФИО"></p>
							<p><input type="email" name="email" placeholder="Email"></p>
							<p><input type="tel" name="telephone" placeholder="Телефон"></p>
							<button name="registration">Зарегистироваться</button>
						</form>
					</div>
				</div>
			</div>
		</article>

<!--         <article>
        <h2>Ваши заказы</h2>
</article> -->
	</main>





	<?php include 'footer.html' ?>
</body>
</html>