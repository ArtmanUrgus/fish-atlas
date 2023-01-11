<?php

require_once "DataDispatcher.php";
require_once "Article.php";
require_once "NavigationControls.php";
require_once "MainPage.php";

class Search{

    static public function createcontainer(): string
    {
        $db = new DataDispatcher();

        if( $db->connectDB() )
        {
            $data = $db->serachArticle($_COOKIE['searchRequest']);
        }
        $db->disconnectDB();

        if( $data !== null )
        {
            $dbItems = '';
            if( $data != null )
            {
                reset($data); // reset to first position
                while ($row = $data->fetch()) {
                    $dbItems = $dbItems.Navi::overview($row['name'], $row['discription'], $row['image'], $row['id']);
            }

            return
                '<div class="contentBox '.$_COOKIE['viewID'].'">'.
                    $dbItems.
                '</div><br><br>'.Navi::backPushButton();;
            }
        }

        return 'К сожалению по вашему запросу в базе данных ничего не найдено <br><br>'.Navi::backPushButton();
    }
}

