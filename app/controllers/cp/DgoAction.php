<?
class DgoAction extends CAction
{

	public $breadcrumbs = array();

    public function run()
    {
    	$controller = $this->getController();

    	if (!Yii::app()->user->isGuest && Yii::app()->user->role!='super') $controller->redirect('/cp');
        $controller->pageTitle = 'Панель управления';

        $this->breadcrumbs['ДГО'] = array('cp/dgo');

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

    	$dgo = new Dgo;

    	$dgos = Dgo::model()->findAll(array(
                'order'=>'t.id_region asc, t.dgo_sum asc',
                'with'=>array('region'=>array('alias'=>'region'),'company'=>array('alias'=>'company'))
            ));

    	if (!empty($_POST['w']) && !Yii::app()->user->isGuest) {
            $_POST['w']['dgo_sum'] = str_replace(',', '.', $_POST['w']['dgo_sum']);
            $_POST['w']['dgo_payment'] = str_replace(',', '.', $_POST['w']['dgo_payment']);
            $dgo->attributes = $_POST['w'];
            $dgo->user_create = Yii::app()->user->id;
            $dgo->user_update = Yii::app()->user->id;
            $dgo->date_create = date("Y-m-d H:i:s");
            $dgo->date_update = date("Y-m-d H:i:s");

            if($dgo->validate()) {
                
                $dgo->save();
                
                Yii::app()->user->setFlash('success','<strong>ДГО добавлено</strong>');

                $controller->redirect('/cp/dgo/edit/'.$dgo->id);
            } 
        }


    	$controller->render('dgo_list', array('breadcrumbs'=>$this->breadcrumbs,'dgos'=>$dgos,'dgo'=>$dgo));
    }

    protected function itemEdit(){

    	$controller = $this->getController();

    	$dgoId = (int) $_GET['par2'];

    	if ($dgoId==0) $controller->redirect('/cp/dgo/');


    	$dgo = Dgo::model()->findByPk($dgoId);

        if (!$dgo) $controller->redirect('/cp/dgo/');

    	$this->breadcrumbs[$dgo->dgo_sum] = array('cp/dgo/edit/'.$dgoId);

    	
    	if (!empty($_POST['c']) && !Yii::app()->user->isGuest) {
            $_POST['c']['dgo_sum'] = str_replace(',', '.', $_POST['c']['dgo_sum']);
            $_POST['c']['dgo_payment'] = str_replace(',', '.', $_POST['c']['dgo_payment']);
            $dgo->attributes = $_POST['c'];
            $dgo->user_update = Yii::app()->user->id;
            $dgo->date_update = date("Y-m-d H:i:s");

            if($dgo->validate()) {
                
                $dgo->save();
                
                Yii::app()->user->setFlash('success','<strong>ДГО обновлено</strong>');

                $controller->redirect('/cp/dgo/edit/'.$dgo->id);
            } 
        }


    	$controller->render('dgo_edit', array('breadcrumbs'=>$this->breadcrumbs,'dgo'=>$dgo));
    }

    protected function itemDelete(){

    	$controller = $this->getController();

    	$itemId = (int) $_GET['par2'];

    	if ($itemId==0) $controller->redirect('/cp/dgo/');

    	$dgo = Dgo::model()->findByPk($itemId);
    	if (!$dgo) $controller->redirect('/cp/dgo/');

    	$dgo->delete();
    	Yii::app()->user->setFlash('warning','<strong>ДГО удалено</strong>');
    	$controller->redirect('/cp/dgo/');

    }

}