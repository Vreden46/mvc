
    <?php foreach ($Artikels as $Artikel): ?>
        
        <h3><?= htmlspecialchars($id) ?></h3><br><br>
        
        <h1><?= htmlspecialchars($Artikel["mainhaeder"]) ?></h1>
        <h2><?= htmlspecialchars($Artikel["haeder"]) ?></h2>
        <p><?= htmlspecialchars(substr($Artikel["text"],0,220))."....."?></p>
        <a href="http://localhost/home/artikelone/<?= htmlspecialchars($Artikel["ID"]) ?>">mehr</a>.</p><br><br>

    <?php endforeach; ?>


