<?
class ZoneAction extends CAction
{

	public $breadcrumbs = array();

    public function run()
    {
    	$controller = $this->getController();

    	if (!Yii::app()->user->isGuest && Yii::app()->user->role!='super') $controller->redirect('/cp');
        $controller->pageTitle = 'Панель управления';

        $this->breadcrumbs['Зоны'] = array('cp/zone');

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

    	$zone = new Zone;

        $page = (isset($_GET['page'])?$_GET['page']:1);

    	$zones = Zone::model()->findAll(array(
                'order' => 't.name_ua asc',
            ));
    	if (!empty($_POST['w']) && !Yii::app()->user->isGuest) {
            $zone->attributes = $_POST['w'];
            $zone->user_create = Yii::app()->user->id;
            $zone->user_update = Yii::app()->user->id;
            $zone->date_create = date("Y-m-d H:i:s");
            $zone->date_update = date("Y-m-d H:i:s");

            if($zone->validate()) {
                
                $zone->save();
                
                Yii::app()->user->setFlash('success','<strong>Осаго добавлено.</strong>');

                $controller->redirect('/cp/zone/edit/'.$zone->id);
            } 
        }

    	$controller->render('zone_list', array('breadcrumbs'=>$this->breadcrumbs,'zones'=>$zones,'zone'=>$zone));
    }

    protected function itemEdit(){

    	$controller = $this->getController();

    	$zoneId = $_GET['par2'];

    	$zone = Zone::model()->findByPk($zoneId);
        if (!$zone) $controller->redirect('/cp/zone/');

    	$this->breadcrumbs[$zone->name_ua] = array('cp/zone/edit/'.$zoneId);
    	
    	if (!empty($_POST['c']) && !Yii::app()->user->isGuest) {
            $zone->attributes = $_POST['c'];
            $zone->user_update = Yii::app()->user->id;
            $zone->date_update = date("Y-m-d H:i:s");

            if($zone->validate()) {
                
                $zone->save();
                
                Yii::app()->user->setFlash('success','<strong>Зона обновлена</strong>');

                $controller->redirect('/cp/zone/edit/'.$zone->id);
            } 
        }


    	$controller->render('zone_edit', array('breadcrumbs'=>$this->breadcrumbs,'zone'=>$zone));
    }

    protected function itemDelete(){

    	$controller = $this->getController();

    	$itemId = $_GET['par2'];

    	$zone = Zone::model()->findByPk($itemId);
    	if (!$zone) $controller->redirect('/cp/zone/');

    	$zone->delete();
    	Yii::app()->user->setFlash('warning','<strong>Зона удалена</strong>');
    	$controller->redirect('/cp/zone/');

    }

}