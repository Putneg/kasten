<?
class IndexAction extends CAction
{
    public function run()
    {

        $controller = $this->getController();
        

        /*$page = Pages::model()->findByPk(12);
        $cs=Yii::app()->clientScript;
        $controller->pageTitle = $page->title;
        $cs->registerMetaTag($page->description, 'description', null, array());
        $cs->registerMetaTag($page->keywords, 'keywords', null, array());*/

        

        $controller->render('index', array());
    }
}