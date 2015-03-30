<?php $this->renderPartial('breadcrumbs',array('breadcrumbs'=>(isset($breadcrumbs)?$breadcrumbs:array()))); ?>            

<h1>ОСАГО</h1>
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
<?=CHtml::link('<span class="glyphicon glyphicon-plus"></span> Добавить', Yii::app()->createUrl('#'),array('class' => 'btn btn-primary','data-toggle' =>'modal','data-target' =>'#myModal',))?>	<br><br>
<table class="table table-striped  table-hover">
    <tbody>
    	<tr>
            <th>ID</th>
            <th>Зона</th>
            <th>Категория ТС</th>
            <th>Компания</th>
            <th>Франшиза</th>
            <th>Платеж</th>
            <th width="240">Действия</th>
        </tr>
        <? if ($osagos) foreach($osagos as $os):?>
        <tr>
            <td><a href="/cp/osago/edit/<?=$os->id?>"><?=$os->id?></a></td>
            <td><?=$os->zone->name_ua?></td>
            <td><?=$os->id_license?></td>
            <td><?=$os->company->name_ua?></td>
            <td><?=$os->franchise?></td>
            <td><?=$os->osago_payment?></td>
            <td>
            	<?=CHtml::link('<span class="glyphicon glyphicon-cog"></span> Редактировать', Yii::app()->createUrl('/cp/osago/edit/'.$os->id),array('class' => 'btn btn-success btn-xs'))?>&nbsp;
            	<?=CHtml::link('<span class="glyphicon glyphicon-remove"></span> '.Yii::t('cabinet', 'Удалить'), Yii::app()->createUrl('/cp/osago/delete/'.$os->id),array('class' => 'btn btn-danger btn-xs del'))?>
            </td>
        </tr>
    	<? endforeach;?>
    </tbody>
</table>

<? if (isset($total) && $total>30):?>
    <?php $this->widget('Pager',array(
             'pages'=>$pages, 
     )); ?>

<? endif?><br>
<?=MHtml::errorSummary($osago); ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Добавить</h4>
      		</div>
	      	<?=CHtml::form('','post',array('role'=>"form",'class'=>'')); ?>
	      	<div class="modal-body">
	        
	        	<div class="form-group">
                    <?=CHtml::activeLabel($osago, 'id_zone')?>
                    <?php 
                        echo MHtml::activeDropDownList($osago, 'id_zone', CHtml::listData(Zone::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'w'); 
                    ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($osago, 'id_license')?>
                    <?php 
                        echo MHtml::activeDropDownList($osago, 'id_license', CHtml::listData(License::model()->findAll(array('order' => 'id')), 'id', 'id'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'w'); 
                    ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($osago, 'id_company')?>
                    <?php 
                        echo MHtml::activeDropDownList($osago, 'id_company', CHtml::listData(Company::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'w'); 
                    ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($osago, 'entity_flag')?>
                    <?php 
                        echo MHtml::activeDropDownList($osago, 'entity_flag', array('0' => 'Частное лицо','1' => 'Компания'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'w'); 
                    ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($osago, 'franchise')?>
                    <?php 
                        echo MHtml::activeDropDownList($osago, 'franchise', array('0' => '0 грн','1000' => '1000 грн'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'w'); 
                    ?>
                </div>
	        	<div class="form-group">
                    <?=CHtml::activeLabel($osago, 'osago_payment')?>
                    <?=MHtml::activeTextField($osago,'osago_payment',array('placeholder'=>$osago->getAttributeLabel('osago_payment'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'w'); ?>
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