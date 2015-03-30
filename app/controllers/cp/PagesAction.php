<?
class PagesAction extends CAction
{

	public $breadcrumbs = array();

    public function run()
    {
    	$controller = $this->getController();

    	if (!Yii::app()->user->isGuest && Yii::app()->user->role!='super') $controller->redirect('/cp');
        $controller->pageTitle = 'Панель управления';

        $this->breadcrumbs['Текстовые страницы'] = array('cp/pages');

        if (isset($_GET['par1'])){
        	switch ($_GET['par1']) {
        		case 'edit':
                    return $this->itemEdit();
                    break;
                case 'sedit':
        			return $this->itemSEdit();
        			break;
        		case 'delete':
        			return $this->itemDelete();
        			break;
        		
        		default:
        			return $this->defaultPage();
        			break;
        	}
        } else { 
        	return $this->defaultPage();
        }

    }


    protected function defaultPage(){

    	$controller = $this->getController();

    	$page = new Pages;

    	$pages = Pages::model()->findAll(array(
                'condition'=>'parent=0',
                'order'=>"`order` asc",
            ));
    	if (!empty($_POST['w']) && !Yii::app()->user->isGuest) {
            $max_order = Pages::model()->find(array(
                'condition'=>'parent=0',
                'order'=>'`order` asc',
            ));
            if ($max_order){
                $order = $max_order->order+1;    
            } else {
                $order = 1;
            }
            $page->attributes = $_POST['w'];
            $page->parent = '0';
            $page->user_create = Yii::app()->user->id;
            $page->user_update = Yii::app()->user->id;
            $page->date_create = date("Y-m-d H:i:s");
            $page->date_update = date("Y-m-d H:i:s");
            $page->order = $order;

            $page->scenario = 'add';
            if($page->validate()) {
                
                $page->save();
                
                Yii::app()->user->setFlash('success','<strong>Страница добавлена</strong>');

                $controller->redirect('/cp/pages/edit/'.$page->id);
            } 
        }


    	$controller->render('pages_list', array('breadcrumbs'=>$this->breadcrumbs,'pages'=>$pages,'page'=>$page));
    }

    protected function itemEdit(){

    	$controller = $this->getController();

    	$pageId = (int) $_GET['par2'];

    	if ($pageId==0) $controller->redirect('/cp/pages/');


    	$page = Pages::model()->findByPk($pageId);
        $subpages = Pages::model()->findAll(array(
                'condition'=>'parent='.$pageId,
                'order'=>"`order` asc",
            ));

        $spage = new Pages;

    	$this->breadcrumbs[$page->header_ru] = array('cp/pages/edit/'.$pageId);

    	
    	if (!empty($_POST['c']) && !Yii::app()->user->isGuest) {
            $page->attributes = $_POST['c'];
            $page->user_update = Yii::app()->user->id;
            $page->date_update = date("Y-m-d H:i:s");

            if($page->validate()) {
                
                $page->save();
                
                Yii::app()->user->setFlash('success','<strong>Страница обновлена</strong>');

                $controller->redirect('/cp/pages/edit/'.$page->id);
            } 
        }

        if (!empty($_POST['w']) && !Yii::app()->user->isGuest) {
            $max_order = Pages::model()->find(array(
                'order'=>'`order` asc',
            ));
            $order = $max_order->order+1;
            $spage->attributes = $_POST['w'];
            $spage->user_create = Yii::app()->user->id;
            $spage->user_update = Yii::app()->user->id;
            $spage->date_create = date("Y-m-d 00:00:00");
            $spage->date_update = date("Y-m-d H:i:s");
            $spage->order = $order;

            $spage->scenario = 'add';
            if($spage->validate()) {
                
                $spage->save();
                
                Yii::app()->user->setFlash('success','<strong>Страница добавлена</strong>');

                $controller->redirect('/cp/pages/sedit/'.$spage->id);
            } 
        }


    	$controller->render('pages_edit', array('breadcrumbs'=>$this->breadcrumbs,'page'=>$page,'spage'=>$spage,'subpages'=>$subpages));
    }

    protected function itemSEdit(){

        $controller = $this->getController();

        $pageId = (int) $_GET['par2'];

        if ($pageId==0) $controller->redirect('/cp/pages/');


        $page = Pages::model()->findByPk($pageId);
        $subpages = Pages::model()->findAll(array(
                'condition'=>'parent='.$pageId,
                'order'=>"`order` asc",
            ));

        $parentPage = Pages::model()->findByPk($page->parent);

        $this->breadcrumbs[$parentPage->header_ru] = array('cp/pages/edit/'.$page->parent);
        $this->breadcrumbs[$page->header_ru] = array('cp/pages/sedit/'.$pageId);

        
        if (!empty($_POST['c']) && !Yii::app()->user->isGuest) {
            $page->attributes = $_POST['c'];
            $page->user_update = Yii::app()->user->id;
            $page->date_update = date("Y-m-d H:i:s");
            $tmp = explode("/",$_POST['c']['date_create']);
            $page->date_create = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
            if (isset($_FILES) && $_FILES['c']['tmp_name']['image'] != 'none'  && $_FILES['c']['tmp_name']['image'] != '')
            {
                if ($page->image!='' && is_file('images/'.$page->image)) unlink ('images/'.$page->image);
                $tmp = explode('.',$_FILES['c']['name']['image']);
                $filename1 = 'news_'.$page->id.substr(md5(mt_rand(0,1000)).md5(mt_rand(0,1000)),0,25).'.'.$tmp[count($tmp)-1];
                $filename = 'images/'.$filename1;
                copy($_FILES['c']["tmp_name"]['image'],$filename);
                $page->image = $filename1;
            }
            if($page->validate()) {
                
                if (isset($_POST['delete_img'])) $page->image = '';
                $page->save();
                
                Yii::app()->user->setFlash('success','<strong>Страница обновлена</strong>');

                $controller->redirect('/cp/pages/sedit/'.$page->id);
            } 
        }

        $controller->render('pages_sedit', array('breadcrumbs'=>$this->breadcrumbs,'page'=>$page,'subpages'=>$subpages));
    }

    protected function itemDelete(){

    	$controller = $this->getController();

    	$itemId = (int) $_GET['par2'];

    	if ($itemId==0) $controller->redirect('/cp/pages/');

    	$pages = Pages::model()->findByPk($itemId);
    	if (!$pages) $controller->redirect('/cp/pages/');

    	$pages->delete();
    	Yii::app()->user->setFlash('warning','<strong>Страница удалена</strong>');
        if (isset($_GET['par3'])) {
            $controller->redirect('/cp/pages/edit/'.$_GET['par3']);
        } else {
            $controller->redirect('/cp/pages/');    
        }

    }

}