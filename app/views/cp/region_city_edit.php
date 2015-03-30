<?php $this->renderPartial('breadcrumbs',array('breadcrumbs'=>(isset($breadcrumbs)?$breadcrumbs:array()))); ?>

<h1><?=$city->name_ru?></h1>

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
		
		<?=MHtml::errorSummary($city); ?>

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
				<div class="form-group">
					<div class="checkbox">
			        	<label for="c_visible">
			        		<?=MHtml::activeCheckBox($city, 'visible',array(),'c')?>	<?=$city->getAttributeLabel('visible')?>
			        	</label>
			        </div>							
				</div>
				<?=MHtml::activeHiddenField($city,'id_region',array(),'c'); ?>
	        
	      	</div>
	      	<div class="modal-footer">
	        	<?=CHtml::submitButton(Yii::t('cabinet', 'Сохранить'), array('id' => "submit",'class'=>'btn btn-primary')); ?>
	      	</div>
      	<?=CHtml::endForm(); ?>
	</div>
</div>