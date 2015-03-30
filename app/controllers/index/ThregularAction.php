<?
/**
 * Класс-экшен возвращающий последние спецпредложения.
 */
class ThregularAction extends CAction
{
    public function run($arr_city,$fl_city=1000, $fl_date='', $bk_date='')
    {
        $fl_city = (int)$fl_city;
        $arr_city = (int)$arr_city;
        $fl_date = (string)$fl_date;
        $bk_date = (string)$bk_date;

        if ($fl_date!=''){
            $tmp = explode("-",$fl_date);
            if(strlen($tmp[0])==2){
                $fl_date = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
            }
        }

        if ($bk_date!=''){
            $tmp = explode("-",$bk_date);
            if(strlen($tmp[0])==2){
                $bk_date = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
            }
        }

        $controller = $this->getController();

        $allaviaRegularCacheFull = new AllaviaRegularCacheFull;

        $ticket = $allaviaRegularCacheFull->getGateRegular($arr_city,$fl_city,$fl_date,$bk_date);

        if ($ticket) {
            echo CJSON::encode($ticket);
        }
        else {
            echo CJSON::encode(array('error'=>1));   
        }

        Yii::app()->end();
    }

}