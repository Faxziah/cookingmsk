<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Интернет-магазин домашней выпечки на заказ. Кондитерская">
	<title>Выпечка на заказ</title>
	<link rel="canonical" href="https://cookingmsk.ru" />
	<link rel="stylesheet" type="text/css" href="styles/header.css?"/>
	<link rel="stylesheet" type="text/css" href="styles/styles.css?"/>
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
			<article class="short_products">
			<div>
				<h1>Наша выпечка</h1>
				<div>
					<?php
					$connect = new mysqli ('localhost', 'mysql', 'mysql', 'products');
						$sql = "SELECT * FROM `products` WHERE `id` > '0' ORDER BY `id` DESC";
					 	$mysql = $connect->query("$sql");
                            while ($row = mysqli_fetch_array($mysql))
						{
							$id=$row['id'];
							$photo=$row['photo'];
							$title=$row['title'];
							$price=$row['price'];
							$description=$row['description'];
						echo "<div>
								<a href=https://cookingmsk.ru/product?id=$id>
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
					
					<div class="blocks"></div>
					<div class="blocks"></div>
					<div class="blocks"></div>
				</div>

			</div>
			<div class="show_more">
			    <a href="https://cookingmsk.ru/products">Показать всю продукцию</a>
		    </div>
		</article>

	<article class="short_about">
			<div>
				<h1>О нас</h1>
				<h2>В чем наш секрет?</h2>
				<p>Мы занимаемся производством домашней выпечки без добавления красителей, консервантов и усилителей вкуса. Мы знаем, какими должны быть настоящий торт, пирог, булочка, хлеб и другая выпечка.</p>
				<h2>Есть событие, которое хотите отметить или просто хотите порадовать семью или друзей?</h2>
				<p>Мы создадим для Вас праздник. Наша выпечка высочайшего качества, свежая и вкусная, украсит Ваш стол на день рождения, корпоратив и другой праздник и создадут нужную атмосферу.</p>
				<h2>Может быть Вам захотелось вкусно, сытно и недорого поесть? Ждете гостей?</h2>
				<p>Тогда наша выпечка поможет Вам остаться довольными.</p>
			</div>
			<div class="show_more">
			    <a href="https://cookingmsk.ru/about">Подробнее о нас</a>
		    </div>			
		</article>

		<article class="short_delivery">
			<div>
				<h1>Доставка</h1>
				<p>Доставка осуществляется по Москве и Московской области. Также есть возможность самовывоза.</p>
			     <p>Заказы доставляются на следующий день</p>
			</div>
			<div class="show_more">
			    <a href="https://cookingmsk.ru/delivery">Условия доставки</a>
		    </div>
		</article>
		
		<article class="short_delivery">
			<div>
				<h1>Отзывы</h1>
				<p>Лучшая компания. Покупали у них булочки и остались очень довольны.</p>
			     <p>Нам все очень понравился, обязательно будет закажем еще.</p>
			</div>
			<div class="show_more">
			    <a href="https://cookingmsk.ru/reviews">Показать все отзывы</a>
		    </div>
		</article>
	</main>
    
    <script type="text/javascript">
        const limit = 25;
let page = 1;
let getContactsListQueryUrl = '/api/v4/contacts';

function getContacts() {
    $.ajax({
        url: getContactsListQueryUrl,
        method: 'GET',
        data: {
            limit: limit,
            with: 'leads',
            page: page
        }
    }).done(function(data) {
        if (!!data) {
            console.log(data)

        } else {
            console.log('Контактов нет');
            return false;
        }
    }).fail(function(data) {
        console.log('Что-то пошло не так c получением контактов');
        console.log(data);
        return false;
    })

    page++;
}
console.log (getContacts());

    </script>
    
	<?php include 'footer.html' ?>
</body>
</html>