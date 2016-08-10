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
