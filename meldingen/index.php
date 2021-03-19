<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php require_once '../header.php'; ?>
    
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
            <?php foreach($meldingen as $melding): ?>
                <p> <?php 
                    echo $melding['attractie']; 
                    echo ", Type: "; 
                    echo $melding['type']; ?> </p>
            <?php endforeach; ?>
        </div>
    </div>  

</body>

</html>
