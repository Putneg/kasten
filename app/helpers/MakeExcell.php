<?php

class MakeExcell
{

    public static function make($client,$filename){

        Yii::import('ext.phpexcel.XPHPExcel');      
        $objPHPExcel = XPHPExcel::createPHPExcel();
        $objPHPExcel = PHPExcel_IOFactory::load('t.xls');

        $objPHPExcel->getProperties()->setCreator("LightSoft")
                             ->setLastModifiedBy("LightSoft")
                             ->setTitle("Office 2007 XLS Test Document")
                             ->setSubject("Office 2007 XLS Test Document")
                             ->setDescription("Test document for Office 2007 XLS, generated using PHP classes.")
                             ->setKeywords("office 2007 openxml php")
                             ->setCategory("Test result file");

        
        
        $objPHPExcel->getActiveSheet()->setTitle($client->company->name_ua.' - '.$client->name.' '.$client->surname);


        $objPHPExcel->setActiveSheetIndex(0);

        $date_start[0] = date("d",strtotime($client->date_start));
        $date_start[1] = date("m",strtotime($client->date_start));
        $date_start[2] = substr(date("y",strtotime($client->date_start)),-1);

        $date_e = strtotime('+1 year -1 day',strtotime($client->date_start));
        $date_end[0] = date("d",$date_e);
        $date_end[1] = date("m",$date_e);
        $date_end[2] = substr(date("y",$date_e),-1);

        /*echo '<pre>';
        print_r($client);
        echo $client->date_start.'<br>';
        echo date('d.m.Y',$date_e);
        print_r($date_start);
        print_r($date_end);
        echo '</pre>';*/

        // Номер полиса
        $objPHPExcel->getActiveSheet()
            ->setCellValue('Z5', substr($client->osago_id,0,1));
        if (strlen($client->osago_id)>1){
            $objPHPExcel->getActiveSheet()
            ->setCellValue('AA5', substr($client->osago_id,1,1));
        }
        if (strlen($client->osago_id)>2){
            $objPHPExcel->getActiveSheet()
            ->setCellValue('AB5', substr($client->osago_id,2,1));
        }
        if (strlen($client->osago_id)>3){
            $objPHPExcel->getActiveSheet()
            ->setCellValue('AC5', substr($client->osago_id,3,1));
        }

        // Даты полиса
        $objPHPExcel->getActiveSheet()
            ->setCellValue('M11', $date_start[0][0])
            ->setCellValue('N11', $date_start[0][1])
            ->setCellValue('P11', $date_start[1][0])
            ->setCellValue('Q11', $date_start[1][1])
            ->setCellValue('T11', $date_start[2])

            ->setCellValue('X11', $date_end[0][0])
            ->setCellValue('Y11', $date_end[0][1])
            ->setCellValue('AA11', $date_end[1][0])
            ->setCellValue('AB11', $date_end[1][1])
            ->setCellValue('AE11', $date_end[2]);
        // Франшиза
        if ($client->osago_franchise=='1000') {
            $objPHPExcel->getActiveSheet()->setCellValue('O17', 'Тисяча');
        } else {
            $objPHPExcel->getActiveSheet()->setCellValue('O17', 'Нуль');
        }

        // Фио
        $objPHPExcel->getActiveSheet()->setCellValue('B19', $client->surname);
        $objPHPExcel->getActiveSheet()->setCellValue('B20', $client->name);
        $objPHPExcel->getActiveSheet()->setCellValue('B21', $client->fname);
        // Индекс
        $objPHPExcel->getActiveSheet()
            ->setCellValue('AT18', substr($client->address_index,0,1))
            ->setCellValue('AU18', substr($client->address_index,1,1))
            ->setCellValue('AV18', substr($client->address_index,2,1))
            ->setCellValue('AW18', substr($client->address_index,3,1))
            ->setCellValue('AX18', substr($client->address_index,4,1));

        //Адрес
        $addr = '';
        if ($client->address_city!='') $addr.='м.'.$client->address_city;
        else {
            $city = City::model()->findByPk($client->address_id_city);
            $addr = $addr.='м.'.$city->name_ua;
        }
        $addr.=', '.$client->address_street;
        if ($client->address_house_num!='') $addr.=', '.$client->address_house_num;
        if ($client->address_korp_num!='') $addr.=', корп.'.$client->address_korp_num;
        if ($client->address_app_num!='') $addr.=', '.$client->address_app_num;
        $objPHPExcel->getActiveSheet()->setCellValue('AB19', $addr);

        //Телефон
        $objPHPExcel->getActiveSheet()->setCellValue('AE22', $client->phone);

        //Дата рождения
        $dob[0] = date("d",strtotime($client->dob));
        $dob[1] = date("m",strtotime($client->dob));
        $dob[2] = date("Y",strtotime($client->dob));

        $objPHPExcel->getActiveSheet()
            ->setCellValue('H24', $dob[0][0])
            ->setCellValue('L24', $dob[0][1])
            ->setCellValue('K24', $dob[1][0])
            ->setCellValue('L24', $dob[1][1])
            ->setCellValue('N24', $dob[2][0])
            ->setCellValue('O24', $dob[2][1])
            ->setCellValue('P24', $dob[2][2])
            ->setCellValue('Q24', $dob[2][3]);

        //ИНН
        $arr1 = str_split($client->inn);
        $objPHPExcel->getActiveSheet()->setCellValue('AB24', implode(" ",$arr1));

        //Свидетельство
        $objPHPExcel->getActiveSheet()->setCellValue('W26', $client->dlicense_seria);
        $objPHPExcel->getActiveSheet()->setCellValue('AC26', $client->dlicense_num);
        $dlicense_date[0] = date("d",strtotime($client->dlicense_date));
        $dlicense_date[1] = date("m",strtotime($client->dlicense_date));
        $dlicense_date[2] = date("Y",strtotime($client->dlicense_date));
        $objPHPExcel->getActiveSheet()
            ->setCellValue('AM26', $dlicense_date[0][0])
            ->setCellValue('AN26', $dlicense_date[0][1])
            ->setCellValue('AP26', $dlicense_date[1][0])
            ->setCellValue('AQ26', $dlicense_date[1][1])
            ->setCellValue('AS26', $dlicense_date[2][0])
            ->setCellValue('AT26', $dlicense_date[2][1])
            ->setCellValue('AU26', $dlicense_date[2][2])
            ->setCellValue('AV26', $dlicense_date[2][3]);
        $objPHPExcel->getActiveSheet()->setCellValue('K28', $client->dlicense_issued);

        //Категория удостоверения
        $objPHPExcel->getActiveSheet()->setCellValue('V30', substr($client->id_license,0,1));
        $objPHPExcel->getActiveSheet()->setCellValue('W30', substr($client->id_license,1,1));

        //Номер машины
        $objPHPExcel->getActiveSheet()->setCellValue('AE30', $client->auto_numberplate);

        //Марка машины
        $objPHPExcel->getActiveSheet()->setCellValue('H32', $client->auto_brend.' '.$client->auto_model);    

        //Год выпуска
        $auto_year[0] = date("d",strtotime($client->auto_year));
        $auto_year[1] = date("m",strtotime($client->auto_year));
        $auto_year[2] = date("Y",strtotime($client->auto_year));
        $objPHPExcel->getActiveSheet()
            ->setCellValue('AU32', $auto_year[2][0])
            ->setCellValue('AV32', $auto_year[2][1])
            ->setCellValue('AW32', $auto_year[2][2])
            ->setCellValue('AX32', $auto_year[2][3]);

        //VIN
        $objPHPExcel->getActiveSheet()->setCellValue('L34', $client->auto_vin);

        //Город регистрации автомобиля
        $city = City::model()->findByPk($client->city);
        $objPHPExcel->getActiveSheet()->setCellValue('AJ34', $city->name_ua);        

        $price = explode('.',$client->osago_payment);

        if (count($price[0])<4){
            $objPHPExcel->getActiveSheet()
                ->setCellValue('L45', $price[0][0])
                ->setCellValue('M45', $price[0][1])
                ->setCellValue('N45', $price[0][2]);
        } else {
            $objPHPExcel->getActiveSheet()
                ->setCellValue('K45', $price[0][0])
                ->setCellValue('L45', $price[0][1])
                ->setCellValue('M45', $price[0][2])
                ->setCellValue('N45', $price[0][3]);
        }

        $objPHPExcel->getActiveSheet()
            ->setCellValue('Q45', $price[1][0])
            ->setCellValue('R45', $price[1][1]);

        $objPHPExcel->getActiveSheet()->setCellValue('V45', num2str($client->osago_payment));        

        //Дата заключение
        $create_date[0] = date("d",strtotime($client->create_date));
        $create_date[1] = date("m",strtotime($client->create_date));
        $create_date[2] = date("Y",strtotime($client->create_date));
        $objPHPExcel->getActiveSheet()
            ->setCellValue('N57', $create_date[0][0])
            ->setCellValue('O57', $create_date[0][1])
            ->setCellValue('Q57', $create_date[1][0])
            ->setCellValue('R57', $create_date[1][1])
            ->setCellValue('U57', $create_date[2][3]);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

}

function num2str($num) {
    $nul='ноль';
    $ten=array(
        array('','один','два','три','чотири',"п'ять",'шість','сім', 'вісім',"дев'ять"),
        array('','одна','двi','три','чотири',"п'ять",'шість','сім', 'вісім',"дев'ять"),
    );
    $a20=array('десять',"одинадцять","дванадцять","тринадцять","чотирнадцять","п'ятнадцять","шістнадцять","сімнадцять","вісімнадцять","дев'ятнадцять",);

    $tens=array(2=>"двадцять","тридцять","сорок","п'ятдесят","шістдесят","сімдесят","вісімдесят","дев'яносто");
    $hundred=array('',"сто","двісті","триста","чотириста","п'ятсот","шістсот","сімсот","вісімсот","дев'ятьсот",);

    $unit=array( // Units
        array('коп.' ,'коп.' ,'коп.',  1),
        array('гривня'   ,'гривні'   ,'гривень'    ,0),
        array('тисяча'  ,'тисячі'  ,'тисяч'     ,1),
        array('миллион' ,'миллиона','миллионов' ,0),
        array('миллиард','милиарда','миллиардов',0),
    );
    //
    list($rub,$kop) = explode('.',sprintf("%015.2f", floatval($num)));
    $out = array();
    if (intval($rub)>0) {
        foreach(str_split($rub,3) as $uk=>$v) { // by 3 symbols
            if (!intval($v)) continue;
            $uk = sizeof($unit)-$uk-1; // unit key
            $gender = $unit[$uk][3];
            list($i1,$i2,$i3) = array_map('intval',str_split($v,1));
            // mega-logic
            $out[] = $hundred[$i1]; # 1xx-9xx
            if ($i2>1) $out[]= $tens[$i2].' '.$ten[$gender][$i3]; # 20-99
            else $out[]= $i2>0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
            // units without rub & kop
            if ($uk>1) $out[]= morph($v,$unit[$uk][0],$unit[$uk][1],$unit[$uk][2]);
        } //foreach
    }
    else $out[] = $nul;
    $out[] = morph(intval($rub), $unit[1][0],$unit[1][1],$unit[1][2]).','; // rub
    $out[] = $kop.' '.morph($kop,$unit[0][0],$unit[0][1],$unit[0][2]); // kop
    return mb_ucfirst(trim(preg_replace('/ {2,}/', ' ', join(' ',$out))),'UTF-8');
}

/**
 * Склоняем словоформу
 * @ author runcore
 */
function morph($n, $f1, $f2, $f5) {
    $n = abs(intval($n)) % 100;
    if ($n>10 && $n<20) return $f5;
    $n = $n % 10;
    if ($n>1 && $n<5) return $f2;
    if ($n==1) return $f1;
    return $f5;
}


if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))
{
    /**
     * mb_ucfirst - преобразует первый символ в верхний регистр
     * @param string $str - строка
     * @param string $encoding - кодировка, по-умолчанию UTF-8
     * @return string
     */
    function mb_ucfirst($str, $encoding='UTF-8')
    {
        $str = mb_ereg_replace('^[\ ]+', '', $str);
        $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
               mb_substr($str, 1, mb_strlen($str), $encoding);
        return $str;
    }
}
