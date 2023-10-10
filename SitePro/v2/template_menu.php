<?php
function renderMenuToHTML($currentPageId) {
    $mymenu = array(
        'index' => array( 'Accueil' ),
        'cv' => array( 'CV' ),
        'projets' => array('Projets')
    );
    echo "<nav class='menu'>\n<ul>\n";
    foreach($mymenu as $pageId => $pageParameters) {
        if ($pageId == $currentPageId) {
        echo "<li><a href='".$pageId.".php' id='currentpage'>".$pageParameters[0]."</a></li>\n";
    }
        else {echo "<li><a href='".$pageId.".php'>".$pageParameters[0]."</a></li>\n";
    }
}
    echo "</ul>\n</nav>";
}
?>