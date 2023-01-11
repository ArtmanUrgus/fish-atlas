<?php

class SandwichSelector
{
    public function createContent()
    {
        return
        '<div class="dropdown">'.
            '<button  class="sandwichSelector">'.
                '<div class="'.$_COOKIE['viewID'].'" id="activeImage"></div>'.
                '<div id="downPath"></div>'.
            '</button >'.
            '<div class="dropdown-content">'.
                '<div data-id="preview" class="dropdown-item" onClick="setViewId(this)"><div class="dropdownContent" id="dc1"></div>Значки</div>'.
                '<div data-id="contentView" class="dropdown-item" onClick="setViewId(this)"><div class="dropdownContent" id="dc2"></div>Список</div>'.
                '<div data-id="list" class="dropdown-item" onClick="setViewId(this)"><div class="dropdownContent" id="dc3"></div>Содержимое</div>'.
            '</div>'.
        '</div>';
    }
}

class LanguageSelector
{
    public function createContent( $selectedId )
    {
        return
            '<div class="dropdown">'.
                '<button class="languageSelector">'.
                    '<div class="'.$selectedId.'" id="activeFlag"></div>'.
                    '<div id="downPath"></div>'.
                '</button>'.
                '<div class="dropdown-content">'.
                    '<div data-id="rus" class="language-item" onClick="translate(this)"><div class="dropdownContent" id="lng1"></div>Русский</div>'.
                    '<div data-id="eng" class="language-item" onClick="translate(this)"><div class="dropdownContent" id="lng2"></div>Английский</div>'.
                    '<div data-id="deu" class="language-item" onClick="translate(this)"><div class="dropdownContent" id="lng3"></div>Немецкий</div>'.
                '</div>'.
            '</div>';
    }
}