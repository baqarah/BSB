<div class="headevent"  onclick ="ukryj()" >
    <p>
        <span> <?php echo $nazwa; ?> | </span>
        <span> <?php echo $start; ?> | </span>
        <span> <?php echo $koniec; ?> </span>
    </p>
</div>

<?php
foreach ($arrayuser as $value) {
    echo "<p class='usersevent'>" .$value."</p>"; 
}
?>

<script>
 function ukryj() {
     var x = document.getElementsByClassName("usersevent");
     x[0].style.visibility = "hidden";
 }
</script>
    
