<?php

require_once "NavigationControls.php";
require_once "Article.php";

class MainPage
{
    static private function contentOverview(): string
    {
        switch( $_COOKIE['viewID'] )
        {
            case 'preview':
                $view = Navi::thumbnailOverviewPanel("Вид:", "Лосось", "preview", "./img/fishes/semga.jpg");
                break;
            case 'list':
                $view = Navi::listOverviewPanel("Вид:", "Лосось", "list", Article::demoText(), "./img/fishes/semga.jpg");
                break;
            case 'contentView':
                $view = Navi::contentOverviewPanel("Вид:", "Лосось", "contentView");
                break;
        }

        $sandwich = new SandwichSelector();

        return
            '<div class="mainContentHeader">'.
            '<div>'.
            '<div class="titleText">'.$_COOKIE['familyID'].'</div>'.
            '<div id="titleDescript">Семейство:</div>'.
            '</div>'.
            $sandwich->createContent().
            '</div>'.
            '<div class="contentBox '.$_COOKIE['viewID'].'">'.
            $view.
            $view.
            $view.
            $view.
            $view.
            $view.
            $view.
            $view.
            $view.
            $view.
            '</div>';
    }

    static private function navigation(): string
    {
        return
            Navi::treeButton("Класс:", "Костные рыбы", "disabled"). //"Костные рыбы"
            Navi::treeButton("Надотряд:", "Костно-хрящевые", "enabled"). //Костно-хрящевые
            Navi::treeButton("Отряд:", "Осетровые", "selectable"). //Осетровые
            Navi::treeButton("Надотряд:", "Двоякодышащие", "enabled"). //Двоякодышащие
            Navi::treeButton("Вид:", "Всего 6 видов", "disabled"). //Всего 6 видов
            Navi::treeButton("Надотряд:", "Кистеперые", "enabled"). //Кистеперые
            Navi::treeButton("Вид:", "Латимерия", "disabled"). //Латимерия
            Navi::treeButton("Надотряд:", "Костистые рыбы", "enabled"). //Костистые рыбы
            Navi::treeButton("Отряд:", "Сельдеобразные", "selectable"). //Сельдеобразные
            Navi::treeButton("Отряд:", "Лососеобразные", "selectable"). //Лососеобразные
            Navi::treeButton("Отряд:", "Карпообразные", "selectable"). //Карпообразные
            Navi::treeButton("Отряд:", "Сомобразные", "selectable"). //Сомобразные
            Navi::treeButton("Отряд:", "Трескообразные", "selectable"). //Трескообразные
            Navi::treeButton("Отряд:", "Камбалообразные", "selectable"). //Камбалообразные
            Navi::treeButton("Класс:", "Хрящевые рыбы", "disabled"). //Хрящевые рыбы
            Navi::treeButton("Надотряд:", "Акулы", "enabled"). //Акулы
            Navi::treeButton("Надотряд:", "Скаты", "enabled"). //Скаты
            Navi::treeButton("Надотряд:", "Химеры", "enabled"); //Химеры
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