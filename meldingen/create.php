<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php require_once '../header.php'; ?>

    <div class="container">
        <h1>Nieuwe melding</h1>

        <form action="../backend/meldingenController.php" method="POST">

            <!-- naam atractie -->
            <div class="form-group">
                <label for="attractie">Naam attractie:</label>
                <input type="text" name="attractie" id="attractie" class="form-input" required>
            </div>
            <!-- type dropdown -->
            <div class="form-group">
            <label for="type">Type attractie:</label>
            <select name="type" id="type" required>
                <label for="type">Type</label>
                <option value=""> - Kies een type - </option>
                <option value="achtbaan">Achtbaan</option>
                <option value="draaiend">Een draaiende achtbaan</option>
                <option value="kinder">Kinderachtbaan</option>
                <option value="horeca">Restaurants, cafés etc.</option>
                <option value="show">Show</option>
                <option value="water">Water-achtbaan</option>
                <option value="overige">Overig</option>
            </select>
            </div>

            <!-- capaciteit -->
            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input" required>
            </div>
            <!-- prioriteit -->
            <div class="form-group">
                <label for="prioriteit">Prio:</label>
                <input type="checkbox" name="prioriteit" id="prioriteit">
                <label for="prioriteit">Melding met prioriteit</label>
            </div>
            <!-- melder -->
            <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-input" required>
            </div>
            <!-- overige info -->
            <div class="form-group">
                <label for="overig">Overige info:</label>
                <textarea name="overige_info" id="overige_info" class="form-input" rows="4"></textarea>
            </div> 

            <div class="form-group">
                <input type="submit" value="Verstuur melding" id="submit">
            </div>
        </form>
    </div>  

</body>

</html>
