<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<!-- Bootstrap -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/select2.css" rel="stylesheet">
	<link href="/css/select2-bootstrap.css" rel="stylesheet">
	<link href="/css/jquery-ui.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse  navbar-fixed-top" role="navigation">
		<div class="container">
			<p class="navbar-text"><strong style="color:#fff">Панель управления</strong></p>
			<ul role="" class="nav navbar-nav navbar-right">
				<li><a href="/cp/logout" class="btn btn-default navbar-btn lang1">Выйти</a></li>
			</ul>
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
			<? if (Yii::app()->user->role=='super'){
					$this->widget('Menu',array(
						'htmlOptions' => array( 'class' => 'nav nav-sidebar'),
						'items'=>array(
							array(
								'label'=>Yii::t('cabinet', 'Заявки'), 
								'url'=>array('/cp/index/'), 
								),
							array(
								'label'=>Yii::t('cabinet', 'Регионы'), 
								'url'=>array('/cp/region/'), 
								),
							array(
								'label'=>Yii::t('cabinet', 'Компании'), 
								'url'=>array('/cp/company/'), 
								),
							array(
								'label'=>Yii::t('cabinet', 'ДГО'), 
								'url'=>array('/cp/dgo/'), 
								),
							array(
								'label'=>Yii::t('cabinet', 'Категории ТС'), 
								'url'=>array('/cp/license/'), 
								),
							array(
								'label'=>Yii::t('cabinet', 'Осаго'), 
								'url'=>array('/cp/osago/'), 
								),
							array(
								'label'=>Yii::t('cabinet', 'Зоны'), 
								'url'=>array('/cp/zone/'), 
								),
							array(
								'label'=>Yii::t('cabinet', 'Пользователи'), 
								'url'=>array('/cp/user/'), 
								),
							array(
								'label'=>Yii::t('cabinet', 'Текстовые страницы'), 
								'url'=>array('/cp/pages/'), 
								),
						),
					));
				} else {
					$this->widget('Menu',array(
						'htmlOptions' => array( 'class' => 'nav nav-sidebar'),
						'items'=>array(
							array(
								'label'=>Yii::t('cabinet', 'Заявки'), 
								'url'=>array('/cp/osago/'), 
								),
						),
					));
				}
			?>
			</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="container">
		<p class="text-muted">&copy; <?=date('Y')?></p>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/js/bootstrap.js"></script>
	<script src="/js/jquery-ui.js"></script>
	<script src="/js/select2.js"></script>
	<script src="/js/phone.js"></script>
	<script src="/js/script.js"></script>
</body>
</html>