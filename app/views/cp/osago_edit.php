<?php $this->renderPartial('breadcrumbs',array('breadcrumbs'=>(isset($breadcrumbs)?$breadcrumbs:array()))); ?>

<h1>Осаго, редактирование</h1>

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
		
		<?=MHtml::errorSummary($osago); ?>

		<?=CHtml::form('','post',array('role'=>"form",'class'=>'')); ?>
	      	<div class="modal-body">
	        	<div class="form-group">
                    <?=CHtml::activeLabel($osago, 'id_zone')?>
                    <?php 
                        echo MHtml::activeDropDownList($osago, 'id_zone', CHtml::listData(Zone::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                    ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($osago, 'id_license')?>
                    <?php 
                        echo MHtml::activeDropDownList($osago, 'id_license', CHtml::listData(License::model()->findAll(array('order' => 'id')), 'id', 'id'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                    ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($osago, 'id_company')?>
                    <?php 
                        echo MHtml::activeDropDownList($osago, 'id_company', CHtml::listData(Company::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                    ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($osago, 'entity_flag')?>
                    <?php 
                        echo MHtml::activeDropDownList($osago, 'entity_flag', array('0' => 'Частное лицо','1' => 'Компания'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                    ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($osago, 'franchise')?>
                    <?php 
                        echo MHtml::activeDropDownList($osago, 'franchise', array('0' => '0 грн','1000' => '1000 грн'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                    ?>
                </div>
	        	<div class="form-group">
                    <?=CHtml::activeLabel($osago, 'osago_payment')?>
                    <?=MHtml::activeTextField($osago,'osago_payment',array('placeholder'=>$osago->getAttributeLabel('osago_payment'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                </div>
	      	</div>
	      	<div class="modal-footer">
	        	<?=CHtml::submitButton(Yii::t('cabinet', 'Сохранить'), array('id' => "submit",'class'=>'btn btn-primary')); ?>
	      	</div>
      	<?=CHtml::endForm(); ?>
	</div>
</div>