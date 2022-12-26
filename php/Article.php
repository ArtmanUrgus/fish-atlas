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
                '<img name="image" src="' . $sourcePath . '" alt="' . $label . '" id="atlasImage" onClick="showModal()" >'.
                '<div class="imgContainer">Нажмите на изображение для увеличенного просмотра </div>' .
            '</div>'.
            '<div id="openModal" class="modal">'.
                '<div class="modal-dialog">'.
                    '<div class="modal-content">'.
                        '<div class="modal-header">'.
                            '<h3 class="modal-title">'. $label .'</h3>'.
                            '<a href="#close" title="Close" class="close" onClick="hiddeModal()">×</a>'.
                        '</div>'.
                        '<div class="modal-body">'.
                            '<img src="' . $sourcePath . '" alt="' . $label . '" id="modalImage">'.
                            Navi::closeModalViewButton().
                        '</div>'.
                    '</div>'.
                '</div>'.
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
