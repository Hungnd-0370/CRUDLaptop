<style>
    <?php include 'style.css'; ?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <nav>
        <ul>
            <a onclick="location.pathname='home/index'"><li>Home</li></a>
            <?php if(!isset($_SESSION['userId'])) : ?>
                <a onclick="location.pathname='signup'"><li>Sign Up</li></a>
                <a onclick="location.pathname='login'"><li>Login</li></a>
            <?php else: ?>
                <a href="./controllers/Users.php?q=logout"><li>Logout</li></a>
            <?php endif; ?>
        </ul>
    </nav>