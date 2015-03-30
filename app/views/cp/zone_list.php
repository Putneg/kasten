<?php $this->renderPartial('breadcrumbs',array('breadcrumbs'=>(isset($breadcrumbs)?$breadcrumbs:array()))); ?>            

<h1>Зоны</h1>
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
	
<table class="table table-striped  table-hover">
    <tbody>
    	<tr>
            <th>ID</th>
            <th>Название(укр)</th>
            <th>Название(рус)</th>
            <th width="240">Действия</th>
        </tr>
        <? if ($zones) foreach($zones as $lic):?>
        <tr>
            <td><a href="/cp/zone/edit/<?=$lic->id?>"><?=$lic->id?></a></td>
            <td><?=$lic->name_ua?></td>
            <td><?=$lic->name_ru?></td>
            <td>
            	<?=CHtml::link('<span class="glyphicon glyphicon-cog"></span> Редактировать', Yii::app()->createUrl('/cp/zone/edit/'.$lic->id),array('class' => 'btn btn-success btn-xs'))?>&nbsp;
            	<?=CHtml::link('<span class="glyphicon glyphicon-remove"></span> '.Yii::t('cabinet', 'Удалить'), Yii::app()->createUrl('/cp/zone/delete/'.$lic->id),array('class' => 'btn btn-danger btn-xs del'))?>
            </td>
        </tr>
    	<? endforeach;?>
    </tbody>
</table>

<?=MHtml::errorSummary($zone); ?>
<?=CHtml::link('<span class="glyphicon glyphicon-plus"></span> Добавить зону', Yii::app()->createUrl('#'),array('class' => 'btn btn-primary','data-toggle' =>'modal','data-target' =>'#myModal',))?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Добавить зону</h4>
      		</div>
	      	<?=CHtml::form('','post',array('role'=>"form",'class'=>'')); ?>
	      	<div class="modal-body">
	        
                <div class="form-group">
		        	<?=CHtml::activeLabel($zone, 'name_ua')?>
		        	<?=MHtml::activeTextField($zone,'name_ua',array('placeholder'=>$zone->getAttributeLabel('name_ua'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'w'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($zone, 'name_ru')?>
		        	<?=MHtml::activeTextField($zone,'name_ru',array('placeholder'=>$zone->getAttributeLabel('name_ru'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'w'); ?>
	        	</div>
	        	
		        
	        
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
	        	<?=CHtml::submitButton('Сохранить', array('id' => "submit",'class'=>'btn btn-primary')); ?>
	      	</div>
      	<?=CHtml::endForm(); ?>
    </div>
  </div>
</div>


