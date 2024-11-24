<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contingut</title>
</head>
<body>
    <h1>Benvingut, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>Aquesta és la pàgina de contingut restringit.</p>
    <a href="logout.php">Tanca Sessió</a>
</body>
</html>
