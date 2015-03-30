<?php

/**
 * This is the model class for table "client".
 *
 * The followings are the available columns in table 'client':
 * @property integer $id
 * @property string $surname
 * @property string $name
 * @property string $fname
 * @property string $dob
 * @property string $dlicense_date
 * @property string $dlicense_seria
 * @property string $dlicense_num
 * @property string $dlicense_issued
 * @property string $auto_brend
 * @property string $auto_model
 * @property string $auto_vin
 * @property integer $auto_engine_volume
 * @property string $auto_numberplate
 * @property string $auto_year
 * @property integer $id_region
 * @property string $address_city
 * @property integer $address_id_city
 * @property string $address_street
 * @property string $address_house_num
 * @property string $address_korp_num
 * @property integer $address_app_num
 * @property string $address_index
 * @property string $inn
 * @property integer $id_doc_type
 * @property string $doc_seria
 * @property string $doc_num
 * @property string $doc_issued
 * @property string $doc_date
 * @property string $phone
 * @property string $email
 * @property integer $delivery_id_region
 * @property string $delivery_city
 * @property integer $delivery_id_city
 * @property string $delivery_street
 * @property string $delivery_house_num
 * @property string $delivery_korp_num
 * @property integer $delivery_app_num
 * @property integer $id_company
 * @property string $id_license
 * @property integer $id_osago
 * @property integer $id_osago_zone
 * @property integer $id_osago_region
 * @property double $osago_payment
 * @property integer $osago_franchise
 * @property integer $osago_entity_flag
 * @property integer $id_dgo
 * @property double $dgo_sum
 * @property double $dgo_payment
 * @property integer $dgo_rate
 * @property string $date_start
 * @property string $create_date
 * @property string $create_time
 * @property integer $osago_id
 * @property integer $city
 */
class Client1 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('surname, name, fname, dob, dlicense_date, dlicense_seria, dlicense_num, dlicense_issued, auto_brend, auto_model, auto_vin, auto_engine_volume, auto_numberplate, auto_year, address_street, address_house_num, address_index, inn, id_doc_type, doc_seria, doc_num, doc_issued, doc_date, phone, email, delivery_id_region, delivery_street, delivery_house_num, id_license, date_start, create_date, create_time, osago_id, city', 'required'),
			array('auto_engine_volume, id_region, address_id_city, address_app_num, id_doc_type, delivery_id_region, delivery_id_city, delivery_app_num, id_company, id_osago, id_osago_zone, id_osago_region, osago_franchise, osago_entity_flag, id_dgo, dgo_rate, osago_id, city', 'numerical', 'integerOnly'=>true),
			array('osago_payment, dgo_sum, dgo_payment', 'numerical'),
			array('surname, name, fname, auto_numberplate, address_city, address_house_num, email, delivery_city, delivery_house_num', 'length', 'max'=>50),
			array('dlicense_seria, address_index, doc_seria', 'length', 'max'=>5),
			array('dlicense_num, doc_num', 'length', 'max'=>15),
			array('dlicense_issued, auto_brend, auto_model, auto_vin, address_street, doc_issued, delivery_street', 'length', 'max'=>100),
			array('auto_year', 'length', 'max'=>4),
			array('address_korp_num, delivery_korp_num', 'length', 'max'=>10),
			array('inn', 'length', 'max'=>12),
			array('phone', 'length', 'max'=>25),
			array('id_license', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, surname, name, fname, dob, dlicense_date, dlicense_seria, dlicense_num, dlicense_issued, auto_brend, auto_model, auto_vin, auto_engine_volume, auto_numberplate, auto_year, id_region, address_city, address_id_city, address_street, address_house_num, address_korp_num, address_app_num, address_index, inn, id_doc_type, doc_seria, doc_num, doc_issued, doc_date, phone, email, delivery_id_region, delivery_city, delivery_id_city, delivery_street, delivery_house_num, delivery_korp_num, delivery_app_num, id_company, id_license, id_osago, id_osago_zone, id_osago_region, osago_payment, osago_franchise, osago_entity_flag, id_dgo, dgo_sum, dgo_payment, dgo_rate, date_start, create_date, create_time, osago_id, city', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'surname' => 'Surname',
			'name' => 'Name',
			'fname' => 'Fname',
			'dob' => 'Dob',
			'dlicense_date' => 'Dlicense Date',
			'dlicense_seria' => 'Dlicense Seria',
			'dlicense_num' => 'Dlicense Num',
			'dlicense_issued' => 'Dlicense Issued',
			'auto_brend' => 'Auto Brend',
			'auto_model' => 'Auto Model',
			'auto_vin' => 'Auto Vin',
			'auto_engine_volume' => 'Auto Engine Volume',
			'auto_numberplate' => 'Auto Numberplate',
			'auto_year' => 'Auto Year',
			'id_region' => 'Id Region',
			'address_city' => 'Address City',
			'address_id_city' => 'Address Id City',
			'address_street' => 'Address Street',
			'address_house_num' => 'Address House Num',
			'address_korp_num' => 'Address Korp Num',
			'address_app_num' => 'Address App Num',
			'address_index' => 'Address Index',
			'inn' => 'Inn',
			'id_doc_type' => 'Id Doc Type',
			'doc_seria' => 'Doc Seria',
			'doc_num' => 'Doc Num',
			'doc_issued' => 'Doc Issued',
			'doc_date' => 'Doc Date',
			'phone' => 'Phone',
			'email' => 'Email',
			'delivery_id_region' => 'Delivery Id Region',
			'delivery_city' => 'Delivery City',
			'delivery_id_city' => 'Delivery Id City',
			'delivery_street' => 'Delivery Street',
			'delivery_house_num' => 'Delivery House Num',
			'delivery_korp_num' => 'Delivery Korp Num',
			'delivery_app_num' => 'Delivery App Num',
			'id_company' => 'Id Company',
			'id_license' => 'Id License',
			'id_osago' => 'Id Osago',
			'id_osago_zone' => 'Id Osago Zone',
			'id_osago_region' => 'Id Osago Region',
			'osago_payment' => 'Osago Payment',
			'osago_franchise' => 'Osago Franchise',
			'osago_entity_flag' => 'Osago Entity Flag',
			'id_dgo' => 'Id Dgo',
			'dgo_sum' => 'Dgo Sum',
			'dgo_payment' => 'Dgo Payment',
			'dgo_rate' => 'Dgo Rate',
			'date_start' => 'Date Start',
			'create_date' => 'Create Date',
			'create_time' => 'Create Time',
			'osago_id' => 'Osago',
			'city' => 'City',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('dlicense_date',$this->dlicense_date,true);
		$criteria->compare('dlicense_seria',$this->dlicense_seria,true);
		$criteria->compare('dlicense_num',$this->dlicense_num,true);
		$criteria->compare('dlicense_issued',$this->dlicense_issued,true);
		$criteria->compare('auto_brend',$this->auto_brend,true);
		$criteria->compare('auto_model',$this->auto_model,true);
		$criteria->compare('auto_vin',$this->auto_vin,true);
		$criteria->compare('auto_engine_volume',$this->auto_engine_volume);
		$criteria->compare('auto_numberplate',$this->auto_numberplate,true);
		$criteria->compare('auto_year',$this->auto_year,true);
		$criteria->compare('id_region',$this->id_region);
		$criteria->compare('address_city',$this->address_city,true);
		$criteria->compare('address_id_city',$this->address_id_city);
		$criteria->compare('address_street',$this->address_street,true);
		$criteria->compare('address_house_num',$this->address_house_num,true);
		$criteria->compare('address_korp_num',$this->address_korp_num,true);
		$criteria->compare('address_app_num',$this->address_app_num);
		$criteria->compare('address_index',$this->address_index,true);
		$criteria->compare('inn',$this->inn,true);
		$criteria->compare('id_doc_type',$this->id_doc_type);
		$criteria->compare('doc_seria',$this->doc_seria,true);
		$criteria->compare('doc_num',$this->doc_num,true);
		$criteria->compare('doc_issued',$this->doc_issued,true);
		$criteria->compare('doc_date',$this->doc_date,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('delivery_id_region',$this->delivery_id_region);
		$criteria->compare('delivery_city',$this->delivery_city,true);
		$criteria->compare('delivery_id_city',$this->delivery_id_city);
		$criteria->compare('delivery_street',$this->delivery_street,true);
		$criteria->compare('delivery_house_num',$this->delivery_house_num,true);
		$criteria->compare('delivery_korp_num',$this->delivery_korp_num,true);
		$criteria->compare('delivery_app_num',$this->delivery_app_num);
		$criteria->compare('id_company',$this->id_company);
		$criteria->compare('id_license',$this->id_license,true);
		$criteria->compare('id_osago',$this->id_osago);
		$criteria->compare('id_osago_zone',$this->id_osago_zone);
		$criteria->compare('id_osago_region',$this->id_osago_region);
		$criteria->compare('osago_payment',$this->osago_payment);
		$criteria->compare('osago_franchise',$this->osago_franchise);
		$criteria->compare('osago_entity_flag',$this->osago_entity_flag);
		$criteria->compare('id_dgo',$this->id_dgo);
		$criteria->compare('dgo_sum',$this->dgo_sum);
		$criteria->compare('dgo_payment',$this->dgo_payment);
		$criteria->compare('dgo_rate',$this->dgo_rate);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('osago_id',$this->osago_id);
		$criteria->compare('city',$this->city);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Client1 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
