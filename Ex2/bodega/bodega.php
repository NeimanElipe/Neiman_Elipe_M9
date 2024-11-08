<?php
$majoredat = isset($_COOKIE['majoredat']) ? $_COOKIE['majoredat'] : '';
$idioma = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : '';
$moneda = isset($_COOKIE['moneda']) ? $_COOKIE['moneda'] : '';

$missatge = "";

if ($majoredat == "no") {
    $missatge = "No et podem vendre alcohol si ets menor d'edat.";
} else {
    if ($idioma == "ca" && $moneda == "eur") {
        $missatge = "T'oferim el vi “Les Terrasses” a un preu de 39 €";
    } elseif ($idioma == "es" && $moneda == "eur") {
        $missatge = "Te ofrecemos el vino “Les Terrasses” a un precio de 39 €";
    } elseif ($idioma == "en" && $moneda == "usd") {
        $missatge = "We offer the wine 'Les Terrasses' at a price of 39 USD";
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informació de la Botiga</title>
</head>
<body>
    <h1>Benvingut a la nostra botiga de vi</h1>
    <p><?php echo $missatge; ?></p>
</body>
</html>
