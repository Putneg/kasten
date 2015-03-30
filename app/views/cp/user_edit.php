<?php $this->renderPartial('breadcrumbs',array('breadcrumbs'=>(isset($breadcrumbs)?$breadcrumbs:array()))); ?>

<h1><?=$user->name?></h1>

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
<?
    $rules = array('super'=>'Суперпользователь','manager'=>'Менеджер')
?>
<div class="row">
	<div class="col-xs-6 col-md-6">
		
		<?=MHtml::errorSummary($user); ?>

		<?=CHtml::form('','post',array('role'=>"form",'class'=>'')); ?>
	      	<div class="modal-body">
	        	<div class="form-group">
                    <?=CHtml::activeLabel($user, 'name')?>
                    <?=MHtml::activeTextField($user,'name',array('placeholder'=>$user->getAttributeLabel('name'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'eu'); ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($user, 'login')?>
                    <?=MHtml::activeTextField($user,'login',array('placeholder'=>$user->getAttributeLabel('login'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'eu'); ?>
                </div>
                <div class="form-group">
		        	<?=CHtml::activeLabel($user, 'reg_wd')?>
		        	<?=MHtml::activeTextField($user,'reg_wd',array('placeholder'=>$user->getAttributeLabel('reg_wd'),'class'=>'form-control','autocomlete'=>'off'),'eu'); ?>
	        	</div>
	        	<div class="form-group">
                    <?=CHtml::activeLabel($user, 'role')?>
                    <?php 
                        echo MHtml::activeDropDownList($user, 'role', $rules, array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'eu'); 
                    ?>
                </div>
                <div class="form-group">
					<div class="checkbox">
			        	<label for="eu_status">
			        		<?=MHtml::activeCheckBox($user, 'status',array(),'eu')?>	<?=$user->getAttributeLabel('status')?>
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