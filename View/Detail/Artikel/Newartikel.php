


    <form method="post" action="/home/artikelcreate">
        <label for="mainhaeder">mainhaeder</label>    
        <input name="feld[mainhaeder]" value="">
        <p><?= htmlspecialchars($errors) ?></p>
        <label for="haeder">haeder</label>
        <input name="feld[haeder]" value="">
        
        <label for="text">text</label>
        <textarea name="feld[text]" cols="35" rows="4"></textarea>
        
        <label for="link">link</label>
        <input name="feld[link]" value="">

        <label for="pic">pic</label>
        <input name="feld[pic]" value="">

        <button>Save</button>
    </form>

