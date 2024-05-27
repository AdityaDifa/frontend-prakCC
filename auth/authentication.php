<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // URL API
    $url = "https://backend-auth-prak-cc-rqransntba-et.a.run.app/users";

    // Mengambil data dari API
    $json = file_get_contents($url);
    $users = json_decode($json, true);

    // Memeriksa kredensial pengguna
    $authenticated = false;
    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $authenticated = true;
            break;
        }
    }

    if ($authenticated) {
        $_SESSION['username'] = $username;
        header("Location: table-page.php");
        exit();
    } else {
        echo "Username atau password salah!";
    }
}
?>