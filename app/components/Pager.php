<?php

//Yii::import('zii.widgets.grid.CLinkPager');
 
class Pager extends CLinkPager
{
    public $header = '';
    public $footer = '';
    public $prevPageLabel = '<<';
    public $nextPageLabel = '>>';
    public $firstPageLabel = 'Первая';
    public $lastPageLabel = '';
    public $maxButtonCount = '10';
    public $previousPageCssClass = '';
    public $firstPageCssClass = 'pages-first-a';
    public $nextPageCssClass = '';
    public $lastPageCssClass = 'pages-last-a';
    public $internalPageCssClass = '';
    public $selectedPageCssClass = 'active';

    public $htmlOptions = array(
        'class'=>'pagination'
    );
 
    public function __construct($owner=null)
    {        
        //$this->cssFile = Yii::app()->theme->baseUrl . '/css/pager.css';
        parent::__construct($owner);
    }

    protected function createPageButton($label,$page,$class,$hidden,$selected)
	{
		if($hidden || $selected)
			$class.=' '.($hidden ? $this->hiddenPageCssClass : $this->selectedPageCssClass);
		return CHtml::tag('li',array('class'=>$class),CHtml::link($label,$this->createPageUrl($page),''));
	}

	/**
	 * Executes the widget.
	 * This overrides the parent implementation by displaying the generated page buttons.
	 */
	public function run()
	{
		$this->registerClientScript();
		$this->lastPageLabel = 'Последняя('.$this->getPageCount().')';
		$buttons = array();
		$buttons = array_merge($buttons,$this->createFirstButtons());
		$buttons = array_merge($buttons,$this->createPageButtons());
		$buttons = array_merge($buttons,$this->createLastButtons());
		if(empty($buttons))
			return;
		echo $this->header;
		echo CHtml::tag('div',$this->htmlOptions,'<ul class="'.$this->htmlOptions['class'].'">'.implode("\n",$buttons).'</ul>');
		echo $this->footer;
	}

	/**
	 * Creates the page buttons.
	 * @return array a list of page buttons (in HTML code).
	 */
	protected function createPageButtons()
	{
		if(($pageCount=$this->getPageCount())<=1)
			return array();

		list($beginPage,$endPage)=$this->getPageRange();
		$currentPage=$this->getCurrentPage(false); // currentPage is calculated in getPageRange()
		$buttons=array();

		// internal pages
		for($i=$beginPage;$i<=$endPage;++$i)
			$buttons[]=$this->createPageButton($i+1,$i,$this->internalPageCssClass,false,$i==$currentPage);


		return $buttons;
	}

	protected function createFirstButtons()
	{
		if(($pageCount=$this->getPageCount())<=1)
			return array();

		list($beginPage,$endPage)=$this->getPageRange();
		$currentPage=$this->getCurrentPage(false); // currentPage is calculated in getPageRange()
		$buttons=array();

		// prev page
		if(($page=$currentPage-1)<0)
			$page=0;
		$buttons[] = $this->createPageButton($this->prevPageLabel,$page,$this->previousPageCssClass,$currentPage<=0,false);


		return $buttons;
	}

	protected function createLastButtons()
	{
		if(($pageCount=$this->getPageCount())<=1)
			return array();

		list($beginPage,$endPage)=$this->getPageRange();
		$currentPage=$this->getCurrentPage(false); // currentPage is calculated in getPageRange()
		$buttons=array();

		
		// next page
		if(($page=$currentPage+1)>=$pageCount-1)
			$page=$pageCount-1;
		$buttons[] = $this->createPageButton($this->nextPageLabel,$page,$this->nextPageCssClass,$currentPage>=$pageCount-1,false);


		return $buttons;
	}
}