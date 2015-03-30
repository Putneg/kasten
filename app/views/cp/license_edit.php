<?php $this->renderPartial('breadcrumbs',array('breadcrumbs'=>(isset($breadcrumbs)?$breadcrumbs:array()))); ?>

<h1><?=$license->name_ru?></h1>

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
		
		<?=MHtml::errorSummary($license); ?>

		<?=CHtml::form('','post',array('role'=>"form",'class'=>'')); ?>
	      	<div class="modal-body">
	        	<div class="form-group">
                    <?=CHtml::activeLabel($license, 'id')?>
                    <?=MHtml::activeTextField($license,'id',array('placeholder'=>$license->getAttributeLabel('id'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'w'); ?>
                </div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($license, 'name_ua')?>
		        	<?=MHtml::activeTextField($license,'name_ua',array('placeholder'=>$license->getAttributeLabel('name_ua'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($license, 'name_ru')?>
		        	<?=MHtml::activeTextField($license,'name_ru',array('placeholder'=>$license->getAttributeLabel('name_ru'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); ?>
	        	</div>
	      	</div>
	      	<div class="modal-footer">
	        	<?=CHtml::submitButton(Yii::t('cabinet', 'Сохранить'), array('id' => "submit",'class'=>'btn btn-primary')); ?>
	      	</div>
      	<?=CHtml::endForm(); ?>
	</div>
</div>