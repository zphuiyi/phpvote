/**
 * @brief 埋点分析
 * @author hechangmin
 * @date 2013.3
 */

var Analytics = (function($){
	var trace_map,_image,_options = {
		api 	 : "http://infoc.weikan.cn/weikan/__utm.gif",
		node 	 : 151010,
		snode 	 : 1000,
		cid 	 : "",
		uuid 	 : "",
		passport : ""
	};
	
	var init = function(options){
		 $.extend(_options, options);
		_image = new Image(0,0);
		_initEvent();
	};

	function _initEvent()
	{
		$(document).delegate('.__trace__[data-trace]', 'click', function() {
			var params = $(this).attr('data-trace').split(',');
			Analytics.trace.apply(Analytics, params);
		});
		
		//下面这种方式方便为导航性质的网站提供埋点
		for(i in trace_map)
		{
			var $id = "#" + i;
			var sBlock = trace_map[i];

			$($id).delegate("a[class != __trace__]","click",function(_s){
				return function(){
					var params = $(this).attr("href");
					var bHasImg = $(this).has("img").length;
					var $img = $(this).find("img").eq(0);
					
					try{
						_getAlt($(this));
						if(bHasImg)
						{
							_getAlt($img);
							_getTitle($img);
						}
						
						_getText($(this));
					}catch(e)
					{
						params = e;
					}
					
					trace(_s, params);
				};}(sBlock));
		}
	}
	
	function _getAlt($obj){
		var params = $obj.attr("alt");
		if(params) throw params;
	}
	
	function _getText($obj){
		var params = $obj.text();
		if(params) throw params;
	}
	
	function _getTitle($obj){
		var params = $obj.attr("title");
		if(params) throw params;
	}
	
	function _ksTrace(sBlock,sLabel){
		var api = _options.api;
		api += "?node="+_options.node;
		api += "&snode="+_options.snode;
		api += "&cid=" + _options.cid;
		api += "&passport=" + encodeURIComponent(_options.passport);
		api += "&uuid=" + _options.uuid;
		api += "&w=" + encodeURIComponent(sBlock);
		api += "&gamename=" + encodeURIComponent(sLabel);
		_image.src = api;
	}

	var trace = function(sBlock,sLabel){
		// 百度统计 
		//var slinkName = sBlock + "_" + sLabel;
		//_hmt.push(['_trackEvent', sBlock, 'click', slinkName]);
		
		//金山微看统计平台上报
		_ksTrace( sBlock,sLabel);
		
		//for test
		//console.log.apply(console, arguments);
	};
	
	return {
		init:init,
		trace:trace,
		trace_map:trace_map
	};
})(jQuery);