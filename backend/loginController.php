<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "SELECT ALL FROM users WHERE :username == username";

//3. Prepare
$statment = $conn->prepare($query);

//4. Execute
$statment->execute([
    ":username" => $username,
]);

$users = $statement->fetchAll(PDO::FETCH_ASSOC);

if($statement->rowCount() < 1)
{
 die("Error: account bestaat niet");
}

if(!password_verify($password, $user['password']))
{
 die("Error: wachtwoord niet juist!");
}

$_SESSION['user_id'] = $user['id'];

header("Location: ../index.php?msg=Ingelogd");

?>