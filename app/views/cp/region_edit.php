<?php $this->renderPartial('breadcrumbs',array('breadcrumbs'=>(isset($breadcrumbs)?$breadcrumbs:array()))); ?>

<h1><?=$region->name_ru?></h1>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success fade in" role="alert">
	      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('warning')):?>
    <div class="alert alert-warning fade in" role="alert">
	      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      <?php echo Yii::app()->user->getFlash('warning'); ?>
    </div>
<?php endif; ?>

<div class="row">
	<div class="col-xs-6 col-md-6">
		
		<?=MHtml::errorSummary($region); ?>

		<?=CHtml::form('','post',array('role'=>"form",'class'=>'')); ?>
	      	<div class="modal-body">
	        
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($region, 'name_ua')?>
		        	<?=MHtml::activeTextField($region,'name_ua',array('placeholder'=>$region->getAttributeLabel('name_ua'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'w'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($region, 'name_ru')?>
		        	<?=MHtml::activeTextField($region,'name_ru',array('placeholder'=>$region->getAttributeLabel('name_ru'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'w'); ?>
	        	</div>

	        	<div class="form-group">
					<div class="checkbox">
			        	<label for="w_visible">
			        		<?=MHtml::activeCheckBox($region, 'visible',array(),'w')?>	<?=$region->getAttributeLabel('visible')?>
			        	</label>
			        </div>							
				</div>
	        
	      	</div>
	      	<div class="modal-footer">
	        	<?=CHtml::submitButton(Yii::t('cabinet', 'Сохранить'), array('id' => "submit",'class'=>'btn btn-primary')); ?>
	      	</div>
      	<?=CHtml::endForm(); ?>
	</div>
</div>

<h3 id="cities">Города</h3>
<table class="table table-striped  table-hover">
    <tbody>
    	<tr>
            <th>ID</th>
            <th>Название(укр)</th>
            <th>Название(рус)</th>
            <th>Зона</th>
            <th>Действия</th>
        </tr>
        <? if ($cities) foreach($cities as $ct):?>
        <tr>
            <td><a href="/cp/region/cedit/<?=$ct->id?>"><?=$ct->id?></a></td>
            <td><?=$ct->name_ua?></td>
            <td><?=$ct->name_ru?></td>
            <td><?=$zones[$ct->id_zone]['name_ru']?></td>
            <td>
            	<?=CHtml::link('<span class="glyphicon glyphicon-cog"></span> Редактировать', Yii::app()->createUrl('/cp/region/cedit/'.$ct->id),array('class' => 'btn btn-success btn-xs'))?>&nbsp;
            	<?=CHtml::link('<span class="glyphicon glyphicon-remove"></span> '.Yii::t('cabinet', 'Удалить'), Yii::app()->createUrl('/cp/region/cdelete/'.$ct->id),array('class' => 'btn btn-danger btn-xs del'))?>
            </td>
        </tr>
    	<? endforeach;?>
    </tbody>
</table>

<?=MHtml::errorSummary($city); ?>
<?=CHtml::link('<span class="glyphicon glyphicon-plus"></span> Добавить город', Yii::app()->createUrl('#'),array('class' => 'btn btn-primary','data-toggle' =>'modal','data-target' =>'#myModal',))?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Добавить город</h4>
      		</div>
	      	<?=CHtml::form('','post',array('role'=>"form",'class'=>'')); ?>
	      	<div class="modal-body">
	        
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($city, 'name_ua')?>
		        	<?=MHtml::activeTextField($city,'name_ua',array('placeholder'=>$city->getAttributeLabel('name_ua'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($city, 'name_ru')?>
		        	<?=MHtml::activeTextField($city,'name_ru',array('placeholder'=>$city->getAttributeLabel('name_ru'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($city, 'id_zone')?>
		        	<?php 
						echo MHtml::activeDropDownList($city, 'id_zone', CHtml::listData(Zone::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
					?>
				</div>
				<? $city->id_region = $region->id;?>
				<?=MHtml::activeHiddenField($city,'id_region',array(),'c'); ?>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal"><?=Yii::t('cabinet', 'Закрыть')?></button>
	        	<?=CHtml::submitButton(Yii::t('cabinet', 'Сохранить'), array('id' => "submit",'class'=>'btn btn-primary')); ?>
	      	</div>
      	<?=CHtml::endForm(); ?>
    </div>
  </div>
</div>


