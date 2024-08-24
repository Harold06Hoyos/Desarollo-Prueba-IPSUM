<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="css/imagenes/logo.ico" type="image/x-icon">
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
            <form action="../controller/ctr_login.php" method="POST"">
                <label for=" email">Email:</label>
                <input type="email" name="email" required>
                <br>
                <label for="password">Password:</label>
                <input type="password" name="contrasena" required>
                <br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>

</html>