<?
class LicenseAction extends CAction
{

	public $breadcrumbs = array();

    public function run()
    {
    	$controller = $this->getController();

    	if (!Yii::app()->user->isGuest && Yii::app()->user->role!='super') $controller->redirect('/cp');
        $controller->pageTitle = 'Панель управления';

        $this->breadcrumbs['Типы ТС'] = array('cp/license');

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

    	$license = new License;

    	$licenses = License::model()->findAll(array(
                'order'=>'t.id asc',
            ));
    	if (!empty($_POST['w']) && !Yii::app()->user->isGuest) {
            $license->attributes = $_POST['w'];
            $license->user_create = Yii::app()->user->id;
            $license->user_update = Yii::app()->user->id;
            $license->date_create = date("Y-m-d H:i:s");
            $license->date_update = date("Y-m-d H:i:s");

            if($license->validate()) {
                
                $license->save();
                
                Yii::app()->user->setFlash('success','<strong>Тип ТС добавлен</strong>');

                $controller->redirect('/cp/license/edit/'.$license->id);
            } 
        }


    	$controller->render('license_list', array('breadcrumbs'=>$this->breadcrumbs,'licenses'=>$licenses,'license'=>$license));
    }

    protected function itemEdit(){

    	$controller = $this->getController();

    	$licenseId = $_GET['par2'];

    	$license = License::model()->findByPk($licenseId);
        if (!$license) $controller->redirect('/cp/license/');

    	$this->breadcrumbs[$license->name_ru] = array('cp/license/edit/'.$licenseId);
    	
    	if (!empty($_POST['c']) && !Yii::app()->user->isGuest) {
            $license->attributes = $_POST['c'];
            $license->user_update = Yii::app()->user->id;
            $license->date_update = date("Y-m-d H:i:s");

            if($license->validate()) {
                
                $license->save();
                
                Yii::app()->user->setFlash('success','<strong>Тип ТС обновлен</strong>');

                $controller->redirect('/cp/license/edit/'.$license->id);
            } 
        }


    	$controller->render('license_edit', array('breadcrumbs'=>$this->breadcrumbs,'license'=>$license));
    }

    protected function itemDelete(){

    	$controller = $this->getController();

    	$itemId = $_GET['par2'];

    	$license = License::model()->findByPk($itemId);
    	if (!$license) $controller->redirect('/cp/license/');

    	$license->delete();
    	Yii::app()->user->setFlash('warning','<strong>Тип ТС удален</strong>');
    	$controller->redirect('/cp/license/');

    }

}