<?php

$html = '<html>
<head><title>Sample Page</title></head>
<body></body>
</html>';

$ie_compat = '<script>if(navigator.userAgent.match(/MSIE|Internet Explorer/i)||navigator.userAgent.match(/Trident\/7\..*?rv:11/i)){var href=document.location.href;if(!href.match(/[?&]nowprocket/)){if(href.indexOf("?")==-1){if(href.indexOf("#")==-1){document.location.href=href+"?nowprocket=1"}else{document.location.href=href.replace("#","?nowprocket=1#")}}else{if(href.indexOf("#")==-1){document.location.href=href+"&nowprocket=1"}else{document.location.href=href.replace("#","&nowprocket=1#")}}}}</script>';

$delay_js = '<script>class RocketLazyLoadScripts{constructor(){this.v="1.2.5.1",this.triggerEvents=["keydown","mousedown","mousemove","touchmove","touchstart","touchend","wheel"],this.userEventHandler=this._triggerListener.bind(this),this.touchStartHandler=this._onTouchStart.bind(this),this.touchMoveHandler=this._onTouchMove.bind(this),this.touchEndHandler=this._onTouchEnd.bind(this),this.clickHandler=this._onClick.bind(this),this.interceptedClicks=[],this.interceptedClickListeners=[],this._interceptClickListeners(this),window.addEventListener("pageshow",e=>{this.persisted=e.persisted,this.everythingLoaded&&this._triggerLastFunctions()}),document.addEventListener("DOMContentLoaded",()=>{this._preconnect3rdParties()}),this.delayedScripts={normal:[],async:[],defer:[]},this.trash=[],this.allJQueries=[]}_addUserInteractionListener(e){if(document.hidden){e._triggerListener();return}this.triggerEvents.forEach(t=>window.addEventListener(t,e.userEventHandler,{passive:!0})),window.addEventListener("touchstart",e.touchStartHandler,{passive:!0}),window.addEventListener("mousedown",e.touchStartHandler),document.addEventListener("visibilitychange",e.userEventHandler)}_removeUserInteractionListener(){this.triggerEvents.forEach(e=>window.removeEventListener(e,this.userEventHandler,{passive:!0})),document.removeEventListener("visibilitychange",this.userEventHandler)}_onTouchStart(e){"HTML"!==e.target.tagName&&(window.addEventListener("touchend",this.touchEndHandler),window.addEventListener("mouseup",this.touchEndHandler),window.addEventListener("touchmove",this.touchMoveHandler,{passive:!0}),window.addEventListener("mousemove",this.touchMoveHandler),e.target.addEventListener("click",this.clickHandler),this._disableOtherEventListeners(e.target,!0),this._renameDOMAttribute(e.target,"onclick","rocket-onclick"),this._pendingClickStarted())}_onTouchMove(e){window.removeEventListener("touchend",this.touchEndHandler),window.removeEventListener("mouseup",this.touchEndHandler),window.removeEventListener("touchmove",this.touchMoveHandler,{passive:!0}),window.removeEventListener("mousemove",this.touchMoveHandler),e.target.removeEventListener("click",this.clickHandler),this._disableOtherEventListeners(e.target,!1),this._renameDOMAttribute(e.target,"rocket-onclick","onclick"),this._pendingClickFinished()}_onTouchEnd(){window.removeEventListener("touchend",this.touchEndHandler),window.removeEventListener("mouseup",this.touchEndHandler),window.removeEventListener("touchmove",this.touchMoveHandler,{passive:!0}),window.removeEventListener("mousemove",this.touchMoveHandler)}_onClick(e){e.target.removeEventListener("click",this.clickHandler),this._disableOtherEventListeners(e.target,!1),this._renameDOMAttribute(e.target,"rocket-onclick","onclick"),this.interceptedClicks.push(e),e.preventDefault(),e.stopPropagation(),e.stopImmediatePropagation(),this._pendingClickFinished()}_replayClicks(){window.removeEventListener("touchstart",this.touchStartHandler,{passive:!0}),window.removeEventListener("mousedown",this.touchStartHandler),this.interceptedClicks.forEach(e=>{e.target.dispatchEvent(new MouseEvent("click",{view:e.view,bubbles:!0,cancelable:!0}))})}_interceptClickListeners(e){EventTarget.prototype.addEventListenerBase=EventTarget.prototype.addEventListener,EventTarget.prototype.addEventListener=function(t,i,r){"click"!==t||e.windowLoaded||i===e.clickHandler||e.interceptedClickListeners.push({target:this,func:i,options:r}),(this||window).addEventListenerBase(t,i,r)}}_disableOtherEventListeners(e,t){this.interceptedClickListeners.forEach(i=>{i.target===e&&(t?e.removeEventListener("click",i.func,i.options):e.addEventListener("click",i.func,i.options))}),e.parentNode!==document.documentElement&&this._disableOtherEventListeners(e.parentNode,t)}_waitForPendingClicks(){return new Promise(e=>{this._isClickPending?this._pendingClickFinished=e:e()})}_pendingClickStarted(){this._isClickPending=!0}_pendingClickFinished(){this._isClickPending=!1}_renameDOMAttribute(e,t,i){e.hasAttribute&&e.hasAttribute(t)&&(event.target.setAttribute(i,event.target.getAttribute(t)),event.target.removeAttribute(t))}_triggerListener(){this._removeUserInteractionListener(this),"loading"===document.readyState?document.addEventListener("DOMContentLoaded",this._loadEverythingNow.bind(this)):this._loadEverythingNow()}_preconnect3rdParties(){let e=[];document.querySelectorAll("script[type=rocketlazyloadscript][data-rocket-src]").forEach(t=>{let i=t.getAttribute("data-rocket-src");if(i&&0!==i.indexOf("data:")){0===i.indexOf("//")&&(i=location.protocol+i);try{let r=new URL(i).origin;r!==location.origin&&e.push({src:r,crossOrigin:t.crossOrigin||"module"===t.getAttribute("data-rocket-type")})}catch(n){}}}),e=[...new Map(e.map(e=>[JSON.stringify(e),e])).values()],this._batchInjectResourceHints(e,"preconnect")}async _loadEverythingNow(){this.lastBreath=Date.now(),this._delayEventListeners(this),this._delayJQueryReady(this),this._handleDocumentWrite(),this._registerAllDelayedScripts(),this._preloadAllScripts(),await this._loadScriptsFromList(this.delayedScripts.normal),await this._loadScriptsFromList(this.delayedScripts.defer),await this._loadScriptsFromList(this.delayedScripts.async);try{await this._triggerDOMContentLoaded(),await this._pendingWebpackRequests(this),await this._triggerWindowLoad()}catch(e){console.error(e)}window.dispatchEvent(new Event("rocket-allScriptsLoaded")),this.everythingLoaded=!0,this._waitForPendingClicks().then(()=>{this._replayClicks()}),this._emptyTrash()}_registerAllDelayedScripts(){document.querySelectorAll("script[type=rocketlazyloadscript]").forEach(e=>{e.hasAttribute("data-rocket-src")?e.hasAttribute("async")&&!1!==e.async?this.delayedScripts.async.push(e):e.hasAttribute("defer")&&!1!==e.defer||"module"===e.getAttribute("data-rocket-type")?this.delayedScripts.defer.push(e):this.delayedScripts.normal.push(e):this.delayedScripts.normal.push(e)})}async _transformScript(e){if(await this._littleBreath(),!0===e.noModule&&"noModule"in HTMLScriptElement.prototype){e.setAttribute("data-rocket-status","skipped");return}return new Promise(t=>{let i;function r(){(i||e).setAttribute("data-rocket-status","executed"),t()}try{if(navigator.userAgent.indexOf("Firefox/")>0||""===navigator.vendor)i=document.createElement("script"),[...e.attributes].forEach(e=>{let t=e.nodeName;"type"!==t&&("data-rocket-type"===t&&(t="type"),"data-rocket-src"===t&&(t="src"),i.setAttribute(t,e.nodeValue))}),e.text&&(i.text=e.text),i.hasAttribute("src")?(i.addEventListener("load",r),i.addEventListener("error",function(){i.setAttribute("data-rocket-status","failed"),t()}),setTimeout(()=>{i.isConnected||t()},1)):(i.text=e.text,r()),e.parentNode.replaceChild(i,e);else{let n=e.getAttribute("data-rocket-type"),s=e.getAttribute("data-rocket-src");n?(e.type=n,e.removeAttribute("data-rocket-type")):e.removeAttribute("type"),e.addEventListener("load",r),e.addEventListener("error",function(){e.setAttribute("data-rocket-status","failed"),t()}),s?(e.removeAttribute("data-rocket-src"),e.src=s):e.src="data:text/javascript;base64,"+window.btoa(unescape(encodeURIComponent(e.text)))}}catch(a){e.setAttribute("data-rocket-status","failed"),t()}})}async _loadScriptsFromList(e){let t=e.shift();return t&&t.isConnected?(await this._transformScript(t),this._loadScriptsFromList(e)):Promise.resolve()}_preloadAllScripts(){this._batchInjectResourceHints([...this.delayedScripts.normal,...this.delayedScripts.defer,...this.delayedScripts.async],"preload")}_batchInjectResourceHints(e,t){var i=document.createDocumentFragment();e.forEach(e=>{let r=e.getAttribute&&e.getAttribute("data-rocket-src")||e.src;if(r){let n=document.createElement("link");n.href=r,n.rel=t,"preconnect"!==t&&(n.as="script"),e.getAttribute&&"module"===e.getAttribute("data-rocket-type")&&(n.crossOrigin=!0),e.crossOrigin&&(n.crossOrigin=e.crossOrigin),e.integrity&&(n.integrity=e.integrity),i.appendChild(n),this.trash.push(n)}}),document.head.appendChild(i)}_delayEventListeners(e){let t={};function i(i,r){return t[r].eventsToRewrite.indexOf(i)>=0&&!e.everythingLoaded?"rocket-"+i:i}function r(e,r){var n;!t[n=e]&&(t[n]={originalFunctions:{add:n.addEventListener,remove:n.removeEventListener},eventsToRewrite:[]},n.addEventListener=function(){arguments[0]=i(arguments[0],n),t[n].originalFunctions.add.apply(n,arguments)},n.removeEventListener=function(){arguments[0]=i(arguments[0],n),t[n].originalFunctions.remove.apply(n,arguments)}),t[e].eventsToRewrite.push(r)}function n(t,i){let r=t[i];t[i]=null,Object.defineProperty(t,i,{get:()=>r||function(){},set(n){e.everythingLoaded?r=n:t["rocket"+i]=r=n}})}r(document,"DOMContentLoaded"),r(window,"DOMContentLoaded"),r(window,"load"),r(window,"pageshow"),r(document,"readystatechange"),n(document,"onreadystatechange"),n(window,"onload"),n(window,"onpageshow")}_delayJQueryReady(e){let t;function i(t){return e.everythingLoaded?t:t.split(" ").map(e=>"load"===e||0===e.indexOf("load.")?"rocket-jquery-load":e).join(" ")}function r(r){if(r&&r.fn&&!e.allJQueries.includes(r)){r.fn.ready=r.fn.init.prototype.ready=function(t){return e.domReadyFired?t.bind(document)(r):document.addEventListener("rocket-DOMContentLoaded",()=>t.bind(document)(r)),r([])};let n=r.fn.on;r.fn.on=r.fn.init.prototype.on=function(){return this[0]===window&&("string"==typeof arguments[0]||arguments[0]instanceof String?arguments[0]=i(arguments[0]):"object"==typeof arguments[0]&&Object.keys(arguments[0]).forEach(e=>{let t=arguments[0][e];delete arguments[0][e],arguments[0][i(e)]=t})),n.apply(this,arguments),this},e.allJQueries.push(r)}t=r}r(window.jQuery),Object.defineProperty(window,"jQuery",{get:()=>t,set(e){r(e)}})}async _pendingWebpackRequests(e){let t=document.querySelector("script[data-webpack]");async function i(){return new Promise(e=>{t.addEventListener("load",e),t.addEventListener("error",e)})}t&&(await i(),await e._requestAnimFrame(),await e._pendingWebpackRequests(e))}async _triggerDOMContentLoaded(){this.domReadyFired=!0,await this._littleBreath(),document.dispatchEvent(new Event("rocket-readystatechange")),await this._littleBreath(),document.rocketonreadystatechange&&document.rocketonreadystatechange(),await this._littleBreath(),document.dispatchEvent(new Event("rocket-DOMContentLoaded")),await this._littleBreath(),window.dispatchEvent(new Event("rocket-DOMContentLoaded"))}async _triggerWindowLoad(){await this._littleBreath(),document.dispatchEvent(new Event("rocket-readystatechange")),await this._littleBreath(),document.rocketonreadystatechange&&document.rocketonreadystatechange(),await this._littleBreath(),window.dispatchEvent(new Event("rocket-load")),await this._littleBreath(),window.rocketonload&&window.rocketonload(),await this._littleBreath(),this.allJQueries.forEach(e=>e(window).trigger("rocket-jquery-load")),await this._littleBreath();let e=new Event("rocket-pageshow");e.persisted=this.persisted,window.dispatchEvent(e),await this._littleBreath(),window.rocketonpageshow&&window.rocketonpageshow({persisted:this.persisted}),this.windowLoaded=!0}_triggerLastFunctions(){document.onreadystatechange&&document.onreadystatechange(),window.onload&&window.onload(),window.onpageshow&&window.onpageshow({persisted:this.persisted})}_handleDocumentWrite(){let e=new Map;document.write=document.writeln=function(t){let i=document.currentScript;i||console.error("WPRocket unable to document.write this: "+t);let r=document.createRange(),n=i.parentElement,s=e.get(i);void 0===s&&(s=i.nextSibling,e.set(i,s));let a=document.createDocumentFragment();r.setStart(a,0),a.appendChild(r.createContextualFragment(t)),n.insertBefore(a,s)}}async _littleBreath(){Date.now()-this.lastBreath>45&&(await this._requestAnimFrame(),this.lastBreath=Date.now())}async _requestAnimFrame(){return document.hidden?new Promise(e=>setTimeout(e)):new Promise(e=>requestAnimationFrame(e))}_emptyTrash(){this.trash.forEach(e=>e.remove())}static run(){let e=new RocketLazyLoadScripts;e._addUserInteractionListener(e)}}RocketLazyLoadScripts.run();</script>';

$expected = '<html>
<head>' . $ie_compat . $delay_js . '<title>Sample Page</title></head>
<body></body>
</html>';

$charset = '<meta charset="UTF-8">';
$charset_http_equiv = "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>";

$html_charset = "<html>
<head>
{$charset}
<title>Sample Page</title></head>
<body></body>
</html>";

$expected_charset = "<html>
<head>{$charset}{$ie_compat}{$delay_js}

<title>Sample Page</title></head>
<body></body>
</html>";

$html_http_equiv_charset = "<html>
<head>
{$charset_http_equiv}
<title>Sample Page</title></head>
<body></body>
</html>";

$expected_http_equiv_charset = "<html>
<head>{$charset_http_equiv}{$ie_compat}{$delay_js}

<title>Sample Page</title></head>
<body></body>
</html>";


$html_invalid_charset_head = "<html>
<head>
<meta name=\"keywords\" charset=\"UTF-8\" content=\"Hello!\" />
<title>Sample Page</title></head>
<body></body>
</html>";

$expected_invalid_charset_head = "<html>
<head><meta name=\"keywords\" charset=\"UTF-8\" content=\"Hello!\" />{$ie_compat}{$delay_js}

<title>Sample Page</title></head>
<body></body>
</html>";


$html_invalid_charset_body = "<html>
<head>
<title>Sample Page</title></head>
<body><meta charset=\"UTF-8\"></body>
</html>";

$expected_invalid_charset_body = "<html>
<head>{$ie_compat}{$delay_js}
<title>Sample Page</title></head>
<body><meta charset=\"UTF-8\"></body>
</html>";

return [
	'testShouldNotAddScriptsWhenBypass' => [
		'config'   => [
			'delay_js'      => 1,
			'donotoptimize' => false,
			'bypass'        => true,
		],
		'html'     => $html,
		'expected' => $html,
	],

	'testShouldNotAddScriptsWhenDONOTOPTIMIZE' => [
		'config'   => [
			'delay_js'      => 0,
			'donotoptimize' => true,
			'bypass'        => false,
		],
		'html'     => $html,
		'expected' => $html,
	],

	'testShouldNotAddScriptsWhenDelaySettingDisabled' => [
		'config'   => [
			'delay_js'      => 0,
			'donotoptimize' => false,
			'bypass'        => false,
		],
		'html'     => $html,
		'expected' => $html,
	],

	'testShouldAddScripts' => [
		'config'   => [
			'delay_js' => 1,
			'donotoptimize' => false,
			'bypass'        => false,
		],
		'html'     => $html,
		'expected' => $expected,
	],
	'testShouldAddScriptsAfterMetaCharset' => [
		'config'   => [
			'delay_js' => 1,
			'donotoptimize' => false,
			'bypass'        => false,
		],
		'html'     => $html_charset,
		'expected' => $expected_charset,
	],
	'testShouldAddScriptsAfterMEtaHttpEquivCharset' => [
		'config'   => [
			'delay_js' => 1,
			'donotoptimize' => false,
			'bypass'        => false,
		],
		'html'     => $html_http_equiv_charset,
		'expected' => $expected_http_equiv_charset,
	],
	'testShouldAddScriptsAfterHeadInvalidCharsetHead' => [
		'config'   => [
			'delay_js' => 1,
			'donotoptimize' => false,
			'bypass'        => false,
		],
		'html'     => $html_invalid_charset_head,
		'expected' => $expected_invalid_charset_head,
	],
	'testShouldAddScriptsAfterHeadCharsetBody' => [
		'config'   => [
			'delay_js' => 1,
			'donotoptimize' => false,
			'bypass'        => false,
		],
		'html'     => $html_invalid_charset_body,
		'expected' => $expected_invalid_charset_body,
	],
];
