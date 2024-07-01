<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title><?= htmlspecialchars($Title) ?></title>
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
    
        
    <div class="container mt-5">
         
        <?php 
            require $templatepfad;
        ?>
        <div class="row"><p><?= htmlspecialchars($myssesion) ?><p></div> 
        <?= print_r(getcwd() . "\n"); ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

window.onload = function exampleFunction() { 
    console.log('The Script will load now.');
    // Element auswählen, auf das du den Event-Listener anwenden möchtest
    var DelArtikel = document.getElementById("DelArtikel");

    // Event-Listener hinzufügen
    DelArtikel.addEventListener("click", function() {
        // Deine Aktion hier
        //alert("Element wurde geklickt!");

        var bestaetigung = window.confirm("Möchtest du dem Link wirklich folgen?");
        if (!bestaetigung) {
            event.preventDefault();
        }


    });
    
} 
   
</script>
</body>
</html>