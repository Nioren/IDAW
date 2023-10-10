<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Array</title>
    </head>
    <body>
        <?php 
        $tab = array(2,12);
        echo "tab : "; print_r($tab);
        unset($tab[0]);
        echo "tab : "; print_r($tab);
        $tab2 = array_values($tab);
        echo "tab2 : "; print_r($tab2);    
        ?>
    </body>
</html>