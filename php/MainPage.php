<?php

require_once "NavigationControls.php";
require_once "Article.php";
require_once "DataDispatcher.php";

class MainPage
{
    static private function contentOverview(): string
    {
        $dbItems = '';
        $sandwich = new SandwichSelector();
        $db = new DataDispatcher();

        if( $db->connectDB() )
        {
            $title = $db->familyTitle()->fetch();
            $data = $db->specimen($title['id']);
            if( $data !== null )
            {
                reset($data); // reset to first position
                while ($row = $data->fetch()) {
                    $dbItems = $dbItems.Navi::overview($row['name'], $row['discription'], $row['image'], $row['id']);
                }
            }
        }
        $db->disconnectDB();

        return
            '<div class="mainContentHeader">'.
                '<div>'.
                    '<div class="titleText">'.$title['name'].'</div>'.
                    '<div id="titleDescript">Семейство:</div>'.
                '</div>'.
                $sandwich->createContent().
            '</div>'.
            '<div class="contentBox '.$_COOKIE['viewID'].'">'.
                $dbItems.
            '</div>';
    }

    static private function navigation(): string
    {
        $treeButtons = '';
        $db = new DataDispatcher();

        if( $db->connectDB() )
        {
            $data = $db->atlasStructure();
            if( $data !== null )
            {
                reset($data); // reset to first position
                while ($row = $data->fetch()) {
                    $treeButtons = $treeButtons.Navi::treeButton($row['name'], $row['id']);
                }
            }
        }
        $db->disconnectDB();
        return $treeButtons;
    }

    static public function createContainer(): string
    {
        return
            '<div class="mainAtlasContent">'.
                '<div class="mainNavi">' . self::navigation() . '</div>'.
                '<div class="separatorV"></div>'.
                '<div class="mainContent">' .
                    self::contentOverview() .
                '</div>'.
            '</div>';
    }
}