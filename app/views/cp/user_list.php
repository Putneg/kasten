<?php $this->renderPartial('breadcrumbs',array('breadcrumbs'=>(isset($breadcrumbs)?$breadcrumbs:array()))); ?>            

<h1>Пользователи</h1>
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

<table class="table table-striped  table-hover">
    <tbody>
    	<tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Права</th>
            <th>Состояние</th>
            <th>Действия</th>
        </tr>
        <? if ($users) foreach($users as $usr):?>
        <tr>
            <td><a href="/cp/user/edit/<?=$usr->id?>"><?=$usr->id?></a></td>
            <td><?=$usr->name?></td>
            <td><?=$rules[$usr->role]?></td>
            <td><?=($usr->status?'Активный':'Отключен')?></td>
            <td>
            	<?=CHtml::link('<span class="glyphicon glyphicon-cog"></span> Редактировать', Yii::app()->createUrl('/cp/user/edit/'.$usr->id),array('class' => 'btn btn-success btn-xs'))?>&nbsp;
            	<?=CHtml::link('<span class="glyphicon glyphicon-remove"></span> '.Yii::t('cabinet', 'Удалить'), Yii::app()->createUrl('/cp/user/delete/'.$usr->id),array('class' => 'btn btn-danger btn-xs del'))?>
            </td>
        </tr>
    	<? endforeach;?>
    </tbody>
</table>

<?=MHtml::errorSummary($user); ?>
<?=CHtml::link('<span class="glyphicon glyphicon-plus"></span> Добавить пользователя', Yii::app()->createUrl('#'),array('class' => 'btn btn-primary','data-toggle' =>'modal','data-target' =>'#myModal',))?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Добавить пользователя</h4>
      		</div>
	      	<?=CHtml::form('','post',array('role'=>"form",'class'=>'')); ?>
	      	<div class="modal-body">
	        
                <div class="form-group">
                    <?=CHtml::activeLabel($user, 'name')?>
                    <?=MHtml::activeTextField($user,'name',array('placeholder'=>$user->getAttributeLabel('name'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'u'); ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($user, 'login')?>
                    <?=MHtml::activeTextField($user,'login',array('placeholder'=>$user->getAttributeLabel('login'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'u'); ?>
                </div>
                <div class="form-group">
		        	<?=CHtml::activeLabel($user, 'reg_wd')?>
		        	<?=MHtml::activeTextField($user,'reg_wd',array('placeholder'=>$user->getAttributeLabel('reg_wd'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'u'); ?>
	        	</div>
	        	<div class="form-group">
                    <?=CHtml::activeLabel($user, 'role')?>
                    <?php 
                        echo MHtml::activeDropDownList($user, 'role', $rules, array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'u'); 
                    ?>
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


