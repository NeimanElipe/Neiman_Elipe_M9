<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $valid_users = [
        'usuari1' => 'contrasenya1',
        'usuari2' => 'contrasenya2'
    ];

    if (isset($valid_users[$username]) && $valid_users[$username] === $password) {
        $_SESSION['username'] = $username;
        header("Location: content.php");
        exit();
    } else {
        echo "<p>Nom i passwd incorrectes.</p>";
    }
}
?>
