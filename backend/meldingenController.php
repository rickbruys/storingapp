<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit']; 
$melder = $_POST['melder'];

//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, capaciteit, melder) VALUES (:attractie, :capaciteit, :melder)";

//3. Prepare
$statment = $conn->prepare($query);

//4. Execute
$statment->execute([
	":attractie" => $attractie,
	":capaciteit" => $capaciteit,
	":melder" => $melder
]);

header("Location: ../meldingen/index.php?msg=Melding opgeslagen");
