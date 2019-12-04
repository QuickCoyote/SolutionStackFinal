<?php
    include_once "bluwubs.php";
    include "sessions.php";
    include "genFunctions.php";

    $blob1 = $_SESSION["bluwubs"][0];
    $blob2 = GetOtherBluwub($_SESSION->uwuserID);
  
    $rgba = hexToRgb($blob1->blob->image,1);

    echo '<img src="./Resources/bluwubBaseImage.png" style="background-color: rgba('.$rgba['r'].','.$rgba['g'].','.$rgba['b'].','.$rgba['a'].'); overflow:hidden;"></img><br/>';
    echo '<progress id="healthblob1" value="'.floor($blob1->GetHealthPercent() * 100).'" max="100"></progress><br/>';
    
    echo '  <canvas id="gameCanvas" width="800" height="400"></canvas>'.DrawBluwub($blob1->blob->image);.'
            <script src="./Scripts/BattleScript.js"></script>';

            // BUNCH OF GARBAGE TO INCREASE FILE SIZE;
?>