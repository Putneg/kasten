<?php

class StaticController extends Controller
{

	public function actionIndex($id=0)
    {

        $id = (int)$id;

        $page = Pages::model()->findByPk($id);

        if (!$page) $this->redirect(DMultilangHelper::addLangToUrl('/'));

        $cs=Yii::app()->clientScript;
        $this->pageTitle = $page->title;
        $cs->registerMetaTag($page->description, 'description', null, array());
        $cs->registerMetaTag($page->keywords, 'keywords', null, array());

        $iPage = (isset($_GET['page'])?$_GET['page']:1);

        $subpages = Pages::model()->findAll(array(
                'condition'=>'parent='.$id,
                'order'=>"`date_create` desc, `id` desc",
                'limit' => 5,
                'offset' => ($iPage-1)*5
            ));
        
        if (!$subpages){
            $this->render('index', array('page'=>$page));    
        } else {
            $total = Pages::model()->count(array(
                'condition'=>'parent='.$id,
                'order'=>"`date_create` desc",
            ));
            if (isset($total)){
                $pages=new CPagination($total);
                $pages->pageSize=5;
                $pages->setCurrentPage($iPage-1);    
            } else $pages = false;
            $this->render('index_list', array('page'=>$page,'subpages'=>$subpages,'pages'=>$pages,'total'=>$total));
        }
        
    }
}