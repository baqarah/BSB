<div class="headevent"  onclick ="ukryj()" >
    <p>
        <span> <?php echo $nazwa; ?> | </span>
        <span> <?php echo $start; ?> | </span>
        <span> <?php echo $koniec; ?> </span>
    </p>
</div>

<?php
foreach ($arrayuser as $value) {
    echo "<p class='uservent'>" .$value."</p>"; 
}

?>
