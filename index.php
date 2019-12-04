<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Style/Login.css"/>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="childcontainer">
            <h2>Login</h2>
            <form action="sessions.php">

                <input type="hidden" name="sessionType" value="login">

                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <button type="submit">Login</button>
                <input type="checkbox" checked="checked" name="remember"> Remember me</input>
                <span class="psw"><a href="#">Forgot password?</a></span>
            </form>
        </div>
    </div>
</body>
</html>