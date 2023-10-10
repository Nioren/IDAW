<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Heure française</title>
    </head>
    <body>
        <?php 
        date_default_timezone_set('Europe/Paris');
        echo date('l jS \of F Y h:i:s A'); 
        ?>
    </body>
</html>