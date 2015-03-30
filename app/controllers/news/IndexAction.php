<?
class IndexAction extends CAction
{
    public function run()
    {

        $controller = $this->getController();
        
        $cs=Yii::app()->clientScript;
        //$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/regular.js?q='.date("U"), CClientScript::POS_HEAD);

        $controller->pageTitle = 'Insurance';
        $cs->registerMetaTag('', 'description', null, array());
        $cs->registerMetaTag('', 'keywords', null, array());

        $controller->render('index', array());
    }
}