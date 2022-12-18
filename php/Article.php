<?php

require_once "NavigationControls.php";

class Article
{
    // @formatter:off
    static private function article($descript, $title, $text): string
    {
        return '<div class="articleContainer">'.
            '<div class="titleText" id="article">'. $title.'</div>'.
                '<div id="titleDescript">'.$descript.'</div>'.
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
        return
            '<div class="headerContainer">'.
                Navi::infoPanel("Класс:", "Костные рыбы").
                Navi::infoPanel("Отряд:", "Карпообразные").
                Navi::infoPanel("Надотряд:", "").
                Navi::infoPanel("Семейство:", "Карповые").
                Navi::infoPanel("Род:", "").
                Navi::infoPanel("Вид:", "").
            '</div>';
    }

    static private function articleImage($sourcePath, $label):string
    {
        return
            '<div class="imageContainer">' .
                '<img src="' . $sourcePath . '" alt="' . $label . '" id="atlasImage">' .
                '<div class="imgContainer">Нажмите на изображение для увеличенного просмотра </div>' .
            '</div>' .
            '<div id="myModal" class="modal">' .
                '<span class="close">&times;</span>' .
                '<img class="modal-content" id="img01" alt="' . $label . '">' .
                '<div id="caption"></div>' .
            '</div>' .
            '<script>
                // Get the image and insert it inside the modal
                const modal = document.getElementById("myModal");
                const img = document.getElementById("atlasImage");
                const modalImg = document.getElementById("img01");
                const captionText = document.getElementById("caption");
                img.onclick = function(){
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  //alert(modalImg.clientWidth);
                  //alert(modalImg.clientHeight);
                  captionText.innerHTML = this.alt;
                }
                const span = document.getElementsByClassName("close")[0]; // close the modal by clicks on <span> 
                span.onclick = function() { 
                  modal.style.display = "none";
                }
            </script>';
    }

    static public function createContainer(): string
    {
        return
            '<div>'.
                self::header().
                '<div class="article">'.
                    self::articleImage("./img/fishes/karas.jpg", "Серебристый карась").
                    self::article("Вид:", $_COOKIE['articleName'], self::demoText()).
                '</div>'.
            '</div>';
    }
}
