<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hello world</title>
    </head>
    <body>
        <?php 
        function afficher( $texte, $saut = 1 ) {
            echo $texte;
            for( $i = 0 ; $i < $saut ; $i++)
            echo "\n";
            }
            afficher("Hello", 0);
            afficher(" World !");
        ?>
    </body>
</html>