<?php


    $sessionType = filter_input(INPUT_GET, "sessionType",FILTER_SANITIZE_STRING);
    session_start();

    echo "Session Type: ".$sessionType;

    SetSession();

    function SetSession()
    {
        global $sessionType;
        switch($sessionType)
        {
            case "login":
                include "dbConfig.php";

                $filteredUser = filter_input(INPUT_GET, "uname",FILTER_SANITIZE_STRING);
                $filteredPass = filter_input(INPUT_GET, "psw",FILTER_SANITIZE_STRING);

                $query = "SELECT * FROM uwusers WHERE `uwuserName` = '".$filteredUser."'";
                $sqlResult = $mysqli->query($query);
                if($sqlResult != null)
                {
                    $num_results = $sqlResult->num_rows;
                    if($num_results > 0)
                    {
                        $query = "SELECT * FROM uwusers WHERE `uwuserName` = '".$filteredUser."' AND `password` = '".$filteredPass."'";
                        $sqlResult = $mysqli->query($query);
                        if($sqlResult != null)
                        {
                            $num_results = $sqlResult->num_rows;
                            if($num_results > 0)
                            {
                                while($row = $sqlResult->fetch_assoc()){
                                
                                    if($row != null) {
                                        extract($row);
                                        if($uwuserName == $filteredUser && $password == $filteredPass)
                                        {
                                            include "bluwubs.php";
                                            echo " Logging in";
                                            $_SESSION["uwuserID"] = $id;
                                            $_SESSION["bluwub1"] = new Bluwub($bluwub1);

                                            header("Location: myBluwubs.php");

                                        }
                                        else
                                        {
                                            // should never get here
                                            echo " Login Failed";
                                        }  
                                    }
                                }
                            }    
                        }
                    }
                    else
                    {
                        echo "no user found, creating user";
                        include_once "bluwubs.php";

                        $bluwub1 = GetRandomBluwub();
                        echo "<p>blob: ".$bluwub1."</p>";
                        $query = "INSERT INTO `uwusers`( `uwuserName`, `password`, `bluwub1`)
                        VALUES ('".$filteredUser."', '".$filteredPass."', '".$bluwub1."')";
                        $mysqli->query($query);
                        mysqli_refresh($mysqli,MYSQLI_REFRESH_LOG);
                        

                        $query = "SELECT * FROM uwusers WHERE `uwuserName` = '".$filteredUser."'";
                        $sqlResult = $mysqli->query($query);
                        if($sqlResult != null)
                        {
                            $num_results = $sqlResult->num_rows;
                            if($num_results > 0)
                            {
                                while($row = $sqlResult->fetch_assoc()){
                                    extract($row);
                                    SetOwner($bluwub1, $id);
                                }
                            }
                        }
                        SetSession();
                    }     
                }              
                

            break;
        }
    }

?>
