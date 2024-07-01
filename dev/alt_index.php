<?php
    ini_set("display_errors", true);

    require_once "loader/autoloader.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Bootsrap in Arolsen</title>
    <style>
        .h-10{
            height: 10rem;
        }

        .h-8{
            height: 8rem;
        }
    </style>
</head>
<body>

    <div class="container mt-3">
            
    <?php

        $blog = new blog();
        echo $blog->getHeader();
        $blog->setHeader("Neuer Header");
        echo $blog->getHeader(); // Gibt den neuen Header aus
        
    ?>
    
        
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>