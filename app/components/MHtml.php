<?php

/**
 * Расширенный класс CHtml, добавлена возможность задавать кастомное имя класса в name текстовых полей.
 */
class MHtml extends CHtml
{
	//Added custom form name
	public static function activeEmailField($model,$attribute,$htmlOptions=array(),$modelHtmlName=null)
	{
		self::resolveNameID($model,$attribute,$htmlOptions,$modelHtmlName);
		self::clientChange('change',$htmlOptions);
		return self::activeInputField('email',$model,$attribute,$htmlOptions);
	}

	public static function activePasswordField($model,$attribute,$htmlOptions=array(),$modelHtmlName=null)
	{
		self::resolveNameID($model,$attribute,$htmlOptions,$modelHtmlName);
		self::clientChange('change',$htmlOptions);
		return self::activeInputField('password',$model,$attribute,$htmlOptions);
	}

	public static function activeTextField($model,$attribute,$htmlOptions=array(),$modelHtmlName=null)
	{
		self::resolveNameID($model,$attribute,$htmlOptions,$modelHtmlName);
		self::clientChange('change',$htmlOptions);
		return self::activeInputField('text',$model,$attribute,$htmlOptions);
	}

	public static function activeTelField($model,$attribute,$htmlOptions=array(),$modelHtmlName=null)
	{
		self::resolveNameID($model,$attribute,$htmlOptions,$modelHtmlName);
		self::clientChange('change',$htmlOptions);
		return self::activeInputField('tel',$model,$attribute,$htmlOptions);
	}

	public static function activeFileField($model,$attribute,$htmlOptions=array(),$modelHtmlName=null)
	{
		self::resolveNameID($model,$attribute,$htmlOptions,$modelHtmlName);
		// add a hidden field so that if a model only has a file field, we can
		// still use isset($_POST[$modelClass]) to detect if the input is submitted
		$hiddenOptions=isset($htmlOptions['id']) ? array('id'=>self::ID_PREFIX.$htmlOptions['id']) : array('id'=>false);
		return /*self::hiddenField($htmlOptions['name'],'',$hiddenOptions)
			. */self::activeInputField('file',$model,$attribute,$htmlOptions);
	}

	public static function activeTextArea($model,$attribute,$htmlOptions=array(),$modelHtmlName=null)
	{
		self::resolveNameID($model,$attribute,$htmlOptions,$modelHtmlName);
		self::clientChange('change',$htmlOptions);
		if($model->hasErrors($attribute))
			self::addErrorCss($htmlOptions);
		if(isset($htmlOptions['value']))
		{
			$text=$htmlOptions['value'];
			unset($htmlOptions['value']);
		}
		else
			$text=self::resolveValue($model,$attribute);
		return self::tag('textarea',$htmlOptions,isset($htmlOptions['encode']) && !$htmlOptions['encode'] ? $text : self::encode($text));
	}

	public static function activeDropDownList($model,$attribute,$data,$htmlOptions=array(),$modelHtmlName=null)
	{
		self::resolveNameID($model,$attribute,$htmlOptions,$modelHtmlName);
		$selection=self::resolveValue($model,$attribute);
		$options="\n".self::listOptions($selection,$data,$htmlOptions);
		self::clientChange('change',$htmlOptions);

		if($model->hasErrors($attribute))
			self::addErrorCss($htmlOptions);

		$hidden='';
		if(!empty($htmlOptions['multiple']))
		{
			if(substr($htmlOptions['name'],-2)!=='[]')
				$htmlOptions['name'].='[]';

			if(isset($htmlOptions['unselectValue']))
			{
				$hiddenOptions=isset($htmlOptions['id']) ? array('id'=>self::ID_PREFIX.$htmlOptions['id']) : array('id'=>false);
				$hidden=self::hiddenField(substr($htmlOptions['name'],0,-2),$htmlOptions['unselectValue'],$hiddenOptions);
				unset($htmlOptions['unselectValue']);
			}
		}
		return $hidden . self::tag('select',$htmlOptions,$options);
	}

	public static function activeHiddenField($model,$attribute,$htmlOptions=array(),$modelHtmlName=null)
	{
		self::resolveNameID($model,$attribute,$htmlOptions,$modelHtmlName);
		return self::activeInputField('hidden',$model,$attribute,$htmlOptions);
	}

	public static function resolveNameID($model,&$attribute,&$htmlOptions,$modelHtmlName=null)
	{
		if(!isset($htmlOptions['name']))
			$htmlOptions['name']=self::resolveName($model,$attribute,$modelHtmlName);
		if(!isset($htmlOptions['id']))
			$htmlOptions['id']=self::getIdByName($htmlOptions['name']);
		elseif($htmlOptions['id']===false)
			unset($htmlOptions['id']);
	}

    public static function resolveName($model,&$attribute,$modelHtmlName=null)
	{
		$modelName=self::modelName($model);
		
		if(($pos=strpos($attribute,'['))!==false)
		{
			if($pos!==0)  // e.g. name[a][b]
				return $modelName.'['.substr($attribute,0,$pos).']'.substr($attribute,$pos);
			if(($pos=strrpos($attribute,']'))!==false && $pos!==strlen($attribute)-1)  // e.g. [a][b]name
			{
				$sub=substr($attribute,0,$pos+1);
				$attribute=substr($attribute,$pos+1);
				return $modelName.$sub.'['.$attribute.']';
			}
			if(preg_match('/\](\w+\[.*)$/',$attribute,$matches))
			{
				$name=$modelName.'['.str_replace(']','][',trim(strtr($attribute,array(']['=>']','['=>']')),']')).']';
				$attribute=$matches[1];
				return $name;
			}
		}
		return ($modelHtmlName===null) ? $modelName.'['.$attribute.']' : $modelHtmlName.'['.$attribute.']';
	}


	/* Bootstrap error stylised*/

	public static function errorSummary($model,$header=null,$footer=null,$htmlOptions=array())
	{
		$content='';
		if(!is_array($model))
			$model=array($model);
		if(isset($htmlOptions['firstError']))
		{
			$firstError=$htmlOptions['firstError'];
			unset($htmlOptions['firstError']);
		}
		else
			$firstError=false;
		foreach($model as $m)
		{
			foreach($m->getErrors() as $errors)
			{
				foreach($errors as $error)
				{
					if($error!='')
						$content.="<li>$error</li>\n";
					if($firstError)
						break;
				}
			}
		}
		if($content!=='')
		{
			if($header===null)
				$header='<p>'.Yii::t('yii','Please fix the following input errors:').'</p>';
			if(!isset($htmlOptions['class']))
				$htmlOptions['class']='alert alert-danger alert-dismissible';
			return self::tag('div',$htmlOptions,'<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$header."\n<ul class=\"list-unstyled\">\n$content</ul>".$footer);
		}
		else
			return '';
	}

	public static function activeCheckBox($model,$attribute,$htmlOptions=array(),$modelHtmlName=null)
	{
		self::resolveNameID($model,$attribute,$htmlOptions,$modelHtmlName);
		if(!isset($htmlOptions['value']))
			$htmlOptions['value']=1;
		if(!isset($htmlOptions['checked']) && self::resolveValue($model,$attribute)==$htmlOptions['value'])
			$htmlOptions['checked']='checked';
		self::clientChange('click',$htmlOptions);

		if(array_key_exists('uncheckValue',$htmlOptions))
		{
			$uncheck=$htmlOptions['uncheckValue'];
			unset($htmlOptions['uncheckValue']);
		}
		else
			$uncheck='0';

		$hiddenOptions=isset($htmlOptions['id']) ? array('id'=>self::ID_PREFIX.$htmlOptions['id']) : array('id'=>false);
		$hidden=$uncheck!==null ? self::hiddenField($htmlOptions['name'],$uncheck,$hiddenOptions) : '';

		return $hidden . self::activeInputField('checkbox',$model,$attribute,$htmlOptions);
	}
}