<?php $this->renderPartial('breadcrumbs',array('breadcrumbs'=>(isset($breadcrumbs)?$breadcrumbs:array()))); ?>

<h1>Редактирование ДГО</h1>

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
		
		<?=MHtml::errorSummary($dgo); ?>

		<?=CHtml::form('','post',array('role'=>"form",'class'=>'')); ?>
	      	<div class="modal-body">
	        
	        	<div class="form-group">
                    <?=CHtml::activeLabel($dgo, 'id_region')?>
                    <?php 
                        echo MHtml::activeDropDownList($dgo, 'id_region', array_merge(array('0'=>'Все регионы'),CHtml::listData(Region::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua')), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                    ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($dgo, 'id_company')?>
                    <?php 
                        echo MHtml::activeDropDownList($dgo, 'id_company', CHtml::listData(Company::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                    ?>
                </div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($dgo, 'dgo_sum')?>
		        	<?=MHtml::activeTextField($dgo,'dgo_sum',array('placeholder'=>$dgo->getAttributeLabel('dgo_sum'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<div class="form-group">
                    <?=CHtml::activeLabel($dgo, 'dgo_payment')?>
                    <?=MHtml::activeTextField($dgo,'dgo_payment',array('placeholder'=>$dgo->getAttributeLabel('dgo_payment'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); ?>
                </div>
                <div class="form-group">
		        	<?=CHtml::activeLabel($dgo, 'dgo_rate')?>
		        	<?=MHtml::activeTextField($dgo,'dgo_rate',array('placeholder'=>$dgo->getAttributeLabel('dgo_rate'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); ?>
	        	</div>
	      	</div>
	      	<div class="modal-footer">
	        	<?=CHtml::submitButton(Yii::t('cabinet', 'Сохранить'), array('id' => "submit",'class'=>'btn btn-primary')); ?>
	      	</div>
      	<?=CHtml::endForm(); ?>
	</div>
</div>