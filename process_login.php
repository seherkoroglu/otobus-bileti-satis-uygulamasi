<?php
// Kullanıcı giriş bilgilerini kontrol etme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Kullanıcı adı ve şifre kontrolü, örnek olarak kullanıcı adı ve şifre sabit bir değere sahip olabilir
    $correct_username = "example_username";
    $correct_password = "example_password";

    // Doğru kullanıcı adı ve şifreyi kontrol etme
    if ($username === $correct_username && $password === $correct_password) {
        // Kullanıcı doğru bilgileri girdiyse, başka bir sayfaya yönlendirme
        header("Location: index.php");
        exit;
    } else {
        // Kullanıcı adı veya şifre yanlışsa, hata mesajı gösterme veya tekrar giriş yapma sayfasına yönlendirme
        echo "Kullanıcı adı veya şifre yanlış.";
    }
}
?>
