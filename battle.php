<?php
    include_once "bluwubs.php";
    include "sessions.php";
    include "genFunctions.php";

    $blob1 = $_SESSION["bluwubs"][0];
    $blob2 = GetRandomBluwub();
  
    $rgba = hexToRgb($blob1->blob->image,0.82);

    echo '<img src="./Resources/bluwubBaseImage.png" style="background-color: rgba('.$rgba['r'].','.$rgba['g'].','.$rgba['b'].','.$rgba['a'].'); overflow:hidden;"';
    echo '<progress id="healthblob1" value="'.floor($blob1->GetHealthPercent() * 100).'" max="100"></progress><br/>';

?>