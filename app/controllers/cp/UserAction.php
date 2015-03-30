<?
class UserAction extends CAction
{

	public $breadcrumbs = array();

    public function run()
    {
    	$controller = $this->getController();

    	if (!Yii::app()->user->isGuest && Yii::app()->user->role!='super') $controller->redirect('/cp');
        $controller->pageTitle = 'Панель управления';

        $this->breadcrumbs['Пользователи'] = array('cp/user');

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

    	$user = new Users;

        $page = (isset($_GET['page'])?$_GET['page']:1);

    	$users = Users::model()->findAll(array(
                'order' => 't.name asc',
            ));
    	if (!empty($_POST['u']) && !Yii::app()->user->isGuest) {
            $user->attributes = $_POST['u'];
            $user->password = md5($_POST['u']['reg_wd']);
            /*$user->user_create = Yii::app()->user->id;
            $user->user_update = Yii::app()->user->id;
            $user->date_create = date("Y-m-d H:i:s");
            $user->date_update = date("Y-m-d H:i:s");*/

            if($user->validate()) {
                
                $user->save();
                
                Yii::app()->user->setFlash('success','<strong>Пользователь добавлен</strong>');

                $controller->redirect('/cp/user/edit/'.$user->id);
            } 
        }

    	$controller->render('user_list', array('breadcrumbs'=>$this->breadcrumbs,'users'=>$users,'user'=>$user));
    }

    protected function itemEdit(){

    	$controller = $this->getController();

    	$userId = $_GET['par2'];

    	$user = Users::model()->findByPk($userId);
        if (!$user) $controller->redirect('/cp/user/');

    	$this->breadcrumbs[$user->name] = array('cp/user/edit/'.$userId);
    	
    	if (!empty($_POST['eu']) && !Yii::app()->user->isGuest) {
            $user->attributes = $_POST['eu'];
            /*$user->user_update = Yii::app()->user->id;
            $user->date_update = date("Y-m-d H:i:s");*/

            if ($_POST['eu']['reg_wd']!='') $user->password = md5($_POST['eu']['reg_wd']);

            if($user->validate()) {
                
                $user->save();
                
                Yii::app()->user->setFlash('success','<strong>Пользователь обновлен</strong>');

                $controller->redirect('/cp/user/edit/'.$user->id);
            } 
        }


    	$controller->render('user_edit', array('breadcrumbs'=>$this->breadcrumbs,'user'=>$user));
    }

    protected function itemDelete(){

    	$controller = $this->getController();

    	$itemId = $_GET['par2'];

    	$user = Users::model()->findByPk($itemId);
    	if (!$user) $controller->redirect('/cp/user/');

    	$user->delete();
    	Yii::app()->user->setFlash('warning','<strong>Пользователь удалён</strong>');
    	$controller->redirect('/cp/user/');

    }

}