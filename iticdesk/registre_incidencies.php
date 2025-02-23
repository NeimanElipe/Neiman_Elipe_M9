<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.html");
    exit();
}

$prioritats = ['Tipus I' => 'Incidència crítica', 'Tipus II' => 'Incidència urgent', 'Tipus III' => 'Incidència lleu', 'Tipus IV' => 'Incidència no urgent'];
$estats = ['Oberta', 'Gestió', 'Tancada', 'Reoberta'];
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Incidència</title>
</head>
<body>
    <h2>Registrar Incidència</h2>
    <form action="insert.php" method="POST">
        <label for="referencia">Referència (automàtica):</label>
        <input type="text" id="referencia" name="referencia" value="<?php echo uniqid('REF'); ?>" readonly><br><br>

        <label for="prioritat">Prioritat:</label>
        <select id="prioritat" name="prioritat" required>
            <?php foreach ($prioritats as $value => $label): ?>
                <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="titol">Títol:</label>
        <input type="text" id="titol" name="titol" required><br><br>

        <label for="descripcio">Descripció:</label>
        <textarea id="descripcio" name="descripcio" required></textarea><br><br>

        <input type="hidden" name="usuari_email" value="<?php echo $_SESSION['email']; ?>">

        <label for="estat">Estat:</label>
        <select id="estat" name="estat" required>
            <?php foreach ($estats as $estat): ?>
                <option value="<?php echo $estat; ?>"><?php echo $estat; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">Registrar Incidència</button>
    </form>
</body>
</html>
