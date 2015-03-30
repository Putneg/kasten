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
 * @property string $image
 * @property string $url
 */
class Pages extends CActiveRecord
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
			array('parent, header_ru, header_ua, text_ru, text_ua, date_create, user_create, user_update, order, title_ru, title_ua, keywords_ru, keywords_ua, description_ru, description_ua', 'required','on' => 'edit'),
			array('parent, user_create, user_update, order', 'numerical', 'integerOnly'=>true),
			array('header_ru, header_ua, title_ru, title_ua, keywords_ru, keywords_ua, description_ru, description_ua, url', 'length', 'max'=>250),
			array('date_update,text_ua,text_ru,date_create', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent, header_ru, header_ua, text_ru, text_ua, date_create, date_update, user_create, user_update, order, title_ru, title_ua, keywords_ru, keywords_ua, description_ru, description_ua', 'safe', 'on'=>'search'),
			array('parent, header_ru, header_ua', 'required','on' => 'add'),
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
			'header_ru' => 'Название (рус)',
			'header_ua' => 'Название (укр)',
			'text_ru' => 'Текст(рус)',
			'text_ua' => 'Текст(укр)',
			'date_create' => 'Дата сообщения',
			'date_update' => 'Date Update',
			'user_create' => 'User Create',
			'user_update' => 'User Update',
			'order' => 'Order',
			'title_ru' => 'Заголовок(рус)',
			'title_ua' => 'Заголовок(укр)',
			'keywords_ru' => 'Ключевые слова(рус)',
			'keywords_ua' => 'Ключевые слова(укр)',
			'description_ru' => 'Описание(рус)',
			'description_ua' => 'Описание(укр)',
			'image' => 'Превью',
			'url' => 'Ссылка',

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
		$criteria->compare('image',$this->image,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getHeader()
    {
        $attribute = 'header_' . Yii::app()->getLanguage();
        return $this->{$attribute};
    }

    public function getText()
    {
        $attribute = 'text_' . Yii::app()->getLanguage();
        return $this->{$attribute};
    }

    public function getTitle()
    {
        $attribute = 'title_' . Yii::app()->getLanguage();
        return $this->{$attribute};
    }

    public function getKeywords()
    {
        $attribute = 'keywords_' . Yii::app()->getLanguage();
        return $this->{$attribute};
    }

    public function getDescription()
    {
        $attribute = 'description_' . Yii::app()->getLanguage();
        return $this->{$attribute};
    }
}
