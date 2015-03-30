<?php $this->renderPartial('breadcrumbs',array('breadcrumbs'=>(isset($breadcrumbs)?$breadcrumbs:array()))); ?>            

<h1>Текстовые страницы</h1>
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
        <? if ($pages) foreach($pages as $pg):?>
        <tr>
            <td><a href="/cp/pages/edit/<?=$pg->id?>"><?=$pg->id?></a></td>
            <td><?=$pg->header_ua?></td>
            <td><?=$pg->header_ru?></td>
            <td>
            	<?=CHtml::link('<span class="glyphicon glyphicon-cog"></span> Редактировать', Yii::app()->createUrl('/cp/pages/edit/'.$pg->id),array('class' => 'btn btn-success btn-xs'))?>&nbsp;
                <? if ($pg->id!=12 && $pg->id!=13):?>
            	<?=CHtml::link('<span class="glyphicon glyphicon-remove"></span> '.Yii::t('cabinet', 'Удалить'), Yii::app()->createUrl('/cp/pages/delete/'.$pg->id),array('class' => 'btn btn-danger btn-xs del'))?>
                <?endif;?>
            </td>
        </tr>
    	<? endforeach;?>
    </tbody>
</table>

<?=MHtml::errorSummary($page); ?>
<?=CHtml::link('<span class="glyphicon glyphicon-plus"></span> Добавить страницу', Yii::app()->createUrl('#'),array('class' => 'btn btn-primary','data-toggle' =>'modal','data-target' =>'#myModal',))?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Добавить страницу</h4>
      		</div>
	      	<?=CHtml::form('','post',array('role'=>"form",'class'=>'')); ?>
	      	<div class="modal-body">
	        
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'header_ua')?>
		        	<?=MHtml::activeTextField($page,'header_ua',array('placeholder'=>$page->getAttributeLabel('header_ua'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'w'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'header_ru')?>
		        	<?=MHtml::activeTextField($page,'header_ru',array('placeholder'=>$page->getAttributeLabel('header_ru'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'w'); ?>
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


