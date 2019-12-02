<?php 

    class Bluwub
    {
        public $id, $owner, $maxHealth, $currentHealth, $healthUpdateTime, $blob, $part1, $part2;

        public function __construct($index) {
            if(is_null($index)) return;
            $this->SetToID($index);
        }

        public function SetToID($index)
        {
            if(is_null($index)) return;

            include "dbConfig.php";

            $query = "SELECT * From `bluwubs` WHERE `id` = '".$index."'";
            $sqlResult = $mysqli->query($query);
            $num_results = $sqlResult->num_rows;
            //echo $query;
            if($num_results > 0)
            {
                while($row = $sqlResult->fetch_assoc())
                {
                    extract($row);
                    $this->id = $id;
                    $this->owner = $ownerId;
                    $this->maxHealth = $maxHealth;
                    $this->currentHealth= $currentHealth;
                    $this->healthUpdateTime = $healthUpdateTime;
                    // make parts
                    $this->blob = new Part($blob);
                    $this->part1 = new Part($part1);
                    $this->part2 = new Part($part2);

                }
            }
            //echo "<p>".$healthUpdateTime." : ".date_create('now')->format('Y-m-d H:i:s')."</p>";
            $date1 = $healthUpdateTime;
            $date2 = date_create('now')->format('Y-m-d H:i:s');
            
            $date1Timestamp = strtotime($date1);
            $date2Timestamp = strtotime($date2);
            
            $timeDiffrence =  $date2Timestamp -$date1Timestamp;

            $regen = $this->GetRegen();
            $totalRegen = $regen * $timeDiffrence /100;
            //echo $totalRegen;

            $this->healthUpdateTime = $date2;
            //do regen stuff
            $this->currentHealth += $totalRegen;
            if($this->currentHealth > $this->maxHealth)
            {
                $this->currentHealth = $this->maxHealth;
            }
            $this->UpdateToDatabase();
        }

        public function UpdateToDatabase()
        {
            include "dbConfig.php";
            // update bluwubs
            $query = "Update bluwubs SET";
            if(!is_null($this->owner)) {} else{$query .= "`ownerId`= ".$this->owner.",";}
            $query .= "`currentHealth`=".$this->currentHealth.",`healthUpdateTime`='".$this->healthUpdateTime."',`blob`=".$this->blob->id;
            if(!is_null($this->part1)) {} else{$query .= ",`part1`=".$this->part1->id;}
            if(!is_null($this->part2)) {} else {$query .= ",`part2`=".$this->part2->id;}
            $query .= " WHERE `id` = $this->id";
            $mysqli->query($query);
        }

        public function GetHealthPercent()
        {
            return $this->currentHealth / $this->maxHealth;
        }

        public function GetDamage()
        {
            $damage = $this->blob->damage;
            $damage += $this->part1->damage;
            $damage += $this->part2->damage;
            return $damage;
        }

        public function GetDefense()
        {
            $defence = $this->blob->defense;
            $defence += $this->part1->defense;
            $defence += $this->part2->defense;
            return $defence;
        }

        public function GetRegen()
        {
            $regen = $this->blob->regen;
            $regen += $this->part1->regen;
            $regen += $this->part2->regen;
            return $regen;
        }

        public function GetAttackSpeed()
        {
            $attackSpeed = $this->blob->attackSpeed / 10;
            $attackSpeed += $this->part1->attackSpeed / 10;
            $attackSpeed += $this->part2->attackSpeed / 10;
            $attackSpeed = 5 - $attackSpeed;
            if($attackSpeed < .5) { $attackSpeed = .5; }
            return $attackSpeed;
        }
    }

    class Part
    {
        //add part data
        public $id, $type, $name, $image, $damage, $defense, $regen, $attackSpeed;

        public function __construct($index) {
            if($index == null) return;
            $this->SetToID($index);
        }

        function SetToID($index)
        {
            include "dbConfig.php";

            $query = "SELECT * From `parts` WHERE `id` = '".$index."'";
            $sqlResult = $mysqli->query($query);
            $num_results = $sqlResult->num_rows;
            if($num_results > 0)
            {
                while($row = $sqlResult->fetch_assoc())
                {
                    extract($row);
                    $this->id = $id;
                    $this->type = $type;
                    $this->name = $name;
                    $this->image = $image;
                    $this->damage = $damage;
                    $this->defense = $defense;
                    $this->regen = $regen;
                    $this->attackSpeed = $attackSpeed;
                }
            }
        }
    }
    

    function SetOwner($bluwub, $owner)
    {
        include "dbConfig.php";

        $query = "Update bluwubs SET `ownerId` = $owner Where `id` = $bluwub";
        //echo $query;
        $mysqli->query($query);
    }

    function GetRandomBluwub()
    {
        include "dbConfig.php";

        $query = "SELECT * FROM bluwubs where `ownerID` IS NULL ORDER BY RAND() LIMIT 1";
        //echo $query;
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

    function GetOtherBluwub($myID)
    {
        include "dbConfig.php";

        $query = "SELECT * FROM bluwubs where `ownerID` != $myID ORDER BY RAND() LIMIT 1";
        $sqlResult = $mysqli->query($query);
        $num_results = $sqlResult->num_rows;
        if($num_results > 0)
        {
            while($row = $sqlResult->fetch_assoc())
            {
                extract($row);
                return new Bluwub($id);
            }
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
        //echo "blobss: ".$bluwubsToCreate;
        CreateBluwub($bluwubsToCreate);
    }

    function CreateBluwub($bluwbs)
    {
        $createBlobsWithBluwubs = true;
        $minHealth = 200;
        $maxHealth = 500;

        include "dbConfig.php";
        //echo "bolbss: ".$bluwbs;
        // Create Blobs
        if($createBlobsWithBluwubs) { CreateBlob($bluwbs); }

        for($i = 0; $i < $bluwbs; $i++)
        {
            $health = rand($minHealth, $maxHealth);
            $time = date_create('now')->format('Y-m-d H:i:s');
            $blob = GetRandomBlob();
            // Create Bluwubs
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

        $minBlobDefence = 1;
        $maxBlobDefence = 100;

        // regen per second
        $minBlobRegen = 0;
        $maxBlobRegen = 10;

        $minBlobAttackSpeed = 5; // == .5 hits every .5 seconds
        $maxBlobAttackSpeed = 20; // == 2 hits every 2 seconds

        for($i = 0; $i < $blobs; $i++)
        {
            $damage = rand($minBlobDamage, $maxBlobDamage);
            $defense = rand($minBlobDefence, $maxBlobDefence);
            $regen = rand($minBlobRegen, $maxBlobRegen);
            $attackSpeed = rand($minBlobAttackSpeed, $maxBlobAttackSpeed);
            $color = random_color();

            $query = "INSERT INTO `parts`( `type`, `name`, `damage`, `defense`, `regen`,`attackSpeed`, `image`)
            VALUES ('blob', 'blob', '".$damage."', '".$defense."', '".$regen."', '".$attackSpeed."', '".$color."')";
            $mysqli->query($query);
            //echo $query;

        }
    }

    function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }
    
    function random_color() {
        return random_color_part() . random_color_part() . random_color_part();
    }


?>