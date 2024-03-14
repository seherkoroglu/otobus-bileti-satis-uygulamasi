<!-- app/Views/login.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Giriş Yap</h1>
    
    <!-- Login formu -->
    <form action="<?= base_url('login/login_process') ?>" method="post">
        <label for="username">Kullanıcı Adı:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Şifre:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Giriş">
    </form>
</body>
</html>

