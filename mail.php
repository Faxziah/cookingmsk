   <?php
      $f = implode("\n", $_POST['f']);
      $g = $_POST['g'];
      mail("inbox@mail.ru",
      "Кондитерская: заказ с сайта",
      $f.$g,
      "From: inbox@mail.ru \r\n")         
   ?>


