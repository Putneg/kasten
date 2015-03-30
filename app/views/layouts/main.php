<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta charset="utf-8">		
		<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE"/>
		<!--stylesheets -->
		<link rel="stylesheet" href="/css/style.css">
		<!--scripts -->
		<script type="text/javascript" src="/js/jquery-1.11.1.js"></script>
		<script tyoe="text/javascript" src="/js/bdetect.comments.js"></script>

		<!--[if lt IE 9]>
    	<script type="text/javascript" src="js/html5shiv.js"></script>
    	<script type="text/javascript" src="js/iepngfix_tilebg.js"></script>
		<![endif]-->
	

		<!-- main script -->
		<script type="text/javascript" src="/js/script.js"></script>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>
	<body class="main">
		<div id="super">	
			<header id="header"> <!-- header-->
				<div class="container">
					<a href="<?=$this->createUrl('/index')?>" class="logo"></a>
					<nav class="headerMenu">
						<?php

	                    $menuItems = array(
	                        array(
	                            'label' => 'Главная',
	                            'url' => array('/index'),
	                            'active' => Yii::app()->controller->action->id == 'index' ? true : false
	                        ),
	                        array(
	                            'label' => 'КАТАЛОГ ТЕХНИКИ',
	                            'url' => array('/catalog'),
	                        ),
	                        array(
	                            'label' => 'Блог',
	                            'url' => array('/blog'),
	                        ),
	                        array(
	                            'label' => 'Контакты',
	                            'url' => array('/contacts'),
	                        ),
	                    );
	                    $this->widget('Menu', array(
	                        'htmlOptions' => array('class' => 'nav navbar-nav'),
	                        'items' => $menuItems,
	                    )); ?>
					</nav>
					<div class="phone">+ 7 (495) 517-9397</div>

					<div class="clear"></div>
				</div>	
			</header><!-- /header -->
			
			<div id="center"> <!-- center -->
				<?php echo $content; ?>
				<div class="clear"></div>
			</div> <!-- /center -->
			<div class="clear"></div>
			<div class="footer_spacer"></div> <!--/footer spacer -->	
		</div>

		<footer id="footer"> <!-- footer-->
			<div class="container">
				<ul class="social">
					<li><a href=""></a></li>
					<li><a href=""></a></li>
					<li><a href=""></a></li>
					<li><a href=""></a></li>
				</ul>	
			</div>
		</footer> <!-- /footer-->
	</body>

</html>