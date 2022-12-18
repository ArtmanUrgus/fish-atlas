<?php

require_once "Article.php";
require_once "MainPage.php";

class Atlas
{
    static public function createContainer(): string
    {
        switch( $_COOKIE['pageID']  ){
            case "article": return Article::createContainer();
            case "main": return MainPage::createContainer();
        }

        return '';
    }
}