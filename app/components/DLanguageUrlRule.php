<?php

//Yii::import('zii.widgets.grid.CLinkPager');
 
class DLanguageUrlRule extends CUrlRule {

    public function createUrl($manager,$route,$params,$ampersand) {
        $url = parent::createUrl($manager,$route,$params,$ampersand);
        if (false !== $url) {
            return DMultilangHelper::addLangToUrl($url);
        }
        return false;
    }
}