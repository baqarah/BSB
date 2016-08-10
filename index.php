<?php include_once "common/cookie.php"; ?>
<?php include_once "common/header.php"; ?>
<html>
    <style>
      
    </style>
<body>
<table id="MyTable">

<?php

//for ($z = 0; $z <= 25; $z++) {
//
//$nazwa = "cell" . $z;
//echo $_COOKIE[$nazwa] . "<br>";
//}

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

	
</table>

<br>
<br>
to ze tu jestes oznacza, ze akceptujesz wszystkie polityki, w tym cookies, polityke obronna Macierewicza i pucz w Turcji <br>
Zeby zresetowac cookiesy: <a href="http://89.77.118.160:8080/cook.php">Kliknij tutaj</a> 
</body>
<script>

var wynik =[
[0,0,0,0,0],
[0,0,0,0,0],
[0,0,1,0,0],
[0,0,0,0,0],
[0,0,0,0,0]
];

var wygrana = false;
var wygranaAlerted = false;
var table = document.getElementById("MyTable");

if (table != null) {
	for (var i = 0; i < table.rows.length; i++) {
		for (var j = 0; j < table.rows[i].cells.length; j++) {
			//table.rows[i].cells[j].innerHTML = i + " " + j;	
			table.rows[i].cells[j].onclick = function () {
				wygrana = false;
				koloruj(this);
				sprawdzWygrana(this);
				if (wygrana && wygranaAlerted != true) {
					alert("wygrales!!!!");
					wygranaAlerted = true;
				}
			};
		};			
	}
}

function koloruj(objekt) {
	var x = objekt.cellIndex;
	var y = objekt.parentNode.rowIndex;

	
	if (x != 2 || y != 2) {
		if (wynik[x][y] == 0) {
			wynik[x][y] = 1;
		} else {
			wynik[x][y] = 0;
		}
	}
	
	for (var i = 0; i < table.rows.length; i++) {
		for (var j = 0; j < table.rows[i].cells.length; j++) {
			//table.rows[i].cells[j].innerHTML = i + " " + j;	
				if (wynik[i][j] == 1) {
					table.rows[j].cells[i].style.background = "red";
				} else {
					table.rows[j].cells[i].style.background = "";
				}
			
		}			
	}
	
}

function sprawdzWygrana(objekt) {
	
	if (wynik[0][0] == 1 && wynik[1][1] == 1 && wynik[3][3] == 1 && wynik[4][4] == 1) {
		table.rows[0].cells[0].style.background = "green";
		table.rows[1].cells[1].style.background = "green";
		table.rows[2].cells[2].style.background = "green";
		table.rows[3].cells[3].style.background = "green";
		table.rows[4].cells[4].style.background = "green";
		wygrana = true;
	}
	
	if (wynik[0][4] == 1 && wynik[1][3] == 1 && wynik[3][1] == 1 && wynik[4][0] == 1) {
		table.rows[0].cells[4].style.background = "green";
		table.rows[1].cells[3].style.background = "green";
		table.rows[2].cells[2].style.background = "green";
		table.rows[3].cells[1].style.background = "green";
		table.rows[4].cells[0].style.background = "green";	
		wygrana = true;
	}
	
	var sumaWiersza = 0
	
	
	for (var i = 0; i < 5; i++) {
		sumaWiersza = wynik[i][0] + wynik[i][1] + wynik[i][2] + wynik[i][3] + wynik[i][4]
		if (sumaWiersza == 5) {
			for (j = 0; j < 5; j++) {
				table.rows[j].cells[i].style.background = "green";
			};
			wygrana = true;
			sumaWiersza = 0;
			
		}

	}
	
	var sumaKolumn = 0;
	
	for (var i = 0; i < 5; i++) {
		sumaKolumn = wynik[0][i] + wynik[1][i] + wynik[2][i] + wynik[3][i] + wynik[4][i]
		if (sumaKolumn == 5) {
			for (j = 0; j < 5; j++) {
				table.rows[i].cells[j].style.background = "green";
			};
			wygrana = true;
			sumaKolumn = 0;
			
		}

	}	
	
	if (wygrana != true) {
		wygranaAlerted = false;
	}	
		
}

</script>
</html>
