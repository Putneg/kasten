<?=MHtml::errorSummary($model); ?>
<form method="post" name="calculate">
	<div class="step2">
		<div class="row">
		    <h1><?=Yii::t('calc', 'Розрахуйте вартiсть полiса для вашого автомобiля')?></h1>
		</div>
		<div class="spacer"></div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="form-group col-md-7">
			    <label for="license"><?=Yii::t('calc', 'Тип транспортного засобу')?></label>
			    <select name="license" class="license s2 form-control" id="license" autocomplete="off">
			    	<option value="0"></option>
			    	<?foreach($license as $a):?>
			    	<option value="<?=$a->id?>"><?=$a->id?> - <?=$a->name?></option>
			    	<?endforeach;?>
			    </select>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="form-group col-md-7">
			    <label for="city"><?=Yii::t('calc', 'Місце реєстрації автомобіля')?></label>
			    <select name="city" class="city s2 form-control" id="city" autocomplete="off">
			    	<option value="0"></option>
			    	<?foreach($cities as $region):?>
			    	<optgroup label="<?=$region[0]->region->name?>" x-id="<?=$region[0]->region->id?>">
			    		<?foreach($region as $city):?>
			    			<option value="<?=$city->id?>" x-zone="<?=$city->id_zone?>"><?=$city->name?></option>
			    		<?endforeach;?>
		            </optgroup>
			    	<?endforeach;?>
			    </select>
			    <a href="#" tabindex="0" class="glyphicon glyphicon-info-sign tooltip_icon pop" data-container="body" data-toggle="popover" data-placement="right" data-content="<?=Yii::t('calc', 'Якщо ви не знайшли свого міста, зверніться до адміністрації сайту')?>" data-trigger="focus"></a>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="form-group col-md-7">
			    <label for="fr"><?=Yii::t('calc', 'Франшиза')?></label>
			    <select name="osago_franchise" class="fr s2 form-control" id="fr" autocomplete="off">
			    	<option value="0"><?=Yii::t('calc', 'Франшиза')?> 0 грн.</option>
			    	<option value="1000"><?=Yii::t('calc', 'Франшиза')?> 1000 грн.</option>
			    </select>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-7 bs-example-bg-classes">
			    <p class="bg-success"><?=Yii::t('calc', '<strong>Франшиза</strong> - передбачене умовами страхування звільнення страховика від відшкодування збитків страхувальника, що не перевищують заданої величини.')?></p>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="form-group col-md-7">
			    <div class="checkbox">
					<label>
						<input type="checkbox" value="1" name="enlarge" id="enlarge"  autocomplete="off">
						<strong><?=Yii::t('calc', 'Збільшення страхової суми')?></strong>
					</label>
				</div>
			    <select name="id_dgo" class="enlarge_sel s2 form-control" id="enlarge_sel" disabled="disabled">
			    	<option value="0"><?=Yii::t('calc', 'Оберіть місто')?></option>
			    </select>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-7 bs-example-bg-classes">
			    <p class="bg-success"><?=Yii::t('calc', '<strong>Від чого захистить «обов\'язкова Автоцивілка» (ОСЦПВ)?</strong></br>Згідно із законодавством, максимальна виплата Клієнту, яку може здійснити страхова компанія по ОСЦПВ, становить:</br>50 000 грн. (з майнових збитків); і</br>100 000 грн. (по збитку життю і здоров\'ю потерпілих)</br>За статистикою, більше ніж в 40% випадках ДТП, збиток, нанесений майну потерпілих, становить значно більше 50 000 грн. Таким чином, клієнт в 60% випадків піддає себе непередбаченого фінансовому ризику в десятки тисяч гривень.</br><strong>Як збільшити ліміт відповідальності по ОСЦПВ?</strong></br>Щоб уникнути фінансових неприємностей, які можуть виникнути у клієнта при ДТП, ми пропонуємо вам збільшити страхову суму за допомогою поліса ДЦВ.</br>наприклад:</br>У випадку, якщо збиток по майну третіх осіб становитиме 70 000 грн.,</br>50 000 грн. зможе покрити поліс обов\'язкової Автоцивілки, при цьому різницю в 20 000 грн. клієнту покриє поліс ДЦВ (добровільної Автоцивілки).</br>')?></p>
			</div>	
		</div>

		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-7 e_cont">
			</div>	
		</div>

		<div class="row">
			<div class="col-md-2"></div>
			<div class="form-group col-md-7">
			    <button type="button" class="btn btn-warning btn-lg btn-block calculate gap_5"><?=Yii::t('calc', 'Розрахувати вартiсть полiсу')?></button>
			</div>	
		</div>

		<div class="row step1">
			<div class="col-md-2"></div>
			<div class="col-md-7 bs-example-bg-classes">
			    <div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="pr"><?=Yii::t('calc', 'Вартiсть полiсу')?>: <span class="price">000</span> грн</h3>
						<button type="button" class="btn btn-warning btn-lg btn-block step2 gap_6"><?=Yii::t('calc', 'Замовити полiс')?></button>
					</div>
				</div>
			</div>	
		</div>

		<div class="errors e_city"><?=Yii::t('calc', 'Оберіть місто реєстрації автомобіля')?></div>
		<div class="errors e_ins"><?=Yii::t('calc', 'Виберiть тип транспортного засобу')?></div>
		<input type="hidden" name="id_company" value="">
		<input type="hidden" name="id_osago" value="">
		<input type="hidden" name="id_osago_zone" value="">
		<input type="hidden" name="id_osago_region" value="">
		<input type="hidden" name="osago_entity_flag" value="0">
		<input type="hidden" name="osago_payment" value="">
		<input type="hidden" name="dgo_sum" value="0">
		<input type="hidden" name="dgo_payment" value="0">
		<input type="hidden" name="dgo_rate" value="0">
	</div>
	<div class="step2_form form-horizontal">
		<div class="row">
			<div class="col-md-12 bs-example-bg-classes">
			    <div class="panel panel-success">
					<div class="panel-heading text-center">
						<h2 style="color:#000"><?=Yii::t('calc', 'Вартiсть полiсу')?>: <span class="price">000</span>грн</h2>
					</div>
				</div>
			</div>	
		</div>
		<div class="page-header">
		    <h4><?=Yii::t('calc', 'Анкета договору страхування')?></h4>
		    <p><?=Yii::t('calc', 'Шановний користувач, будь ласка будьте уважні заповнюючи анкету договору страхування.')?></p>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h4><?=Yii::t('calc', 'Інформація з водійського посвідчення')?></h4><br>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="surname" class="control-label"><?=Yii::t('calc', 'Прізвище')?></label>
					</div>
					<div class="col-xs-7">
					    <input type="text" class="form-control" id="surname" name="surname" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Прізвище')?>">
					</div>
					<div class="col-xs-2" style="line-height:34px; padding-left:0">
					    <span class="label label-default" style="font-size:18px">1</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="name" class="control-label"><?=Yii::t('calc', 'Ім\'я')?></label>
					</div>
					<div class="col-xs-7">
					    <input type="text" class="form-control" id="name" name="name" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Ім\'я')?>">
					</div>
					<div class="col-xs-2" style="line-height:34px; padding-left:0">
					    <span class="label label-default" style="font-size:18px">2</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="fname" class="control-label"><?=Yii::t('calc', 'По батькові')?></label>
					</div>
					<div class="col-xs-7">
					    <input type="text" class="form-control" id="fname" name="fname" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'По батькові')?>">
					</div>
					<div class="col-xs-2" style="line-height:34px; padding-left:0">
					    <span class="label label-default" style="font-size:18px">3</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="dob" class="control-label"><?=Yii::t('calc', 'Дата народження')?></label>
					</div>
					<div class="col-xs-7">
					    <input type="text" class="form-control datepicker" id="dob" name="dob" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Дата народження')?>">
					</div>
					<div class="col-xs-2" style="line-height:34px; padding-left:0">
					    <span class="label label-default" style="font-size:18px">4</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="dlicense_date" class="control-label"><?=Yii::t('calc', 'Дата видачі посвідчення')?></label>
					</div>
					<div class="col-xs-7">
					    <input type="text" class="form-control datepicker1" id="dlicense_date" name="dlicense_date" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Дата видачі посвідчення')?>">
					</div>
					<div class="col-xs-2" style="line-height:34px; padding-left:0">
					    <span class="label label-default" style="font-size:18px">5</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="" class="control-label"><?=Yii::t('calc', 'Водійське посвідчення')?></label>
					</div>
					<div class="col-xs-3">
						<label for="dlicense_seria"><?=Yii::t('calc', 'Серія')?></label>
					    <input type="text" class="form-control" id="dlicense_seria" name="dlicense_seria" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Серія')?>" maxlength="5">
					</div>
					<div class="col-xs-4">
						<label for="dlicense_num"><?=Yii::t('calc', 'Номер')?></label>
					    <input type="text" class="form-control" id="dlicense_num" name="dlicense_num" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Номер')?>"  maxlength="15">
					</div>
					<div class="col-xs-2" style="line-height:27px; padding-left:0; padding-top:28px">
					    <span class="label label-default" style="font-size:18px">6</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="dlicense_issued" class="control-label"><?=Yii::t('calc', 'Ким видано')?></label>
					</div>
					<div class="col-xs-7">
					    <input type="text" class="form-control" id="dlicense_issued" name="dlicense_issued" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Ким видано')?>">
					    <span class="help-block"><?=Yii::t('calc', 'Наприклад, ВРЕВ 1 м. Київ')?></span>
					</div>
					<div class="col-xs-2" style="line-height:34px; padding-left:0">
					    <span class="label label-default" style="font-size:18px">7</span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<br><br><h4><?=Yii::t('calc', 'Підказка по водійському посвідченню')?></h4>
				<img src="/img/driver_license.png" class="img-responsive" alt="<?=Yii::t('calc', 'Водійське посвідчення')?>">
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<h4><?=Yii::t('calc', 'Інформація з техпаспорта автомобіля')?></h4><br>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="auto_brend" class="control-label"><?=Yii::t('calc', 'Марка автомобіля')?></label>
					</div>
					<div class="col-xs-7">
					    <input type="text" class="form-control" id="auto_brend" name="auto_brend" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Марка автомобіля')?>">
					    <span class="help-block"><?=Yii::t('calc', 'Наприклад, VOLKSWAGEN (як в техпаспорті)')?></span>
					</div>
					<div class="col-xs-2" style="line-height:34px; padding-left:0">
					    <span class="label label-default" style="font-size:18px">1</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="auto_model" class="control-label"><?=Yii::t('calc', 'Модель автомобіля')?></label>
					</div>
					<div class="col-xs-7">
					    <input type="text" class="form-control" id="auto_model" name="auto_model" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Модель автомобіля')?>">
					    <span class="help-block"><?=Yii::t('calc', 'Наприклад, GOLF (як в техпаспорті)')?></span>
					</div>
					<div class="col-xs-2" style="line-height:34px; padding-left:0">
					    <span class="label label-default" style="font-size:18px">2</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="auto_vin" class="control-label"><?=Yii::t('calc', 'Номер кузова (VIN)')?></label>
					</div>
					<div class="col-xs-7">
					    <input type="text" class="form-control" id="auto_vin" name="auto_vin" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Номер кузова (VIN)')?>">
					    <span class="help-block"><?=Yii::t('calc', 'У разі відсутності номера кузова, вписується номер шасі і рами. Дані заповнюються з сведетельствует про реєстрацію ТЗ (техпаспорт).')?></span>
					</div>
					<div class="col-xs-2" style="line-height:34px; padding-left:0">
					    <span class="label label-default" style="font-size:18px">3</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="auto_engine_volume" class="control-label"><?=Yii::t('calc', 'Об\'єм двигуна')?></label>
					</div>
					<div class="col-xs-7">
					    <input type="text" class="form-control" id="auto_engine_volume" name="auto_engine_volume" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Об\'єм двигуна')?>">
					    <span class="help-block"><?=Yii::t('calc', 'В кубічних сантиметрах, наприклад 1600 (як в техпаспорті)')?></span>
					</div>
					<div class="col-xs-2" style="line-height:34px; padding-left:0">
					    <span class="label label-default" style="font-size:18px">4</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="auto_numberplate" class="control-label"><?=Yii::t('calc', 'Номерний знак')?></label>
					</div>
					<div class="col-xs-7">
					    <input type="text" class="form-control" id="auto_numberplate" name="auto_numberplate" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Номерний знак')?>">
					</div>
					<div class="col-xs-2" style="line-height:34px; padding-left:0">
					    <span class="label label-default" style="font-size:18px">5</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="auto_year" class="control-label"><?=Yii::t('calc', 'Рік випуску')?></label>
					</div>
					<div class="col-xs-7">
					    <input type="text" class="form-control" id="auto_year" name="auto_year" required="required" autocomplete="off" maxlength="4" placeholder="<?=Yii::t('calc', 'Рік випуску')?>">
					</div>
					<div class="col-xs-2" style="line-height:34px; padding-left:0">
					    <!-- span class="label label-default" style="font-size:18px">5</span> -->
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<br><br><h4><?=Yii::t('calc', 'Підказка по техпаспорту автомобіля')?></h4>
				<img src="/img/tech_pasport.png" class="img-responsive" alt="<?=Yii::t('calc', 'Водійське посвідчення')?>">
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<h4><?=Yii::t('calc', 'Загальна інформація')?></h4><br>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="inn" class="control-label"><?=Yii::t('calc', 'ІПН')?></label>
					</div>
					<div class="col-xs-8">
					    <input type="text" class="form-control" id="inn" name="inn" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'ІПН')?>" pattern="[0-9]{12,12}" maxlength="12">
					    <span class="help-block"><?=Yii::t('calc', 'Ідентифікаційний номер платника податків')?></span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="phone" class="control-label"><?=Yii::t('calc', 'Телефон')?></label>
					</div>
					<div class="col-xs-8">
					    <input type="phone" class="form-control" id="phone" name="phone" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Телефон')?>">
					    <span class="help-block"><?=Yii::t('calc', 'Наприклад +38 050 1234567')?></span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="email" class="control-label"><?=Yii::t('calc', 'Поштова скринька (e-mail)')?></label>
					</div>
					<div class="col-xs-8">
					    <input type="email" class="form-control" id="email" name="email" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Поштова скринька (e-mail)')?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="id_doc_type" class="control-label"><?=Yii::t('calc', 'Документ')?></label>
					</div>
					<div class="col-xs-8">
					    <select name="id_doc_type" class="id_doc_type s2 form-control" id="id_doc_type" autocomplete="off" >
					    	<?foreach($doc_type as $a):?>
					    	<option value="<?=$a->id?>"><?=$a->name?></option>
					    	<?endforeach;?>
					    </select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="doc_date" class="control-label"><?=Yii::t('calc', 'Дата видачі')?></label>
					</div>
					<div class="col-xs-8">
					    <input type="text" class="form-control datepicker1" id="doc_date" name="doc_date" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Дата видачі')?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="doc_issued" class="control-label"><?=Yii::t('calc', 'Ким видано')?></label>
					</div>
					<div class="col-xs-8">
					    <input type="text" class="form-control" id="doc_issued" name="doc_issued" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Ким видано')?>">
					    <span class="help-block"><?=Yii::t('calc', 'Наприклад, Суворовським РВ УМВС м. Київ')?></span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    
					</div>
					<div class="col-xs-4">
						<label for="doc_seria"><?=Yii::t('calc', 'Серія')?></label>
					    <input type="text" class="form-control" id="doc_seria" name="doc_seria" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Серія')?>"  maxlength="5">
					</div>
					<div class="col-xs-4">
						<label for="doc_num"><?=Yii::t('calc', 'Номер')?></label>
					    <input type="text" class="form-control" id="doc_num" name="doc_num" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Номер')?>"  maxlength="15">
					</div>
					<div class="col-xs-1" style="line-height:27px; padding-left:0; padding-top:28px">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="id_region" class="control-label"><?=Yii::t('calc', 'Поштовий індекс')?></label>
					</div>
					<div class="col-xs-8">
					    <input type="text" class="form-control" id="address_index" name="address_index" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Поштовий індекс')?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="id_region" class="control-label"><?=Yii::t('calc', 'Область')?></label>
					</div>
					<div class="col-xs-8">
					    <select name="id_region" class="id_region s2 form-control" id="id_region" autocomplete="off">
					    	<option value="0"></option>
					    	<?foreach($cities as $region):?>
					    	<option value="<?=$region[0]->region->id?>"><?=$region[0]->region->name?></option>
					    	<?endforeach;?>
					    </select>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="address_id_city" class="control-label"><?=Yii::t('calc', 'Місто')?></label>
					</div>
					<div class="col-xs-8">
					    <select name="address_id_city" class="address_id_city s2 form-control" id="address_id_city" autocomplete="off">
					    	<option value="0"></option>
					    </select>
					    <span class="help-block"><?=Yii::t('calc', 'Якщо вашого міста немає в списку, введіть його в поле нижче')?></span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					</div>
					<div class="col-xs-8">
					    <input type="text" class="form-control" id="address_city" name="address_city" autocomplete="off" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="address_street" class="control-label"><?=Yii::t('calc', 'Назва вулиці')?></label>
					</div>
					<div class="col-xs-8">
					    <input type="text" class="form-control" id="address_street" name="address_street" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Назва вулиці')?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					</div>
					<div class="col-xs-3">
					    <label for="address_house_num"><?=Yii::t('calc', 'Будинок')?></label>
					    <input type="text" class="form-control" id="address_house_num" name="address_house_num" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Будинок')?>">
					</div>
					<div class="col-xs-3">
						<label for="address_korp_num"><?=Yii::t('calc', 'Корпус')?></label>
					    <input type="text" class="form-control" id="address_korp_num" name="address_korp_num" autocomplete="off" placeholder="<?=Yii::t('calc', 'Корпус')?>">
					</div>
					<div class="col-xs-3">
						<label for="address_app_num"><?=Yii::t('calc', 'Квартира')?></label>
					    <input type="text" class="form-control" id="address_app_num" name="address_app_num" autocomplete="off" placeholder="<?=Yii::t('calc', 'Квартира')?>">
					</div>
					<div class="col-xs-1" style="line-height:27px; padding-left:0; padding-top:28px">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<h4><?=Yii::t('calc', 'Інформація про доставку')?></h4><br>
				<div class="form-group">
					<div class="col-xs-11">
					    <div class="checkbox">
							<label>
								<input type="checkbox" value="1" name="delivery" id="delivery"  autocomplete="off">
								<strong><?=Yii::t('calc', 'Адреса доставки збігається з адресою реєстрації')?></strong>
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="delivery_id_region" class="control-label"><?=Yii::t('calc', 'Область')?></label>
					</div>
					<div class="col-xs-8">
					    <select name="delivery_id_region" class="delivery_id_region s2 form-control" id="delivery_id_region" autocomplete="off">
					    	<option value="0"></option>
					    	<?foreach($cities as $region):?>
					    	<option value="<?=$region[0]->region->id?>"><?=$region[0]->region->name?></option>
					    	<?endforeach;?>
					    </select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="delivery_id_city" class="control-label"><?=Yii::t('calc', 'Місто')?></label>
					</div>
					<div class="col-xs-8">
					    <select name="delivery_id_city" class="delivery_id_city s2 form-control" id="delivery_id_city" autocomplete="off">
					    	<option value="0"></option>
					    </select>
					    <span class="help-block"><?=Yii::t('calc', 'Якщо вашого міста немає в списку, введіть його в поле нижче')?></span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					</div>
					<div class="col-xs-8">
					    <input type="text" class="form-control" id="delivery_city" name="delivery_city" autocomplete="off" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					    <label for="delivery_street" class="control-label"><?=Yii::t('calc', 'Назва вулиці')?></label>
					</div>
					<div class="col-xs-8">
					    <input type="text" class="form-control" id="delivery_street" name="delivery_street" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Назва вулиці')?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3">
					</div>
					<div class="col-xs-3">
					    <label for="delivery_house_num"><?=Yii::t('calc', 'Будинок')?></label>
					    <input type="text" class="form-control" id="delivery_house_num" name="delivery_house_num" required="required" autocomplete="off" placeholder="<?=Yii::t('calc', 'Будинок')?>">
					</div>
					<div class="col-xs-3">
						<label for="delivery_korp_num"><?=Yii::t('calc', 'Корпус')?></label>
					    <input type="text" class="form-control" id="delivery_korp_num" name="delivery_korp_num" autocomplete="off" placeholder="<?=Yii::t('calc', 'Корпус')?>">
					</div>
					<div class="col-xs-3">
						<label for="delivery_app_num"><?=Yii::t('calc', 'Квартира')?></label>
					    <input type="text" class="form-control" id="delivery_app_num" name="delivery_app_num" autocomplete="off" placeholder="<?=Yii::t('calc', 'Квартира')?>">
					</div>
					<div class="col-xs-1" style="line-height:27px; padding-left:0; padding-top:28px">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-xs-4">
					    <label for="date_start" class="control-label"><?=Yii::t('calc', 'Дата початку дії договору страхування')?></label>
					</div>
					<div class="col-xs-2">
					    <input type="text" class="form-control datepicker2" id="date_start" name="date_start" required="required" autocomplete="off" placeholder="">
					</div>
					<div class="col-xs-6">
					    <span class="help-block"><?=Yii::t('calc', 'Організація, випуск та доставка поліса страхування виконується на наступний день після оплати')?></span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
					    <div class="checkbox">
							<label>
								<input type="checkbox" value="1" name="accept1" id="accept1" required="required">
								<strong><?=Yii::t('calc', 'Я ознайомлений зі змістом Закону України "Про ОСЦПВ ВНТЗ", про надання недостовірних даних моєї безаварійності')?></strong>
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
					    <div class="checkbox">
							<label>
								<input type="checkbox" value="1" name="accept2" id="accept2" required="required">
								<strong><?=Yii::t('calc', 'Я даю згоду на збір, обробку, використання і зберігання моїх особистих даних. Також я підтверджую, що ознайомлений з особливостями використання і захисту особистих даних, встановленими законом України "Про захист особистих даних" та іншим чинним законодавством.')?></strong>
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-6">
						<button type="button" class="btn btn-default btn-lg btn-block back_btn"><?=Yii::t('calc', 'Повернутися на попередню сторінку')?></button>
					</div>
					<div class="col-xs-6">
						<button type="submit" class="btn btn-warning btn-lg btn-block submit_form pull-right"><?=Yii::t('calc', 'Зберегти і перейти на сторінку оплати')?></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>