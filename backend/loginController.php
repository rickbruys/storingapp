<?php
require_once '../header.php'; 

        session_start();
        if(!isset($_SESSION['user_id'])){
        $msg = "Je moet eerst inloggen!";
        header("Location: ../login.php?msg=$msg"); 
        exit; 
    }


$username = $_POST['username'];
$password = $_POST['password'];

//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "SELECT * FROM users WHERE users = :username";

//3. Prepare
$statement = $conn->prepare($query);

//4. Execute
$statement->execute([
    ":username" => $username,
]);

$users = $statement->fetch(PDO::FETCH_ASSOC);

if($statement->rowCount() < 1)
{
 die("Error: account bestaat niet");
}

if(!password_verify($password, $users['password']))
{
 die("Error: wachtwoord niet juist!");
}

$_SESSION['user_id'] = $user['id'];

header("Location: ../index.php?msg=Ingelogd");

?>