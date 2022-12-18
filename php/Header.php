<?php

class Header
{
    static public function createContainer(): string
    {
        switch ( $_COOKIE['contentID'] )
        {
            case 'atlas':
                return self::atlas();
            case 'ident':
                return self::identifier();
            case 'contact':
                return self::kontakt();
        }
        return '';
    }

    static private function identifier()
    {
        return '<div class="header1"><div id="identHeader">ОПРЕДЕЛИТЕЛЬ РЫБ</div></div>';
    }
    static private function atlas()
    {
        return '<div class="header2"><div id="identHeader">АТЛАС</div></div>';
    }
    static private function kontakt()
    {
        return '<div class="header3"><div id="identHeader">КОНТАКТ</div></div>';
    }
}