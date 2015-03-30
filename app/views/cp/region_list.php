<?php $this->renderPartial('breadcrumbs',array('breadcrumbs'=>(isset($breadcrumbs)?$breadcrumbs:array()))); ?>            

<h1>Регионы</h1>
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
            <th>Действия</th>
        </tr>
        <? if ($regions) foreach($regions as $reg):?>
        <tr>
            <td><a href="/cp/region/redit/<?=$reg->id?>"><?=$reg->id?></a></td>
            <td><?=$reg->name_ua?></td>
            <td><?=$reg->name_ru?></td>
            <td>
            	<?=CHtml::link('<span class="glyphicon glyphicon-th-list"></span> Города', Yii::app()->createUrl('/cp/region/redit/'.$reg->id.'#cities'),array('class' => 'btn btn-primary btn-xs'))?>&nbsp;
            	<?=CHtml::link('<span class="glyphicon glyphicon-cog"></span> Редактировать', Yii::app()->createUrl('/cp/region/redit/'.$reg->id),array('class' => 'btn btn-success btn-xs'))?>&nbsp;
            	<?=CHtml::link('<span class="glyphicon glyphicon-remove"></span> '.Yii::t('cabinet', 'Удалить'), Yii::app()->createUrl('/cp/region/rdelete/'.$reg->id),array('class' => 'btn btn-danger btn-xs del'))?>
            </td>
        </tr>
    	<? endforeach;?>
    </tbody>
</table>

<?=MHtml::errorSummary($region); ?>
<?=CHtml::link('<span class="glyphicon glyphicon-plus"></span> Добавить регион', Yii::app()->createUrl('#'),array('class' => 'btn btn-primary','data-toggle' =>'modal','data-target' =>'#myModal',))?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Добавить регион</h4>
      		</div>
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
	        	
		        
	        
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal"><?=Yii::t('cabinet', 'Закрыть')?></button>
	        	<?=CHtml::submitButton(Yii::t('cabinet', 'Сохранить'), array('id' => "submit",'class'=>'btn btn-primary')); ?>
	      	</div>
      	<?=CHtml::endForm(); ?>
    </div>
  </div>
</div>


