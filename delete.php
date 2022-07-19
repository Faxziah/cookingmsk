<?php
foreach ($_COOKIE as $key => $value) {
	if ($key == 'PHPSESSID') {
		continue;
	};
	setcookie($key, 1, time()-3600);
};
?>