<?
class IndexAction extends CAction
{
    public $breadcrumbs = array();

    public function run()
    {
        $controller = $this->getController();

        if (!Yii::app()->user->isGuest && Yii::app()->user->role!='super') $controller->redirect('/cp');
        $controller->pageTitle = 'Панель управления';

        $this->breadcrumbs['Заявки'] = array('cp/index');

        if (isset($_GET['par1'])){
            switch ($_GET['par1']) {
                case 'print':
                    return $this->itemPrint();
                    break;
                case 'delete':
                    return $this->itemDelete();
                    break;
                case 'edit':
                    return $this->itemEdit();
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

        $client = new Client;

        $page = (isset($_GET['page'])?$_GET['page']:1);
        $date1 = (isset($_GET['date1'])?$_GET['date1']:'');
        $date2 = (isset($_GET['date2'])?$_GET['date2']:'');
        $text = (isset($_GET['text'])?$_GET['text']:'');

        $criteria=new CDbCriteria;
        $criteria->select='*';

        if ($date1!=''){
            $tmp = explode('.',$date1);
            $date1 = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
            $criteria->addCondition("t.create_date >= '$date1'",'AND');    
        }
        if ($date2!=''){
            $tmp = explode('.',$date2);
            $date2 = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
            $criteria->addCondition("t.create_date <= '$date2'",'AND');    
        }
        if ($text!=''){
            $text = trim($text);
            $criteria1=new CDbCriteria;
            $criteria1->addSearchCondition('t.surname', $text, true, 'OR');
            $criteria1->addSearchCondition('t.name', $text, true, 'OR');
            $criteria1->addSearchCondition('t.fname', $text, true, 'OR');
            $criteria1->addSearchCondition('t.auto_brend', $text, true, 'OR');
            $criteria1->addSearchCondition('t.auto_model', $text, true, 'OR');
            $criteria1->addSearchCondition('t.auto_vin', $text, true, 'OR');
            $criteria1->addSearchCondition('t.auto_numberplate', $text, true, 'OR');
            $criteria->mergeWith($criteria1);
        }
        
        $criteria->order = 't.id desc';
        $criteria->limit='30';
        $criteria->offset=($page-1)*30;
        $criteria->with = array(
                    'company' => array('alias' => 'company'),
                    'doctype' => array('alias' => 'doctype'),
                    'license' => array('alias' => 'license'),
                    'dgo' => array('alias' => 'dgo'),
                    'region' => array('alias' => 'region'),
                    'city' => array('alias' => 'acity'),
                    'dregion' => array('alias' => 'dregion'),
                    'dcity' => array('alias' => 'dcity'),
                );

        $criteria->limit='50';
        $criteria->offset=($page-1)*50;

        $clients = client::model()->findAll($criteria);

        $total =  client::model()->count($criteria);

        if (isset($total)){
            $pages=new CPagination($total);
            $pages->pageSize=30;
            $pages->setCurrentPage($page-1);    
        } else $pages = false;


        $controller->render('index', array('breadcrumbs'=>$this->breadcrumbs,'clients'=>$clients,'client'=>$client,'pages'=>$pages,'total'=>$total,'date1'=>$date1,'date2'=>$date2,'text'=>$text));
    }

    protected function itemPrint(){

        $controller = $this->getController();

        $clientId = $_GET['par2'];

        $client = Client::model()->findByPk($clientId);
        if (!$client) $controller->redirect('/cp/index/');

        MakeExcell::make($client,$client->name.' '.$client->surname);
        Yii::app()->end();
    }

    protected function itemEdit(){

        $controller = $this->getController();

        $clientId = $_GET['par2'];

        $client = Client::model()->findByPk($clientId);
        if (!$client) $controller->redirect('/cp/client/');

        $this->breadcrumbs[$client->id] = array('cp/client/edit/'.$clientId);
        
        if (!empty($_POST['c']) && !Yii::app()->user->isGuest) {
            $client->attributes = $_POST['c'];
            /*$client->user_update = Yii::app()->user->id;
            $client->date_update = date("Y-m-d H:i:s");*/

            if($client->validate()) {
                
                $client->save();
                
                Yii::app()->user->setFlash('success','<strong>Данные обновлены</strong>');

                $controller->redirect('/cp/index/edit/'.$client->id);
            } 
        }


        $controller->render('client_edit', array('breadcrumbs'=>$this->breadcrumbs,'client'=>$client));
    }

    protected function itemDelete(){

        $controller = $this->getController();

        $itemId = $_GET['par2'];

        $client = client::model()->findByPk($itemId);
        if (!$client) $controller->redirect('/cp/client/');

        $client->delete();
        Yii::app()->user->setFlash('warning','<strong>Осаго удалено</strong>');
        $controller->redirect('/cp/client/');

    }
}