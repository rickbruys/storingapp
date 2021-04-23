<?php
$action = $_POST['action'];

if($action == "create"){

	//Variabelen vullen
	$attractie = $_POST['attractie'];
	if(empty($attractie))
	{
	$errors[] = "Vul de attractie-naam in.";
	}

	$capaciteit = $_POST['capaciteit'];
	if(!is_numeric($capaciteit))
	{
	$errors[] = "Vul voor capaciteit een geldig getal in.";
	}

	$melder = $_POST['melder'];
	if(empty($melder))
	{
		$errors[] = "vul een melder in.";
	}

	$type = $_POST['type'];
	if(isset($_POST['prioriteit']))
	{
		$prioriteit = true;
	}
	else
	{
		$prioriteit = false;
	}
	$overige_info = $_POST['overige_info'];

	if(isset($errors))
	{
	var_dump($errors);
	die();
	}

	//1. Verbinding
	require_once 'conn.php';

	//2. Query
	$query = "INSERT INTO meldingen (attractie, capaciteit, melder, type, prioriteit, overige_info) VALUES (:attractie, :capaciteit, :melder, :type, :prioriteit, :overige_info)";

	//3. Prepare
	$statment = $conn->prepare($query);

	//4. Execute
	$statment->execute([
		":attractie" => $attractie,
		":capaciteit" => $capaciteit,
		":melder" => $melder,
		":type" => $type,
		":prioriteit" => $prioriteit,
		":overige_info" => $overige_info
	]);

	header("Location: ../meldingen/index.php?msg=Melding opgeslagen");
}
if($action == "update"){
	$capaciteit = $_POST ['capaciteit'];
	if(isset($_POST['prioriteit'])){
		$prioriteit = true;
	}
	else{
		$prioriteit = false;
	}
	$melder = ['melder'];
	$overige_info = ['overige_info'];
	
	require_once 'conn.php';

	$query = "UPDATE meldingen SET capaciteit = :capaciteit, prioriteit = :prioriteit, melder = :melder, overige_info = :overige_info  WHERE id = :id";

	$statement = $conn->prepare($query);
	$statement->execute([
		":capaciteit" => $capaciteit,
		":prioriteit" => $prioriteit,
		":id" => $id,
		":overige_info" => $overige_info
	]);
	
	header("Location: ../meldingen/index.php?msg=Melding opgeslagen");

}
if($action == "edit"){

}
?>