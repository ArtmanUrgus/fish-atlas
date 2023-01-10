<?php

require_once "DataDispatcher.php";
require_once "Article.php";
require_once "NavigationControls.php";

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
            $specimen = $data->fetch();
            if( $specimen != null ) {
                return Article::getArticle($specimen);
            }
        }

        return 'К сожалению по вашему запросу в базе данных ничего не найдено <br><br>'.Navi::backPushButton();
    }
}

