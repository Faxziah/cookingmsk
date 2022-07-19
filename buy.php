<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Корзина">
	<title>Корзина</title>
	<link rel="canonical" href="https://cookingmsk.ru/buy" />
	<link rel="stylesheet" type="text/css" href="styles/header.css?"/>
	<link rel="stylesheet" type="text/css" href="styles/buy.css?"/>
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


<!-- Скрипт изменения количества товара и суммы -->
<script type="text/javascript">
	function fun () {
		  event.preventDefault();
	};

	$(document).ready (function () {
		$("button[name='yes']").bind("click", function () {
			var count = $(this).prev().val();
			var name = $(this).val();
			var res = $(this).parent().parent().prev().text();
			var result = res * count;
			$(this).parent().parent().next().html(result);
			$.ajax ({
				url: "https://cookingmsk.ru/cookie",
				type: "POST",
				data: ({name: name, count: count}),
				beforeSend: fun
			});
		});
	});
</script>

<!-- Скрипт очистки корзины при нажатии кнопки очистки корзины-->
<script type="text/javascript">
	function funn () {
		  event.preventDefault();
	};

	function funcc () {
		$('tr:not(:first)').html('');
	};

	$(document).ready (function () {
		$("button[name='delete']").bind("click", function () {

			$.ajax ({
				url: "https://cookingmsk.ru/delete",
				type: "POST",
				beforeSend: funn,
				success: funcc
			});
		});
	});
</script>

<!-- Скрипт купить товары -->

<script type="text/javascript">
	function funnn () {
		  event.preventDefault();
	};

	function funccc () {
		
	};

	$(document).ready (function () {
		$("button[name='buy']").bind("click", function () {
			if (confirm('Заказать товары?')) {
				alert ('Товары уже готовятся')
				
				var i = 2;
				var x = 1;
				var y = 0;
				var f = [];
				var n = $("tr").length;
				while (i <= n) {
					var a = 'Название: ' + $('tr:nth-of-type(' + i + ') td:nth-of-type(' + 1 + ')').text();
					var b = 'Цена: ' + $('tr:nth-of-type(' + i + ') td:nth-of-type(2)').text() + '\n';
					var c = 'Кол-во: ' + $('tr:nth-of-type(' + i + ') td:nth-of-type(3) input').val() + '\n';
					var d = 'Сумма: ' + $('tr:nth-of-type(' + i + ') td:nth-of-type(4)').text() + '\n';
					var e = a + b + c + d;
					f[y] = e;
					i++;
					x++;
					y++;
				};
				var g = [];
				var h = '\nИнформация о покупателе: \nФИО: ' + $('.delivery p:nth-of-type(1) input').val() + '\n';
				var j = 'Телефон: ' + $('.delivery p:nth-of-type(2) input').val() + '\n';
				var k = 'Время доставки: ' + $('.delivery p:nth-of-type(3) input').val() + '\n';
				var l = 'Адрес доставки: ' + $('.delivery p:nth-of-type(4) input').val() + '\n';
				g = h + j + k + l;
			$('tr:not(:first)').html('');
			    
			};
			
			$.ajax ({
				url: "https://cookingmsk.ru/mail",
				type: "POST",
				data: ({f: f, g: g}),
				beforeSend: funnn,
				success: funccc
			});
		});
	});
</script>

<!-- Скрипт очистки корзины при нажатии кнопки купить-->
<script type="text/javascript">
	$(document).ready (function () {
		$("button[name='buy']").bind("click", function () {

			$.ajax ({
				url: "https://cookingmsk.ru/delete",
				type: "POST"
			});
		});
	});
</script>


</head>


<body>
    <?php include 'header.html' ?>

	<main class="content">
		<article class="order_table">
			<table cellspacing="0">
				<tr>
					<td>Наименование</td>
					<td>Цена, руб</td>
					<td>Кол-во</td>
					<td>Сумма, руб</td>
				</tr>
	<?php
		$connect = new mysqli ('localhost', 'mysql', 'mysql', 'products');

		foreach ($_COOKIE as $key => $value) {
			$pi = $_COOKIE[$key];
			
			if ($key == 'PHPSESSID') {
						continue;
							};
			
			if (isset($pi)) {
		$sql = "SELECT * FROM `products` WHERE `id` = $key";
		$mysql = $connect->query("$sql");
			while ($row = mysqli_fetch_array($mysql)) {
				$photo=$row['photo'];
				$title=$row['title'];
				$price=$row['price'];
			
			$result = $price*$value;
			echo "<tr>
					<td>
						<img src='$photo'>
						<p>".$title."</p>
					</td>
					<td class='price'>".$price."</td>
					<td>
						<form method='post'>
							<input type='number' min='1' max='99' value='$value'>
							<button class='apply' type='submit' value='$key' name='yes'>Применить</button>
						</form>
					</td>
					<td>".$result."</td>
				</tr>";
			};
			};
		};
			$connect->close();
		?>	
			</table>
			<div>
				
				<form method='post' class="delete">
					<button name="buy">Купить</button>
				</form>
				<form method='post' action='https://cookingmsk.ru/delete' class="delete">
					<button name="delete">Очистить корзину</button>
				</form>
			</div>
		</article>

		<article class="delivery">
			<div>
				<h2>Сведения о доставке</h2>
				<p><input type="text" placeholder="ФИО"><span>*</span></p>
				<p><input type="tel" placeholder="Телефон"><span>*</span></p>
				<p><input type="text" placeholder="Время доставки"><span>*</span></p>
				<p><input type="text" placeholder="Адрес доставки"><span>*</span></p>
				<div>
    				<p><input type="checkbox"></p>
	    			<p>Даю согласие на обработку персональных данных<span>*</span></p>
		        </div>
			</div>
		</article>
	</main>
	
	<?php include 'footer.html' ?>
</body>
</html>