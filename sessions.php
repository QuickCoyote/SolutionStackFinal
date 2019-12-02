<?php


    $sessionType = filter_input(INPUT_GET, "sessionType",FILTER_SANITIZE_STRING);
    session_start();

    //echo "<p>".$_SERVER['SCRIPT_NAME']."</p>";
    if(!isset($_SESSION['uwuserID']) && 
    !($_SERVER['SCRIPT_NAME'] == "/SolutionStackFinal/index.php" || $_SERVER['SCRIPT_NAME'] == "/SolutionStackFinal/sessions.php"))
    {
        echo "no sesh";
        header("Location: index.php");
    }

    //echo $_SESSION['uwuserID'];
    //echo "Session Type: ".$sessionType;

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
                                            include_once "bluwubs.php";
                                            echo " Logging in";
                                            $_SESSION["uwuserID"] = $id;
                                            $_SESSION["bluwubs"] = [new Bluwub($bluwub1), new Bluwub($bluwub2),new Bluwub($bluwub3)];

                                            header("Location: myBluwubs.php");
                                        }
                                        else
                                        {
                                            // should never get here
                                            echo " Login Failed";
                                            header("Location: index.php");
                                        }  
                                    }
                                }
                            } 
                            else
                            {
                                echo "Wrong password coward";
                                header("Location: index.php");
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
            case "logout":
                DestorySession();
                header("Location: index.php");
            break;
            case "debugSession":
            foreach ($_SESSION as $key=>$val)
            {
                if(is_array($val))
                {
                    echo $key.":<br/>";
                    foreach ($val as $index)
                    {
                        echo $index->id."<br/>";
                    }
                }
                else
                {
                echo $key." ".$val."<br/>";
                }
            }
            break;
        }
    }

    function DestorySession()
    {
        $_SESSION = array();
        session_destroy();
    }

?>
