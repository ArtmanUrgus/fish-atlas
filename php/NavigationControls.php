<?php

class Navi
{
    // @formatter:off

    static public function treeButton($label, $dbID) : string
    {
        $type = 'selectable';
        if($_COOKIE['familyID'] == $dbID)
            $type = 'active';

        return
            '<div class="treeButton '.$type.'" id="groupsFisch" name="'.$label.'" value="'.$dbID.'" onclick="setFamilyId(this)">' .
                '<div class="point '.$type.'"></div>' .
                '<div class="labelBox">' .
                    '<div class="name '.$type.'">' . $label . '</div>' .
                    '<div class="descript '.$type.'">Отряд:</div>' .
                '</div>' .
            '</div>';
    }

    static public function contentOverviewPanel($label, $image, $dbId) : string
    {
            return
                '<div class="linkButton contentView" value="'. $dbId.'" onclick="setArticleId(this)">' .
                    '<div class="point"></div>' .
                    '<div class="labelBox">' .
                        '<div class="descript contentView">Вид:</div>' .
                        '<div class="name contentView">' . $label . '</div>' .
                    '</div>'.
                    '<img class="imageOverview" src="' . $image . '" alt="'.$label.'">' .
                '</div>';
    }

    static public function listOverviewPanel($label, $text, $imageSource, $dbId) : string
    {
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
                '<div class="listButton list" name="article" value="'. $dbId.'" onclick="setArticleId(this)">' .
                $imageBox.
                '<div class="listLabel">' .
                    '<div class="point"></div>' .
                        '<div class="labelBox">' .
                            //'<div class="descript list">Вид:</div>' .
                            '<div class="name list">' . $label . '</div>' .
                        '</div>' .
                    '</div>' .
                    $textBox.
                '</div>';
    }

    static public function infoPanel($name) : string
    {
        return
            '<div class="infoPanel">'.
                '<div class="point"></div>'.
                '<div class="labelBox">'.
                    '<div id="name">' . $name . '</div>'.
                    '<div id="descript">Семейство:</div>'.
                '</div>'.
            '</div>';
    }

    static public function thumbnailOverviewPanel( $label, $imageSource, $dbId)
    {
        if( $imageSource !== '')
        {
            $imageBox = '<img class="imageView" src="'.$imageSource.'" alt="'.$label.'">';
        }

        return
            '<div class="previewButton" value="'. $dbId.'" onclick="setArticleId(this)">' .
                $imageBox.
                '<div class="label">' .
                    '<div class="point preview"></div>' .
                    '<div class="labelBox">' .
                        //'<div class="descript preview">Вид:</div>' .
                        '<div class="name preview">' . $label . '</div>' .
                    '</div>' .
                '</div>'.
            '</div>';
    }

    static public function backPushButton():string
    {
        return
            '<div class="backPushButton" name="atlas" onclick="setContentId(this)">'.
                '<div class="point"></div>'.
                '<div class="labelBox">Вернуться к оглавлению</div>'.
            '</div>';
    }

    static public function overview($name, $discription, $image, $dbId) : string
    {
        switch( $_COOKIE['viewID'] )
        {
            case 'preview':
                return Navi::thumbnailOverviewPanel($name, $image, $dbId);
            case 'list':
                return  Navi::listOverviewPanel( $name, $discription, $image, $dbId);
            case 'contentView':
                return  Navi::contentOverviewPanel( $name, $image, $dbId);
        }
    }

    static public function closeButton():string
    {
        return
            '<div class="backPushButton" id="closeButton" name="atlas" onClick="hiddeModal()">'.
                '<div class="point"></div>'.
                '<div class="labelBox">Закрыть</div>'.
            '</div>';
    }

    static public function submitButton(): string
    {
        return
        '<button type="submit" class="backPushButton">'.
            '<div class="point"></div>'.
            '<div class="labelBox">Отправить</div>'.
        '</button >';
    }
}