<?
class OsagoAction extends CAction
{

	public $breadcrumbs = array();

    public function run()
    {
    	$controller = $this->getController();

    	if (!Yii::app()->user->isGuest && Yii::app()->user->role!='super') $controller->redirect('/cp');
        $controller->pageTitle = 'Панель управления';

        $this->breadcrumbs['Осаго'] = array('cp/osago');

        if (isset($_GET['par1'])){
        	switch ($_GET['par1']) {
        		case 'edit':
        			return $this->itemEdit();
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

    	$osago = new Osago;

        $page = (isset($_GET['page'])?$_GET['page']:1);

    	$osagos = Osago::model()->findAll(array(
                'order' => 't.id_zone asc,t.id_license asc',
                'with' => array(
                    'zone' => array('alias' => 'zone'),
                    'company' => array('alias' => 'company'),
                    'license' => array('alias' => 'license'),
                    ),
                'limit' => 30,
                'offset' => ($page-1)*30
            ));
        $total = Osago::model()->count(array(
                'order' => 't.id_zone asc,t.id_license asc'
            ));
    	if (!empty($_POST['w']) && !Yii::app()->user->isGuest) {
            $osago->attributes = $_POST['w'];
            $osago->user_create = Yii::app()->user->id;
            $osago->user_update = Yii::app()->user->id;
            $osago->date_create = date("Y-m-d H:i:s");
            $osago->date_update = date("Y-m-d H:i:s");

            if($osago->validate()) {
                
                $osago->save();
                
                Yii::app()->user->setFlash('success','<strong>Осаго добавлено.</strong>');

                $controller->redirect('/cp/osago/edit/'.$osago->id);
            } 
        }

        if (isset($total)){
            $pages=new CPagination($total);
            $pages->pageSize=30;
            $pages->setCurrentPage($page-1);    
        } else $pages = false;


    	$controller->render('osago_list', array('breadcrumbs'=>$this->breadcrumbs,'osagos'=>$osagos,'osago'=>$osago,'pages'=>$pages,'total'=>$total));
    }

    protected function itemEdit(){

    	$controller = $this->getController();

    	$osagoId = $_GET['par2'];

    	$osago = Osago::model()->findByPk($osagoId);
        if (!$osago) $controller->redirect('/cp/osago/');

    	$this->breadcrumbs[$osago->id] = array('cp/osago/edit/'.$osagoId);
    	
    	if (!empty($_POST['c']) && !Yii::app()->user->isGuest) {
            $osago->attributes = $_POST['c'];
            $osago->user_update = Yii::app()->user->id;
            $osago->date_update = date("Y-m-d H:i:s");

            if($osago->validate()) {
                
                $osago->save();
                
                Yii::app()->user->setFlash('success','<strong>Осаго обновлено</strong>');

                $controller->redirect('/cp/osago/edit/'.$osago->id);
            } 
        }


    	$controller->render('osago_edit', array('breadcrumbs'=>$this->breadcrumbs,'osago'=>$osago));
    }

    protected function itemDelete(){

    	$controller = $this->getController();

    	$itemId = $_GET['par2'];

    	$osago = Osago::model()->findByPk($itemId);
    	if (!$osago) $controller->redirect('/cp/osago/');

    	$osago->delete();
    	Yii::app()->user->setFlash('warning','<strong>Осаго удалено</strong>');
    	$controller->redirect('/cp/osago/');

    }

}