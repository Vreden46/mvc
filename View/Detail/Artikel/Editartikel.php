

    <p><?= htmlspecialchars($status) ?></p>
    <h3><?= htmlspecialchars($id) ?></h3><br><br>

    <a href="http://localhost/home/artikelone/<?= htmlspecialchars($Artikels[0]["ID"]) ?>">abbrechen</a>.</p><br><br>
    <form method="post" action="/home/artikelsafe/<?= htmlspecialchars($Artikels[0]["ID"]) ?>">

        <label for="mainhaeder">mainhaeder</label>    
        <input name="feld[mainhaeder]" value="<?= htmlspecialchars($Artikels[0]["mainhaeder"]) ?>">
        <p><?= htmlspecialchars($errors) ?></p>
        <label for="haeder">haeder</label>
        <input name="feld[haeder]" value="<?= htmlspecialchars($Artikels[0]["haeder"]) ?>">
        
        <label for="text">text</label>
        <textarea name="feld[text]" cols="35" rows="4"><?= htmlspecialchars($Artikels[0]["text"]) ?></textarea>
        
        <label for="link">link</label>
        <input name="feld[link]" value="<?= htmlspecialchars($Artikels[0]["link"]) ?>">

        <label for="pic">pic</label>
        <input name="feld[pic]" value="<?= htmlspecialchars($Artikels[0]["pic"]) ?>">

        <button>Save</button>
    </form>

