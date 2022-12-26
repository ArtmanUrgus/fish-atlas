<?php

if (!empty($_POST['query'])) {
    $search_result = SearchRequest::searchByKey ($_POST['query']);
    echo $search_result;
}

require_once "DataDispatcher.php";

class SearchRequest{

    static public function searchByKey($query): string
    {
        echo 'search for '.$query;
        if (!empty($query))
        {
            $query = trim($query);
            $query = htmlspecialchars($query);

            if (strlen($query) < 2) {
                $text = '<p>Слишком короткий поисковый запрос.</p>';
            } else if (strlen($query) > 256) {
                $text = '<p>Слишком длинный поисковый запрос.</p>';
            } else {
                $db = new DataDispatcher();
                $text = $db->serach($query);
            }
        } else {
            $text = '<p>Задан пустой поисковый запрос.</p>';
        }

        return $text;

    }
}

