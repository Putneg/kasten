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

		<?=CHtml::form('','post',array('role'=>"form",'class'=>'','enctype'=>"multipart/form-data")); ?>
	      	<div class="modal-body">
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'date_create')?>
		        	<? $page->date_create = date("d/m/Y",strtotime($page->date_create))?>
		        	<div class="row">
		        		<div class="col-xs-3">
				        	<?=MHtml::activeTextField($page,'date_create',array('placeholder'=>$page->getAttributeLabel('date_create'),'required'=>'required','class'=>'form-control datepicker1','autocomlete'=>'off'),'c'); ?>
				        </div>
				    </div>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'header_ua')?>
		        	<?=MHtml::activeTextField($page,'header_ua',array('placeholder'=>$page->getAttributeLabel('header_ua'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'header_ru')?>
		        	<?=MHtml::activeTextField($page,'header_ru',array('placeholder'=>$page->getAttributeLabel('header_ru'),'required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); ?>
	        	</div><br>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'text_ua')?>
		        	<?=MHtml::activeTextarea($page,'text_ua',array('placeholder'=>$page->getAttributeLabel('text_ua'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'text_ru')?>
		        	<?=MHtml::activeTextarea($page,'text_ru',array('placeholder'=>$page->getAttributeLabel('text_ru'),'class'=>'form-control','autocomlete'=>'off'),'c'); ?>
	        	</div>
	        	<hr><br>
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'image')?>
		        	<? if ($page->image!=''):?>
		        	<div class="row">
		        		<div class="col-xs-3"><img src="/images/<?=$page->image?>" class="img-thumbnail"></div>
		        	</div>
		        	<?endif?>
		        	<?=MHtml::activeFileField($page,'image',array('placeholder'=>$page->getAttributeLabel('image'),'class'=>'','autocomlete'=>'off'),'c'); ?><br>
		        	<label for="delete_img"><input type="checkbox" name="delete_img" id="delete_img" value="1"> Удалить изображение</label>
	        	</div>
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
	        	<div class="form-group">
		        	<?=CHtml::activeLabel($page, 'url')?>
		        	<?=MHtml::activeTextField($page,'url',array('placeholder'=>$page->getAttributeLabel('url'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
	        	</div>
	      	</div>
	      	<div class="modal-footer">
	        	<?=CHtml::submitButton(Yii::t('cabinet', 'Сохранить'), array('id' => "submit",'class'=>'btn btn-primary')); ?>
	      	</div>
      	<?=CHtml::endForm(); ?>
	</div>
</div>
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