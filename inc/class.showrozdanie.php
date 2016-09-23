<?php
$a = $this->getTxts();
$h = $this->getHits();
?>

<table id="MyTable">

    <?php 
    for ($i = 0; $i <= 4; $i++) {
        echo "<tr>\n";
        
        
        for ($y = 0; $y <= 4; $y++) {
            
            $wynik = ($i * 5) + $y;
            
            if ($h[$wynik] == 0) {
                $opentag = '<td bgcolor="white">';
            } else {
                $opentag = '<td bgcolor="red">';
            }
            
            $text = $a[$wynik];
            $komorka = $opentag . $text . "</td>\n";
            echo $komorka;
            
        }
        
        echo "</tr>\n";
    }
    ?>

</table>    
