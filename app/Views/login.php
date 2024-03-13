
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Giriş Yap</h2>
    <form action="<?php echo base_url('Login/login_process');?>" method="post">
        <label for="username">Kullanıcı Adı:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Şifre:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Giriş Yap">
    </form>
</body>
</html>
