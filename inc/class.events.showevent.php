<div class="wholeevent">
    <div class="headevent"  onclick ="ukryj()" >
        <p>
            <span> <?php echo $nazwa; ?> | </span>
            <span> <?php echo $start; ?> | </span>
            <span> <?php echo $koniec; ?> </span>
        </p>
        <div class="persons">

<?php
foreach ($arrayuser as $value) {
    echo "<p class='usersevent'>" .$value."</p>"; 
}
?>
        </div>
    </div>
</div>

<script>
 function ukryj() {
     var x = this.getElementsByClassName("usersevent");
     for(var i = 0; i < x.length; i++) {
         x[i].style.visibility = "hidden";
     }
 }
</script>
    
