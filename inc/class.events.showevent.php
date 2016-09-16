<div class="wholeevent">
    <div class="headevent"  onclick ="ukryj(this)" >
        <p>

            <span> <?php echo $nazwa; ?> | </span>
            <span> <?php echo $start; ?> | </span>
            <span> <?php echo $koniec; ?> </span>
        </p>
    </div>
    <div class="persons">

<?php
foreach ($arrayuser as $value) {
    echo "<p class='usersevent'>" .$value."</p>"; 
}
?>
    </div>
    <?php if ($mode == "aktywne") { ?>
        <div class='eventjoin'>
            <form action="event.php" method="POST" name="eventjoin"  id="eventjoin">
                <div class="formularz">
                    <input type="submit" name="joinevent" id="joinevent" value="Join" />
                </div>
            </form>
        </div>
    <?php } ?>

</div>

<script>
 function ukryj(obj) {
     var x = obj.parentNode.getElementsByClassName("usersevent");
     for(var i = 0; i < x.length; i++) {
         if (x[i].style.display != "block") {
             x[i].style.display = "block";
         } else {
             x[i].style.display = "none";
         }
     }
 }
</script>
    
