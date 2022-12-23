<?php

require_once "NavigationControls.php";
require_once "DataDispatcher.php";

class Article
{
    // @formatter:off
    static private function article($title, $text): string
    {
        return '<div class="articleContainer">'.
            '<div class="titleText" id="article">'. $title.'</div>'.
                '<div id="titleDescript">Вид:</div>'.
                '<div class="separatorH"></div>'.
                '<div id="articleText">'. $text .'</div>'.
                '<div class="separatorH"></div>'.
                Navi::backPushButton().
            '</div>';
    }

    static public function demoText(): string
    {
        return 'Тело высокое умеренно сжатое с боков, с толстой спиной. Усиков нет. Килей на теле нет.
                У представителей рода зубы однорядные. У карася золотого 17-25. В полной боковой 
                линии 32 - 35 крупных чешуй. Жаберных тычинок 23 - 25. Чешуйки на ощупь гладкие. 
                Бока тела окрашены в медно-красный (особенно в темных торфяных водоемах), 
                золотистые тона. Брюшко чуть-чуть светлее, спина заметна темнее. Плавники желтовато-
                красные с более темными концами. Длина тела до 40 см. Масса до 5 кг. В малокормных 
                (олигатрофных) водоемах, например в лесных или тундровых озерах, есть тугорослые 
                (карликовые) формы, длина тела которых не превышает 15 см, а масса 80 - 100 грамм. 
                Наиболее обычная рыба страны, обитает в стоящих и медленнотекущих пресных 
                водоемах.';
    }

    static private function header(): string
    {
        $db = new DataDispatcher();

        if( $db->connectDB() )
        {
            $title = $db->familyTitle()->fetch();
        }
        $db->disconnectDB();

        return
            '<div class="headerContainer">'.
                Navi::infoPanel($title['name']).
            '</div>';
    }

    static private function articleImage($sourcePath, $label):string
    {
        return
            '<div class="imageContainer">' .
                '<img src="' . $sourcePath . '" alt="' . $label . '" id="atlasImage">' .
                '<div class="imgContainer">Нажмите на изображение для увеличенного просмотра </div>' .
            '</div>';
    }

    static public function createContainer(): string
    {
        $db = new DataDispatcher();

        if( $db->connectDB() )
        {
            $data = $db->article($_COOKIE['articleId']);
            if( $data !== null )
            {
                $specimen = $data->fetch();
            }
        }
        $db->disconnectDB();

        return
            '<div>'.
                self::header().
                '<div class="article">'.
                    self::articleImage($specimen['image'], $specimen['name']).
                    self::article($specimen['name'], $specimen['discription']).
                '</div>'.
            '</div>';
    }
}
