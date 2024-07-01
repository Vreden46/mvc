


    <?php foreach ($Artikels as $Artikel): ?>
        
        <h3><?= htmlspecialchars($id) ?></h3><br><br>
        
        <h1><?= htmlspecialchars($Artikel["mainhaeder"]) ?></h1>
        <h2><?= htmlspecialchars($Artikel["haeder"]) ?></h2>
        <p><?= htmlspecialchars($Artikel["text"]) ?></p>
        <a href="http://localhost/home/artikelall">zur&uuml;ck</a>.</p><br>
        <a href="http://localhost/home/artikeledit/<?= htmlspecialchars($Artikel["ID"]) ?>">bearbeiten</a>.</p>
        <a href="http://localhost/home/artikeldelete/<?= htmlspecialchars($Artikel["ID"]) ?>" id="DelArtikel">löschen</a>.</p>
        
        <p><?= htmlspecialchars($_SERVER['HTTP_REFERER']) ?></p>
    
    <?php endforeach; ?>





