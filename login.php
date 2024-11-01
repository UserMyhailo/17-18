<?php
$usersFile = "users.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (file_exists($usersFile)) {
        $users = file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $isAuthenticated = false;

        foreach ($users as $user) {
            list($fileUsername, $filePassword) = explode(':', $user);
            if ($username === $fileUsername && $password === trim($filePassword)) {
                $isAuthenticated = true;
                break;
            }
        }

        if ($isAuthenticated) {
            echo "Вітаємо, ви успішно авторизовані!";
        } else {
            echo "Неправильний логін або пароль.";
        }
    } else {
        echo "Файл з користувачами не знайдено.";
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Авторизація</title>
</head>
<body>
    <h2>Форма авторизації</h2>
    <form method="post" action="">
        <label for="username">Назва користувача:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Увійти">
    </form>
</body>
</html>
