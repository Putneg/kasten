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
<form action="" method="get" class="well well-small form-inline">
    <div class="row">
        <div class="col-xs-3">
            С&nbsp;<input type="text" name="date1" class="form-control datepickr" value="<?=($date1!=''?date('d.m.Y',strtotime($date1)):'')?>">
        </div>
        <div class="col-xs-3">
            По&nbsp;<input type="text" name="date2" class="form-control datepickr" value="<?=($date2!=''?date('d.m.Y',strtotime($date2)):'')?>">
        </div>
        <div class="col-xs-2">
            <input type="text" name="text" class="form-control" value="<?=$text?>" placeholder="Содержит текст">
        </div>
        <div class="col-xs-3">
            <input type="submit" value="Применить" class="btn btn-primary btn-smpull-right">
        </div>
        <div class="pull-right">
            <a href="/cp/index" class="btn btn-small btn-default ">Сбросить</a>&nbsp;&nbsp;
        </div>
    </div>
</form>
<table class="table table-striped  table-hover">
    <tbody>
    	<tr>
            <th>Дата</th>
            <th>ФИО</th>
            <th>ТС</th>
            <th>Адрес</th>
            <th>Адрес доставки</th>
            <th>Компания</th>
            <th>Франшиза</th>
            <th>Платеж</th>
            <th width="125">Действия</th>
        </tr>
        <? if ($clients) foreach($clients as $client):?>
        <tr  style="font-size:12px">
            <td><?=date("d.m.Y H:i",strtotime($client->create_date.' '.$client->create_time))?></td>
            <td><?=$client->surname?> <?=$client->name?> <?=$client->fname?></td>
            <td><?=$client->auto_brend?> <?=$client->auto_model?> <?=$client->auto_numberplate?></td>
            <td><?=$client->region->name_ua?><br><?=($client->address_city!=''?$client->address_city!='':$client->acity->name_ua)?>, <?=$client->address_street?> <?=($client->address_house_num!=''?'д.'.$client->address_house_num:'')?> <?=($client->address_korp_num!=''?'корп.'.$client->address_korp_num:'')?> <?=($client->address_korp_num!=''?'кв.'.$client->address_app_num:'')?><br><?=$client->phone?><br><?=$client->email?></td>
            <td><?=$client->dregion->name_ua?><br><?=($client->delivery_city!=''?$client->delivery_city!='':$client->dcity->name_ua)?>, <?=$client->delivery_street?> <?=($client->delivery_house_num!=''?'д.'.$client->delivery_house_num:'')?> <?=($client->delivery_korp_num!=''?'корп.'.$client->delivery_korp_num:'')?> <?=($client->delivery_korp_num!=''?'кв.'.$client->delivery_app_num:'')?> </td>
            <td><?=$client->company->name_ua?></td>
            <td><?=$client->osago_franchise?></td>
            <td><?=$client->osago_payment?></td>
            <td style="min-width:125px;">
            	<?=CHtml::link('<span class="glyphicon glyphicon-list-alt"></span> ', Yii::app()->createUrl('/cp/index/print/'.$client->id),array('class' => 'btn btn-info btn-xs','title'=>'Сохранить XLS', 'target'=>'_blank'))?>&nbsp;&nbsp;
            	<?=CHtml::link('<span class="glyphicon glyphicon-cog"></span> ', Yii::app()->createUrl('/cp/index/edit/'.$client->id),array('class' => 'btn btn-success btn-xs','title'=>'Редактировать'))?>&nbsp;
            	<?=CHtml::link('<span class="glyphicon glyphicon-remove"></span> ', Yii::app()->createUrl('/cp/index/delete/'.$client->id),array('class' => 'btn btn-danger btn-xs del','title'=>'Удалить'))?>
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

<script>
  $(function() {
    $( ".datepickr" ).datepicker({
      dateFormat: "dd.mm.yy",
    });
  });
</script>