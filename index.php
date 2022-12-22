<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<?php
session_start();

setcookie('contentID', 'atlas');
setcookie('pageID', 'main');
setcookie('articleName', '');
setcookie('viewID', 'preview');
setcookie('familyID', '1');

$_COOKIE['familyID'] = '1';


require_once "./php/PageSubject.php";

echo '<!DOCTYPE html>';

echo '<link href="./css/List.css" rel="stylesheet" type="text/css">';
echo '<link href="./css/LinkButton.css" rel="stylesheet" type="text/css">';
echo '<link href="./css/PreviewButton.css" rel="stylesheet" type="text/css">';
echo '<link href="./css/InfoPanel.css" rel="stylesheet" type="text/css">';
echo '<link href="./css/Atlas.css" rel="stylesheet" type="text/css">';
echo '<link href="./css/NaviButton.css" rel="stylesheet" type="text/css">';
echo '<link href="./css/Header.css" rel="stylesheet" type="text/css">';
echo '<link href="./css/BackPushButton.css" rel="stylesheet" type="text/css">';
echo '<link href="./css/Main.css" rel="stylesheet" type="text/css">';
echo '<link href="./css/Content.css" rel="stylesheet" type="text/css">';
echo '<link href="./css/DropDownList.css" rel="stylesheet" type="text/css">';
echo '<link href="./css/Footer.css" rel="stylesheet" type="text/css">';
echo '<link href="./css/FooterNote.css" rel="stylesheet" type="text/css">';
echo '<link href="./css/MainMenu.css" rel="stylesheet" type="text/css">';

echo '<script src="./js/NavigationControls.js"></script>';

echo '<html>';
    echo '<head>';
        echo '<meta charset=UTF-8>';
        echo '<title>The Fish Atlas</title>';
    echo '</head>';

    echo html_entity_decode( PageSubject::createContainer() );
echo '</html>';
?>