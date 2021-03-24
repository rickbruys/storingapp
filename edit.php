<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once '../head.php'; ?>
</head>

<body>
<?php require_once '../header.php'; ?>
<div class="container">
        <h1>Melding aanpassen</h1>

        <?php 
                require_once '../backend/conn.php';
                $query = "SELECT * FROM meldingen";
                $statement = $conn->prepare($query);
                $statement->execute();
                $melding = $statement->fetch(PDO::FETCH_ASSOC);
            ?> 

        <form action="../backend/meldingenController.php" method="POST">

            <!-- naam atractie -->
            <div class="form-group">
                <label for="attractie">Naam attractie:</label>
                <?php echo $melding['attractie']?>
            </div>
            
            <!-- type dropdown -->
            <div class="form-group">
            <label for="type">Type attractie:</label>
            <?php echo $melding['type']?>
            </div>

            <!-- capaciteit -->
            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input" value="<?php echo $melding['capaciteit']?>" required>
            </div>
            <!-- prioriteit -->
            <div class="form-group">
                <label for="prioriteit">Prio:</label>
                <input type="checkbox" name="prioriteit" id="prioriteit"
                <?php if($melding['prioriteit']) echo 'checked'; ?>
                >
                <label for="prioriteit">Melding met prioriteit</label>
            </div>
            <!-- melder -->
            <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-input" value="<?php echo $melding['melder']?>" required>
            </div>
            <!-- overige info -->
            <div class="form-group">
                <label for="overig">Overige info:</label>
                <textarea name="overige_info" id="overige_info" class="form-input" rows="4"><?php echo $melding['overige_info']?></textarea>
            </div> 

            <div class="form-group">
                <input type="submit" value="Verstuur melding" id="submit">
            </div>
        </form>
    </div>  
    
</body>
</html> 