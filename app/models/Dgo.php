<?php

/**
 * This is the model class for table "dgo".
 *
 * The followings are the available columns in table 'dgo':
 * @property integer $id
 * @property integer $id_region
 * @property integer $id_company
 * @property double $dgo_sum
 * @property double $dgo_payment
 * @property integer $dgo_rate
 * @property string $date_create
 * @property string $date_update
 * @property integer $user_create
 * @property integer $user_update
 */
class Dgo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dgo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_create', 'required'),
			array('id_region, id_company, dgo_rate, user_create, user_update', 'numerical', 'integerOnly'=>true),
			array('dgo_sum, dgo_payment', 'numerical'),
			array('date_update', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_region, id_company, dgo_sum, dgo_payment, dgo_rate, date_create, date_update, user_create, user_update', 'safe', 'on'=>'search'),
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
			'region' => array(self::HAS_ONE, 'Region', array('id'=>'id_region')),
			'company' => array(self::HAS_ONE, 'Company',  array('id'=>'id_company')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_region' => 'Регион',
			'id_company' => 'Компания',
			'dgo_sum' => 'Сумма ДГО',
			'dgo_payment' => 'Платеж',
			'dgo_rate' => 'Ставка',
			'date_create' => 'Date Create',
			'date_update' => 'Date Update',
			'user_create' => 'User Create',
			'user_update' => 'User Update',
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
		$criteria->compare('id_region',$this->id_region);
		$criteria->compare('id_company',$this->id_company);
		$criteria->compare('dgo_sum',$this->dgo_sum);
		$criteria->compare('dgo_payment',$this->dgo_payment);
		$criteria->compare('dgo_rate',$this->dgo_rate);
		$criteria->compare('date_create',$this->date_create,true);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('user_create',$this->user_create);
		$criteria->compare('user_update',$this->user_update);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dgo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
