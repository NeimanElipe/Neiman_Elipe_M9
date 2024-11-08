<?php
session_start();

if (!isset($_SESSION['visites'])) {
    $_SESSION['visites'] = 0;
}

$_SESSION['visites']++;

$descompte = 0;
$missatge = "";
if ($_SESSION['visites'] >= 10) {
    $descompte = 50;
    $missatge = "Oferta exclusiva! Utilitza el codi BOTIGA50 per obtenir un 50% de descompte en les teves compres!";
} elseif ($_SESSION['visites'] >= 5) {
    $descompte = 20;
    $missatge = "Oferta exclusiva! Utilitza el codi BOTIGA20 per obtenir un 20% de descompte en les teves primeres compres a la botiga";
}

$compra_realitzada = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comprar'])) {
    $compra_realitzada = true;
    $missatge_compra = "Compra realitzada amb èxit!";
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comptador de Visites i Ofertes</title>
</head>
<body>
    <h1>Benvingut a la nostra botiga!</h1>

    <p>Comptador de visites: <?php echo $_SESSION['visites']; ?></p>

    <?php if ($descompte > 0): ?>
        <h2><?php echo $missatge; ?></h2>
    <?php endif; ?>

    <?php if (!$compra_realitzada): ?>
        <form action="" method="POST">
            <label for="descompte">Vols aplicar el descompte a la teva compra?</label><br>
            <input type="submit" name="comprar" value="Comprar ara">
        </form>
    <?php else: ?>
        <p><?php echo $missatge_compra; ?></p>
    <?php endif; ?>
</body>
</html>
