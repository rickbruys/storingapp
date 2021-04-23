<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp</title>
    <?php require_once 'head.php'; ?>
</head>

<body>

    <?php require_once 'header.php'; ?>
    
    <div class="container">

        <form action="backend/loginController.php" method="POST">
            <input type="text" id="username" name="username">
            <input type="password" id="password" name="password">
            <input type="submit" value="Log in">
        </form>

    </div>

</body>

</html>

