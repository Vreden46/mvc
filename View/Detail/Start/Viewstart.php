<h2>Start</h2>
        
        <?php foreach ($start as $link): ?>
            
            <p><a href="<?= htmlspecialchars($link[0]) ?>" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><?= htmlspecialchars($link[1]) ?></a></p>
        
        <?php endforeach; ?>