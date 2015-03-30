<?
class IndexAction extends CAction
{
    public function run()
    {

        $controller = $this->getController();
        
        $cs=Yii::app()->clientScript;
        //$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/regular.js?q='.date("U"), CClientScript::POS_HEAD);

        $page = Pages::model()->findByPk(13);

        $cs=Yii::app()->clientScript;
        $controller->pageTitle = $page->title;
        $cs->registerMetaTag($page->description, 'description', null, array());
        $cs->registerMetaTag($page->keywords, 'keywords', null, array());
        $client = new Client;

        if (isset($_POST['name'])){

            $client->attributes = $_POST;
            $client->osago_id = $_POST['id_osago'];
            if ($client->delivery_id_region == NULL) $client->delivery_id_region = $client->id_region;
            if ($client->delivery_id_city == 0) $client->delivery_id_city = $client->address_id_city;  
            $client->create_date = date("Y-m-d");
            $client->create_time = date("H:i:s");
            $tmp = explode("/",$client->dob);
            $client->dob = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];

            $tmp = explode("/",$client->dlicense_date);
            $client->dlicense_date = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];

            $tmp = explode("/",$client->date_start);
            $client->date_start = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];

            $tmp = explode("/",$client->doc_date);
            $client->doc_date = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
            $client->id_license = $_POST['license'];
            
            if ($client->validate()){
                $client->save();
                $controller->redirect(DMultilangHelper::addLangToUrl('/calculator/payment?cl_id='.$client->id));
            } else {
                //$controller->refresh();
            }
        }

        $lang = Yii::app()->language;

        $license = License::model()->findAll(array(
                'order'=>'id asc'
            ));
        $cities = City::model()->findAll(array(
                'condition' => 't.visible = 1 and region.visible = 1',
                'order'=>'region.name_'.$lang.',t.id asc',
                'with'=>array('region'=>array('alias'=>'region','select'=>'region.name_'.$lang))
            ));
        $city_arr = array();
        if($cities)
        {
            foreach ($cities as $key => $a) {
                $city_arr[$a->id_region][] = $a;
            }
        }

        $doc_type = DocType::model()->findAll(array(
                'order'=>'id asc'
            ));

        $controller->render('index', array('license'=>$license,'doc_type'=>$doc_type,'cities'=>$city_arr,'model'=>$client));
    }
}