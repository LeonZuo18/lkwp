/*
* Brain@JennyStudio
* https://blog.brain1981.com
* Usage: 
* var d1=new dragObj(document.getElementById("objID"), true);//父级元素自动作为边界
* var d2=new dragObj(document.getElementById("objID"), false);//无边界，在窗口内部自由拖动，false也可以省略
*/
var maxAmount = 250000;
function dragObj(obj, objEdge){ //obj为拖放对象；objEdge为布尔值，为true则obj的父对象作为拖放的边界
 	var edgeWidth=0;

	function getScrollOffsets(_w) {//获取页面的滚动位置函数
		_w = _w || window;
		//for all and IE9+
		if (_w.pageXOffset != null) return {
			x: _w.pageXOffset,
			y: _w.pageYOffset
		};
		//for IE678
		var _d = _w.document;
		if (document.compatMode == "CSS1Compat") return { //for IE678
			x: _d.documentElement.scrollLeft,
			y: _d.documentElement.scrollTop
		};
		//for other mode
		return {
			x: _d.body.scrollLeft,
			y: _d.body.scrpllTop
		};
	}
 
	var _self=obj;
	this._self=_self;
 
	if(objEdge) {//初始化边界的属性,如果是图片的话必须页面加载初始化，否则探测不到图片的宽高。也可以放在点击事件处理程序中，这样不需要等页面加载完毕
		var _edge=_self.parentNode;
		this._edge=_edge;
		//初始化目标样式
		if(!_self.style.top) {
			_self.style.top=( _self.getBoundingClientRect().top-_edge.getBoundingClientRect().top )+"px";
 
		}
		if(!_self.style.left) {
			_self.style.left=( _self.getBoundingClientRect().left-_edge.getBoundingClientRect().left )+"px";
		}
		if(!_edge.style.position) _edge.style.position="relative";

		if(!_self.style.position) _self.style.position="absolute";
		if(!_self.style.display || _self.style.display=="inline") _self.style.display="block";
 
		//初始化边界样式和移动固定区域
 
		if(!_edge.style.display || _edge.style.display=="inline") _edge.style.display="block"; 
		var edgeSizeWidth=_edge.getBoundingClientRect().right-_edge.getBoundingClientRect().left;//边界尺寸
		var edgeSizeHeight=_edge.getBoundingClientRect().bottom-_edge.getBoundingClientRect().top;
 		
 		edgeWidth = edgeSizeWidth - 40;

		var dragObjSizeWidth=_self.getBoundingClientRect().right-_self.getBoundingClientRect().left;//拖动对象尺寸
		var dragObjSizeHeight=_self.getBoundingClientRect().bottom-_self.getBoundingClientRect().top;
 		

		_edge.w=edgeSizeWidth-dragObjSizeWidth;
		_edge.h=edgeSizeHeight-dragObjSizeHeight;
 
	} else {//无边界元素，在页面自由移动
		if(!_self.style.top) {_self.style.top = _self.getBoundingClientRect().top + getScrollOffsets().y + "px"}
		if(!_self.style.left) {_self.style.left = _self.getBoundingClientRect().left + getScrollOffsets().x + "px"}
		if(!_self.style.position || _self.style.position!="absolute" ) _self.style.position="absolute"; 
		if(!_self.style.display || _self.style.display=="inline") _self.style.display="block";
		var _edge=document.body;
	}

 
	_self.mousePosition= function(ev){ 
		ev = ev || window.event;
		var target = ev.target || ev.srcElement; // 获得事件源
		if(ev.pageX || ev.pageY){ 
			return {x:ev.pageX, y:ev.pageY}; 
		}
		if(ev.clientX){
			return { 
				x:ev.clientX + document.body.scrollLeft - document.body.clientLeft, 
				y:ev.clientY + document.body.scrollTop - document.body.clientTop 
			}
		}

		return { 
				x:ev.touches[0].clientX + document.body.scrollLeft - document.body.clientLeft, 
				y:ev.touches[0].clientY + document.body.scrollTop - document.body.clientTop 
		}
	}
 
	_self.onmousedown=function(ev){
 		
		ev = ev || window.event;

		var startY=_self.mousePosition(ev).y-parseInt(_self.style.top);
		var startX=_self.mousePosition(ev).x-parseInt(_self.style.left);
 
		if (ev && ev.preventDefault) {//阻止事件传播冒泡
			ev.stopPropagation();
		}else if (document.all){
			ev.cancelBubble=true;
		}
 
		_self.onmousemove=function(ev){
			if(hasClass(_self,"untouched")){removeClass(_self,"untouched");}
			ev = ev || window.event;
 
			var poX=_self.mousePosition(ev).x-startX;
			var poY=_self.mousePosition(ev).y-startY;
			if(objEdge){
				if(poX<0) poX=0;
				if(poX>_edge.w) { poX=_edge.w; }
				if(poY<0) poY=0;
				if(poY>_edge.h) { poY=_edge.h; }
			}
			_self.style.left=poX+"px";
			_self.style.top=poY+"px";
 
			if (ev && ev.preventDefault) {//阻止默认事件,比如图片拖动问题
				ev.preventDefault();
			}else if (document.all){
				ev.returnValue = false;
			}

			countAmount(poX);
		}
 
		_self.onmouseout=function(ev){//如果鼠标移出了物件，用文档接受鼠标事件
			document.onmousemove = _self.onmousemove;
		}
 
		document.onmouseup=function(){//放开鼠标，释放所有相关事件
			_self.onmousemove=null;
			document.onmousemove=null;
			_self.onmouseout=null;
		}
		return false;
	}

	//mobile
	_self.addEventListener("touchstart",function(ev){
		ev = ev || window.event;

		var startY=_self.mousePosition(ev).y-parseInt(_self.style.top);
		var startX=_self.mousePosition(ev).x-parseInt(_self.style.left);
 
		if (ev && ev.preventDefault) {//阻止事件传播冒泡
			ev.stopPropagation();
		}
 
		_self.addEventListener("touchmove",function(ev){
			if(hasClass(_self,"untouched")){removeClass(_self,"untouched");}
			ev = ev || window.event;
			var poX=_self.mousePosition(ev).x-startX;
			var poY=_self.mousePosition(ev).y-startY;
			if(objEdge){
				if(poX<0) poX=0;
				if(poX>_edge.w) { poX=_edge.w; }
				if(poY<0) poY=0;
				if(poY>_edge.h) { poY=_edge.h; }
			}
			_self.style.left=poX+"px";
			_self.style.top=poY+"px";
 
			if (ev && ev.preventDefault) {//阻止默认事件,比如图片拖动问题
				ev.preventDefault();
			}

			countAmount(poX);
		},false);

		document.addEventListener("touchend",function(){//放开鼠标，释放所有相关事件
			_self.touchmove=null;
			document.touchmove=null;
		},false);
 
	},false);

	document.getElementById("pricing-count").addEventListener("change",function(){//指定数字
		// if(this.value<=maxAmount){
		// 	posLeft = this.value/maxAmount * edgeWidth;
		// 	console.log(posLeft);
		// 	_self.style.left = posLeft+"px";
		// }else{
		// 	_self.style.left = edgeWidth+"px";
		// }
		// lf_selectTier(this.value);

	},false);

	document.getElementById("pricing-count").addEventListener("keyup",function(){//只能输入数字
		lf_rulerRoll(this.value);
	},false);

	

	function countAmount(poX){
		//MAU = poX / edgeWidth * maxAmount;
		//MAU =parseInt(MAU);
		if( poX/edgeWidth<=0.75 ){//250K
			MAU = poX/edgeWidth*333333;
		}else if( poX/edgeWidth<=0.875 ){//500k
			MAU = 250000 + (poX/edgeWidth-0.75)*250000*8;
		}else if( poX/edgeWidth<=1 ){//1M
			MAU = 500000 + (poX/edgeWidth-0.875)*500000*8;
		}else{
			MAU = 1000000;
		}

		document.getElementById("pricing-count").value=MAU;
		lf_selectTier(MAU);
	}

	function lf_rulerRoll(num){//标尺自动
		num=num.replace(/\D/g,'');
		if(num<=250000){
			posLeft = num/250000 * edgeWidth * 0.75;
			//console.log("1-",posLeft);
			_self.style.left = posLeft+"px";

		}else if(num<=500000){
			posLeft = edgeWidth * 0.75 + (num-250000)/250000*edgeWidth*0.125 ;
			//console.log("2-",posLeft);
			_self.style.left = posLeft+"px";

		}else if(num<=1000000){
			posLeft = edgeWidth * 0.875 + (num-500000)/500000*edgeWidth*0.125 ;
			//console.log("3-",posLeft);
			_self.style.left = posLeft+"px";
		}else{
			_self.style.left = edgeWidth+"px";
		}
		if(num) lf_selectTier(num);
	}

	function lf_selectTier(num){//选框自动
		$(".pricing-group").removeClass("checked");
		if(num<100000){
			$(".pricing-group1").addClass("checked");
		}else if( num>=100000 && num<250000 ){
			$(".pricing-group2").addClass("checked");
		}else{
			$(".pricing-group3").addClass("checked");
		}
		//千位化数字
		var thisvalue = parseInt(num);
		var formatedNum = thisvalue.toString().replace(/\d{1,3}(?=(\d{3})+(\.\d*)?$)/g,'$&,');
		document.getElementById("pricing-count").value = formatedNum;

		if(num<=stepsMAU[stepsMAU.length-1]){
			for(i=0;i<stepsMAU.length;i++){
				if(num<=stepsMAU[i]){
					//console.log(i,stepsMAU[i],stepsPrice[i]);
					setMAU = stepsMAU[i].toString().replace(/\d{1,3}(?=(\d{3})+(\.\d*)?$)/g,'$&,');
					setPrice = stepsPrice[i].toString().replace(/\d{1,3}(?=(\d{3})+(\.\d*)?$)/g,'$&,');
					break;
				}
			}
		}else{//超出定价步长
			var tempNum = Math.ceil(num/10000) * 10000;
			setMAU = tempNum.toString().replace(/\d{1,3}(?=(\d{3})+(\.\d*)?$)/g,'$&,');
			if(num>=1000000){
				setMAU="1M+";
				document.getElementById("pricing-count").value="1M+";
			}
			setPrice = "-";
		}
		$("#pricing-count-mau span").html(setMAU);
		$("#pricing-count-price span").html(setPrice);
		
		$("#pricing-submit").removeClass("disabled");
		if(setPrice=="-"){
			$("#pricing-count-price").html(contactBtnCont);
			$("#pricing-submit").attr("href","/pricing/application?MAU="+"250K");
		}else{
			$("#pricing-count-price").html("<span>"+setPrice+"</span> 元/年");
			$("#pricing-submit").attr("href","/pricing/application?MAU="+setMAU);
		}
	}

	$(".pricing-group1").on("click",function(){
		setval = 10000;
		$("#pricing-count").val(setval);
		lf_rulerRoll(setval.toString());
		lf_selectTier(setval);
	});
	$(".pricing-group2").on("click",function(){
		setval = 100000;
		$("#pricing-count").val(setval);
		lf_rulerRoll(setval.toString());
		lf_selectTier(setval);
	});
	$(".pricing-group3").on("click",function(){
		setval = 250000;
		$("#pricing-count").val(setval);
		lf_rulerRoll(setval.toString());
		lf_selectTier(setval);
	});

}
