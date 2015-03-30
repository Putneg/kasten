<?php

class AjaxController extends Controller
{

    private $id_company = 1;
    private $dgo_rate = 30;

    public function beforeAction($view){
        parent::beforeAction($view);
        $cs=Yii::app()->clientScript;

        //$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/jquery-ui.css');
        

        //$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.min.js', CClientScript::POS_HEAD);
        

        return true;
    }

    public function actionIndex($region=0)
    {

        $region = (int)$region;

        $dgo = Dgo::model()->findAll(array(
                'condition'=>'id_region=:id_region AND id_company=:id_company AND dgo_rate=:dgo_rate',
                'params'=>array(':id_region'=>$region,':id_company'=>$this->id_company,':dgo_rate'=>$this->dgo_rate),
                'order'=>'dgo_sum asc'
            ));
        if (!$dgo) $dgo = Dgo::model()->findAll(array(
                'condition'=>'id_region=:id_region AND id_company=:id_company AND dgo_rate=:dgo_rate',
                'params'=>array(':id_region'=>0,':id_company'=>$this->id_company,':dgo_rate'=>$this->dgo_rate),
                'order'=>'dgo_sum asc'
            ));
        $result = array();
        if ($dgo) foreach($dgo as $a){
            $tmp = $a->attributes;
            $tmp['comment'] = 'на '.number_format($a->dgo_sum, 0, ',', ' ').' грн.';
            $result[] = $tmp;
        }
        echo CJSON::encode(array('result'=>$result));

        Yii::app()->end();
    }

    public function actionCalculate($license,$zone,$franchise)
    {

        $license = $license;
        $zone = (int)$zone;
        $franchise = (int)$franchise;

        $osago = Osago::model()->find(array(
                'condition'=>'id_zone=:id_zone AND id_license=:id_license AND id_company=:id_company AND franchise=:franchise',
                'params'=>array(':id_zone'=>$zone,':id_license'=>$license,':id_company'=>$this->id_company,':franchise'=>$franchise),
            ));
        $result = array();
        if (!$osago) $result['error'] = 1;
        else {
            $result['payment'] = $osago->osago_payment;
            $result['id_osago'] = $osago->id;
            $result['id_company'] = $osago->id_company;
            $result['id_osago_zone'] = $osago->id_zone;
            $result['osago_entity_flag'] = $osago->entity_flag;
            $result['franchise'] = $osago->franchise;
        }
        
        echo CJSON::encode(array('result'=>$result));

        Yii::app()->end();
    }

    public function actionRegion($region=0)
    {

        $region = (int)$region;

        $city = City::model()->findAll(array(
                'condition'=>'id_region=:id_region AND visible = 1',
                'params'=>array(':id_region'=>$region),
                'order'=>'name_'.Yii::app()->getLanguage().' asc'
            ));
        $result = array();

        foreach($city as $a){
            $tmp = array(
                'id'=>$a->id,
                'name'=>$a->name,
            );
            $result[] = $tmp;
        }
       
        echo CJSON::encode(array('result'=>$result));

        Yii::app()->end();
    }
    
}