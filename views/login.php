<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/login.css">
</head>

<body>
    <div class="loginArea">
        <form method="post">
            <label for="number">Seu número:</label> <br>
            <input type="text" name="number" id="number"><br>

            <label for="password">Sua senha:</label><br>
            <input type="password" name="password" id="password"><br>

            <input type="submit" value="Entrar">
        </form>

        <?php if(!empty($msg)): ?>
        <h2><?php echo $msg; ?></h2>
        <?php endif; ?>
    </div>
</body>

</html>