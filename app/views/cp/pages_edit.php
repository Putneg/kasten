<?php $this->renderPartial('breadcrumbs',array('breadcrumbs'=>(isset($breadcrumbs)?$breadcrumbs:array()))); ?>

<h1><?=$page->header_ru?></h1>

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
	<div class="col-xs-9 col-md-9">
		
		<?=MHtml::errorSummary($page); ?>

		<?=CHtml::form('','post',array('role'=>"form",'class'=>'')); ?>
	      	<div class="modal-body">
	        
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'header_ua')?>
		        	<?=MHtml::activeTextField($page,'header_ua',array('placeholder'=>$page->getAttributeLabel('header_ua'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'header_ru')?>
		        	<?=MHtml::activeTextField($page,'header_ru',array('placeholder'=>$page->getAttributeLabel('header_ru'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); ?>
	        	</div><br>
	        	<? if (!$subpages && $page->id!=12 && $page->id!=13):?>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'text_ua')?>
		        	<?=MHtml::activeTextarea($page,'text_ua',array('placeholder'=>$page->getAttributeLabel('text_ua'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'text_ru')?>
		        	<?=MHtml::activeTextarea($page,'text_ru',array('placeholder'=>$page->getAttributeLabel('text_ru'),'class'=>'form-control','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<? endif;?>
	        	<hr><br>
	        	<h4>SEO параметры</h4>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'title_ua')?>
		        	<?=MHtml::activeTextField($page,'title_ua',array('placeholder'=>$page->getAttributeLabel('title_ua'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'title_ru')?>
		        	<?=MHtml::activeTextField($page,'title_ru',array('placeholder'=>$page->getAttributeLabel('title_ru'),'class'=>'form-control','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'keywords_ua')?>
		        	<?=MHtml::activeTextField($page,'keywords_ua',array('placeholder'=>$page->getAttributeLabel('keywords_ua'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'keywords_ru')?>
		        	<?=MHtml::activeTextField($page,'keywords_ru',array('placeholder'=>$page->getAttributeLabel('keywords_ru'),'class'=>'form-control','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'description_ua')?>
		        	<?=MHtml::activeTextarea($page,'description_ua',array('placeholder'=>$page->getAttributeLabel('description_ua'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'description_ru')?>
		        	<?=MHtml::activeTextarea($page,'description_ru',array('placeholder'=>$page->getAttributeLabel('description_ru'),'class'=>'form-control','autocomlete'=>'off'),'c'); ?>
	        	</div>
	      	</div>
	      	<div class="modal-footer">
	        	<?=CHtml::submitButton(Yii::t('cabinet', 'Сохранить'), array('id' => "submit",'class'=>'btn btn-primary')); ?>
	      	</div>
      	<?=CHtml::endForm(); ?>
	</div>
</div>
<? if (!$subpages && $page->id!=12 && $page->id!=13):?>
<script language="javascript" type="text/javascript" src="/cP/ck/ckeditor/ckeditor.js"></script> 
<script type="text/javascript">
	CKEDITOR.replace( 'c_text_ua',
			{
				//extraPlugins : 'MediaEmbed',
				language: 'ru',
				toolbar :
				[
					['Source'],['Cut','Copy','Paste','PasteText','PasteFromWord'], ['Undo','Redo','RemoveFormat'], [ 'Bold', 'Italic', 'Underline','Strike'],['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','RemoveFormat'],['BulletedList','Outdent','Indent', '-', 'Link', 'Unlink', 'Image','Table' ],'/', ['Styles','Format','Font','FontSize','TextColor','BGColor'],['Maximize'],
				],
				height: 500,
				resize_enabled:false,
				//enterMode:CKEDITOR.ENTER_BR,
				filebrowserBrowseUrl : '/cP/ck/ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '/cP/ck/ckfinder/ckfinder.html?Type=Images',
				filebrowserFlashBrowseUrl : '/cP/ck/ckfinder/ckfinder.html?Type=Flash',
				filebrowserUploadUrl : '/cP/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '/cP/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '/cP/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				filebrowserWindowWidth : '1000',
				filebrowserWindowHeight : '700'
			});
	CKEDITOR.replace( 'c_text_ru',
			{
				//extraPlugins : 'MediaEmbed',
				language: 'ru',
				toolbar :
				[
					['Source'],['Cut','Copy','Paste','PasteText','PasteFromWord'], ['Undo','Redo','RemoveFormat'], [ 'Bold', 'Italic', 'Underline','Strike'],['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','RemoveFormat'],['BulletedList','Outdent','Indent', '-', 'Link', 'Unlink', 'Image','Table' ],'/', ['Styles','Format','Font','FontSize','TextColor','BGColor'],['Maximize'],
				],
				height: 500,
				resize_enabled:false,
				//enterMode:CKEDITOR.ENTER_BR,
				filebrowserBrowseUrl : '/cP/ck/ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '/cP/ck/ckfinder/ckfinder.html?Type=Images',
				filebrowserFlashBrowseUrl : '/cP/ck/ckfinder/ckfinder.html?Type=Flash',
				filebrowserUploadUrl : '/cP/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '/cP/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '/cP/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				filebrowserWindowWidth : '1000',
				filebrowserWindowHeight : '700'
			});
</script>
<? endif;?>
<h3>Подчиненные страницы</h3>
<table class="table table-striped  table-hover">
    <tbody>
    	<tr>
            <th>ID</th>
            <th>Название(укр)</th>
            <th>Название(рус)</th>
            <th width="235">Действия</th>
        </tr>
        <? if ($subpages) foreach($subpages as $pg):?>
        <tr>
            <td><a href="/cp/pages/sedit/<?=$pg->id?>"><?=$pg->id?></a></td>
            <td><?=$pg->header_ua?></td>
            <td><?=$pg->header_ru?></td>
            <td>
            	<?=CHtml::link('<span class="glyphicon glyphicon-cog"></span> Редактировать', Yii::app()->createUrl('/cp/pages/sedit/'.$pg->id),array('class' => 'btn btn-success btn-xs'))?>&nbsp;
            	<?=CHtml::link('<span class="glyphicon glyphicon-remove"></span> '.Yii::t('cabinet', 'Удалить'), Yii::app()->createUrl('/cp/pages/delete/'.$pg->id.'/'.$page->id),array('class' => 'btn btn-danger btn-xs del'))?>
            </td>
        </tr>
    	<? endforeach;?>
    </tbody>
</table>

<?=MHtml::errorSummary($spage); ?>
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
		        	<?=CHtml::activeLabel($spage, 'header_ua')?>
		        	<?=MHtml::activeTextField($spage,'header_ua',array('placeholder'=>$spage->getAttributeLabel('header_ua'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'w'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($spage, 'header_ru')?>
		        	<?=MHtml::activeTextField($spage,'header_ru',array('placeholder'=>$spage->getAttributeLabel('header_ru'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'w'); ?>
	        	</div>
	        	<? $spage->parent = $page->id;?>
	        	<?=MHtml::activeHiddenField($spage,'parent',array(),'w'); ?>
		        
	        
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
	        	<?=CHtml::submitButton('Сохранить', array('id' => "submit",'class'=>'btn btn-primary')); ?>
	      	</div>
      	<?=CHtml::endForm(); ?>
    </div>
  </div>
</div>