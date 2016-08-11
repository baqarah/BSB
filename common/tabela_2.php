
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
?>

<tr>
    <td><?php $_COOKIE["cell0"] ?></td>
    <td><?php $_COOKIE["cell1"] ?></td>
    <td><?php $_COOKIE["cell2"] ?></td>
    <td><?php $_COOKIE["cell3"] ?></td>
    <td><?php $_COOKIE["cell4"] ?></td>
</tr>
<tr>
    <td><?php $_COOKIE["cell5"] ?></td>
    <td><?php $_COOKIE["cell6"] ?></td>
    <td><?php $_COOKIE["cell7"] ?></td>
    <td><?php $_COOKIE["cell8"] ?></td>
    <td><?php $_COOKIE["cell9"] ?></td>
</tr>
<tr>
    <td><?php $_COOKIE["cell10"] ?></td>
    <td><?php $_COOKIE["cell11"] ?></td>
    <td bgcolor="red"><?php $_COOKIE["cell12"] ?></td>
    <td><?php $_COOKIE["cell13"] ?></td>
    <td><?php $_COOKIE["cell14"] ?></td>
</tr>
<tr>
    <td><?php $_COOKIE["cell15"] ?></td>
    <td><?php $_COOKIE["cell16"] ?></td>
    <td><?php $_COOKIE["cell17"] ?></td>
    <td><?php $_COOKIE["cell18"] ?></td>
    <td><?php $_COOKIE["cell19"] ?></td>
</tr>
<tr>
    <td><?php $_COOKIE["cell20"] ?></td>
    <td><?php $_COOKIE["cell21"] ?></td>
    <td><?php $_COOKIE["cell22"] ?></td>
    <td><?php $_COOKIE["cell23"] ?></td>
    <td><?php $_COOKIE["cell24"] ?></td>
</tr>
    
    
