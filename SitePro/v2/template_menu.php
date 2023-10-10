<nav class="menu">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="cv.php">CV</a></li></div>
                <li><a href="projets.php">Projets</a></li>
                <li><a href="infos-technique.php">Infos techniques</a></li>
            </ul>
        </nav>

<?php
function renderMenuToHTML($currentPageId) {
    $mymenu = array(
        'index' => array( 'Accueil' ),
        'cv' => array( 'CV' ),
        'projets' => array('Projets')
    );
    // ...
    foreach($mymenu as $pageId => $pageParameters) {
        echo "...";
    }
    // ...
}
?>