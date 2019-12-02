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
            global $bluwubCount;
            if($_SESSION["bluwubs"][$i]->id == null)
            {
                
            }
            else
            {
                $bluwubCount++;
            }
        }

        $html = '  <div class = "OverallContainer">
                    <div class = "myBlobsContainer">
                    <h2>My Blobs</h2>';

        for($j = 0; $j < 3; $j++)
        {
            if($bluwubCount > 0)
            {
                $bluwubCount--;
                $blub = $_SESSION["bluwubs"][$j];

                $html.=' <div id = "blub" class= "blubSmallContainer">
                           <div class = "blubSmallImageContainer">
                               <canvas id="blubCanvas1" class= "blubSmallCanvas" width="200" height="200"></canvas>
                           </div>
                           <div class = "blubSmallStatsContainer">
                               <strong>Health:</strong> '."".floor($blub->currentHealth)."".'
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
                $html.=' <div id = "blub" class= "blubSmallContainer">
                            <div class = "blubSmallImageContainer">
                                <canvas id="blubCanvas1" class= "blubSmallCanvas" width="200" height="200"></canvas>
                            </div>
                            <div class = "blubSmallStatsContainer">
                                <strong>Empty Slot</strong>
                            </div>
                        </div>';
            }
        }

        $html.='     </div>

                    <div class = "selectedBlobContainer">
                        <h2>Selected Blob</h2>
                        <div class= "blubBigContainer">
                            <div class = "blubBigImageContainer">
                                <canvas class="blubBigCanvas" width="200" height="200"></canvas>
                            </div>
                            <div class = "blubBigStatsContainer">
                                <p id="selectedBlubHealth"><strong>Health:</strong>blobHealth</p>
                                </br>
                                <p id="selectedBlubHealthRegen"><strong>Health Regen (per second):</strong>Health Regen</p>
                                </br>
                                <p id="selectedBlubAttackSpeed"><strong>Attack Speed (per second):</strong>Attack Speed</p>
                                </br>
                                <p id="selectedBlubDamage"><strong>Damage:</strong>Damage</p>
                                </br>
                                <p id="selectedBlubDefense"><strong>Defense:</strong>Defense</p>
                                </br>
                            </div>
                        </div>
                    </div>
                </div>
        ';
                
        echo $html;
    ?>

</body>
</html>