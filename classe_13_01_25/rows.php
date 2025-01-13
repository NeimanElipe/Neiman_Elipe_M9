
<?php
$conn = mysqli_connect("localhost", "nelipe", "pirineus", "test");

if (!$conn){
 echo " No s'ha pogut connectar correctament";
 
}

else {
 echo "OK";
 //echo = $query = mysqli_query($conn, "SELECT * FROM Usuaris");
 $query = mysqli_query($conn, "INSERT INTO Usuaris (dni, nom, cognom) VALUES ('14','El','Cigala')");
}




?>

