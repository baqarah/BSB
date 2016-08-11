<?php
$cookie_name = "Imie";


$array_cookie = array();

if (!isset($_COOKIE[$cookie_name])) {
    
    $path = "data/data.txt";
    $data_text = file($path);
    $lines = count($data_text);
    $i = 0;
    $temp_to_splice = $data_text;

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

echo "<tr>"; 
echo "<td>" . $_COOKIE["cell0"] . "</td>";
echo "<td>" . $_COOKIE["cell1"] . "</td>";
echo "<td>" . $_COOKIE["cell2"] . "</td>";
echo "<td>" . $_COOKIE["cell3"] . "</td>";
echo "<td>" . $_COOKIE["cell4"] . "</td>";
echo "</tr>";

echo "<tr>"; 
echo "<td>" . $_COOKIE["cell5"] . "</td>";
echo "<td>" . $_COOKIE["cell6"] . "</td>";
echo "<td>" . $_COOKIE["cell7"] . "</td>";
echo "<td>" . $_COOKIE["cell8"] . "</td>";
echo "<td>" . $_COOKIE["cell9"] . "</td>";
echo "</tr>";

echo "<tr>"; 
echo "<td>" . $_COOKIE["cell10"] . "</td>";
echo "<td>" . $_COOKIE["cell11"] . "</td>";
echo "<td bgcolor='red'>" . $_COOKIE["cell12"] . "</td>";
echo "<td>" . $_COOKIE["cell13"] . "</td>";
echo "<td>" . $_COOKIE["cell14"] . "</td>";
echo "</tr>";

echo "<tr>"; 
echo "<td>" . $_COOKIE["cell15"] . "</td>";
echo "<td>" . $_COOKIE["cell16"] . "</td>";
echo "<td>" . $_COOKIE["cell17"] . "</td>";
echo "<td>" . $_COOKIE["cell18"] . "</td>";
echo "<td>" . $_COOKIE["cell19"] . "</td>";
echo "</tr>";

echo "<tr>"; 
echo "<td>" . $_COOKIE["cell20"] . "</td>";
echo "<td>" . $_COOKIE["cell21"] . "</td>";
echo "<td>" . $_COOKIE["cell22"] . "</td>";
echo "<td>" . $_COOKIE["cell23"] . "</td>";
echo "<td>" . $_COOKIE["cell24"] . "</td>";
echo "</tr>";

?>

