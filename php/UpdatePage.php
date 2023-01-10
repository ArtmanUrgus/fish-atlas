<?php

$contents = array('atlas', 'ident', 'contact');
$pages = array('main', 'article', 'searchResult');
$views = array('preview', 'contentView', 'list');

if (isset($_GET['contentID'])) {
    if(in_array( $_GET['contentID'], $contents) ) {
        $_COOKIE['contentID'] = $_GET['contentID'];
    }else{
        $_COOKIE['contentID'] = 'atlas';
    }
}
if (isset($_GET['pageID'])) {
    if(in_array( $_GET['pageID'], $pages)){
        $_COOKIE['pageID'] = $_GET['pageID'];
    }else{
        $_COOKIE['pageID'] = 'main';
    }
}
if (isset($_GET['articleId'])) {
    if( $_GET['familyID'] > 0 && $_GET['familyID'] <= 68 ) {
        $_COOKIE['articleId'] = $_GET['articleId'];
    }else{
        $_COOKIE['articleId'] = '1';
    }
}
if (isset($_GET['viewID'])) {
    if(in_array( $_GET['viewID'], $views)){
        $_COOKIE['viewID'] = $_GET['viewID'];
    }else{
        $_COOKIE['viewID'] = 'preview';
    }
}
if (isset($_GET['familyID'])) {
    if( $_GET['familyID'] > 0 && $_GET['familyID'] <= 7 ){
        $_COOKIE['familyID'] = $_GET['familyID'];
    }else{
        $_COOKIE['familyID'] = '1';
    }
}
if (isset($_GET['searchRequest'])) {
    $_COOKIE['searchRequest'] = $_GET['searchRequest'];
    $_COOKIE['pageID'] = 'searchResult';
}

require_once "PageSubject.php";

$page = new PageSubject();

echo html_entity_decode( $page->createContainer() );

?>