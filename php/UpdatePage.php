<?php
if (isset($_GET['contentID'])) {
    $_COOKIE['contentID'] = $_GET['contentID'];
}
if (isset($_GET['pageID'])) {
    $_COOKIE['pageID'] = $_GET['pageID'];
}
if (isset($_GET['articleId'])) {
    $_COOKIE['articleId'] = $_GET['articleId'];
}
if (isset($_GET['viewID'])) {
    $_COOKIE['viewID'] = $_GET['viewID'];
}
if (isset($_GET['familyID'])) {
    $_COOKIE['familyID'] = $_GET['familyID'];
}

require_once "PageSubject.php";

$page = new PageSubject();

echo html_entity_decode( $page->createContainer() );
?>