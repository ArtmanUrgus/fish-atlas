<?php

class Navi
{
    static private $disriptionType = [
        "Класс:" => "classFisch",
        "Надотряд:" => 'subclassFisch',
        "Отряд:" => 'groupsFisch',
        "Семейство:" => 'familyFisch',
        "Род:" => 'genusFisch',
        "Вид:" => 'speciesFisch',
        "Подвид:" => 'subspeciesFisch'
    ];

    static public function treeButton($descript, $label, $type) : string
    {
        if($_COOKIE['familyID'] == $label)
            $type = 'active';

        $types = array('disabled', 'enabled', 'active', 'selectable');

        if( in_array($type, $types) ) {
            return
                '<div class="treeButton '.$type.'" id="'. self::$disriptionType[$descript].'" name="'.$label.'" onclick="setFamilyId(this)">' .
                    '<div class="point '.$type.'"></div>' .
                    '<div class="labelBox">' .
                        '<div class="name '.$type.'">' . $label . '</div>' .
                        '<div class="descript '.$type.'">' . $descript . '</div>' .
                    '</div>' .
                '</div>';
        }else{
            if( true ) echo "Type ".$type." for controlContainer is invalid";
        }
        return '';
    }

    static public function contentOverviewPanel($descript, $label, $type) : string
    {
        $types = array('list', 'contentView', 'preview');

        if( in_array($type, $types) ) {
            return
                '<div class="linkButton '.$type.'">' .
                    '<div class="point '.$type.'"></div>' .
                    '<div class="labelBox">' .
                        '<div class="name '.$type.'">' . $label . '</div>' .
                        '<div class="descript '.$type.'">' . $descript . '</div>' .
                    '</div>'.
                '</div>';
        }else{
            if( true ) echo "Type ".$type." for controlContainer is invalid";
        }
        return '';
    }

    static public function listOverviewPanel($descript, $label, $type, $text, $imageSource) : string
    {
        if( $type === 'list' ) {

            if( $text !== '' )
            {
                $textBox = '<div class="listText">'.$text.'</div>';
            }
            if( $imageSource !== '' )
            {
                $imageBox =
                    '<div>'.
                        '<img class="imageList" src="'.$imageSource.'" alt="'.$label.'">'.
                    '</div>';
            }

            return
                '<div class="listButton '.$type.'" name="article" value="'.$label.'" onclick="setArticleId(this)">' .
                $imageBox.
                '<div class="listLabel">' .
                    '<div class="point"></div>' .
                        '<div class="labelBox">' .
                            '<div class="name '.$type.'">' . $label . '</div>' .
                            '<div class="descript '.$type.'">' . $descript . '</div>' .
                        '</div>' .
                    '</div>' .
                    $textBox.
                '</div>';
        }else{
            if( true ) echo "Type ".$type." for controlContainer is invalid";
        }
        return '';
    }

    static public function infoPanel($descript, $name) : string
    {
        if( $name === '' ) return '';

        return
            '<div class="infoPanel">'.
                '<div class="point"></div>'.
                '<div class="labelBox">'.
                    '<div id="name">' . $name . '</div>'.
                    '<div id="descript">' . $descript . '</div>'.
                '</div>'.
            '</div>';
    }

    static public function thumbnailOverviewPanel($descript, $label, $type, $imageSource)
    {
        if( $type === 'preview' ) {

            if( $imageSource !== '')
            {
                $imageBox = '<img class="imageView" src="'.$imageSource.'" alt="'.$label.'">';
            }

            return
                '<div class="previewButton">' .
                    $imageBox.
                    '<div class="label">' .
                        '<div class="point '.$type.'"></div>' .
                        '<div class="labelBox">' .
                            '<div class="name '.$type.'">' . $label . '</div>' .
                            '<div class="descript '.$type.'">' . $descript . '</div>' .
                        '</div>' .
                    '</div>'.
                '</div>';
        }else{
            if( true ) echo "Type ".$type." for controlContainer is invalid";
        }
        return '';
    }

    static public function backPushButton():string
    {
        return
            '<div class="backPushButton" name="atlas" onclick="setContentId(this)">'.
                '<div class="point"></div>'.
                '<div class="labelBox">Вернуться к оглавлению</div>'.
            '</div>';
    }
}