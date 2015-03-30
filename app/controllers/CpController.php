<?php

class CpController extends Controller
{

	public $layout='//layouts/cp';

	public function beforeAction($view){
        parent::beforeAction($view);
        $cs=Yii::app()->clientScript;
        if (Yii::app()->user->isGuest) {
        	$this->layout = '//layouts/cplogin';
        	if (!empty($_POST['Login'])) {
        		$form = new Users();
                $form->attributes = $_POST['Login'];
                $form->scenario = 'login';
                    if($form->validate('Login')) {
                        $this->refresh();
                    } 
            } 
        }

        return true;
    }

	public function actions()
    {
        return array(
            'index'=>'application.controllers.cp.IndexAction',
            'logout'=>'application.controllers.cp.LogoutAction',
            'region'=>'application.controllers.cp.RegionAction',
            'company'=>'application.controllers.cp.CompanyAction',
            'dgo'=>'application.controllers.cp.DgoAction',
            'license'=>'application.controllers.cp.LicenseAction',
            'osago'=>'application.controllers.cp.OsagoAction',
            'zone'=>'application.controllers.cp.ZoneAction',
            'user'=>'application.controllers.cp.UserAction',
            'pages'=>'application.controllers.cp.PagesAction',
        );
    }
}