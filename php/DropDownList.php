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
                '<a href="#" name="preview" onclick="setViewId(this)"><div class="dropdownContent" id="dc1"></div>Значки</a>'.
                '<a href="#" name="contentView" onclick="setViewId(this)"><div class="dropdownContent" id="dc2"></div>Список</a>'.
                '<a href="#" name="list" onclick="setViewId(this)"><div class="dropdownContent" id="dc3"></div>Содержимое</a>'.
            '</div>'.
        '</div>';
    }
}

class LanguageSelector
{
    public function createContent( $selectedId )
    {
        return
            '<div class="languageSelector">'.
                '<div class="'.$selectedId.'" id="activeFlag"></div>'.
                '<div id="downPath"></div>'.
            '</div>';
    }
}