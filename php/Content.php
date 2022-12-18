<?php
require_once "Identifier.php";
require_once "Atlas.php";
require_once "Kontakt.php";

class Content
{
    static public function createContainer(): string
    {
        $atlasPages = array('main', 'article');

        switch ( $_COOKIE['contentID'] )
        {
            case 'atlas':
                if( in_array( $_COOKIE['pageID'], $atlasPages) )
                {
                    return '<div class="content">'.Atlas::createContainer().'</div>';
                }
                break;
            case 'ident':
                return '<div class="content">'.Identifier::createContainer().'</div>';
            case 'contact':
                return '<div class="content">'.Kontakt::createContainer().'</div>';
        }
        return '';
    }
}