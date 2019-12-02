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
        include "bluwubs.php";
        include "sessions.php";
        $thing = filter_input(INPUT_GET, "thing",FILTER_SANITIZE_STRING);
        $count = filter_input(INPUT_GET, "count",FILTER_SANITIZE_STRING);
        if($count == null) $count = 1;

        switch($thing)
        {
            case "bluwub":
                CreateBluwub($count);
            break;
            case "blob":
                CreateBlob($count);
            break;
            case "part":
                CreatePart($count);
            break;
        }
        echo "done";
    ?>
</body>
</html>