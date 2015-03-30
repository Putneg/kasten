<?
class RegionAction extends CAction
{

	public $breadcrumbs = array();

    public function run()
    {
    	$controller = $this->getController();

    	if (!Yii::app()->user->isGuest && Yii::app()->user->role!='super') $controller->redirect('/cp');
        $controller->pageTitle = 'Панель управления';

        $this->breadcrumbs['Регионы'] = array('cp/region');

        if (isset($_GET['par1'])){
        	switch ($_GET['par1']) {
        		case 'redit':
        			return $this->regionEdit();
        			break;
        		case 'cedit':
        			return $this->cityEdit();
        			break;
        		case 'cdelete':
        			return $this->cityDelete();
        			break;
        		case 'rdelete':
        			return $this->regionDelete();
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

    	$region = new Region;

    	$regions = Region::model()->findAll(array(
                'order'=>'t.name_ua asc',
            ));
    	if (!empty($_POST['w']) && !Yii::app()->user->isGuest) {
            $region->attributes = $_POST['w'];
            $region->user_create = Yii::app()->user->id;
            $region->user_update = Yii::app()->user->id;
            $region->date_create = date("Y-m-d H:i:s");
            $region->date_update = date("Y-m-d H:i:s");

            if($region->validate()) {
                
                $region->save();
                
                Yii::app()->user->setFlash('success','<strong>Регион добавлен</strong>');

                $controller->redirect('/cp/region/redit/'.$region->id);
            } 
        }


    	$controller->render('region_list', array('breadcrumbs'=>$this->breadcrumbs,'regions'=>$regions,'region'=>$region));
    }

    protected function regionEdit(){

    	$controller = $this->getController();

    	$regId = (int) $_GET['par2'];

    	if ($regId==0) $controller->redirect('/cp/region/');


    	$region = Region::model()->findByPk($regId);
    	$city = new City;

    	if (!$region) $controller->redirect('/cp/region/');

    	$this->breadcrumbs[$region->name_ru] = array('cp/region/redit/'.$regId);

    	$cities = City::model()->findAll(array(
    			'condition'=>'id_region=:id_region',
                'params'=>array(':id_region'=>$regId),
                'order'=>'t.name_ua asc',
            ));

    	$zones = Zone::model()->findAll(array(
                'order'=>'t.name_ua asc',
            ));
    	$tmp = array();
    	foreach($zones as $a) $tmp[$a->id] = $a->attributes;
    	$zones = $tmp;

    	if (!empty($_POST['w']) && !Yii::app()->user->isGuest) {
            $region->attributes = $_POST['w'];
            $region->user_update = Yii::app()->user->id;
            $region->date_update = date("Y-m-d H:i:s");

            if($region->validate()) {
                
                $region->save();
                
                Yii::app()->user->setFlash('success','<strong>Регион обновлен</strong>');

                $controller->redirect('/cp/region/redit/'.$region->id);
            } 
        }

        if (!empty($_POST['c']) && !Yii::app()->user->isGuest) {
            $city->attributes = $_POST['c'];
            $city->user_create = Yii::app()->user->id;
            $city->user_update = Yii::app()->user->id;
            $city->date_create = date("Y-m-d H:i:s");
            $city->date_update = date("Y-m-d H:i:s");

            if($city->validate()) {
                
                $city->save();
                
                Yii::app()->user->setFlash('success','<strong>Город добавлен</strong>');

                $controller->redirect('/cp/region/сedit/'.$city->id);
            } 
        }


    	$controller->render('region_edit', array('breadcrumbs'=>$this->breadcrumbs,'cities'=>$cities,'region'=>$region,'city'=>$city,'zones'=>$zones));
    }

    protected function cityEdit(){

    	$controller = $this->getController();

    	$cityId = (int) $_GET['par2'];

    	if ($cityId==0) $controller->redirect('/cp/region/');


    	$city = City::model()->findByPk($cityId);

    	if (!$city) $controller->redirect('/cp/region/');

    	$region = Region::model()->findByPk($city->id_region);

    	if ($region)$this->breadcrumbs[$region->name_ru] = array('cp/region/redit/'.$region->id);
    	$this->breadcrumbs[$city->name_ru] = array('cp/region/cedit/'.$cityId);

    	
    	if (!empty($_POST['c']) && !Yii::app()->user->isGuest) {
            $city->attributes = $_POST['c'];
            $city->user_update = Yii::app()->user->id;
            $city->date_update = date("Y-m-d H:i:s");

            if($city->validate()) {
                
                $city->save();
                
                Yii::app()->user->setFlash('success','<strong>Регион обновлен</strong>');

                $controller->redirect('/cp/region/cedit/'.$city->id);
            } 
        }


    	$controller->render('region_city_edit', array('breadcrumbs'=>$this->breadcrumbs,'city'=>$city,'region'=>$region));
    }

    protected function cityDelete(){

    	$controller = $this->getController();

    	$cityId = (int) $_GET['par2'];

    	if ($cityId==0) $controller->redirect('/cp/region/');

    	$city = City::model()->findByPk($cityId);
    	if (!$city) $controller->redirect('/cp/region/');

    	$reg = $city->id_region;
    	$city->delete();
    	Yii::app()->user->setFlash('warning','<strong>Город удален</strong>');
    	$controller->redirect('/cp/region/redit/'.$reg);

    }

    protected function regionDelete(){

    	$controller = $this->getController();

    	$regId = (int) $_GET['par2'];

    	if ($regId==0) $controller->redirect('/cp/region/');

    	$region = Region::model()->findByPk($regId);
    	if (!$region) $controller->redirect('/cp/region/');

    	City::model()->deleteAll('id_region=:id_region',array(':id_region'=>$regId));
    	$region->delete();
    	Yii::app()->user->setFlash('warning','<strong>Регион удален</strong>');
    	$controller->redirect('/cp/region/');

    }
}