/*!
 * RT-Theme 19 WordPress Theme Scripts
 * Copyright (C) 2014 RT-Themes
 * http://rtthemes.com
 *
 * various scripts file 
 */


(function($){
"use strict"; 

	/* ******************************************************************************* 

		GLOBAL VARS

	***********************************************************************************/ 	
	var is_rtl = $("body").hasClass("rtl");
	var window_width = $(window).width();
	var is_layout1 = $("body").hasClass("layout1");
	var is_layout2 = $("body").hasClass("layout2");

	/* ******************************************************************************* 

		WINDOW WIDTH RESIZE ONLY

	***********************************************************************************/ 
	$(window).resize(function(){
		if($(this).width() != window_width){
			window_width = $(this).width();   
			$(window).trigger("window_width_resize");
		}
	});

	/* ******************************************************************************* 

		CHECK IF THE HIDDEN MOBILE MENU ACTIVE

	***********************************************************************************/ 
	if( ! $.fn.is_mobile_menu ){

		$.fn.is_mobile_menu = function()
		{ 
			return $(window).width() < 980;
		};
	}

	/* ******************************************************************************* 

		LOGO HOLDER HEIGHT - LAYOUT 2 

	***********************************************************************************/ 
	$(window).on('window_width_resize load', function() {    
		
		if( is_layout2 && ! $.fn.is_mobile_menu() ){
			var nav_height = $(".header-right").outerHeight();
			$(".header-elements").css({"min-height":nav_height+"px"});
		}else{
			$(".header-elements").css({"min-height":"auto"});
		}
	});

	/* ******************************************************************************* 

		MOBILE MENU

	***********************************************************************************/ 
	function rt_toggle_mobile_menu(menu_button){
		menu_button.toggleClass("icon-menu icon-menu-outline");
		$("body").toggleClass("mobile-menu-active");			
	}

	//on menu button click
	$(".mobile-menu-button").on("click",function() {
		rt_toggle_mobile_menu($(this));
		return false;
	});

	//on right side click
	$("#right_side").on('touchstart click', function(e) {
		if( $("body").hasClass("mobile-menu-active") ){
			rt_toggle_mobile_menu($(".mobile-menu-button"));
			return false;
		}
	});

	$(window).on('window_width_resize load', function() {     
		
		if($.fn.is_mobile_menu()){
			$("body").addClass("mobile-menu");
		}else{
			$("body").removeClass("mobile-menu");
			$("body").removeClass("mobile-menu-active");
		}
 
		if( Modernizr.touch && is_layout1 ){
			$("body").addClass("mobile-menu");
			return false;
		}

	});


	/* ******************************************************************************* 

		STICKY HEADER

	********************************************************************************** */  

		if( ! $.fn.rt_sticky_header ){

			$.fn.rt_sticky_header = function()
			{ 	

					if( $(this).length == 0 ){
						return;
					}

					var header = $(this);
					var site_logo = $(".site-logo, .site-logo img");
					var main_content = $("#container");

					if( Modernizr.touch || ! is_layout2 || $.fn.is_mobile_menu() ){
						header.removeClass( "stuck" ); 
						main_content.removeAttr("style");
						site_logo.removeAttr("style");						
						return;
					}

					var header_right = $(".header-right");
					var navigation_bar_height = header.outerHeight();  
					var header_top_position = header.position().top;
					var wp_admin_bar_height = $("#wpadminbar").outerHeight();
					var top_distance = ( header.position().top - wp_admin_bar_height ) + navigation_bar_height ; 

					if( header.length > 0 ){			

						//scroll function
						$(window).scroll(function(event) {

							if( $.fn.is_mobile_menu() ){
								return;
							}

							var y = $(window).scrollTop();
						
							if( y > top_distance ){							
								header.addClass( "stuck" );
								main_content.css({"padding-top":top_distance +"px"});
								site_logo.css({"max-height":header_right.height()+"px"}); 
							}else{
								header.removeClass( "stuck" ); 
								main_content.removeAttr("style");
								site_logo.removeAttr("style");
							}
						});							
					}

			};

		}	

		$(window).on('window_width_resize load', function() {
			$(".sticky.top-header").rt_sticky_header();
		});



	/* ******************************************************************************* 

		ON PAGE LOAD

	***********************************************************************************/ 
	imagesLoaded( "body" ).on('done', function( instance ) {
	
		$("body").removeClass("rt-loading");
		$("#loader-wrapper").remove();

		if ( ! Modernizr.touch ) {
			$(window).scrollTop(0);
		}
	});

	Pace.on('hide', function(){
		$('.pace').remove();   
	});

	/* ******************************************************************************* 

		RT ONE PAGE

	***********************************************************************************/ 
 
	if( ! $.fn.rt_one_page ){

		$.fn.rt_one_page = function()
		{ 

			var wp_admin_bar_height = $("#wpadminbar").outerHeight() - 1;

			if( window.location.hash ){ 
				if( $(window.location.hash).length > 0 ){ 
					rt_scroll_to( $(window.location.hash).offset().top - wp_admin_bar_height, window.location.hash );
				}
			}

			$(this).on("click",function(e){
			
					var cur_url = window.location.host + window.location.pathname + window.location.search;
					var this_url = this.host + this.pathname + this.search;

					if( cur_url == this_url ){

						e.preventDefault();		

						if( this.hash == "#top" ){
							rt_scroll_to( 0, "");
							return ;
						}						
		 
						var target = $(this.hash);

						if( target.length == 0 ){
							window.location = this.href;
							return ;
						}
						
						if( $("body").hasClass("mobile-menu-active") ){
							$(".mobile-menu-button").trigger("click");
						}

						rt_scroll_to( target.offset().top - wp_admin_bar_height, this.hash);
					}
			});


			$(this).each(function(){

				var menu_item = $(this),
					hash = this.hash,
					section = $(hash);

				menu_item.parent("li").removeClass("current-menu-item current_page_item");

				section.waypoint(function(direction) { 
						if (direction === 'down') {
							rt_remove_active_menu_class();
							menu_item.parent("li").addClass("current-menu-item current_page_item");
						}
				}, { offset: '50%' });

				section.waypoint(function(direction) { 
						if (direction === 'up') {
							rt_remove_active_menu_class();
							menu_item.parent("li").addClass("current-menu-item current_page_item");
						}
				}, { 
					offset: function() { 
						return 0;
					}
				});

					section.waypoint(function(direction) { 
						if (direction === 'up') {
							menu_item.parent("li").removeClass("current-menu-item current_page_item");
						}
				}, { 
					offset: function() { 
						return $.waypoints('viewportHeight');
					}
				});

					section.waypoint(function(direction) { 
						if (direction === 'down') {
							menu_item.parent("li").removeClass("current-menu-item current_page_item");
						}
				}, { 
					offset: function() { 
						return -$(this).height();
					}
				});

			});


			function rt_remove_active_menu_class(){
				$("#navigation > li.current-menu-item, #navigation > li.current_page_item").removeClass("current-menu-item current_page_item"); 
			}

		};
	}

	
	if ( $.fn.rt_one_page ) {  
		Pace.on('hide', function(){
			$($('#navigation a[href*="#"]:not([href="#"])')).rt_one_page();   
		});
	}


	/* ******************************************************************************* 

		RT COUNTER

	***********************************************************************************/ 
 
	if( ! $.fn.rt_counter ){

		$.fn.rt_counter = function()
		{ 

			$(this).each(function(){
				var number_holder = $(this).find("> .number"),
					 number = number_holder.text();

				$(this).waypoint( { 
					triggerOnce: true,   
					offset: "100%",  
					handler: function() {    

						$({
							Counter: 0
						}).animate({
							Counter: number_holder.text()
						}, {
							duration: 1200,
							step: function () {
								number_holder.text(Math.ceil(this.Counter));
							},
							complete: function () {
								number_holder.text(number);
							}							
						});

					}
				});
			});
		};
	}
	
	if ( $.fn.rt_counter ) {  
		Pace.on('hide', function(){
			$('.rt_counter').rt_counter();   
		});
	}

	/* ******************************************************************************* 

		RT SCROLL TO

	***********************************************************************************/ 

	function rt_scroll_to( to, hash ){

		$('html, body').stop().animate({
			'scrollTop': to
		}, 900, 'swing', function() {
			window.location.hash = hash;
			$('html,body').scrollTop(to);
		});					
	}


	/* ******************************************************************************* 

		FIX FEATURES COLUMN POSITION OF COMPARE TABLES

	********************************************************************************** */  

	if( ! $.fn.rt_tables ){

		$.fn.rt_tables = function()
		{ 

			var features,
				table = $(this);


			//brings the features column position same with other columns
			function fix_compare_features( table ){

				$(table).each(function(i){

					var start_position_element = $(this).find(".start_position"),
					features_list = $(this).find(".table_wrap.features ul"), 
					new_offset =  start_position_element.offset().top - $(this).offset().top; 

					features_list.css("top",new_offset);
				});

			}


			//copy features to each column for mobile
			function copy_features( table ){

				$(table).each(function(){

					features=[];
					//createa features array from the first row
					$(this).find(".table_wrap.features li").each(function(){
						features.push( $(this).html() );
					});

				});

				$(table).find(".table_wrap").each(function(i){

					if( $(this).hasClass("features") == "" ){
						var i = 0;
						$(this).find("li").each(function(){
							$(this).prepend('<div class="visible-xs-block hidden-sm hidden-md hidden-lg">'+features[i]+'</div>'); 
						i++;
						});
					} 
				}); 				
			}

			//bind to window resize
			$(window).bind("resize",table, function( ){
				fix_compare_features( table );   
			});

			//start functions
			fix_compare_features( table );
			copy_features( table );

		};
	}

	if ( $.fn.rt_tables ) {  
		$('.pricing_table.compare').rt_tables();   
	}


	/* ******************************************************************************* 

		TOGGLE - ACCORDION

	********************************************************************************** */  
	$(".rt-toggle .toggle-content").hide(); 
	$(".rt-toggle .open .toggle-content").show();  
	
	$(".rt-toggle ol li .toggle-head").click(function(){ 

		var element = $(this).parent("li"),
			content = element.find(".toggle-content");

		if( element.hasClass("open")){ 
			element.removeClass("open");
			content.stop().slideUp(300);

		}else{

			$(this).parents("ol").find("li.open").removeClass("open").find(".toggle-content").stop().slideUp(300);  

			element.addClass("open");
			content.stop().slideDown(300);	

			//fixed heights 
			content.find('.fixed_heights').rt_fixed_rows("load"); 

			//fixed footers
			$('[data-footer="fixed_footer"]').rt_fixed_footers();

		} 
	});


	/* ******************************************************************************* 

		TABS

	********************************************************************************** */  

	if( ! $.fn.rt_tabs ){

		$.fn.rt_tabs = function()
		{ 

			$(this).each(function () {

				var tabs = $(this),
					tab_nav = $(this).find("> .tab_nav"),
					desktop_nav_element = $(this).find("> .tab_nav > li"),
					mobile_nav_element = $(this).find("> .tab_contents > .tab_content_wrapper > .tab_title"),
					tab_wrappers =  $(this).find("> .tab_contents > .tab_content_wrapper"),
					tab_style = $(this).attr("data-tab-style");

				//nav height fix
				height_fix(1);

				//mobile nav clicks	
				mobile_nav_element.click(function() {		
					close_all();
					open_tab( $(this).attr("data-tab-number") );
				})

				//desktop nav clicks
				desktop_nav_element.click(function() {				
					close_all();
					open_tab( $(this).attr("data-tab-number") );
				})

				//close all tabs
				function close_all(){
					tab_wrappers.each(function() {
						$(this).removeClass("active");
					});

					desktop_nav_element.each(function() {
						$(this).removeClass("active");
					});

				}

				//open a tab 
				function open_tab( tab_number ){

					var nav_item = tabs.find('[data-tab-number="'+tab_number+'"]'),
						tab_content_wrapper = tabs.find('[data-tab-content="'+tab_number+'"]');

						nav_item.addClass("active");
						tab_content_wrapper.addClass("active");
						height_fix( tab_number );

						//fixed heights 
						tab_content_wrapper.find('.fixed_heights').rt_fixed_rows("load");

						//fix custom select forms
						$.fn.rt_customized_selects();

						// Trigger an refresh on the select box. Good as new!
						$('span.customselect').remove();
						$('select.hasCustomSelect').removeAttr("style");
						$.fn.rt_customized_selects();

						if( window_width < 767 ){
							rt_scroll_to( tab_content_wrapper.offset().top, "" );
						}
				}

				//height fix -  vertical style
				function height_fix( tab_number ) {
					if( tab_style == "tab-style-2" ){						
						var current_tab_height = tabs.find('[data-tab-content="'+tab_number+'"]').outerHeight();
						tab_nav.css({"min-height":current_tab_height+"px"});
					}
				}

			});
 
		};
	}

	if ( $.fn.rt_tabs ) {  
		$('.rt_tabs').rt_tabs();   
	}

	/* ******************************************************************************* 

		START CAROUSELS

	********************************************************************************** */    

	$.fn.rt_start_carousels = function( callbacks ) {

		$(this).find(".rt-carousel").each(function(){

			var autoHeight_,
				margin = $(this).data("margin") !== "" ? $(this).data("margin") : 15, 
				carousel_holder = $(this),
				items = $(this).attr("data-item-width"),//number of items of each slides
				nav = $(this).attr("data-nav") == "true" ? true : false,
				dots = $(this).attr("data-dots") == "true" ? true : false,
				timeout = typeof $(this).attr("data-timeout") != "undefined" ? $(this).data("timeout") : 5000,
				autoplay = $(this).data("autoplay") != "undefined" ? $(this).data("autoplay") : false,
				loop = $(this).data("loop") != "" ? true : false, 
				carousel_id = $(this).attr("id");

			//auto height & margin 
			if( items == 1 ){
				autoHeight_ = true;
				margin = 0;
			}else{
				autoHeight_ = false;
				margin = margin;
			}

			//start carousel
			var carousel = carousel_holder.find(".owl-carousel"); 

			imagesLoaded( carousel ).on('done', function( instance ) {

				if( instance.images.length == 1 ){
					nav = dots = false;
				} 
				
				var startover;
				carousel.on('changed.owl.carousel', function(e) {

					if( ! autoplay ){
						return;
					}

					clearTimeout(startover); 

					if (!e.namespace || e.type != 'initialized' && e.property.name != 'position') return;
 
		 			var items = $(this).find('.active').size(); 

					if( e.item.index == e.item.count - items ){

						var startover = setTimeout(function() {
							carousel.trigger('to.owl.carousel',  [0, 400, true]);
						}, timeout );			

					}

				});
				

				carousel.owlCarousel({
					rtl: is_rtl ? true : false,
					//loop:loop, //isues with webkit
					autoplayTimeout : timeout,
					autoplay:autoplay,
					autoplayHoverPause:true,
					margin:margin,
					responsiveClass:true,					
					autoHeightClass: 'owl-height',
					navText: ["<span class=\"icon-left-open\"></span>","<span class=\"icon-right-open\"></span>"],
					responsive:{
						0:{
							items:1,
							nav:nav,
							dots:dots,
							autoHeight:( items == 1 ),
							dotsContainer: "#"+carousel_id+"-dots"
						},
						1024:{
							items:( items == 1 ) ? 1 : 2,
							nav:nav,
							dots:dots,
							autoHeight:( items == 1 ),
							dotsContainer: "#"+carousel_id+"-dots"
						},						
						1025:{
							items:items,
							nav:nav,
							dots:dots,
							autoHeight:( items == 1 ),
							dotsContainer: "#"+carousel_id+"-dots",
						}
					},
					onInitialized: callbacks ? callbacks._onInitialized : isotope_layout,
					onChanged: callbacks ? callbacks._onChanged : "",
					onRefreshed: callbacks ? callbacks._onRefreshed : "",
					onTranslated: isotope_layout,

				});

				//cosmetic fix for content carousels
				make_same_height(carousel,items);
				$(window).on('window_width_resize', function() { 
					setTimeout(function() {
						reset_carousel_heights(carousel,items);
						make_same_height(carousel,items); 
					}, 300);			
				});		

			});

		});

		//reset isotopes after carousel
		function isotope_layout(){

			var isotope_gallery = $(".masonry");

			if( isotope_gallery.length > 0 ){
				setTimeout(function() {	      				
					isotope_gallery.isotope('layout'); 
				}, 1000);							
			}
		}

		//get highest item of the carousel
		function get_highest_item( carousel ){
			var heights = [];
			carousel.find(".owl-item").each(function(){  
				heights.push($(this).outerHeight());   
			});

			return Math.max.apply(null, heights);
		}

		//reset carousel item heights
		function reset_carousel_heights( carousel, items ){

			if( items == 1 ){
				return false;
			} 

			carousel.find(".owl-item > div").each(function(){ 
				$(this).css({"min-height": ""});
			});
		}		 

		//make all carousel items in same height
		function make_same_height( carousel, items ){

			if( items == 1 ){
				return false;
			} 

			var height = get_highest_item( carousel );			

			carousel.find(".owl-item > div").each(function(){ 
				$(this).css({"min-height": height +"px"});
			});
		}

	}; 	

	$("body").rt_start_carousels();


	/* ******************************************************************************* 

		RIGHT BACKGROUND HEIGHT 

	********************************************************************************** */  

	if( ! $.fn.rt_side_height ){

		$.fn.rt_side_height = function()
		{ 

			var right_side = $("#right_side"),
				left_side = $("#left_side"),
				reduce = 0,
				height = 0,
				wp_admin_bar = $("#wpadminbar");

			if( wp_admin_bar.length > 0 ){
				reduce = wp_admin_bar.outerHeight();
			}

			if($.fn.is_mobile_menu()){
				height = "";
			}else{
				height = Math.max($(window).innerHeight(),left_side.height(),right_side.height()) - reduce +"px";
			}

			left_side.css( { "min-height" : height });
			right_side.css( { "min-height" : height });

		};
	}


	if ( $.fn.rt_side_height && is_layout1 ) {  

		$(window).on('resize', function() {     
			$.fn.rt_side_height();
		});	

		Pace.on('hide', function(){
			$.fn.rt_side_height();
		});

	}


	/* ******************************************************************************* 

		FIXED SIDEBAR POSITION

	***********************************************************************************/ 
	if( ! $.fn.rt_left_height ){

		$.fn.rt_left_height = function()
		{ 
			var left_side = $("#left_side");

			if( Modernizr.touch ){
				left_side.removeClass("fixed_position scroll");
				return ;
			}

			$(window).off(".rt_sidebar");

			if( ! left_side.hasClass("fixed_position")){
				return ;
			}

			var side_content = $("#side_content").removeAttr("style"),
				side_content_height = side_content.innerHeight(),
				content_height = $("body").height(),
				side_content_top_pos = side_content.offset().top,
				$window = $(window),
				window_height = $window.height(),
				window_scrollTop = $window.scrollTop(),
				diff = window_height - ( ( side_content_top_pos - window_scrollTop ) + side_content_height );			

				if( diff > 0 ){
					return false;
				} 

				//make two side heights are equal  
				if ( side_content_height > content_height ) {
					$("#right_side").css( { "min-height" : side_content_height+side_content_top_pos+"px"});
				}

				//scroll
				$(window).on("scroll.rt_sidebar", function( event ){

					var y = -1 * $window.scrollTop();

						y = Math.max( y, diff );

						$(side_content).css({ 
							"-webkit-transform": "translateY("+y+"px)",
							"-moz-transform": "translateY("+y+"px)",
							"-ms-transform": "translateY("+y+"px)",
							"-o-transform": "translateY("+y+"px)",
							"transform": "translateY("+y+"px)"
						});

						$(side_content).attr("data-position-y",y);		

				});
		};
	}

	if ( $.fn.rt_left_height && is_layout1 ) {  

		$(window).on('resize', function() {     
			$.fn.rt_left_height();
		});	

		Pace.on('hide', function(){
			$.fn.rt_left_height();
		}); 		
	} 
 

	/* ******************************************************************************* 

		PARALLAX SIDEBAR BACKGROUND IMAGE

	***********************************************************************************/ 

	$.fn.rt_left_background = function(durum)
	{

		var left_side =  $("#left_side");

		if( left_side.length == 0 ){
			return;
		}
		
	  	var parallax_effect = ! Modernizr.touch ? left_side.attr("data-parallax-effect") : false,
			$window = $(window),
			window_height =  $window.height(),
			side_width =  document.getElementById("left_side").getBoundingClientRect().width,
			side_content = $("#side_content"),
			side_content_width = side_content.innerWidth(),
			side_content_height = side_content.outerHeight(),
			padding_top = 50, //#left_side top padding
			side_background_holder = left_side.find(".left-side-background-holder");


			var parallax_height = parallax_effect ? 300 : 100,
				parallax_height = window_height + parallax_height; 		

			side_background_holder.find(".left-side-background").css({ 
							"width": side_width+100+"px",
							"height": parallax_height+"px"
						});

			//turn off parallax if it is not enabled
			if ( ! parallax_effect || Modernizr.touch ) {
				return false;
			}

			//parallax effect
			$(window).on("scroll.rt_left_background", function( event ){

				//for the side background image
				var y = Math.max ( -1 * ( $window.scrollTop() * 0.03 ), - ( parallax_height - window_height ) ) ; 

				side_background_holder.find(".left-side-background").css({  
						"-webkit-transform": "translateY("+y+"px)",
						"-moz-transform": "translateY("+y+"px)",
						"-ms-transform": "translateY("+y+"px)",
						"-o-transform": "translateY("+y+"px)",
						"transform": "translateY("+y+"px)"
				});  

			});		

		return false;	
	}

	if( is_layout1 ){
		imagesLoaded( "body" ).on('done', function( instance ) {

			$(window).on('resize', function() {     
				$.fn.rt_left_background("resize");
			});	

			$.fn.rt_left_background("load");
		}); 
	}


	/* ******************************************************************************* 

		WOOCOMMERCE CART UPDATE FOR WC CART WIDGET
		Fixes the fixed left column height after new items added to the cart

	********************************************************************************** */  

	if( is_layout1 ){
			$("#tools > ul > li > span").on("click",function(e){


				var holder = $(this).parent("li"),
					 widget = holder.find("div:eq(0)");

				$("#tools > ul > li").each(function(){				

					if ( ! $(this).is(holder) ){
						$(this).removeClass("active");	
					}
					
				});


				if( holder.hasClass("active") ){ 
					holder.removeClass("active");	
				}else{
					holder.addClass("active");
					

					if( ! is_rtl ){
						widget.css({"margin-left": -1 * holder.position().left +"px"});
					}else{
						widget.css({"margin-right":"0"}).css({"margin-right":  widget.position().left + holder.position().left +"px"});
					}
						
				}

				$.fn.rt_left_height();
				$(window).trigger("scroll");  

			});
	}


	if( is_layout2 ){
			$("#tools > ul:first-child > li > span").on("click",function(e){

				if( ! $(this).hasClass("active") ){
					$(this).addClass("active");
					$("#tools > ul:last-child").addClass("active");
				}else{
					$(this).removeClass("active");
					$("#tools > ul:last-child").removeClass("active");
				}


			});
	}
 
	/* ******************************************************************************* 

		WOOCOMMERCE FLYING ADDED TO CART ITEM

	********************************************************************************** */  
 
	if ( ! $.fn.rt_flying_cart ) {  

		$.fn.rt_flying_cart = function()
		{ 

			if( typeof wc_cart_fragments_params == 'undefined' ){
				return ;
			}

			if( $(".product_holder.woocommerce").length == 0 ){
				return ;
			}

			$( '.add_to_cart_button' ).on( 'click', function() {

				var $this = $(this),
					y = $(this).offset().top,
					x = $(this).offset().left,
					number = $("#tools .cart .number"),
					ty= number.offset().top,
					tx= number.offset().left

				//freeze scroll
				$("body").css({"overflow":"hidden"});
				var unfreeze = setTimeout(function(){ $("body").css({"overflow":"visible"}); }, 5000);
				
				//bind to added_to_cart
				$( 'body' ).bind( 'added_to_cart',  function() {

					var img_src = $this.parents(".product_item_holder").find(".featured_image img").attr("src"),
						img_holder = $('<div></div>');

						img_holder.css({
							"background-image" : "url("+img_src+")",
							"background-size" : "cover",
							"background-repeat" : "no-repeat",
							"background-position" : "center center",
							"border-radius" : "50%",
							"width" : "0px",
							"height" : "0px",
							"position" : "absolute",
							"z-index" : 9999999
						});

						img_holder.prependTo("body");		 				

						img_holder.css({
								"opacity": 0,
								"top": y+"px",
								"left": x+"px",
							}).animate({
								"opacity": 1,
								"width": "150px",
								"height": "150px"
							},500).animate({
								"top": +ty+"px",
								"left": +tx+"px",
								"padding": "0",
								"width": "18px",
								"height": "18px"		
							},700).animate({
								"opacity": 0
							},400,function(){
								img_holder.remove();

							//fix left side
							$.fn.rt_left_height();
							$(window).trigger("scroll"); 
							
							$("body").css({"overflow":"visible"});
							clearTimeout(unfreeze);
					
						});						
						$(this).unbind('added_to_cart');
				});

			});

		}
	} 
 
	$.fn.rt_flying_cart();


	/* ******************************************************************************* 

		SEARCH WIDGET

	********************************************************************************** */  
	$(".wp-search-form span").on('click', function() {     
		$(this).parents("form:eq(0)").submit();
	});	

	/* ******************************************************************************* 

		FIXED FOOOTERS

	********************************************************************************** */  

	if( ! $.fn.rt_fixed_footers ){

		$.fn.rt_fixed_footers = function()
		{ 

			if(is_layout2){
				var footer = $(this),
					header = $(".top-header"),
					main_content = $("#main_content"),
					sub_page_header = $(".sub_page_header"),
					wp_admin_bar = $("#wpadminbar"),
					footer_height = footer.outerHeight(true);

				if ( Modernizr.touch ) {
					footer.removeClass( "fixed_footer" );
					return ;
				}			

				if( 
					$(window).height() - ( header.outerHeight() + header.position().top + wp_admin_bar.outerHeight() + sub_page_header.outerHeight() ) < footer_height 
					|| main_content.height() - 160 < footer_height 
					|| $("body").outerHeight() - $(window).height() < footer_height
				){
					footer.removeClass( "fixed_footer" );
					main_content.css( { "margin-bottom" : "0px" });
				}else{
					footer.addClass( "fixed_footer" );
					main_content.css( { "margin-bottom" : footer_height +"px" });				
				}
			}else{
				var footer = $(this),
					right = $("#right_side"),
					top_bar = $("#top_bar"),
					main_content = $("#main_content"),
					sub_page_header = $(".sub_page_header"),
					wp_admin_bar = $("#wpadminbar"),
					footer_height = footer.outerHeight(true);

				if ( Modernizr.touch ) {
					footer.removeClass( "fixed_footer" );
					return ;
				}			

				if( $(window).height() - ( top_bar.outerHeight() + wp_admin_bar.outerHeight() + sub_page_header.outerHeight() ) < footer_height 
					|| main_content.height() -160 < footer_height 
					|| right.outerHeight() - $(window).height() < footer_height ){
					footer.removeClass( "fixed_footer" );
					right.css( { "padding-bottom" : "0px" });
				}else{
					footer.addClass( "fixed_footer" );
					right.css( { "padding-bottom" : footer_height +"px" });				
				}
			}

		};
	}

	if ( $.fn.rt_fixed_footers ) {  

		Pace.on('hide', function(){
			
			$(window).on('resize', function() {     
				$('[data-footer="fixed_footer"]').rt_fixed_footers();
			});				

			$('[data-footer="fixed_footer"]').rt_fixed_footers();
		}); 		
	}


	/* ******************************************************************************* 

		SOCIAL SHARE 

	********************************************************************************** */
 
	$(".social_share_holder a").click(function( event ) {		

		//if email button clicked do nothing
		if( $(this).hasClass("icon-mail") ){
			return ;
		}

		//for other buttons open a popup window
		newwindow=window.open($(this).attr("data-url"),'name','height=400,width=400');

		if (newwindow == null || typeof(newwindow)=='undefined') {  
			alert( rt_theme_params["popup_blocker_message"] ); 
		}else{  
			newwindow.focus();
		}

		event.preventDefault();
	});

	/* ******************************************************************************* 

		Tooltips

	********************************************************************************** */
	$('[data-toggle="tooltip"]').tooltip();


	/* ******************************************************************************* 

		IMG effects

	********************************************************************************** */
	if( ! $.fn.rt_img_effect ){

		$.fn.rt_img_effect = function()
		{ 
			$(this).find('.imgeffect').each(function() {
				$('<div/>').append($(this).find("img")).appendTo($(this));
			});
		};
	}

	$("#container").rt_img_effect();

	/* ******************************************************************************* 

		DROP RIGHT MENU

	********************************************************************************** */

	if( ! $.fn.rt_drop_right ){

		$.fn.rt_drop_right = function()
		{ 
			if ($(this).length == 0 ){
				return false;
			}

			$(this).on("mouseover",function(){

				if( $("body").hasClass("mobile-menu") ){
					return false;
				}

				if( $(this).prev() && $(this).parent().hasClass("sub-menu") ){
					var add = 0;
				}else{
					var add = 1;
				}

				var margin_top = -1 * ( $(this).outerHeight() + add );
				var sub_menu = $(this).find("ul:eq(0)").css({"margin-top":margin_top +"px"});

				if ( sub_menu.length == 0 ){
					return false;
				}

				var sub_menu_height = sub_menu.outerHeight(),
					sub_menu_position = $(sub_menu).offset().top,
					_window = $(window),
					window_height = _window.height()+margin_top,
					window_scrollTop = _window.scrollTop(),
					diff = window_height - ( ( sub_menu_position - window_scrollTop ) + sub_menu_height );

					if( diff < 0 ){ 
						sub_menu.css({"margin-top": margin_top + diff + "px"});
					} 

					if( sub_menu.offset().left + 250 > _window.width() ){ 
						sub_menu.css({"right": "250px"});
					} 
			});

		};
	}

	if( is_layout1 ){
		$('#navigation li').rt_drop_right();	
	}
  

	/* ******************************************************************************* 

		MOBILE DROP DOWN MENU

	********************************************************************************** */

	if( ! $.fn.rt_mobile_drop_down ){

		$.fn.rt_mobile_drop_down = function()
		{ 

			$(this).on("click",function(e){

				if( ! $("body").hasClass("mobile-menu") ){
					return ;
				}

				var $this = $(this).parent("li");				

				if( ! is_rtl ){

					if( ! $this.hasClass("menu-item-has-children") || e.pageX - $this.position().left < 225){
						return ;
					}

				}else{

					if( ! $this.hasClass("menu-item-has-children") || e.pageX - $("#left_side").position().left > 50 ){
						return ;
					}
				}
				
				e.preventDefault();

				$this.toggleClass("current-menu-item");

				return false;

			});

		};
	}

	$(window).on('load', function() {  
		$('#navigation li a').rt_mobile_drop_down();
	});

	/* ******************************************************************************* 

		TABLET NAVIGATION FIX FOR DEACTIVE STATE

	********************************************************************************** */    
	$("#container").on("click",function() { 
		return true;
	});


	/* ******************************************************************************* 

		LOAD MORE

	********************************************************************************** */    

	$(".load_more").on("click",function(e){
 
		e.preventDefault();	

		var button = $(this),
			listid = button.attr("data-listid"),
			page_count = parseInt(button.attr("data-page_count")) ,
			current_page = parseInt(button.attr("data-current_page")) ;

		//prevent multiple clicks before loading elements
		button.attr("disabled", "disabled");

		//check if there is more posts to display
		if( page_count == 1 ){
			return ;
		}

		//load more button classes
		button.children("span").removeClass("icon-angle-double-down").addClass("icon-spin1 animate-spin");
	
		//start ajax
		$.ajax({
			type: 'POST',
			url: rt_theme_params.ajax_url,
			data : {
				'action': 'rt_ajax_loader',
				'atts': $(this).attr("data-atts"),
				'wpml_lang': rt_theme_params.wpml_lang,
				'page': current_page + 1
			},		
			success: function(response, textStatus, XMLHttpRequest){

				var response = $(response), elems, wrapper, masonry;

					wrapper = $("#"+listid);	

					if( wrapper.hasClass("masonry") ){
						masonry = true;
					}	
					
					if( masonry ){
						elems = response.find(".isotope-item");	
					}else{
						elems = response.find("> div, > article");							
					}


				// wait the images 
				imagesLoaded( response ).on('done', function( instance ) {

					//append the elements and rebuild the masonry layout
					if( masonry ){
						wrapper.isotope().append( elems ).isotope( 'appended', elems );
					}else{
						wrapper.append( elems );					
					}

					//img effects for new loaded elements
					elems.rt_img_effect();

					//media player
					elems.rt_mediaelementplayer();

					//append isotope elements
					if( masonry ){ 
						wrapper.isotope('layout'); 
					}

					//lightboxes 
					$.jackBox.available(function() {
						elems.rt_lightbox("newItem");
					});

					//start carousels
					elems.rt_start_carousels( { '_onRefreshed' : function _onRefreshed(){
											if( masonry ){ 
												wrapper.isotope('layout'); 
											}
										}});

					//portoflio items
					elems.find(".type-portfolio.loop > .overlay").rt_portfolio_items();

					//the load more button
					button.children("span").removeClass("icon-spin1 animate-spin").addClass("icon-angle-double-down");

					//decrease the page count
					button.attr("data-page_count",page_count-1);

					//increase the current page count
					button.attr("data-current_page", current_page+1 );

					//remove the button if there is no page left
					if( page_count -1 <= 1 ){
						button.attr("disabled", "disabled").hide();
					}else{
						button.removeAttr("disabled");
					}

					//fix left side
					$.fn.rt_left_height();
					$(window).trigger("scroll");  
				});

			},
			error: function( MLHttpRequest, textStatus, errorThrown ){
				console.log(errorThrown);
			}		
		});
 
	});

	/* ******************************************************************************* 

		CUSTOM DESIGNED SELECT FORMS

	********************************************************************************** */  
	$.fn.rt_customized_selects = function() {
		if ( $.isFunction($.fn.customSelect) ) {
			$('.orderby, .variations select:not([multiple]), .widget .menu.dropdown-menu, .ginput_container select:not([multiple]), .wpcf7-form select:not([multiple])').customSelect( { customClass: "customselect" } );
		}
	};

	$(window).load(function(){
		$.fn.rt_customized_selects();

		//bind to gravity ajax load
		$(document).bind('gform_post_render', function(){			
			$.fn.rt_customized_selects();
		});

	});


	/* ******************************************************************************* 

		WC REVIEWS

	********************************************************************************** */  

	$(".woocommerce-review-link").click(function( event ){  
		var review_tab = $("#reviews-title");
		review_tab.trigger("click"); 
	});


	/* ******************************************************************************* 

		FORM VALIDATION

	********************************************************************************** */  

	$.fn.rt_contact_form = function() {
		
		$(this).each(function(){

			var the_form = $(this);

			the_form.find(".submit").click(function( event ){  

				//vars
				var loading = the_form.find(".loading"),
					error = false;

				//check required fields
				the_form.find(".required").each(function(){
					if( $(this).val() == "" ){
						$(this).addClass("error");
						error = true;
					}else{
						$(this).removeClass("error");
					}
				});

				//there is an error
				if(error){
					return ;
				}

				//show loading icon
				loading.show();

				//searialize the form
				var serialize_form = $(the_form).serialize();

				//ajax form data 
				var data = serialize_form +'&action=rt_ajax_contact_form';

				//post
				$.post(rt_theme_params.ajax_url, data, function(response) {
					var response = $(response);
					response.prependTo(the_form);
					loading.hide();
				});

				//close warnings
				the_form.find(".info_box").remove();

			});
		});
	}; 

	$('.validate_form').rt_contact_form();
 

	/* ******************************************************************************* 

		INFO BOX CLOSE

	********************************************************************************** */  
	$(document.body).on("click",".info_box .icon-cancel",function() { 
		$(this).parent(".info_box").fadeOut();
	}); 




	/* ******************************************************************************* 

		PORTFOLIO ITEMS 

	********************************************************************************** */    

	$.fn.rt_portfolio_items = function() {
		$(this).each(function(){
			var text = $(this).find(".text"),
				holder_height = $(this).height(),
				text_height = text.height(),
				margin = ( text_height < holder_height ) ? ( holder_height - text_height ) / 2 : 0;

				text.css({
					"margin-top": margin + "px",
					"max-height": holder_height + "px"
				});
		}); 
	};

	Pace.on('hide', function(){
		$(".type-portfolio.loop > .overlay").rt_portfolio_items();
	});
	
 
	/* ******************************************************************************* 

		LIGHTBOX PLUGIN

	********************************************************************************** */    

	$.fn.rt_lightbox = function(event) {
		if ($.jackBox){
			$(this).find(".lightbox_[data-group]").jackBox(event, { preloadGraphics: false, baseName: rt_theme_params["rttheme_template_dir"] +"/js/lightbox", className: ".lightbox_", deepLinking : false, socialMedia : false, showInfoByDefault: true});  
		}

	};

	$(document).rt_lightbox("init");



	/* ******************************************************************************* 

		RT GOOGLE MAPS

	********************************************************************************** */  
	$.rt_maps = function(el, locations, zoom){

		var base = this; 
		base.init = function(){ 
			// initialize google map
			if(locations.length>0) google.maps.event.addDomListener(window, 'load', $.fn.rt_maps());  

		};
 
		if(locations.length>0) base.init();
	}; 

	$.fn.rt_maps = function(locations, zoom){		 

		var map_id = $(this).attr("id");  
 
		//holder height
		var height = $('[data-scope="#'+map_id+'"]').attr("data-height");   

		if ( height > 0 ){
			$(this).css({'height':height+"px"});
		}

		//api options
		var myOptions = {
			zoom: zoom,
			panControl: true,
			zoomControl: true,
			scaleControl: true,			
			streetViewControl: false,
			overviewMapControl: false,
			scrollwheel : false,
			navigationControl: true,
			center: new google.maps.LatLng(0, 0),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}			 
 
		var map = new google.maps.Map( document.getElementById(map_id), myOptions);		
		$.fn.setMarkers(map, locations);

		$.fn.fixTabs(map,map_id,zoom);
		$.fn.fixAccordions(map,map_id,zoom);
	};

	$.fn.setMarkers = function (map, locations) {
		 

		if(locations.length>1){
			var bounds = new google.maps.LatLngBounds();	 
		}else{
			var center = new google.maps.LatLng(locations[0][1], locations[0][2]);
			map.panTo(center);			
		}


		for (var i = 0; i < locations.length; i++) {
			if (locations[i] instanceof Array) {
				var location = locations[i];
				var myLatLng = new google.maps.LatLng(location[1], location[2]);
				var marker = new google.maps.Marker({
					position: myLatLng,
					map: map,
					animation: google.maps.Animation.DROP,
					draggable: false,
					title: location[0]
				});

				$.fn.add_new_event(map,marker,location[4]);
				if(locations.length>1) bounds.extend(myLatLng);
			}
		}

		if(locations.length>1)  map.fitBounds(bounds);
	};
	 
	$.fn.add_new_event = function (map,marker,content) {

	  if(content){
			var infowindow = new google.maps.InfoWindow({
				content: content,
				maxWidth: 300
			});
			google.maps.event.addListener(marker, 'click', function() {;
			infowindow.open(map,marker);
		});
	  }
	}; 

	$.fn.fixTabs = function (map,map_id,zoom) {
		var tabs = $("#"+map_id).parents(".rt_tabs:eq(0)"),
			desktop_nav_element = tabs.find("> .tab_nav > li"),
			mobile_nav_element = tabs.find("> .tab_contents > .tab_content_wrapper > .tab_title");

		desktop_nav_element.on("click",  { map: map } , function() { 
			var c = map.getCenter();  
			google.maps.event.trigger(map, 'resize'); 
			map.setZoom(zoom); 
			map.setCenter(c);  
		});
 
		mobile_nav_element.on("click",  { map: map } , function() { 
			var c = map.getCenter();  
			google.maps.event.trigger(map, 'resize'); 
			map.setZoom(zoom); 
			map.setCenter(c);  
		});

	};	

	$.fn.fixAccordions = function (map,map_id,zoom) {
		var panes = $("#"+map_id).parents(".rt-toggle:eq(0) > ol > li");

		panes.on("click",  { map: map } , function() { 
			var c = map.getCenter();  
			google.maps.event.trigger(map, 'resize'); 
			map.setZoom(zoom); 
			map.setCenter(c);  
		}); 

	};	

	/* ******************************************************************************* 

		SLIDER PARALLAX EFFECT

	********************************************************************************** */  

	$.fn.rt_slider_position = function()
	{
		var slider =  $('#main_content > .content_row:first-child .main-carousel[data-parallax="true"]');

		if( slider.length == 0 || Modernizr.touch ){
			return ;
		}

		var	parallax_effect = ! Modernizr.touch ? true : false,		
			wp_admin_bar_height = $("#wpadminbar").outerHeight(),
			offsetTop = slider.offset().top,
			sliderHeight = slider.outerHeight(),
			gap = offsetTop - wp_admin_bar_height,
			carousel = slider.find(".owl-stage-outer"),
			$window = $(window);


			//parallax effect
			$(window).on("scroll", function( event ){

				var scrollTop = $window.scrollTop() - gap ;

				 
				if( sliderHeight < scrollTop ){
					return ;
				}

				var y = Math.max( 0, scrollTop ),
					cy = 0.4*y;

 
				carousel.css({ 
					"-webkit-transform": "translateY("+cy+"px)",
					"-moz-transform": "translateY("+cy+"px)",
					"-ms-transform": "translateY("+cy+"px)",
					"-o-transform": "translateY("+cy+"px)",
					"transform": "translateY("+cy+"px)"
				});


			});			
	}


	$(window).on('resize', function() {     
		$.fn.rt_slider_position();
	});	

	Pace.on('hide', function(){
		$.fn.rt_slider_position();
	}); 

	/* ******************************************************************************* 

		MEDIA PLAYER

	********************************************************************************** */  

	$.fn.rt_mediaelementplayer = function() {
		
		$(this).find(".rt-hosted-media video, .rt-hosted-media audio").mediaelementplayer();
	}; 

	$(document).rt_mediaelementplayer();


	/* ******************************************************************************* 

		PARALLAX BACKGROUNDS

	********************************************************************************** */  

	if( ! $.fn.rt_parallax_backgrounds ){

		$.fn.rt_parallax_backgrounds = function(options)
		{ 
			if( Modernizr.touch ){
				return ;
			}

			$(this).each(function(){
				
				var row = $(this).parents("div:eq(0)"),
					row_height = row.outerHeight() ,
					row_width = row.outerWidth() ,
					row_inheight = row.height(), 
					row_paddings = row_height - row_inheight,
					speed = ( row_height / $(window).height() ) + 1, 
					holder_height = row_height * speed,
					holder_width = row_width * speed,
					effect = $(this).attr("data-rt-parallax-effect"), // vertical, horizontal
					direction = $(this).attr("data-rt-parallax-direction"); // -1 down/right , 1 up/left
 

					if( effect == "horizontal" ){
						$(this).css({ "height":row_height+4+"px", "width":holder_width+"px" });	
					}else{
						$(this).css({ "height":holder_height+"px", "width":row_width+4+"px" });	
					}
 

					if( effect == "horizontal" ){
						$(this).rt_horizontal_parallax_effect({ row: row, row_width: row_width, holder_width: holder_width, direction: direction });
					}else{
						$(this).rt_vertical_parallax_effect({ row: row, row_height: row_height, holder_height: holder_height, direction: direction });	
					}
			
	 
 
			});
		} 
 
		$.fn.rt_horizontal_parallax_effect = function( options )
		{ 
			var $this = $(this),
				$window = $(window),
				invisible_part = options["holder_width"] - options["row_width"],
				posTop = options["row"].offset().top,
				start_position = options["direction"] == -1 ? -1 * invisible_part : 0;
 
			//start position of the parallax layer
			$this.rt_parallax_apply_css(start_position, 0 );

			//scroll function
			$(window).scroll(function(event) {

				if( ( posTop - $window.height() ) > $window.scrollTop() ){
					return ;
				}

				var move_rate  = ( $window.scrollTop() *  invisible_part ) / ( posTop + options["row_width"] ); 
				var xPos = options["direction"] == 1 ? -1 * move_rate :  -1 * invisible_part + move_rate ;

				if( xPos < -1 * invisible_part ) xPos = -1 * invisible_part; //max left position					
				if( xPos > 0 ) xPos = 0;  //max right position

				$this.rt_parallax_apply_css(xPos, 0);

			});
		}	


		$.fn.rt_vertical_parallax_effect = function( options )
		{ 
			var $this = $(this),
				$window = $(window),
				invisible_part = options["holder_height"] - options["row_height"],
				posTop = options["row"].offset().top,
				start_position = options["direction"] == -1 ? -1 * invisible_part : 0;
 
			//start position of the parallax layer
			$this.rt_parallax_apply_css(0, start_position );
  
			//scroll function
			$(window).scroll(function(event) {

				if( (posTop - $window.height() ) > $window.scrollTop()  ){
					return ;
				}

				var move_rate  = ( $window.scrollTop() *  invisible_part ) / ( posTop + options["row_height"] ); 
				var yPos = options["direction"] == 1 ? -1 * move_rate :  -1 * invisible_part + move_rate ;

				if( yPos < -1 * invisible_part ) yPos = -1 * invisible_part; //max bottom position					
				if( yPos > 0 ) yPos = 0;  //max top position	
			
				$this.rt_parallax_apply_css(0, yPos);	

				//sub page headers
				if( $this.parent(".content_row").hasClass("sub_page_header") ){
					$this.next(".content_row_wrapper").find(".page-title").rt_parallax_apply_css( 0, $window.scrollTop() / 6 );	
				}
 
			});
		}		


		$.fn.rt_parallax_apply_css = function( x, y )
		{ 

			var is_rtl = $("body").hasClass("rtl");

			//if it is rtl language make it reverse
			x = is_rtl ? -1 * x : x; 

			$(this).css({ 
				"-webkit-transform": "translate("+x+"px, "+y+"px)",
				"-moz-transform": "translate("+x+"px, "+y+"px)",
				"-ms-transform": "translate("+x+"px, "+y+"px)",
				"-o-transform": "translate("+x+"px, "+y+"px)",
				"transform": "translate("+x+"px, "+y+"px)" 
			});
 
		}		
	}


	if ( $.fn.rt_parallax_backgrounds ) {  

		$(window).on('resize', function() {     
			$('.rt-parallax-background').rt_parallax_backgrounds();   

			if( ! Modernizr.touch ){
				window.scrollTo(0,0);			
			}

		});	

		//start first to get rid of white images
		imagesLoaded( "body" ).on('done', function( instance ) {
			$('.rt-parallax-background').rt_parallax_backgrounds();   
		}); 
	}


	/* ******************************************************************************* 

		RT Fixed Rows  

	********************************************************************************** */

	$.fn.rt_fixed_rows = function( action ) {

		function fix_heights(row) {
			row.each(function(){

				var this_row_height = $(this).height();

				if( Modernizr.csstransforms3d ){
					$(this).find(" > .wpb_column,  > .col").css({'min-height': this_row_height });
				}else{//ie9 or before
					$(this).find(" > .wpb_column,  > .col").css({'height': this_row_height });
				}

			});	
		}

		function reset_heights(row) {
			row.each(function(){

				var this_row_height = $(this).height();
				if( Modernizr.csstransforms3d ){
					$(this).find(" > .wpb_column, > .col").css({'min-height': "auto" });
				}else{//ie9 or before
					$(this).find(" > .wpb_column, > .col").css({'height': "auto" });
				}

			});	

			row.rt_fixed_rows("load");
		}
		
		if( action == "reset"){
			$(this).each(function(){
				if( $(this).children(".content_row_wrapper").length > 0 ){
					reset_heights( $(this).children(".content_row_wrapper") );
				}

				if( $(this).find(".content_row").length > 0 ){
					reset_heights( $(this).find(".content_row") );
				}

				if( $(this).find(".row").length > 0 ){
					reset_heights( $(this).find(".row") );
				}

				reset_heights( $(this) );
			}); 		
		}

		if( $(window).width() < 767 ){
			return false;
		} 

		if( action == "load"){
			$(this).each(function(){
				if( $(this).children(".content_row_wrapper").length > 0 ){
					fix_heights( $(this).children(".content_row_wrapper") );
				}

				if( $(this).find(".content_row").length > 0 ){
					fix_heights( $(this).find(".content_row") );
				}

				if( $(this).find(".row").length > 0 ){
					fix_heights( $(this).find(".row") );
				}

				fix_heights( $(this) );
			}); 
		}

	}; 

	//run the script
	Pace.on('hide', function(){
		$('.fixed_heights').rt_fixed_rows("load");

		//run the script
		$(window).on('window_width_resize', function() { 
			setTimeout(function() {
				$('.fixed_heights').rt_fixed_rows("reset"); 
			}, 700);			
		});		
  
	});


	/* ******************************************************************************* 

		MASONRY LAYOUTS

	********************************************************************************** */  

	$.fn.rt_run_masonry_isotope = function(options) {
		
		$(this).each(function(){
			var $container = $(this),
				$filter_navigation = $('[data-list-id="'+$(this).attr("id")+'"]'),
				colWidth = function () {
					var w = $container.width(), 
						columnNum = $container.attr("data-column-width"),
						columnWidth = Math.floor( w / columnNum );

						//fix column width
						if( w === (columnWidth * columnNum)){
							columnWidth = columnWidth - 0.5; 
						}

						//draw the lines
						$container.rt_vertical_lines({
							"w": w,
							"columnNum" : columnNum
						});

						return columnWidth;
				},
				isotope = function () {
					$container.isotope({
						resizable: false,
						itemSelector: '.isotope-item',
						masonry: {
							columnWidth: colWidth(),
							gutterWidth: 0
						}
					});
				};
				isotope();

				//filter nativation
				$filter_navigation.rt_filter_nav( $container );				
		});

	}; 

	$.fn.rt_run_grid_isotope = function(options) {
		var $container = $(this),
			$filter_navigation = $(".filter-holder"),
			colWidth = function () {
				var w = $container.width(), 
					columnNum = $container.attr("data-column-width"),
					columnWidth = Math.floor( w/columnNum );

					//fix column width
					if( w === (columnWidth * columnNum)){
						columnWidth = columnWidth - 0.5; 
					}
						
					return columnWidth;
			},
			isotope = function () {
				$container.isotope({
					resizable: false,
					itemSelector: '.col',
					layoutMode: 'fitRows' 
				});
			};
		isotope();

		//filter nativation
		$filter_navigation.rt_filter_nav( $container );

	}; 

	//a function for drawing vertical lines to masonry layouts
	$.fn.rt_vertical_lines = function(options) {
 
		var options = $.extend({
			w: 980,
			columnNum: 3,
		}, options);

		//clear newlines first for winresize
		$(".vertical_line").remove();

		//create new 
		var new_line = $('<div class="vertical_line"></div>');

		for (var i = 1; i < options["columnNum"]; i++) {
			
			new_line.clone().css({"left": ( options["w"] / options["columnNum"] ) * i + "px"}).prependTo( $(this) );

		};

	}; 

	//a function for filter navigation classes on click
	$.fn.rt_filter_nav = function( $container ) {
 
		var $optionLinks = $(this).find('a');

		$optionLinks.click(function(){
			var $this = $(this),
				selector = $(this).attr('data-filter'); 

			//filter items
			$container.isotope({ filter: selector });

			// add active class to the navigation item
			if ( $this.hasClass('active') ) {
				// don't proceed if the current item already selected
				return false;
			}

			var $optionSet = $this.parents('.filter_navigation');
			$optionSet.find('.active').removeClass('active');
			$this.addClass('active');

			return false;
		}); 

	}; 


	//start isotopes
	$(window).on('load window_width_resize', function() {  
		$('.masonry').rt_run_masonry_isotope();
		$('.border_grid.filterable').rt_run_grid_isotope();
	});





})(jQuery); 