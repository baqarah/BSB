<?php
$a = $this->getTxts();
$h = $this->getHits();
?>

<table id="MyTable">

    <?php 
    for ($i = 0; $i <= 4; $i++) {
        echo "<tr>";

        for ($y = 0; $y <= 4; $y++) {
            $komorka = "<td>"
            . $i * 5 + $y 
            ."</td>";

            echo $komorka;
        }
        
        echo "</tr>";
    }
    ?>

</table>    

<!--
 <tr>
    <td><?php echo $a[0] ?></td>
    <td><?php echo $a[1] ?></td>
    <td><?php echo $a[2] ?></td>
    <td><?php echo $a[3] ?></td>
    <td><?php echo $a[4] ?></td>
</tr>
<tr>
    <td><?php echo $a[5] ?></td>
    <td><?php echo $a[6] ?></td>
    <td><?php echo $a[7] ?></td>
    <td><?php echo $a[8] ?></td>
    <td><?php echo $a[9] ?></td>
</tr>
<tr>
    <td><?php echo $a[10] ?></td>
    <td><?php echo $a[11] ?></td>
    <td><?php echo $a[12] ?></td>
    <td><?php echo $a[13] ?></td>
    <td><?php echo $a[14] ?></td>
</tr>
<tr>
    <td><?php echo $a[15] ?></td>
    <td><?php echo $a[16] ?></td>
    <td><?php echo $a[17] ?></td>
    <td><?php echo $a[18] ?></td>
    <td><?php echo $a[19] ?></td>
</tr>
<tr>
    <td><?php echo $a[20] ?></td>
    <td><?php echo $a[21] ?></td>
    <td><?php echo $a[22] ?></td>
    <td><?php echo $a[23] ?></td>
    <td><?php echo $a[24] ?></td>
</tr>
</table>
-->
