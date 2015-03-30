<?php $this->renderPartial('breadcrumbs',array('breadcrumbs'=>(isset($breadcrumbs)?$breadcrumbs:array()))); ?>

<h1>Заявка, редактирование</h1>

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
		
		<?=MHtml::errorSummary($client); ?>

		<?=CHtml::form('','post',array('role'=>"form",'class'=>'')); ?>
	      	<div class="modal-body">

                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'surname')?>
                    <?=MHtml::activeTextField($client,'surname',array('placeholder'=>$client->getAttributeLabel('surname'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'name')?>
                    <?=MHtml::activeTextField($client,'name',array('placeholder'=>$client->getAttributeLabel('name'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'fname')?>
                    <?=MHtml::activeTextField($client,'fname',array('placeholder'=>$client->getAttributeLabel('fname'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'dob')?>
                    <?=MHtml::activeTextField($client,'dob',array('placeholder'=>$client->getAttributeLabel('dob'),'required'=>'required','class'=>'form-control datepicker3','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'dlicense_date')?>
                    <?=MHtml::activeTextField($client,'dlicense_date',array('placeholder'=>$client->getAttributeLabel('dlicense_date'),'required'=>'required','class'=>'form-control datepicker3','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'dlicense_seria')?>
                    <div class="row">
                        <div class="col-xs-2">
                            <?=MHtml::activeTextField($client,'dlicense_seria',array('placeholder'=>$client->getAttributeLabel('dlicense_seria'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'dlicense_num')?>
                    <div class="row">
                        <div class="col-xs-4">
                            <?=MHtml::activeTextField($client,'dlicense_num',array('placeholder'=>$client->getAttributeLabel('dlicense_num'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'dlicense_issued')?>
                    <?=MHtml::activeTextField($client,'dlicense_issued',array('placeholder'=>$client->getAttributeLabel('dlicense_issued'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'auto_brend')?>
                    <div class="row">
                        <div class="col-xs-4">
                            <?=MHtml::activeTextField($client,'auto_brend',array('placeholder'=>$client->getAttributeLabel('auto_brend'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'auto_model')?>
                    <div class="row">
                        <div class="col-xs-4">
                            <?=MHtml::activeTextField($client,'auto_model',array('placeholder'=>$client->getAttributeLabel('auto_model'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'auto_vin')?>
                    <div class="row">
                        <div class="col-xs-5">
                            <?=MHtml::activeTextField($client,'auto_vin',array('placeholder'=>$client->getAttributeLabel('auto_vin'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'auto_engine_volume')?>
                    <div class="row">
                        <div class="col-xs-3">
                            <?=MHtml::activeTextField($client,'auto_engine_volume',array('placeholder'=>$client->getAttributeLabel('auto_engine_volume'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'auto_numberplate')?>
                    <div class="row">
                        <div class="col-xs-3">
                            <?=MHtml::activeTextField($client,'auto_numberplate',array('placeholder'=>$client->getAttributeLabel('auto_numberplate'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'auto_year')?>
                    <div class="row">
                        <div class="col-xs-3">
                            <?=MHtml::activeTextField($client,'auto_year',array('placeholder'=>$client->getAttributeLabel('auto_year'),'required'=>'required','class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'city')?>
                    <div class="row">
                        <div class="col-xs-6">
                            <?php 
                                echo MHtml::activeDropDownList($client, 'city', CHtml::listData(City::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                            ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'id_region')?>
                    <div class="row">
                        <div class="col-xs-6">
                            <?php 
                                echo MHtml::activeDropDownList($client, 'id_region', CHtml::listData(Region::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                            ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'address_city')?>
                    <div class="row">
                        <div class="col-xs-5">
                            <?=MHtml::activeTextField($client,'address_city',array('placeholder'=>$client->getAttributeLabel('address_city'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'address_id_city')?>
                    <div class="row">
                        <div class="col-xs-6">
                            <?php 
                                echo MHtml::activeDropDownList($client, 'address_id_city', CHtml::listData(City::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                            ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'address_street')?>
                    <div class="row">
                        <div class="col-xs-5">
                            <?=MHtml::activeTextField($client,'address_street',array('placeholder'=>$client->getAttributeLabel('address_street'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'address_house_num')?>
                    <div class="row">
                        <div class="col-xs-2">
                            <?=MHtml::activeTextField($client,'address_house_num',array('placeholder'=>$client->getAttributeLabel('address_house_num'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'address_korp_num')?>
                    <div class="row">
                        <div class="col-xs-2">
                            <?=MHtml::activeTextField($client,'address_korp_num',array('placeholder'=>$client->getAttributeLabel('address_korp_num'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'address_app_num')?>
                    <div class="row">
                        <div class="col-xs-2">
                            <?=MHtml::activeTextField($client,'address_app_num',array('placeholder'=>$client->getAttributeLabel('address_app_num'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'address_index')?>
                    <div class="row">
                        <div class="col-xs-3">
                            <?=MHtml::activeTextField($client,'address_index',array('placeholder'=>$client->getAttributeLabel('address_index'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'inn')?>
                    <div class="row">
                        <div class="col-xs-5">
                            <?=MHtml::activeTextField($client,'inn',array('placeholder'=>$client->getAttributeLabel('inn'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'id_doc_type')?>
                    <div class="row">
                        <div class="col-xs-4">
                            <?php 
                                echo MHtml::activeDropDownList($client, 'id_doc_type', CHtml::listData(DocType::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                            ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'doc_seria')?>
                    <div class="row">
                        <div class="col-xs-2">
                            <?=MHtml::activeTextField($client,'doc_seria',array('placeholder'=>$client->getAttributeLabel('doc_seria'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'doc_num')?>
                    <div class="row">
                        <div class="col-xs-3">
                            <?=MHtml::activeTextField($client,'doc_num',array('placeholder'=>$client->getAttributeLabel('doc_num'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'doc_issued')?>
                    <div class="row">
                        <div class="col-xs-12">
                            <?=MHtml::activeTextField($client,'doc_issued',array('placeholder'=>$client->getAttributeLabel('doc_issued'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'doc_date')?>
                    <div class="row">
                        <div class="col-xs-4">
                            <?=MHtml::activeTextField($client,'doc_date',array('placeholder'=>$client->getAttributeLabel('doc_date'),'class'=>'form-control datepicker3','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'phone')?>
                    <div class="row">
                        <div class="col-xs-4">
                            <?=MHtml::activeTextField($client,'phone',array('placeholder'=>$client->getAttributeLabel('phone'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'email')?>
                    <div class="row">
                        <div class="col-xs-4">
                            <?=MHtml::activeTextField($client,'email',array('placeholder'=>$client->getAttributeLabel('email'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'delivery_id_region')?>
                    <div class="row">
                        <div class="col-xs-6">
                            <?php 
                                echo MHtml::activeDropDownList($client, 'delivery_id_region', CHtml::listData(Region::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                            ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'delivery_city')?>
                    <div class="row">
                        <div class="col-xs-5">
                            <?=MHtml::activeTextField($client,'delivery_city',array('placeholder'=>$client->getAttributeLabel('delivery_city'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'delivery_id_city')?>
                    <div class="row">
                        <div class="col-xs-6">
                            <?php 
                                echo MHtml::activeDropDownList($client, 'delivery_id_city', CHtml::listData(City::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                            ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'delivery_street')?>
                    <div class="row">
                        <div class="col-xs-5">
                            <?=MHtml::activeTextField($client,'delivery_street',array('placeholder'=>$client->getAttributeLabel('delivery_street'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'delivery_house_num')?>
                    <div class="row">
                        <div class="col-xs-2">
                            <?=MHtml::activeTextField($client,'delivery_house_num',array('placeholder'=>$client->getAttributeLabel('delivery_house_num'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'delivery_korp_num')?>
                    <div class="row">
                        <div class="col-xs-2">
                            <?=MHtml::activeTextField($client,'delivery_korp_num',array('placeholder'=>$client->getAttributeLabel('delivery_korp_num'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'delivery_app_num')?>
                    <div class="row">
                        <div class="col-xs-2">
                            <?=MHtml::activeTextField($client,'delivery_app_num',array('placeholder'=>$client->getAttributeLabel('delivery_app_num'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'id_company')?>
                    <div class="row">
                        <div class="col-xs-6">
                            <?php 
                                echo MHtml::activeDropDownList($client, 'id_company', CHtml::listData(Company::model()->findAll(array('order' => 'name_ua')), 'id', 'name_ua'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                            ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'id_license')?>
                    <div class="row">
                        <div class="col-xs-6">
                            <?php 
                                echo MHtml::activeDropDownList($client, 'id_license', CHtml::listData(License::model()->findAll(array('order' => 'id')), 'id', 'id'), array('required'=>'required','class'=>'form-control','autocomlete'=>'off'),'c'); 
                            ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'osago_payment')?>
                    <div class="row">
                        <div class="col-xs-2">
                            <?=MHtml::activeTextField($client,'osago_payment',array('placeholder'=>$client->getAttributeLabel('osago_payment'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off', 'disabled'=>'disabled'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'osago_franchise')?>
                    <div class="row">
                        <div class="col-xs-2">
                            <?=MHtml::activeTextField($client,'osago_franchise',array('placeholder'=>$client->getAttributeLabel('osago_franchise'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off', 'disabled'=>'disabled'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'dgo_sum')?>
                    <div class="row">
                        <div class="col-xs-3">
                            <?=MHtml::activeTextField($client,'dgo_sum',array('placeholder'=>$client->getAttributeLabel('dgo_sum'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off', 'disabled'=>'disabled'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'dgo_payment')?>
                    <div class="row">
                        <div class="col-xs-3">
                            <?=MHtml::activeTextField($client,'dgo_payment',array('placeholder'=>$client->getAttributeLabel('dgo_payment'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off', 'disabled'=>'disabled'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'dgo_rate')?>
                    <div class="row">
                        <div class="col-xs-3">
                            <?=MHtml::activeTextField($client,'dgo_rate',array('placeholder'=>$client->getAttributeLabel('dgo_rate'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off', 'disabled'=>'disabled'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'date_start')?>
                    <div class="row">
                        <div class="col-xs-3">
                            <?=MHtml::activeTextField($client,'date_start',array('placeholder'=>$client->getAttributeLabel('date_start'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off', 'disabled'=>'disabled'),'c'); ?>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabel($client, 'create_date')?>
                    <div class="row">
                        <div class="col-xs-3">
                            <?=MHtml::activeTextField($client,'create_date',array('placeholder'=>$client->getAttributeLabel('create_date'),'class'=>'form-control','autofocus'=>'autofocus','autocomlete'=>'off', 'disabled'=>'disabled'),'c'); ?>
                        </div>    
                    </div>
                </div>
	      	</div>
	      	<div class="modal-footer">
	        	<?=CHtml::submitButton(Yii::t('cabinet', 'Сохранить'), array('id' => "submit",'class'=>'btn btn-primary')); ?>
	      	</div>
      	<?=CHtml::endForm(); ?>
	</div>
</div>