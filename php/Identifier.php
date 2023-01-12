<?php

class Identifier
{
    static public function createContainer(): string
    {
        return self::note().
            self::fuss_note();
    }
    static private function note():string
    {
        return '<div class="identifier_note">Приложение призвано помочь в оперделении рыб обитающих в водоемах на территории Российской Федерации. '.
            'Определитель содержит информанцию о N видах речных и озерных рыб. В задачу определителя входит упрощенние '.
            'поиска по внешним признакам. Для идентификации вида следуйте дальнейшим инструкиям.</div>';
    }
    static private function fuss_note():string
    {
        return '<div class="ident_fuss_note">Внимание! В этот определитель не вошли змеевидные и несимметричные рыбы.</div>';
    }
}