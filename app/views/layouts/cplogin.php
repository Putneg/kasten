<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<!-- Bootstrap -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/jquery-ui.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<style type="text/css" media="screen">
		body {
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: #eee;
		}

		.form-signin {
		  max-width: 330px;
		  padding: 15px;
		  margin: 0 auto;
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
		  margin-bottom: 10px;
		}
		.form-signin .checkbox {
		  font-weight: normal;
		}
		.form-signin .form-control {
		  position: relative;
		  height: auto;
		  -webkit-box-sizing: border-box;
		     -moz-box-sizing: border-box;
		          box-sizing: border-box;
		  padding: 10px;
		  font-size: 16px;
		}
		.form-signin .form-control:focus {
		  z-index: 2;
		}
		.form-signin input[type="email"] {
		  margin-bottom: -1px;
		  border-bottom-right-radius: 0;
		  border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
		  margin-bottom: 10px;
		  border-top-left-radius: 0;
		  border-top-right-radius: 0;
		}
		
	</style>
    <div class="container">
    <?
    	$form = new Users;
    ?>
    <?=CHtml::form('','post',array('role'=>"form",'class'=>'form-signin')); ?>
		<?=MHtml::errorSummary($form); ?><br>
		<h1><?=Yii::t('main', 'Авторизaция')?></h1>
		<?=MHtml::activeTextField($form, 'login',array('placeholder'=>'Логин','required'=>'required','autofocus'=>'autofocus','class'=>'form-control'),'Login') ?>
		<?=MHtml::activePasswordField($form, 'password',array('placeholder'=>'Пароль','required'=>'required','autofocus'=>'autofocus','class'=>'form-control','autocomplete'=>'off'),'Login') ?>
		<?=CHtml::submitButton(Yii::t('main', 'Войти'), array('id' => "submit",'class'=>'btn btn-lg btn-primary btn-block')); ?>
		<br>
	<?=CHtml::endForm(); ?>

    </div> <!-- /container -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/js/bootstrap.js"></script>
</body>
</html>