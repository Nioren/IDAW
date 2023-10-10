<?php
function renderMenuToHTML($currentPageId) {
    $mymenu = array(
        'accueil' => array( 'Accueil' ),
        'cv' => array( 'CV' ),
        'projets' => array('Projets'),
        'contacts' => array('Contact')
    );
    echo "<nav class='menu'>\n<ul>\n";
    foreach($mymenu as $pageId => $pageParameters) {
        $link="index.php?page=".$pageId;
        if ($pageId == $currentPageId) {
        echo "<li><a href='".$link."' id='currentpage'>".$pageParameters[0]."</a></li>\n";
    }
        else {echo "<li><a href='".$link."'>".$pageParameters[0]."</a></li>\n";
    }
}
    echo "</ul>\n</nav>";
}
?>