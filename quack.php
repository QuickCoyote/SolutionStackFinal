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

        $winder = filter_input(INPUT_GET, "winner",FILTER_SANITIZE_STRING);
        $blob1Id = filter_input(INPUT_GET, "blob1",FILTER_SANITIZE_STRING);
        $blob1Health = filter_input(INPUT_GET, "blob1Heath",FILTER_SANITIZE_STRING);
        $blob2Id = filter_input(INPUT_GET, "blob2",FILTER_SANITIZE_STRING);
        $blob2Health = filter_input(INPUT_GET, "blob2Health",FILTER_SANITIZE_STRING);

        $Bluwub1 = new Bluwub($blob1Id);
        $Bluwub2 = new Bluwub($blob2Id);

        $Bluwub1->currentHealth = $blob1Health;
        $Bluwub2->currentHealth = $blob2Health;

        $Bluwub1->UpdateToDatabase();
        $Bluwub2->UpdateToDatabase();

        $objectRecived;

        echo "<p>Winner: ".$winder."</p>";

        if($winder == "blob1")
        {
            $rng = rand(0,5);

            $bluwubCount = 0;
            foreach($itsABlob in $_SESSION["bluwubs"])
            {
                if($itsABlob->id != null && $itsABlob->id != "")
                {
                    $bluwubCount++;
                }
            }

            

            // if($rng == 0)
            // {
            //     if($bluwubCount == 3) 
            //     {
            //        // echo "Well this sucks, you would have won a new Bluwub but you already have 3";
            //     }
            //     $objectRecived = GetRandomBlob();
            //     //echo "Neet you get a rad new bluwub, and look they are ".$objectRecived->blob->image.", your fav color ever";
            // }
            // else
            // if($rng == 1)
            // {
            //     echo "Nothing for you, the other guy sucked to much to justify anything";
            // }
            // else
            // if($rng == 2 || $rng == 3)
            // {
            //     if($rng == 2 && ($Bluwub2->part1->id != null && $Bluwub2->part1->id != ""))
            //     {
            //         //get part one
            //         $objectRecived = $Bluwub2->part1;
            //         echo "That was buttal, you ripped the ".$objectRecived->name." off of your enemy";

            //     }
            //     if($rng == 3 && ($Bluwub2->part2->id != null && $Bluwub2->part2->id != ""))
            //     {
            //         //get part two
            //         $objectRecived = $Bluwub2->part2;
            //         echo "That was buttal, you ripped the ".$objectRecived->name." off of your enemy";

            //     }

            //    if($Bluwub2->part1->id == null || $Bluwub2->part1->id == "")
            //    {
            //     if($Bluwub2->part2->id == null || $Bluwub2->part2->id == "")
            //     {
            //         $objectRecived = GetRandomPart();
            //         echo "You won a ".$objectRecived->name."! CONGRADULASUUS!";
            //     }
            //    }

            // }
            // else
            // {
            //     $objectRecived = GetRandomPart();
            //     echo "You won a ".$objectRecived->name."! CONGRADULASUUS!";
            // }


        }
        else if($winder == "blob2")
        {
            echo "Get Fucked loser >:D";
        }
    ?>

    <a href="myBluwubs.php?sessionType=refreshSession">Back to Bluwubs</a>
</body>
</html>