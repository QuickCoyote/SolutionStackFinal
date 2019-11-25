<?php 

    function SetOwner($bluwub, $owner)
    {
        include "dbConfig.php";

        $query = "Update bluwubs SET `ownerId` = $owner Where `id` = $bluwub";
        echo $query;
        $mysqli->query($query);
    }

    function GetRandomBluwub()
    {
        include "dbConfig.php";

        $query = "SELECT * FROM bluwubs where `ownerID` IS NULL ORDER BY RAND() LIMIT 1";
        echo $query;
        $sqlResult = $mysqli->query($query);
        $num_results = $sqlResult->num_rows;
        if($num_results > 0)
        {
            while($row = $sqlResult->fetch_assoc())
            {
                extract($row);
                return $id;
            }
        }
        else
        {
            CreateBluwubs();
            return GetRandomBluwub();
        }
    }

    function GetRandomBlob()
    {
        include "dbConfig.php";

        $query = "SELECT * FROM parts where `type` = 'blob' ORDER BY RAND() LIMIT 1";
        $sqlResult = $mysqli->query($query);
        $num_results = $sqlResult->num_rows;
        if($num_results > 0)
        {
            while($row = $sqlResult->fetch_assoc())
            {
                extract($row);
                return $id; 
            }
        }
        else
        {
            CreateBlobs();
            return GetRandomBlob();
        }
    }


    //would be cool to add random names

    function CreateBluwubs()
    {
        $bluwubsToCreate = 5;
        echo "blobss: ".$bluwubsToCreate;
        CreateBluwub($bluwubsToCreate);
    }

    function CreateBluwub($bluwbs)
    {
        $createBlobsWithBluwubs = false;
        $minHealth = 200;
        $maxHealth = 500;

        include "dbConfig.php";
        echo "bolbss: ".$bluwbs;
        // Create Blobs
        //if($createBlobsWithBluwubs) CreateBlobs($bluwbs);

        for($i = 0; $i < $bluwbs; $i++)
        {
            $health = rand($minHealth, $maxHealth);
            $time = date_create('now')->format('Y-m-d H:i:s');
            $blob = GetRandomBlob();
            // Create Bluwubs
            echo "INSERT INTO `bluwubs`( `maxHealth`, `currentHealth`, `healthUpdateTime`, `blob`)
            VALUES ('".$health."', '".$health."', '".$time."', '".$blob."')";
            $query = "INSERT INTO `bluwubs`( `maxHealth`, `currentHealth`, `healthUpdateTime`, `blob`)
                    VALUES ('".$health."', '".$health."', '".$time."', '".$blob."')";
            $mysqli->query($query);

        }
        
    }

    

    // would be fun to genrate random names

    function CreateBlobs()
    {
        $blobsToCreate = 5;
        CreateBlob($blobsToCreate);
    }

    function CreateBlob($blobs)
    {
        include "dbConfig.php";

        $minBlobDamage = 10;
        $maxBlobDamage = 100;

        $minBlobDefence = 10;
        $maxBlobDefence = 100;

        $minBlobRegen = 10;
        $maxBlobRegen = 100;

        $minBlobAttackSpeed = 10;
        $maxBlobAttackSpeed = 100;

        for($i = 0; $i < $blobs; $i++)
        {
            $damage = rand($minBlobDamage, $maxBlobDamage);
            $defense = rand($minBlobDefence, $maxBlobDefence);
            $regen = rand($minBlobRegen, $maxBlobRegen);
            $attackSpeed = rand($minBlobAttackSpeed, $maxBlobAttackSpeed);

            $query = "INSERT INTO `parts`( `type`, `name`, `damage`, `defense`, `regen`,`attackSpeed`)
            VALUES ('blob', 'blob', '".$damage."', '".$defense."', '".$regen."', '".$attackSpeed."')";
            $mysqli->query($query);

        }
    }


?>