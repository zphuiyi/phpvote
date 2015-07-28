/**
 * @brief   Expansion of native string
 * @author  hechangmin@gmail.com
 * @date	2012.9
 */

var Util = {
	/**
	 * @brief 从当前url中获取参数
	 * @param {Object} name
	 */
	getParam : function(name) {
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
		var r = (unescape(decodeURI(window.location.search))).substr(1).match(reg);
		if (r != null)
			return unescape(r[2]);
		return null;
	},

	/**
	 * brief 更改页面URL参数并跳转
	 * @param {[type]} name  [description]
	 * @param {[type]} value [description]
	 */
	setParam : function(name, value){
		var queryString = document.location.search.slice(1);
		var queryArray = [];
		if(queryString != ''){
			var queryArray = queryString.split('&');
			for(var i in queryArray){
				var key = queryArray[i].split('=')[0];
				if(arguments.length == 1){
					var params = arguments[0];
					for(var j in params){
						if(key == j){
							queryArray.splice(i, 1);
							break;
						}
					}
				}else{
					if(key == name){
						queryArray.splice(i, 1);
						break;
					}
				}
			}
		}
		if(arguments.length == 1){
			var params = arguments[0];
			for(var j in params){
				queryArray.push(j + '=' + params[j]);
			}
		}else{
			queryArray.push(name + '=' + value);
		}
		document.location = '?' + queryArray.join('&');
	},

	/**
	 * @brief 预加载图片
	 * @param {Object} arrImgSrc 图片src 数组
	 */
	preloader : function(arrImgSrc) {
		for (var i = 0; i < arrImgSrc.length; i++) {
			var preImg = new Image();
			preImg.src = arrImgSrc[i];

		}
	},

	/**
	 * @brief 判断系统位数
	 */
	getCPU : function() {
		var agent = navigator.userAgent.toLowerCase();
		if (agent.indexOf("win64") >= 0 || agent.indexOf("wow64") >= 0)
			return "64";
		return "32"
	},

	/**
	 * @brief 判断操作系统类型
	 */
	detectOS : function() {
		var sUserAgent = navigator.userAgent;
		var isWin2K = sUserAgent.indexOf("Windows NT 5.0") > -1 || sUserAgent.indexOf("Windows 2000") > -1;
		if (isWin2K)
			return "WinXP";
		var isWinXP = sUserAgent.indexOf("Windows NT 5.1") > -1 || sUserAgent.indexOf("Windows XP") > -1;
		if (isWinXP)
			return "WinXP";
		var isWin2003 = sUserAgent.indexOf("Windows NT 5.2") > -1 || sUserAgent.indexOf("Windows 2003") > -1;
		if (isWin2003)
			return "WinS2003";
		var isWinVista = sUserAgent.indexOf("Windows NT 6.0") > -1 || sUserAgent.indexOf("Windows Vista") > -1;
		if (isWinVista)
			return "Vista";
		var isWin7 = sUserAgent.indexOf("Windows NT 6.1") > -1 || sUserAgent.indexOf("Windows 7") > -1;
		if (isWin7)
			return "Win7";
		var isWin8 = sUserAgent.indexOf("Windows NT 6.2") > -1 || sUserAgent.indexOf("Windows 8") > -1;
		if (isWin8)
			return "Win8";

		//让MAC 默认显示XP的数据,方便在MAC机器上调试开发
		if (sUserAgent.indexOf("Mac OS X") != -1)
			return "WinXP";

		return "WinS2008"
	},

	/**
	 * @brief 判断浏览器类型
	 */
	getOS : function() {
		var Sys = {};
		var ua = navigator.userAgent.toLowerCase();
		if (window.ActiveXObject)
			Sys.ie = ua.match(/msie ([\d.]+)/)[1]
		else if (document.getBoxObjectFor)
			Sys.firefox = ua.match(/firefox\/([\d.]+)/)[1]
		else if (window.MessageEvent && !document.getBoxObjectFor)
			Sys.chrome = ua.match(/chrome\/([\d.]+)/)[1]
		else if (window.opera)
			Sys.opera = ua.match(/opera.([\d.]+)/)[1]
		else if (window.openDatabase)
			Sys.safari = ua.match(/version\/([\d.]+)/)[1];
		return Sys;
	}
};