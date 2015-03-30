<?
	if (!isset($breadcrumbs)){
		$breadcrumbs = array();
	}
	$this->widget('MBreadcrumbs', array(
		'homeLink'=>'<li>'.CHtml::link('Панель управления','/cp/index').'</li>',
		'separator'=>'',
		'tagName'=>'ol',
		'htmlOptions' => array(
	      	'class' => 'breadcrumb'
	    ),
		'inactiveLinkTemplate'=>'<li class="active">{label}</li>',
		'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
	    'links'=>$breadcrumbs,
	));
?>