<?php
$servername = '89.77.118.160';
$DB_USERNAME = 'user';
$DB_PASSWORD = '666number';
$DB_NAME = 'BSB';

$conn = mysqli_connect($servername, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
if (!$conn) {
    die("Failed to connect to MySQL: " .  mysqli_connect_error());
}

$sql = "SELECT BSText FROM BSB.BShits";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $rows[] = $row['BSText'];
}

//Cookie stuff here:
$cookie_name = "Imie";

$array_cookie = array();

if (!isset($_COOKIE[$cookie_name])) {

    $lines = count($rows);
    $i = 0;
    $temp_to_splice = $rows;

    while ($i < 25) {
	if ($i != 12) { 
	    $rand_line = rand(0, $lines - 1);
	    $array_cookie[$i] =  $temp_to_splice[$rand_line];
	    array_splice($temp_to_splice, $rand_line, 1); 
	    $lines--;
	} else {
	    $array_cookie[$i] = "X";
	}

	$i++;
	setcookie($cookie_name, "jest", time() + 7200, "/");
    }

    for ($x = 0; $x <= 24; $x++) {
	$cook_name = "cell" . $x;
	//echo $cook_name;
	setcookie($cook_name, $array_cookie[$x], time() + 7200, "/");   
    }
}

?>
