<?php
session_start();

if (!isset($_SESSION['cistella'])) {
    echo "<p>Nohi ha cap producte</p>";
    exit();
}

$producte1_total = $_SESSION['cistella']['producte1'] * 10; 
$producte2_total = $_SESSION['cistella']['producte2'] * 20; 
$total = $producte1_total + $producte2_total;
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resum de la compra</title>
</head>
<body>
    <h1>Resum de la Compra</h1>
    <p>Producte 1 (Llibre): <?php echo $_SESSION['cistella']['producte1']; ?> unitats - <?php echo $producte1_total; ?>€</p>
    <p>Producte 2 (Motxilla): <?php echo $_SESSION['cistella']['producte2']; ?> unitats - <?php echo $producte2_total; ?>€</p>
    <h2>Total: <?php echo $total; ?>€</h2>

    <form action="confirmar.php" method="post">
        <button type="submit">Confirma la compra</button>
    </form>
    <br>
    <a href="index.html">Torna a la botiga</a>
</body>
</html>
