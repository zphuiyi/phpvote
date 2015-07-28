/**
 * 手机控的主题下载脚本
 *
 * @author hujun
 * @date 2013.4.2
 */

$(function() {
	Theme.main();
});

var Theme = {
	
	//历史页面存储
	history : [0],

	index : 0,

	main : function() {
		Theme.initEvent();
	},

	initEvent : function(){
		
		/**
		滑动条事件
		*/
		$('#Scroll').tinyscrollbar({axis:'y'});
		
		document.onkeydown = function(e){ 
			var ev = document.all ? window.event : e;
			if(ev.keyCode==13) {
		 		$('#keyBtn').click();
			}
		}
		
		/**
		导航事件
		*/
		$('#nav_index').click(function(){
			$('#ifr')[0].src="http://sjk.open.moxiu.net";
		});
		
		$('#reload').click(function(){
			window.location.reload(); 
		});
		
		$('#prev').click(function(){
			if(Theme.index > 0){
				var history = Theme.history[--Theme.index];
			}
		});
		$('#next').click(function(){
			if(Theme.index < Theme.history.length - 1){
				var history = Theme.history[++Theme.index];
			}
		});
		
		/**
			关键字搜索事件
		*/
		$('#keyword').focus(function(){
			$('#keyword').attr("style","color:#949494");
			var val=$(this).val();
			if(val=="请输入搜索内容")
			{
				$(this).val('');	
			}
		});
		
		$('#keyword').blur(function(){
			var val=$(this).val();
			if(val=="")
			{
				$(this).val("请输入搜索内容");	
			}	
		});
		
		
		$('#keyBtn').click(function(){
			var val=$('#keyword').val();
			if(val==""||val=="请输入搜索内容")
			{
				$('#keyword').attr("style","color:#ff0000");
			}
			else
			{
				val= Url.encode(val);
				$('#ifr').attr('src','http://sjk.test.open.moxiu.net/?do=Main&q='+val);	
			}
		});

	}
};