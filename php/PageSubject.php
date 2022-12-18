<?php
require_once "MainMenu.php";
require_once "Header.php";
require_once "Content.php";
require_once "FooterNote.php";
require_once "Footer.php";

class PageSubject
{
    // @formatter:off
    static public function createContainer()
    {
        echo '<body>';
            echo '<div id="mainContent">';
                echo MainMenu::createContainer();
                echo Header::createContainer();
                echo Content::createContainer();
                echo FooterNote::createContainer();
            echo '</div>';
        echo '</body>';
    }
}