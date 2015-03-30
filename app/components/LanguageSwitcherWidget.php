<?php

class LanguageSwitcherWidget extends CWidget
{
    public function run()
    {
        $currentUrl = ltrim(Yii::app()->request->url, '/');
        $currentLang = Yii::app()->language;
        $links = array();
        foreach (DMultilangHelper::suffixList() as $suffix => $name){
            $url = '/' . ($suffix ? trim($suffix, '_') . '/' : '') . $currentUrl;
            $links[] = CHtml::tag('li', array('class'=>($name['lang']==$currentLang?'active':'')), CHtml::link($name['lable'], $url,array('class'=>' lang')));
        }
        echo CHtml::tag('ul', array('class'=>'nav navbar-nav navbar-right'), implode("\n", $links)); 
    }
}