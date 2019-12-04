<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
     include_once "bluwubs.php";
     include "sessions.php";
     include "genFunctions.php";

     $blob1 = $_SESSION["bluwubs"][0];
     $blob2 = GetOtherBluwub($_SESSION["uwuserID"]);

     echo $blob2->id;
     
     $rgba = hexToRgb($blob1->blob->image,1);

     echo '<img src="./Resources/bluwubBaseImage.png" style="background-color: rgba('.$rgba['r'].','.$rgba['g'].','.$rgba['b'].','.$rgba['a'].'); overflow:hidden;"></img><br/>';
     echo '<progress id="healthblob1" value="'.floor($blob1->GetHealthPercent() * 100).'" max="100"></progress><br/>';

     echo '<canvas id="gameCanvas" width="500" height="500"></canvas>';
    ?>

    <script>
        <?php $blob1->MakeMeJavaScriptBitch(1);?>
        <?php $blob2->MakeMeJavaScriptBitch(2);?>
    </script>

    <script src="./Scripts/BattleScript.js"></script>

</body>
</html>
