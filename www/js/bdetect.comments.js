/*
	Browser Detect set v1.0
	Detects the browser and its version (IE6+, Opera, Firefox, Chrome, Safari )
	
	http://xiper.net/
	
	Author Andrei Kosyack
	
	Набор функций для определения имени и версии браузера.
	
	Функция browserDetectNav - определение браузера при помощи объекта Navigator
	Функция browserDetectJS  - определение браузера при помощи JS объектов и св-в
	Функция getBrowser	 - делает вывод о браузере на основании обоих методов
	
	Формат входящих и исходящих данный у всех функций одинаков.
	Методы не зависимы друг от друга, можно использовать любой или вместе.
	
	Входящие параметры: 		chrAfterPoint - целое число,
						определяющее кол-во знаков после запятой в возвращаемой версии браузера.
						Если оставить пустым - вернет все знаки после запятой.
	Возвращаемые параметры: 	outputData - массив, где
					outputData[0] - имя браузера,
					outputData[1] - основная версия браузера (значение до запятой),
					outputData[2] - знаки версии после запятой (кол-во определяется входящим параметром)
						если возвращается "undefined" - браузер (или версия) не определен (неизвестный)
						если не возвращается версия (в некоторых случаях) - браузер "маскированый"
*/

/*исправлено / добавлено определение ие11*/

function browserDetectNav(chrAfterPoint)
{
var 	UA=window.navigator.userAgent, // содержит переданный браузером юзерагент
//----------------------------------------------------------
	OperaB = /Opera[ \/]+\w+\.\w+/i,
	OperaV = /Version[ \/]+\w+\.\w+/i,	
	FirefoxB = /Firefox\/\w+\.\w+/i,// шаблоны для распарсивания юзерагента
	ChromeB = /Chrome\/\w+\.\w+/i,
	SafariB = /Version\/\w+\.\w+/i,
	IEB = /MSIE *\d+\.\w+/i,
	IEBt = /(?:(Trident)\/(\d+)\.(\w+)(?:.*)(?:(rv:)(\d+)\.(\w+)))|(?:(?:(MSIE) *(\d+)\.(\w+))+(?:.*)(Trident)\/(\d+)\.(\w+)(?:.*))/i, /* */
	SafariV = /Safari\/\w+\.\w+/i,//-----------------------------------------------------
	browser = new Array(), //массив с данными о браузере
	browserSplit = /[ \/\.]/i, //шаблон для разбивки данных о браузере из строки
	OperaV = UA.match(OperaV),
	Firefox = UA.match(FirefoxB),
	Chrome = UA.match(ChromeB),
	Safari = UA.match(SafariB),
	SafariV = UA.match(SafariV),
	IE = UA.match(IEB),
	IEt = UA.match(IEBt),
	Opera = UA.match(OperaB);
		
		//----- Opera ----
		if ((!Opera=="")&(!OperaV=="")) browser[0]=OperaV[0].replace(/Version/, "Opera")
				else 
					if (!Opera=="")	browser[0]=Opera[0]
						else
							//----- IE -----
							if (!IEt=="") {
								if ((IEt[1]=="Trident")&&(+IEt[5]>=11)) browser[0]='MSIE '+IEt[5]+'.'+IEt[6]+'/'+IEt[1]+' '+IEt[2]+'.'+IEt[3]  
								else if (((IEt[1]=="")||(IEt[1]==null))&&(IEt[10]=="Trident")&&(IEt[7]=='MSIE')) {
									if (+IEt[11]+4==+IEt[8]) browser[0]=IEt[7]+' '+IEt[8]+'.'+IEt[9]+'/'+IEt[10]+' '+IEt[11]+'.'+IEt[12];
										else browser[0]=IEt[7]+' '+IEt[8]+'.'+IEt[9]+' emulateFrom '+IEt[7]+' '+(+IEt[11]+4)+'/'+IEt[10]+' '+IEt[11]+'.'+IEt[12];}
								/*browser[0] = IE[0]*/
								} else 
									//----- Firefox ----
									if (!Firefox=="") browser[0]=Firefox[0]
										else
											//----- Chrom ----
											if (!Chrome=="") browser[0] = Chrome[0]
												else
													//----- Safari ----
													if ((!Safari=="")&&(!SafariV=="")) browser[0] = Safari[0].replace("Version", "Safari");
//------------ Разбивка версии -----------

	var
		outputData;  				     // возвращаемый функцией массив значений
							     // [0] - имя браузера, [1] - целая часть версии
							     // [2] - дробная часть версии
	if (browser[0] != null) outputData = browser[0].split(browserSplit);
	if (((chrAfterPoint == null)|(chrAfterPoint == 0))&(outputData != null)) 
		{
			chrAfterPoint=outputData[2].length;
			outputData[2] = outputData[2].substring(0, chrAfterPoint);
			return(outputData);
		}
			else
				if (chrAfterPoint != null) 
				{
					outputData[2] = outputData[2].substr(0, chrAfterPoint);
					return(outputData);					
				}
					else	return(false);
}

function browserDetectJS() {
var
	browser = new Array();
	
//Opera
	if (window.opera) {
		browser[0] = "Opera";
		browser[1] = window.opera.version();
	}
		else 
//Chrome	
		if (window.chrome) {
			browser[0] = "Chrome";
		}
			else
//Firefox
			if (window.sidebar) {
				browser[0] = "Firefox";
			}
				else
//Safari 
					if ((!window.external)&&(browser[0]!=="Opera")) {
						browser[0] = "Safari";
					}
						else
//IE
						if (window.ActiveXObject) {
							browser[0] = "MSIE";
							if (window.navigator.userProfile) browser[1] = "6"
								else 
									if (window.Storage) browser[1] = "8"
										else 
											if ((!window.Storage)&&(!window.navigator.userProfile)) browser[1] = "7"
												else browser[1] = "Unknown";
						}
	
	if (!browser) return(false)
		else return(browser);
}

function getBrowser(chrAfterPoint) {
	var
		browserNav = browserDetectNav(chrAfterPoint),	// хранит результат работы функции browserDetectNav
		browserJS = browserDetectJS();			// хранит результат работы функции browserDetectJS

// сравниваем результаты отработки двух методов
	if ((browserNav[0] == browserJS[0]) || ((browserNav[0] == 'MSIE') && (+browserNav[1]>=11)))  return(browserNav)	//если одинаковый - возвращаем рузальтат первого метода
		else
			if (browserNav[0] != browserJS[0]) return(browserJS) //если разный - возвращаем результат второго метода
				else
					return(false);	//в случае, если браузер не определен
}

function isItBrowser(browserCom, browserVer, detectMethod) {
var browser;										// контейнер для результатов обнаружения

switch (detectMethod) {								// определяемся какой из методов использовать (3-й параметр)
	case 1: browser = browserDetectNav(); break;	
	case 2: browser = browserDetectJS(); break;
	default: browser = getBrowser();
};

	if ((browserCom == browser[0])&(browserVer == browser[1])) return(true)						// если переданы два параметра и они совпали - возвращаем true
		else
			if ((browserCom == browser[0])&((browserVer == null)||(browserVer == 0))) return(true)	// если передан один параметр и он совпал - возвращаем true
				else return(false);	
};