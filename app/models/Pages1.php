<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $id
 * @property integer $parent
 * @property string $header_ru
 * @property string $header_ua
 * @property string $text_ru
 * @property string $text_ua
 * @property string $date_create
 * @property string $date_update
 * @property integer $user_create
 * @property integer $user_update
 * @property integer $order
 * @property string $title_ru
 * @property string $title_ua
 * @property string $keywords_ru
 * @property string $keywords_ua
 * @property string $description_ru
 * @property string $description_ua
 */
class Pages1 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent, header_ru, header_ua, text_ru, text_ua, date_create, user_create, user_update, order, title_ru, title_ua, keywords_ru, keywords_ua, description_ru, description_ua', 'required'),
			array('parent, user_create, user_update, order', 'numerical', 'integerOnly'=>true),
			array('header_ru, header_ua, title_ru, title_ua, keywords_ru, keywords_ua, description_ru, description_ua', 'length', 'max'=>250),
			array('date_update', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent, header_ru, header_ua, text_ru, text_ua, date_create, date_update, user_create, user_update, order, title_ru, title_ua, keywords_ru, keywords_ua, description_ru, description_ua', 'safe', 'on'=>'search'),
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
			'parent' => 'Parent',
			'header_ru' => 'Header Ru',
			'header_ua' => 'Header Ua',
			'text_ru' => 'Text Ru',
			'text_ua' => 'Text Ua',
			'date_create' => 'Date Create',
			'date_update' => 'Date Update',
			'user_create' => 'User Create',
			'user_update' => 'User Update',
			'order' => 'Order',
			'title_ru' => 'Title Ru',
			'title_ua' => 'Title Ua',
			'keywords_ru' => 'Keywords Ru',
			'keywords_ua' => 'Keywords Ua',
			'description_ru' => 'Description Ru',
			'description_ua' => 'Description Ua',
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
		$criteria->compare('parent',$this->parent);
		$criteria->compare('header_ru',$this->header_ru,true);
		$criteria->compare('header_ua',$this->header_ua,true);
		$criteria->compare('text_ru',$this->text_ru,true);
		$criteria->compare('text_ua',$this->text_ua,true);
		$criteria->compare('date_create',$this->date_create,true);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('user_create',$this->user_create);
		$criteria->compare('user_update',$this->user_update);
		$criteria->compare('order',$this->order);
		$criteria->compare('title_ru',$this->title_ru,true);
		$criteria->compare('title_ua',$this->title_ua,true);
		$criteria->compare('keywords_ru',$this->keywords_ru,true);
		$criteria->compare('keywords_ua',$this->keywords_ua,true);
		$criteria->compare('description_ru',$this->description_ru,true);
		$criteria->compare('description_ua',$this->description_ua,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pages1 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
