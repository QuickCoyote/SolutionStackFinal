<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Style/MyBluwubs.css"/>
    <title>Document</title>
    
</head>
<body>
    <?php
    include_once "bluwubs.php";
    include "sessions.php"
    ?>
    <a href="sessions?sessionType=logout">logout</a>

    <?php 

        $bluwubCount = 0;

        for($i=0; $i < 3; $i++)
        {
            if($_SESSION["bluwubs"][$i]->id == null)
            {
                
            }
            else
            {
                $bluwubCount++;
            }
        }

        for($j = 0; $j < $bluwubCount; $j++)
        {
            if($bluwubCount>0)
            {
                $bluwubCount--;
            $blub = $_SESSION["bluwubs"][$j];

            echo '  <div id = "blub" class= "blubSmallContainer">
                        <div class = "blubSmallImageContainer">
                            <canvas id="blubCanvas1" class= "blubSmallCanvas" width="200" height="200"></canvas>
                        </div>
                        <div class = "blubSmallStatsContainer">
                            <strong>Health:</strong> '."".floor($blub->GetHealthPercent() * 100)."".'
                            </br>
                            <strong>Regen Speed (per second):</strong> '."".$blub->GetRegen()."".'
                            </br>
                            <strong>Attack Speed (per second):</strong> '."".$blub->GetAttackSpeed()."".'
                            </br>
                            <strong>Damage:</strong> '."".$blub->GetDamage()."".'
                            </br>
                            <strong>Defense:</strong> '."".$blub->GetDefense()."".'
                            </br>
                        </div>
                    </div>';
            }
            else
            {
                echo '  <div id = "blub" class= "blubSmallContainer">
                            <div class = "blubSmallImageContainer">
                                <canvas id="blubCanvas1" class= "blubSmallCanvas" width="200" height="200"></canvas>
                            </div>
                            <div class = "blubSmallStatsContainer">
                                <strong>Empty Slot</strong>
                            </div>
                        </div>';
            }
        }        

    ?>

<div class = "OverallContainer">
    <div class = "myBlobsContainer">
        <h2>My Blobs</h2>


    </div>

    <div class = "selectedBlobContainer">
        <h2>Selected Blob</h2>
        <div class= "blubBigContainer">
            <div class = "blubBigImageContainer">
                <canvas class="blubBigCanvas" width="200" height="200"></canvas>
            </div>
            <div class = "blubBigStatsContainer">
                <strong>Health:</strong> blobHealth
                </br>
                <strong>Attack:</strong> blobAttack
                </br>
                <strong>Defense:</strong> blobDefense
                </br>
            </div>
        </div>
    </div>
</div>

</body>
</html>