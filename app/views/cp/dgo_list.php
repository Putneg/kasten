<?php $this->renderPartial('breadcrumbs',array('breadcrumbs'=>(isset($breadcrumbs)?$breadcrumbs:array()))); ?>            

<h1>ДГО</h1>
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
<?=MHtml::errorSummary($dgo); ?>
<?=CHtml::link('<span class="glyphicon glyphicon-plus"></span> Добавить ДГО', Yii::app()->createUrl('#'),array('class' => 'btn btn-primary','data-toggle' =>'modal','data-target' =>'#myModal',))?>
<br><br>
<table class="table table-striped  table-hover">
    <tbody>
    	<tr>
            <th>Область</th>
            <th>Компания</th>
            <th>Сумма ДГО</th>
            <th>Увеличение стоимости</th>
            <th>Отчисления,%</th>
            <th>Действия</th>
        </tr>
        <? if ($dgos) foreach($dgos as $dg):?>
        <tr>
            <td><?=(!empty($dg->region)?$dg->region->name_ru:'')?></td>
            <td><?=$dg->company->name_ru?></td>
            <td><?=$dg->dgo_sum?></td>
            <td><?=$dg->dgo_payment?></td>
            <td><?=$dg->dgo_rate?></td>
            <td>
            	<?=CHtml::link('<span class="glyphicon glyphicon-cog"></span> Редактировать', Yii::app()->createUrl('/cp/dgo/edit/'.$dg->id),array('class' => 'btn btn-success btn-xs'))?>&nbsp;
            	<?=CHtml::link('<span class="glyphicon glyphicon-remove"></span> '.Yii::t('cabinet', 'Удалить'), Yii::app()->createUrl('/cp/dgo/delete/'.$dg->id),array('class' => 'btn btn-danger btn-xs del'))?>
            </td>
        </tr>
    	<? endforeach;?>
    </tbody>
</table>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Добавить ДГО</h4>
      		</div>
	      	<?=CHtml::form('','post',array('role'=>"form",'class'=>'')); ?>
	      	<div class="modal-body">
                <div class="form-group">
                    <?=CHtml::activeLabel($dgo, 'id_region')?>
                    <?php 
                        $dgo->id_region = 0;
                        echo MHtml::activeDropDownList($dgo, 'id_region', array_merge(array('0'=>'Все регионы'),CHtml::listData(Region::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua')), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'w'); 
                    ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($dgo, 'id_company')?>
                    <?php 
                        echo MHtml::activeDropDownList($dgo, 'id_company', CHtml::listData(Company::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'w'); 
                    ?>
                </div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($dgo, 'dgo_sum')?>
		        	<?=MHtml::activeTextField($dgo,'dgo_sum',array('placeholder'=>$dgo->getAttributeLabel('dgo_sum'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'w'); ?>
	        	</div>
	        	<div class="form-group">
                    <?=CHtml::activeLabel($dgo, 'dgo_payment')?>
                    <?=MHtml::activeTextField($dgo,'dgo_payment',array('placeholder'=>$dgo->getAttributeLabel('dgo_payment'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'w'); ?>
                </div>
                <div class="form-group">
		        	<?=CHtml::activeLabel($dgo, 'dgo_rate')?>
		        	<?=MHtml::activeTextField($dgo,'dgo_rate',array('placeholder'=>$dgo->getAttributeLabel('dgo_rate'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'w'); ?>
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


<??>