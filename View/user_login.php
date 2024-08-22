<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../View/css/login/login.css">
</head>

<body>
    <div class="main-container">
        <div class="image-container">
            <!-- Replace 'path/to/your-image.jpg' with your actual image path -->
            <img src="Css/Imagenes/login.jpg" alt="Login Image">
        </div>
        <div class="login-container">
            <h2>Login</h2>
            <?php if (isset($error)) echo "<p class='error-message'>$error</p>"; ?>
            <form method="POST" action="/login">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <br>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>

</html>