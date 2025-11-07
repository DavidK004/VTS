<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Test Site</title>
    <style>
        input {
            padding: 5px;
            margin: 2px;
        }

        img {
            float: left;
            margin: 3px;
        }
    </style>
</head>

<body>

    <b>Login</b><br>
    <form method="post" action="web.php" name="login">
        <label for="username">username: </label><input type="text" name="username" size="20" maxlength="20" id="username"><br>
        <label for="password">password: </label><input type="password" name="password" id="password"><br>
        <input type="submit" name="sd" value="login">
        <input type="reset" name="rd" value="cancel">
    </form>
    <pre>
    Username: ' or 1='1
    Password: ' or 1='1 
    </pre>
    <br />

    <div style="color:#f00;">
        <?php

        $password = sha1("admin");
        var_dump($password);


        $l = "";

        if (isset($_GET["l"])) {
            $l = $_GET["l"];

            switch ($l) {
                case "0":
                    echo "No direct access!";
                    break;

                case "1":
                    echo "Unknown user!";
                    break;

                case "5":
                    echo "You are logged out!";
                    break;
            }
        }
        ?>
    </div>
</body>

</html>