/*подгрузска скриптов*/
function dhtmlLoadScript(url)
	{
	   var e = document.createElement("script");
	   e.src = url;
	   e.type="text/javascript";
	   document.getElementsByTagName("head")[0].appendChild(e); 
	}

/*определение браузера ->>*/
var brName="";
function bdetect() /*bdetect.comments.js*/
	{
	   
	   data = getBrowser();
		/* ставим условие, в котором определяем нужный нам браузер и его версию, также добавляем класс html */
	   brName = (data[0]=="MSIE" && data[1]=="7")?"ie7"+((data[3]=='emulateFrom')?' '+data[3]+data[4]+data[5]:''):
				(data[0]=="MSIE" && data[1]=="8")?"ie8"+((data[3]=='emulateFrom')?' '+data[3]+data[4]+data[5]:''):
				(data[0]=="MSIE" && data[1]=="9")?"ie9"+((data[3]=='emulateFrom')?' '+data[3]+data[4]+data[5]:''):
				(data[0]=="MSIE" && data[1]=="10")?"ie10"+((data[3]=='emulateFrom')?' '+data[3]+data[4]+data[5]:''):
				(data[0]=="MSIE" && data[1]=="11")?"ie11"+((data[3]=='emulateFrom')?' '+data[3]+data[4]+data[5]:''):
				(data[0]=="Safari" )?'Safari'+data[1].toString():
				(data[0]=="Chrome" )?'Chrome'+data[1].toString():
				(data[0]=="Opera" )?'Opera'+data[1].toString():
				(data[0]=="Firefox" )?'Firefox'+data[1].toString():'';
		
	
	var onLoadHandler = window.onload;	
	window.onload=function () {
		(brName != "")?$('body').addClass(brName.toString()):
		(brName == "" && data[0] != null)?$('body').addClass(data[0].toString()+data[1].toString()):$('body').addClass('Browser_undefined');
		
		return false;
	}
		
		/*добавление в ие7-8 2 скрипта ! Важно в случае перемещения скриптовых файлов необходимо корректировать пути к ним (ниже) для корректной работы в ie7-8*/	
	if (((brName.search(/ie7/)>=0) && (brName.search(/ie7/)<3)) || ((brName.search(/ie8/)>=0) && (brName.search(/ie8/)<3))) {
		dhtmlLoadScript('js/html5shiv.js');
		dhtmlLoadScript('js/iepngfix_tilebg.js');
			 
	}	
	/*alert (typeof (onLoadHandler));*/
	if (typeof(onLoadHandler) == "function") onLoadHandler();
	return false;
}
bdetect();
/* <<- определение браузера */
//----------------------------------------------------------------------------------------
//
//<scrollgettingInfo> 
var getPageScroll = (window.pageXOffset != undefined) ?
  function() {
    return {
      left: pageXOffset,
      top: pageYOffset
    };
  } :
  function() {
    var html = document.documentElement;
    var body = document.body;

    var top = html.scrollTop || body && body.scrollTop || 0;
    top -= html.clientTop;

    var left = html.scrollLeft || body && body.scrollLeft || 0;
    left -= html.clientLeft;

    return { top: top, left: left };
  }
  //</scrollgettingInfo> 
  
  
  //make scroll
  
  function scrolling (currentY, targetY, dY, rY) {
			var windowY = document.documentElement.clientHeight;
			if (Math.abs(currentY+windowY-targetY)<dY) { return false }
			else { if (currentY+windowY<targetY) { 
					window.scrollBy(0,dY); 
					currentY+=dY;
					} 
					else { 
					window.scrollBy(0,-dY); 
					currentY-=dY;
					}
				var vcurpos = getPageScroll();
				currentY = vcurpos.top;
				if (Math.abs(currentY+windowY-targetY)<dY) { 
					window.scrollTo(0, targetY);
					return false 
					} 
					else { setTimeout(function() {scrolling(currentY, targetY, dY);}, rY);
					} 
				}
			return false;
		}
  //make scroll </>
  
  /*пропорции для img ~ адаптация*/
  
  var fixNaturalWHLoad = function(tEl) {
				tEl.el.naturalWidth = tEl.width;
				tEl.el.naturalHeight = tEl.height;
				jQuery(tEl.el).each( function () {
					var tempWidth = tEl.el.naturalWidth; //need some crossBrouseership here
					var tempHeight = tEl.el.naturalHeight;
					var basicRatio = tempWidth / tempHeight;
					var tempLeft = 0;
					var tempTop = 0;
					tEl.container = jQuery(tEl.el).parent().eq(0);
					tEl.containerWidth = parseInt(tEl.container.width())*1;
					tEl.containerHeight = parseInt(tEl.container.height())*1;
					if (tEl.containerHeight != 0)  {tEl.containerRatio = (tEl.containerWidth / tEl.containerHeight); } 
						else {tEl.containerRatio = 0;}
					if ( (tEl.containerRatio <= basicRatio) ) {
						tempTop = parseInt(1*(tEl.containerHeight - tempHeight*(tEl.containerWidth/tempWidth))/2); 
						jQuery(this).css({'width':''+tEl.containerWidth+'px', 'height':'auto', 'marginTop':''+tempTop+'px', 'marginLeft':'0'});
					} else {
						tempLeft = parseInt(1*(tEl.containerWidth - tempWidth*(tEl.containerHeight/tempHeight))/2); 
						jQuery(this).css({'width':'auto', 'height':''+tEl.containerHeight+'px', 'marginLeft':''+tempLeft+'px', 'marginTop':'0'});
					}
					/*if ( (tEl.containerRatio >= basicRatio) ) {
						tempTop = parseInt(1*(tEl.containerHeight - tempHeight*(tEl.containerWidth/tempWidth))/2); 
						jQuery(this).css({'width':''+tEl.containerWidth+'px', 'height':'auto', 'marginTop':''+tempTop+'px'});
					} else {
						tempLeft = parseInt(1*(tEl.containerWidth - tempWidth*(tEl.containerHeight/tempHeight))/2); 
						jQuery(this).css({'width':'auto', 'height':''+tEl.containerHeight+'px', 'marginLeft':''+tempLeft+'px'});
					}*/ /*другой механизм!!! сохранил на всякий случай, и нужно перепилять чутка!*/
				});

				tEl.el = null;
				tEl = null;
		}

		var reSizePlaceImg = function(selector) {
				jQuery(selector).each(function () {
					var tempImg = new Image();
					tempImg.el = this;
					tempImg.src = tempImg.el.src;
					fixNaturalWHLoad(tempImg);
			});
		}
  /*пропорции для img ~ адаптация*/
/*привязка кликов*/
	var clickOnImage = function(selectorLink, destinationImg) {
			jQuery(selectorLink).on('click', function (event) {
				event=event || window.event;
				(event.preventDefault) ? event.preventDefault() : event.returnValue = false;
				var link = jQuery(this);
				var parent_ul = link.parents('ul').eq(0);
				var all_li = parent_ul.find('li');
				var parent_li = link.parent().eq(0);
				all_li.removeClass('active').eq(all_li.index(parent_li)).addClass('active');
				var big = jQuery(destinationImg).get(0);
				big.src = link.children('img').get(0).src;
				var tempImg = new Image();
				tempImg.el = big;
				tempImg.src = tempImg.el.src;
				fixNaturalWHLoad(tempImg);
				tempImg.el = null;
				tempImg= null;
				return false;
			}).eq(0).click();
		}

/*привязка кликов </> */


function fixfontsize (selector) {
	/*определение размеров текста */
		function inlineSize(el) {
		 	var clone = jQuery(el).clone().eq(0).css({'left':'-10000px', 'top':'-10000px', 'height':'auto', 'width':'auto', 'position':'absolute'}).insertAfter(el);
		  	rect = {width:clone.outerWidth(),height:clone.outerHeight()};
		  	clone.remove();
		  	return rect;
		}
		/**/
		jQuery(selector).each(function(){
			var el =jQuery(this);
			var fontSize = parseInt(el.css('fontSize'));
			var rect_el = inlineSize(el.get(0));
			var rect_cont = {width:parseInt(el.parent().eq(0).outerWidth())-parseInt(el.parent().eq(0).css('paddingLeft'))-parseInt(el.parent().eq(0).css('paddingRight')), height:parseInt(el.parent().eq(0).outerHeight())-parseInt(el.parent().eq(0).css('paddingTop'))-parseInt(el.parent().eq(0).css('paddingBottom'))};
			while (rect_el.width>=rect_cont.width) {
				fontSize-=1;
				el.css({'fontSize':''+fontSize+'px'});
				rect_el = inlineSize(el.get(0));
				if (fontSize==1) break;
			}
		});
	}



/*определение размеров текста </> */


jQuery(window).load(function() {
	/*scroll*/
	jQuery('#row2scroll').on('click', function(event) {
		event=event || window.event;
		(event.preventDefault) ? event.preventDefault() : event.returnValue = false;
		var vfooter = jQuery('#footer');
		var vfpos = vfooter.offset();
			vfpos.top+=vfooter.outerHeight();
		var vcurpos = getPageScroll();
		var stepY =5;
		var rate = 50;

		

		setTimeout( function() {scrolling(vcurpos.top, vfpos.top, stepY);}, rate);
		return false;
	});
	/*scroll </>*/
	/*пропорции для img ~ адаптация*/
			
		reSizePlaceImg('.favorites_page img, .product_page img, .card_product_page img, .blog_page img, .blog_innerpage img');

	/*привязка кликов*/
		clickOnImage('.card_product_area .left_image_area .small_images li>a', '.card_product_area .left_image_area .big img');
	/*пропорции для img </> */
	/*подгонка размера шрифта*/
		fixfontsize ('.product_inner_menu a, .row_blog .container .left_side a');
		
		/* это для rma -радиального меню /субменю, но лучше не использовать. т.к. оно изначально скрыто эффект чутка не тот~
		jQuery('.rma .radialsubmenu a').hover(
			function() {
				el =jQuery(this);
				el.get(0).setAttribute('oldFontSize',el.css('fontSize'));
				fixfontsize(el);
			},
			function(){
				el=jQuery(this);
				attr= el.get(0).getAttribute('oldFontSize');
				(attr.length>0) ? el.css('fontSize',attr): false;

			}
		);*/


});

var rma_timerID;

jQuery(document).ready(function() {
	/*поддержка placeholder - подсказки в инпутах на ие 7-9>>>*/

    if ((isInputSupported = 'placeholder' in document.createElement('input'))!==true){
        jQuery('input[placeholder]').each(function(){
            if (jQuery(this).val()=='')jQuery(this).val(jQuery(this).attr('placeholder')) ;
        })
        jQuery('input[placeholder]').focus(function(){
            if (jQuery(this).attr('placeholder')==jQuery(this).val())jQuery(this).val('');
        });
        jQuery('input[placeholder]').blur(function(){
            if (jQuery(this).val()=='')jQuery(this).val(jQuery(this).attr('placeholder'));
        })
    }

/*поддержка placeholder <<<*/

	jQuery('.radialicon, .rma>ul>li>a, .radialsubmenu').hover(
			function () {
				if (jQuery('.rma>ul>li').hasClass('hovered')) {
					jQuery('.rma>ul>li').removeClass('hovered');
				} else
				{}
				jQuery(this).parent().eq(0).addClass('hovered');
				clearTimeout(rma_timerID);
			},
			function () {
				rma_timerID = setTimeout(function() {
					if (jQuery('.rma>ul>li>a:hover, .radialicon:hover, .radialsubmenu:hover').length>0) {} else
						{
							jQuery('.rma>ul>li').removeClass('hovered');
						}
					}
				, 1000);
			}

		);

});