<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Описание продукции">
	<title>Описание продукции</title>
	<link rel="canonical" href="https://cookingmsk.ru/product" />
	<link rel="stylesheet" type="text/css" href="styles/header.css?"/>
	<link rel="stylesheet" type="text/css" href="styles/product.css?"/>
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


<!-- Добавить товар в корзину -->
<script type="text/javascript">
	function fun () {
		  event.preventDefault();
	};
	function func () {
		setTimeout (function(){
      $("button").html('Добавить в корзину');
    },2000);
	    
	};
	
	$(document).ready (function () {
		$("button").bind("click", function () {
			var count = $(this).prev().val();
			var name = $(this).val();
			$(this).html("Добавлено!");
			$.ajax ({
				url: "https://cookingmsk.ru/cookie",
				type: "POST",
				data: ({name: name, count: count}),
				beforeSend: fun,
				success: func
			});
		});
	});
</script>

</head>
<body>
	<?php include 'header.html' ?>
	
<main class="content">
			<article class="product">
			<div>
				<h1>Наша выпечка</h1>
				
					<?php
					$id = $_GET['id'];
					$connect = new mysqli ('localhost', 'mysql', 'mysql', 'products');
						$sql = "SELECT * FROM `products` WHERE `id` = $id ORDER BY `id` DESC LIMIT 4";
					 	$mysql = $connect->query("$sql");  
						while ($row = mysqli_fetch_array($mysql))
						{
							$id=$row['id'];
							$photo=$row['photo'];
							$title=$row['title'];
							$price=$row['price'];
							$description=$row['description'];
						echo "<div>
									<img src='$photo' alt='$title'>
									<p> $title </p>
									<p> $description </p>
								</a>
								<div>
									<p> $price руб.</p>
								</div>
								<form method='post'>
									<input type='number' min='1' max='99' value='1'>
									<button type='submit' value='$id'>Добавить в корзину</button>
								</form>
							</div>";
						}
					$connect->close();
					?>
					
				</div>

	<?php include 'footer.html' ?>



</body>
</html>