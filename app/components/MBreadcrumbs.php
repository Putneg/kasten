<?php

Yii::import('zii.widgets.CBreadcrumbs');

class MBreadcrumbs extends CBreadcrumbs
{
	public function run()
	{
		if(empty($this->links))
			return;

		echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";
		$links=array();
		if($this->homeLink===null)
			$links[]=CHtml::link(Yii::t('zii','Home'),Yii::app()->homeUrl);
		elseif($this->homeLink!==false)
			$links[]=$this->homeLink;
		$i=1;
		foreach($this->links as $label=>$url)
		{
			if((is_string($label) || is_array($url)) && ($i<count($this->links)))
				$links[]=strtr($this->activeLinkTemplate,array(
					'{url}'=>CHtml::normalizeUrl($url),
					'{label}'=>$this->encodeLabel ? CHtml::encode($label) : $label,
				));
			else if ($i==count($this->links))
				$links[]=str_replace('{label}',$this->encodeLabel ? CHtml::encode($label) : $label,$this->inactiveLinkTemplate);
			else
				$links[]=str_replace('{label}',$this->encodeLabel ? CHtml::encode($url) : $url,$this->inactiveLinkTemplate);
			$i++;
		}
		echo implode($this->separator,$links);
		echo CHtml::closeTag($this->tagName);
	}
}