<?php

require_once "IdentMainMenu.php";
require_once "IdentContent.php";
require_once "IdentSubMenu.php";
require_once "InteractiveSelector.php";

class Identifier
{
    static public function createContainer(): string
    {
        return self::note().
            IdentMainMenu::createContainer() . IdentContent::createContainer() . IdentContent::createContainer().
            InteractiveSelector::createContainer() .
            self::fuss_note();
    }
    static private function note():string
    {
        return '<div class="identifier_note">Приложение призвано помочь в оперделении рыб обитающих в водоемах на территории Российской Федерации. '.
            'Определитель содержит информанцию о N видах речных и озерных рыб. В задачу определителя входит упрощенние '.
            'поиска по внешним признакам. Для идентификации образца следуйте инструкиям на экране.</div>';
    }
    static private function fuss_note():string
    {
        return '<div class="ident_fuss_note">Внимание! В этот определитель не вошли змеевидные и несимметричные рыбы.</div>';
    }
}