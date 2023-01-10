<?php

require_once "Article.php";
require_once "MainPage.php";
require_once "Search.php";

class Atlas
{
    static public function createContainer(): string
    {
            switch( $_COOKIE['pageID']  ){
                case "main": return MainPage::createContainer();
                case "article": return Article::createContainer();
                case "searchResult": return Search::createContainer();
            }

        return 'SEARCH';
    }
}