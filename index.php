<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Sign in | Sing up</title>
</head>
<body>
    <div class="forms">
        <?php if($_COOKIE['user'] == NULL): ?> 

            <div class="register">
                <h1>Form Register.</h1>
                <form action="check.php" method="post">
                    <input type="text" name="login" placeholder="Enter login"><br>
                    <input type="text" name="name" placeholder="Enter name"><br>
                    <input type="password" name="password" placeholder="Enter password"><br>
                    <button type="submit">Register</button>
                </form>
            </div>

            <div class="authorization">
                <h1>Form Authorization.</h1>
                <form action="authorization.php" method="post">
                    <input type="text" name="login" placeholder="Enter login"><br>
                    <input type="password" name="password" placeholder="Enter password"><br>
                    <button type="submit">Register</button>
                </form>
            </div>
    </div>
    <?php else: ?>
        <p>Welcome, <?=$_COOKIE['user']?> </p>
        <a href="/exit.php">Exit</a>
    <?php endif;?>
</body>
</html>