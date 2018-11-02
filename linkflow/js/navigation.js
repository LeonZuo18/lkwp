/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function() {
	var nav = document.getElementById( 'mobileMenu' ), button, menu;
	if ( ! nav )
		return;
	//button = nav.getElementsByTagName( 'h3' )[0];
	button = document.getElementById( 'topFloatBar_r' )
	menu   = nav.getElementsByTagName( 'ul' )[0];

	menuLength   = nav.getElementsByTagName( 'li' ).length;
	menuLineHeight = 37;
	var menuLine;
	var menuHeight;
	for(j=0;j<menuLength;j++){
		if( hasClass(nav.getElementsByTagName( 'li' )[j],"current-menu-item") ||  hasClass(nav.getElementsByTagName( 'li' )[j],"current-menu-ancestor") ){
			addClass(nav.getElementsByTagName( 'li' )[j], "on" ); 
		}
	}


	function getMenuHeight(){
		menuLine=0;
		for(j=0;j<menuLength;j++){
			nav.getElementsByTagName( 'li' )[j].getBoundingClientRect().height>1?menuLine+=1:menuLine+=0;
		}
		menuHeight = menuLine*menuLineHeight + 14;
		//console.log(menuLine);
		return menuHeight;
	}
	
	//menuHeight = menuLength*menuLineHeight;

	if ( ! button )
		return;

	// Hide button if menu is missing or empty.
	if ( ! menu || ! menu.childNodes.length ) {
		button.style.display = 'none';
		return;
	}

	button.onclick = function() {
		if ( -1 == menu.className.indexOf( 'nav-menu' ) )
			menu.className = 'nav-menu';

		if ( -1 != button.className.indexOf( 'toggled-on' ) ) {
			button.className = button.className.replace( ' toggled-on', '' );
			menu.className = menu.className.replace( ' toggled-on', '' );
			nav.style.height=0;
		} else {
			button.className += ' toggled-on';
			menu.className += ' toggled-on';
			nav.style.height=getMenuHeight()+"px";
		}
	};

	var itemHasSub = getElementsByClassName("menu-item-has-children", nav , "li")
	for (i=0; i<itemHasSub.length; i++){
		targetItem = itemHasSub[i].getElementsByTagName("a")[0];
		var objA=document.createElement("a");
		objA.className="menu-item-switch";
		objA.href="###";
		insertAfter( objA ,targetItem);
		objA.onclick =function(){
			if( !hasClass(this.parentNode,"on") ){
				addClass(this.parentNode,"on");
				removeClass(this.parentNode,"off");
			}else{
				removeClass(this.parentNode,"on");
				addClass(this.parentNode,"off");
			}
			nav.style.height=getMenuHeight()+"px";
		}

	}

} )();

( function() {//desktop floating top bar
	if( (SysPC==true  ) && (SysIe==undefined || SysIe>=9) ){//目前只支持PC IE9+和现代浏览器
		var masthead=checkElement("masthead");
		var mastHeight = window.getComputedStyle(document.getElementById("masthead")).height; //记录初始顶部导航高度

		var nextHead= ( checkElement("home_header")? checkElement("home_header"): checkElement("inner_header"));
		var ori_marginTop=nextHead.style.marginTop;//保存初始的margin-top

		var topNavOffset = 40;//开始浮动的滚动高度

		function getFloatNavBar(){
			if (getViewPortSize().x>960 ){
				if( getScrollOffsets().y >= topNavOffset ){
					addClass( masthead , "scroll") ;
					//nextHead.style.marginTop = mastHeight ;
				} else {
					removeClass( masthead , "scroll") ;
					//nextHead.style.marginTop = ori_marginTop ;
				}
			}
		}
		addEvent(window, "scroll", function(){
			getFloatNavBar();
		});
		addEvent(window, "resize", function(){
			getFloatNavBar();
		});
		getFloatNavBar();
	}
} )();