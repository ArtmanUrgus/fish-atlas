<?php

require_once "DropDownList.php";
require_once "Search.php";

class MainMenu
{
    static private $atlasActive = false;
    static private $identActive = true;
    static private $kontaktActive = false;
    static private $activButton = 2;

    static private function setActiveButton( $id )
    {
        self::$activButton = $id;
        self::$atlasActive = false;
        self::$identActive = false;
        self::$kontaktActive = false;

        switch ($id)
        {
            case 'atlas':
                self::$atlasActive = true;
                break;
            case 'ident':
                self::$identActive = true;
                break;
            case 'contact':
                self::$kontaktActive = true;
                break;
        }
    }
    static public function createContainer(): string
    {
        self::setActiveButton( $_COOKIE['contentID'] );
        return '<form><div class="menu"><div class="nav">'.
            self::createButton("АТЛАС", self::$atlasActive, 'atlas').
            self::createButton("ОПРЕДЕЛИТЕЛЬ", self::$identActive, 'ident').
            self::createSearchField().
            self::createButton("КОНТАКТ", self::$kontaktActive, 'contact').
            self::createLangButton().
            '</div></div></form>';
    }

    static private function createButton($titel, $state, $id): string
    {
        if( $state === true )
            return '<a class="button" id="active_state"><div id="fisch_icon"><span id="titel">'.$titel.'</span></div></a>';
        return '<a class="button" name="'.$id.'" onclick="setContentId(this)"><div id="fisch_icon" ><span id="titel" >'.$titel.'</span></div></a>';
    }
    static private function createSearchField(): string
    {
        return
            '<form method="POST" action="Search.php">'.
                '<div class="search_field">'.
                    '<input type="text" id="searchText" name="query" placeholder="Поиск.." title="Искать по атласу">'.
                '</div>'.
                '<input type="submit" id="submitButton" value="">'.
            '</form>';
    }
    static private function createLangButton(): string
    {
        $langbutton = new LanguageSelector();

        return  '<form method="POST" action="search.php">'.
                    $langbutton->createContent("RUS").
                '</form>';
    }
}
