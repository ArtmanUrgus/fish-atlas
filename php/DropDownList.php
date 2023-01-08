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
                '<dev data-id="preview" class="dropdown-item" onClick="setViewId(this)"><div class="dropdownContent" id="dc1"></div>Значки</dev>'.
                '<dev data-id="contentView" class="dropdown-item" onClick="setViewId(this)"><div class="dropdownContent" id="dc2"></div>Список</dev>'.
                '<dev data-id="list" class="dropdown-item" onClick="setViewId(this)"><div class="dropdownContent" id="dc3"></div>Содержимое</dev>'.
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