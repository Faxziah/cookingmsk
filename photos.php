<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Наши работы">
	<title>Наши работы</title>
	<link rel="canonical" href="https://cookingmsk.ru/photos" />
	<link rel="stylesheet" type="text/css" href="styles/header.css?"/>
	<link rel="stylesheet" type="text/css" href="styles/photos.css?"/>
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


</head>
<body>
	<?php include 'header.html' ?>
	
	<main class="content">
		<article>
			<div>
				<h1>Наши работы</h1>
				<div>
					<img src="photo/1.jpg">
					<img src="photo/2.jpg">
					<img src="photo/3.jpg">
					<img src="photo/4.jpg">
					<img src="photo/5.jpg">
					<img src="photo/6.jpg">
				</div>
			</div>
		</article>
	</main>

	<?php include 'footer.html' ?>

<script>
    var b = 1;
       
    $(".content img").click (function () { 
        
        if (b != 10) {
             $(this).css("zoom","2");
             $(".content img").not(this).hide();
                  b = b*10;
        } else {
       
     $(this).css("zoom","");
     $("img").not(this).show();
          b = b/10;  
        }
    });
    
</script>	

</body>
</html>