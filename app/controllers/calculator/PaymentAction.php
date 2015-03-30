<?
class PaymentAction extends CAction
{
    public function run()
    {

        $controller = $this->getController();
        
        $cs=Yii::app()->clientScript;
        //$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/regular.js?q='.date("U"), CClientScript::POS_HEAD);

        $controller->pageTitle = 'Insurance';
        $cs->registerMetaTag('', 'description', null, array());
        $cs->registerMetaTag('', 'keywords', null, array());

        $client = Client::model()->findByPk($_GET['cl_id']);

        $dataProvider = new CActiveDataProvider('Client', array(
            'criteria'=>array(
                'condition'=>'id=:id',
                'params'=>array(':id'=>$_GET['cl_id']),
                'order'=>'id',
            ),
        ));

        $dataProvider1 = new CActiveDataProvider('Client', array(
            'criteria'=>array(
                'order'=>'id DESC',
            ),
        ));

        $controller->render('payment', array('client'=>$dataProvider,'clients'=>$dataProvider1));
    }
}