<?php
foreach ($_COOKIE as $name => $value) {
	echo "Cookie " . $name . " with value " . $value . " deleted.";
	setcookie($name, '', 1);
	echo "<br>";
	
}
echo "Kliknij tutaj, zeby wrocic do glownej strony: <a href='http://89.77.118.160:8080'>Klik</a>";
?>