<div style="padding:0 0 0 10px; width:950px;">
	<div class="blog-header">
		<h1 class="blog-title"><?=$page->header?></h1>
	</div>
	<div class="row">
		<? if ($subpages) foreach ($subpages as $sp):?>
		<div class="row">
			<? if ($sp->image!=''):?>
			<div class="col-xs-3"><img src="/images/<?=$sp->image?>" class="img-thumbnail"></div>
			<?endif;?>
			<div  class="col-xs-<?=($sp->image!=''?'9':'12')?>">
				<span><?=date("d.m.Y",strtotime($sp->date_create))?></span>
				<h3><?=$sp->header?></h3>
				<p>
					<?
					$tmp = explode(" ", strip_tags($sp->text));
					for ($i=0; $i<50;$i++) if (isset($tmp[$i])) echo $tmp[$i].' ';
					?>...
				</p>
				<a class="btn btn-default" href="<?=$this->createUrl('news/index',array('url'=>($sp->url!=''?$sp->url:$sp->id)));?>" role="button"><?=Yii::t('calc', 'Детальнiше')?></a>
			</div>
		</div><br><br>
		<? endforeach;?>
	</div>
	<? if (isset($total) && $total>5):?>
	    <?php $this->widget('Pager',array(
	             'pages'=>$pages, 
	     )); ?>

	<? endif?><br>
</div>