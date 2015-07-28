var tempnum = new Array();
var voteid = new Array();
var n = 0;
var timer;

showdivlist('showlist1','hotatc');
showdivlist('showlist2','hotatcs');
showdivlist('showlist3','newusers');
if (showlist1) {
	showdivlist('showlist4','newblogs');
}
if (showlist2) {
	showdivlist('showlist5','newgoodss');
}
function GE(id) {
	if (document.getElementById && document.getElementById(id)) {
		return document.getElementById(id);
    } else if (document.all && document.all[id]) {
		return document.all[id];
	} else if (document.layers && document.layers[id]) {
		return document.layers[id];
	} else {
		return null;
    }
}
function showdivlist(showlist,show){
	var obj  = GE(showlist);
	var objs = obj.getElementsByTagName('a');
	for (var i=0;i<objs.length;i++) {
		if (objs[i].id==show) {
			if (GE(show + 'div').style.display == 'none') {
				GE(show).className = 'tabA1A tabA1B';
				GE(show + 'div').style.display = '';
			}
		} else {
			GE(objs[i].id).className = 'tabA1A';
			GE(objs[i].id + 'div').style.display = 'none';
		}
	}
}
function CheckVote(obj,id,maxkey){
	if ((obj.type=='checkbox' || obj.type=='radio') && maxkey!=0) {
		if (!tempnum[id]) {
			tempnum[id] = 0;
		}
		if (!voteid[id]) {
			voteid[id] = '';
		}
		if (obj.checked) {
			if (tempnum[id]==maxkey) {
				alert("只能选" + maxkey + "项");
				return false;
			}
			voteid[id] += (voteid[id] ? '|' : '') + obj.value;
			tempnum[id]++;
		} else {
			tempnum[id]--;
		}
	}
}
