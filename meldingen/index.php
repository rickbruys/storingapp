<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once '../head.php'; ?>
</head>

<body>

<?php 
        session_start();
        if(!isset($_SESSION['user_id'])){
        $msg = "Je moet eerst inloggen!";
        header("Location: ../login.php?msg=$msg"); 
        exit; 
    }
?>
    <div class="container">
        <h1>Meldingen</h1>
        <a href="create.php">Nieuwe melding &gt;</a>

        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <!-- <div style="height: 300px; background: #ededed; display: flex; justify-content: center; align-items: center; color: #666666;"> -->
        <div>
        <?php 
                require_once '../backend/conn.php';
                $query = "SELECT * FROM meldingen";
                $statement = $conn->prepare($query);
                $statement->execute();
                $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?> 

            <table>
                <tr>
                    <th>Achtbaan</th>
                    <th>Type</th>
                    <th>Capaciteit</th>
                    <th>Aanpassen</th>
                </tr>
            <?php foreach($meldingen as $melding): ?>
                <tr>
                    <td><?php echo $melding['attractie']?></td>
                    <td><?php echo $melding['type']?> </td>
                    <td><?php echo $melding['capaciteit']?></td>
                    <td><a href="edit.php?id=<?php echo $melding['id']?>" >Aanpassen</a></td>
                </tr>
            <?php endforeach; ?>
            </table>

        </div>
    </div>  

</body>

</html>
