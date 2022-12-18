<?php

class IdentMainMenu
{
    static private $m_id;

    function __construct() {
        self::$m_id = 'Form';
    }

    static public function createContainer(): string
    {
        return '';
    }
}