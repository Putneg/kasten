<?php

class IndexController extends Controller
{

    public function beforeAction($view){
        parent::beforeAction($view);
        $cs=Yii::app()->clientScript;

        //$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/jquery-ui.css');
        

        //$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.min.js', CClientScript::POS_HEAD);
        

        return true;
    }

    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'index'=>'application.controllers.index.IndexAction',
        );
    }
    
}