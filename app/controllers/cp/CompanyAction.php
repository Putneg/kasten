<?
class CompanyAction extends CAction
{

	public $breadcrumbs = array();

    public function run()
    {
    	$controller = $this->getController();

    	if (!Yii::app()->user->isGuest && Yii::app()->user->role!='super') $controller->redirect('/cp');
        $controller->pageTitle = 'Панель управления';

        $this->breadcrumbs['Компании'] = array('cp/company');

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

    	$company = new Company;

    	$companies = Company::model()->findAll(array(
                'order'=>'t.name_ua asc',
            ));
    	if (!empty($_POST['w']) && !Yii::app()->user->isGuest) {
            $company->attributes = $_POST['w'];
            $company->user_create = Yii::app()->user->id;
            $company->user_update = Yii::app()->user->id;
            $company->date_create = date("Y-m-d H:i:s");
            $company->date_update = date("Y-m-d H:i:s");

            if($company->validate()) {
                
                $company->save();
                
                Yii::app()->user->setFlash('success','<strong>Компания добавлена</strong>');

                $controller->redirect('/cp/company/edit/'.$company->id);
            } 
        }


    	$controller->render('company_list', array('breadcrumbs'=>$this->breadcrumbs,'companies'=>$companies,'company'=>$company));
    }

    protected function itemEdit(){

    	$controller = $this->getController();

    	$companyId = (int) $_GET['par2'];

    	if ($companyId==0) $controller->redirect('/cp/company/');


    	$company = Company::model()->findByPk($companyId);

    	$this->breadcrumbs[$company->name_ru] = array('cp/company/edit/'.$companyId);

    	
    	if (!empty($_POST['c']) && !Yii::app()->user->isGuest) {
            $company->attributes = $_POST['c'];
            $company->user_update = Yii::app()->user->id;
            $company->date_update = date("Y-m-d H:i:s");

            if($company->validate()) {
                
                $company->save();
                
                Yii::app()->user->setFlash('success','<strong>Компания обновлена</strong>');

                $controller->redirect('/cp/company/edit/'.$company->id);
            } 
        }


    	$controller->render('company_edit', array('breadcrumbs'=>$this->breadcrumbs,'company'=>$company));
    }

    protected function itemDelete(){

    	$controller = $this->getController();

    	$itemId = (int) $_GET['par2'];

    	if ($itemId==0) $controller->redirect('/cp/company/');

    	$company = Company::model()->findByPk($itemId);
    	if (!$company) $controller->redirect('/cp/company/');

    	$company->delete();
    	Yii::app()->user->setFlash('warning','<strong>Компания удалена</strong>');
    	$controller->redirect('/cp/company/');

    }

}