<?php

$nota = $_GET['nota'];



$conn = mysqli_connect("localhost", "nelipe", "pirineus", "test");

if (!$conn){
 echo " No s'ha pogut connectar correctament";
 
}

else {
 //cho "   OK   ";

 //$sql="select * from Usuaris where notas >= $nota";
 //$query = mysqli_query($conn, $sql);
 //$rows = mysqli_num_rows($query);
    $insert = "INSERT INTO Usuaris (dni, nom, cognom, notas) VALUES ('144','El','Jamaa', $nota)";
    $query_insert = mysqli_query($conn, $insert);
    $query_affected = mysqli_affected_rows($conn);
    echo"$query_affected";
 //echo "   Hi han $rows alumnes amb mes o un $nota  ";
}




?>



