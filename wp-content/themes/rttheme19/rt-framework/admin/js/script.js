/*!
 * RT-Theme 19 WordPress Theme Admin Scripts
 * Copyright (C) 2014 RT-Themes
 * http://rtthemes.com
 *
 * Various scripts for admin UI Only 
 */


/*
*
*	CLOSE MODAL WINDOW
* 
*/	
jQuery(function($){

	$(document.body).on("click",'.rt_modal_close',function(){

		$(this).parents(".rt_modal:eq(0)").css({"display":"none"});
 
		//reset & remove body scroll
		$('html, body').css({"overflow":"auto"});
 
	});
});

/*
*
* 	RT-THEME RESET SETTINGS
* 	
*/	
jQuery(function($){

	$("#rt_theme_reset_settings input").on("click",function(e){ 
			save_control_confirm = confirm( rt_variables.reset_theme );

			if( ! save_control_confirm ){ 
		  		return false; 
			}

	});

});

/*
*
*	FORCE WP-CUSTOMIZER SAVE BUTTON REFRESH THE FRAME 
*	after save & publish
*
*/	
jQuery(function($){

	$("#customize-controls #save").on("click",function(){ 
		wp.customize.previewer.refresh() 
	}); 

});


/*
*
*	DEPENDENCIES
*
*/	
jQuery(function($){

	$("[data-depends-id]").each(function() {

		var customizer = false;
		var theRow = $(this);
		var theSelectBox = $("#"+theRow.attr("data-depends-id"));
		var array = $.makeArray(theRow.attr("data-depends-values").split(","));		
		var holder = theRow;

		if ( theSelectBox.length == 0 ) {
			theSelectBox =  $("[data-customize-setting-link='"+theRow.attr("data-depends-id")+"']");
			holder = $(this).parents(".customize-control:eq(0)");
			var customizer = true;
		}

		theSelectBox.on("change",function(){

			var selectedValue = $('option:selected', this).val();
			
 			if( $.inArray( selectedValue, array ) >= 0 ){
				holder.show().effect("highlight", 700);
			}else{
				holder.hide(); 
			}

		});

		theSelectBox.trigger("change");
	});
});

/*
*
*	CUSTOMIZER LAYOUT DEPENDENCIES
*
*/	
jQuery(function($){

	var layout_list = $("#customize-control-rttheme19_layout");
	var selected_layout = $('option:selected', layout_list).val();
	var sections_list = {
	
								"layout1" : [
													"#accordion-section-rt_color_schemas_left,#accordion-section-rt_color_schemas_right,#accordion-section-rt_color_schemas_widgets,#accordion-section-rt_general_options_shortcuts,#customize-control-rttheme19_logo_seperator_2,#customize-control-rttheme19_logo_background_color_mobile,#customize-control-rttheme19_logo_bottom_border_color_mobile,#customize-control-rttheme19_logo_font_color_mobile",//show
													"#accordion-section-rt_color_schemas_main_header,#customize-control-rttheme19_logo_box_width,#customize-control-rttheme19_logo_box_height,#accordion-section-rt_color_schemas_top_shortcut_buttons,#customize-control-rttheme19_nav_seperator_3,#customize-control-rttheme19_mobile_nav_background_color,#customize-control-rttheme19_sticky_logo_url,#customize-control-rttheme19_body_seperator,#customize-control-rttheme19_body_margin_top,#customize-control-rttheme19_body_margin_bottom,#accordion-section-rt_general_options_sidebars",//hide
												],
								"layout2" : [
													"#accordion-section-rt_color_schemas_main_header,#customize-control-rttheme19_logo_box_width,#customize-control-rttheme19_logo_box_height,#accordion-section-rt_color_schemas_top_shortcut_buttons,#customize-control-rttheme19_nav_seperator_3,#customize-control-rttheme19_mobile_nav_background_color,#customize-control-rttheme19_sticky_logo_url,#customize-control-rttheme19_body_seperator,#customize-control-rttheme19_body_margin_top,#customize-control-rttheme19_body_margin_bottom,#accordion-section-rt_general_options_sidebars",//show
													"#accordion-section-rt_color_schemas_left,#accordion-section-rt_color_schemas_right,#accordion-section-rt_color_schemas_widgets,#accordion-section-rt_general_options_shortcuts,#customize-control-rttheme19_logo_seperator_2,#customize-control-rttheme19_logo_background_color_mobile,#customize-control-rttheme19_logo_bottom_border_color_mobile,#customize-control-rttheme19_logo_font_color_mobile",//hide
												],
							};
	
	layout_changer(sections_list,selected_layout);

	layout_list.on("change",function(){
			layout_changer(sections_list,$('option:selected', layout_list).val());
	});


	function layout_changer(sections_list,selected_layout){ 
			$.each(sections_list,function(layout,selectors){

			if( selected_layout == layout ){
					$(selectors[0]).removeClass("rt-hide-section");
					$(selectors[1]).addClass("rt-hide-section");
			}			

		});
	}

});


/*
*
*	PRODUCT TABS
*
*/	
jQuery(function($){
	$( "#rttheme_product_tabs, #styling_options_tabs" ).tabs();
}); 


/*
*
*	SHOW HIDE HELP TEXTS
*
*/	

jQuery(function($){
	$(document.body).on('click', '.tooltip_icon', function(event) { 
		var help_text= $(this).parents('.table-row:eq(0)').find(".desc:eq(0)"); 
		help_text.slideToggle('fast').toggleClass("active");
 		
 		$(this).toggleClass("clicked");
	});
});

/*
*
*	SHORTCODE HELPER
*
*/	
jQuery(function($){

	//start tabs
	$( "#rttheme_shortcode_helper .vertical_tabs" ).tabs();

	//scroll top on tab clik
	$( "#rttheme_shortcode_helper .ui-tabs-anchor" ).on('click', function() { 
		$( ".modal_content").stop().animate({ scrollTop: 0 }, 300);
	});

	//open close the modal window
	$( "#wp-admin-bar-rt_shortcode_helper_button" ).on('click', function() { 
		
		//open the modal	 
		$( "#rttheme_shortcode_helper").show('fade', { duration: 300, easing: 'swing' });


		//reset & remove body scroll
		$('html, body').css({"overflow":"hidden"}).scrollTop(0);

		//make insert buttons visible if there is an active editor
		if( "undefined"!=typeof tinyMCE ){ 

			if( null != window.tinyMCE.activeEditor ){  

				if( "" != window.tinyMCE.activeEditor.editorId && "rt_hidden_rich_editor" != window.tinyMCE.activeEditor.editorId ){  			
					$( "#rttheme_shortcode_helper .insert_to_editor").css({display:"block"});
				}else{
					$( "#rttheme_shortcode_helper .insert_to_editor").css({display:"none"});
				}
			}

		}else{
			$( "#rttheme_shortcode_helper .insert_to_editor").css({display:"none"});
		}

	});


	//insert to editor
	$( ".insert_to_editor" ).on('click', function() { 
		
 		//the shortcode
 		var shortcode = $(this).prev("textarea").val();
 		var new_shortcode = "";


 		if( $( "#" + tinymce.activeEditor.id ).parents("#wp-content-wrap").hasClass("html-active") === false ){//check if html tab is not active
			// replace new lines with <br /> if the line ends with a bracket ]
			
			shortcode_lines = shortcode.split(/\n/);
			for (i = 0, l = shortcode_lines.length; i < l; i++ ) {
				
				new_shortcode = new_shortcode + shortcode_lines[i];
				this_line = $.trim(	shortcode_lines[i] );
				this_last_char = this_line.substr(this_line.length - 1);

				if ( this_last_char != ">" ){
					new_shortcode = new_shortcode + "<br />"
				}
			}

		}else{
			new_shortcode = shortcode;
		}
 
		wp.media.editor.insert(new_shortcode); 
		
		$( "#rttheme_shortcode_helper .rt_modal_close" ).trigger("click");

	});

	//add editor shortcut button
	if( "undefined" !=typeof tinymce ){  
	
		if( "undefined" !=typeof tinymce.create ){ 
			tinymce.create('tinymce.plugins.rt_theme_shortcodes', {
				init : function(ed, url) {

					ed.addButton('rt_themeshortcode', {
						title : 'Theme Shortcodes',
						image : url+'/../images/theme-shorcodes.png', 
						onclick : function() {
								jQuery( "#wp-admin-bar-rt_shortcode_helper_button" ).trigger("click");
						}
					});				
				},
				createControl : function(n, cm) {
					return null;
				},
				getInfo : function() {
					return {
						longname : "Shortcodes",
						author : 'RT-Theme',
						version : "1.0"
					};
				}
			});
			tinymce.PluginManager.add('rt_themeshortcode', tinymce.plugins.rt_theme_shortcodes);
		}
	}	

	//add editor shortcut button
	//scroll top on tab clik
	$( ".rt_clean_copy" ).on('click', function() { 

		if( $(this).hasClass("clicked") ){
			return ;
		}

		var the_text = $(this).html();
		var text_field = $('<input type="text" value="'+the_text+'" style="width:100px;">');

		$(this).html("");
		$(this).addClass( "clicked" );
		text_field.appendTo( $(this) );

		text_field.select();

 
	});
});


/*
*
*	ADMIN TOOL-TIPS
*
*/	

jQuery(function($){

	$(".style_parts > div").on('mouseenter mouseleave', function(event) { 
		var tooltip_text= $(this).attr('data-desc'); 
		var tooltip_div  = $('<div class="rt_tooltip_message">'+ tooltip_text +'</div>');
		$(".rt_tooltip_message").remove();

		if(event.type == "mouseenter"){
			$("body").append(tooltip_div);
			tooltip_div.css({"top":$(this).offset().top - ( tooltip_div.height() / 2 ) ,"left":$(this).offset().left-240});
		}
		 		
	});
});

/*
*
*	START PLUGINS FOR AJAX LOADED ELEMENTS
*
*/	

(function($){
	$.fn.start_scripts = function(container,randomClass,purpose) {
 
		//multi selection script
		if(randomClass) randomClass = "."+randomClass;

		$(container).find(".multiple"+randomClass).asmSelect({
			addItemTarget	: 'bottom',
			animate			: true,
			highlight		: true,
			removeLabel		:'x'
		});	  

		//range inputs
		$(container).find(".range"+randomClass).rangeinput();  
		
		//hidden options
	 	$(container).find(".div_controller").trigger("change");
 
		$(container).find(".color_field input").each(function(){

			if( $(this).hasClass("hidden_slide_item") == false ){
				$(this).spectrum({ 
					flat: false,
					showInput: true,
					showButtons: false,
					showAlpha: true, 
					move: function(color) {
 						 
 						var value; 
						if( color.getAlpha() < 1 ){
							value = color.toRgbString();
						}else{
							value = color.toHexString();
						}
 						
 						$(this).val( value );
 						$(this).attr("value", value );
 

					},

					change: function(color) { 
						
 						var value; 
						if( color.getAlpha() < 1 ){
							value = color.toRgbString();
						}else{
							value = color.toHexString();
						}
 						
 						$(this).val( value );
 						$(this).attr("value", value );

					},

					hide: function(color) {

						if ( $(this).val() == "" &&  color.toHexString() == "#ffffff" ){

	 						var value; 
							if( color.getAlpha() < 1 ){
								value = color.toRgbString();
							}else{
								value = color.toHexString();
							}
	 						
	 						$(this).val( value );
	 						$(this).attr("value", value );

						}
					}					
				}); 


				$(this).show(function(){
					if( $(this).val() == "" ){
						$(this).spectrum("set", "#ffffff" );
						$(this).attr("value", "" );
					}
				});				
			}
	    }); 
	}; 

	$.fn.start_scripts(".rt-metaboxes, .widgets-holder-wrap","","page_load");
})(jQuery);


/*
*
*	COLOR SELECTOR FIELD FIX
*
*/	 
(function($){  

	$(document.body).on('keyup change', '.color_field input', function(event) { 

		var thecolor = $(this).val();

		//check the hex code
		var hexcode = thecolor.search(/#/i);

		if( hexcode != 0 && thecolor != "" ){
			thecolor = "#"+thecolor;
		}
			

		$(this).spectrum("set", thecolor );
		$(this).attr("value", thecolor );

		if( $(this).val() == "" ){
			$(this).spectrum("set", "#ffffff" );
			$(this).attr("value", "" );
		}
 
	}); 
})(jQuery);
 

/*
*
*	UPLOAD MEDIA
*
*/	
 
(function($){
	

	$(document).on('click', '.rttheme_upload_button', function(e) { 

		var url_field = $(this).prev(); 
			this_image_holder = $('[data-holderid="'+ $(this).data("inputid") +'"]');   	

			e.preventDefault();

			//If the uploader object has already been created, reopen the dialog
			if (custom_uploader) {
				custom_uploader.open();
				return;
			}

			//Extend the wp.media object
			var custom_uploader = wp.media.frames.file_frame = wp.media({
				title: wp.media.view.l10n.addMedia, 
				multiple: false
			});

			//When a file is selected, grab the URL and set it as the text field's value
			custom_uploader.on('select', function() {
				var attachment = custom_uploader.state().get('selection').first().toJSON(); 

					url_field.val(attachment.url).trigger("change");  

					if( attachment.type != "image" ){
						this_image_holder.find("img").attr("src","");  
						this_image_holder.removeClass("visible"); 											
					}	

			});

			//Open the uploader dialog
			custom_uploader.open(); 

	}); 		


	$(document).on('keyup change', '.upload_field', function() {

		var url_field = $(this),  
			this_image_holder = $('[data-holderid="'+ $(this).prop("id") +'"]');  

			if( url_field.val() ){
				this_image_holder.find("img").attr("src",url_field.val() );  
				this_image_holder.addClass("visible"); 						
			}else{
				this_image_holder.find("img").attr("src","");  
				this_image_holder.removeClass("visible"); 											
			}			 	

		return ;
		
	});


	//delete
	$(document).on('click', '.uploaded_file .delete_single', function() {  
		var url_field = $('#'+ $(this).data("inputid") +'');
		url_field.val("").trigger("keyup");  
	});         

	//auto select
	$('.upload_field').focus(function() {
		$(this).select();
	});	 
})(jQuery);


/*
*
*	UPLOAD MULTIPLE IMAGES
*
*/	
 
(function($){
	$(document).on('click', '.rt_gallery_add_button', function(e) { 

		var custom_uploader;
		var $this = $(this);

			e.preventDefault();

			//If the uploader object has already been created, reopen the dialog
			if (custom_uploader) {
				custom_uploader.open();
				return;
			}

			//Extend the wp.media object
			custom_uploader = wp.media.frames.file_frame = wp.media({
				title: wp.media.view.l10n.addMedia, 
				multiple: true
			});


			//When a file is selected, grab the URL and set it as the text field's value
			custom_uploader.on('select', function() {
				
				var selection = custom_uploader.state().get('selection');
				var list = $("#rt-gallery-images");				
				var new_list =  list.val(); 	
					 				  

					selection.map( function( attachment ) {
						 
						attachment = attachment.toJSON(); 

						//update the image list values
						if(new_list == ""){
							new_list = attachment.id;
						}else{
							new_list = new_list +","+ attachment.id;
						}
						
						//update visible images
						$(".rt-gallery-uploaded-photos").append('<li><img src="'+attachment.sizes.thumbnail.url+'" data-rel="'+attachment.url+'"></li>');

					});

				list.val(new_list);

			}); 

			//Open the uploader dialog
			custom_uploader.open(); 
	}); 		 
})(jQuery);
			 
/*
*
*	FEATTURED IMAGE GALLERY
*
*/	
 
(function($){ 
 
		//start sortables
		$("ul.rt-gallery-uploaded-photos").sortable({handle:'img',forceHelperSize: true,  opacity: 0.5,scroll: true, scrollSpeed: 20, cursor: "move", distance: 10, placeholder : 'ui-sortable-placeholder', tolerance: 'pointer',

			start: function(e, ui){ 
				var item = ui.item;  

				ui.placeholder.width(ui.item.width()); 						 
				ui.placeholder.height(ui.item.height()); 						 
 
			},

			update: function(e, ui){ //save new order
  
				var list = $("#rt-gallery-images");
				var new_list = "";

				$(this).find("li").each(function(){

					var img_url = $(this).find("img").attr("data-rel") ;

					if ( new_list == "" ){
						new_list = img_url;	
					}else{
						new_list = new_list + "," + img_url;
					}
					
				});	

				list.val(new_list); 				
			},			

		}); 		 
 
 		//delete button
	 	$(document.body).on('mouseenter', '.rt-gallery-uploaded-photos li', function() { 
	 		var delete_image = '<div class="gallery_delete"></div>';
	 		var old_delete_image = $(this).find(".gallery_delete");
			
 
	 		if( old_delete_image.length ){
				old_delete_image.show();
	 			return false;	 			
	 		}else{
	 			$(this).append(delete_image);
	 		}			

		});


	 	$(document.body).on('mouseleave', '.rt-gallery-uploaded-photos li', function() { 
 			$(this).find(".gallery_delete").hide();
		});
 

		//delete an image
	 	$(document.body).on('click', '.rt-gallery-uploaded-photos li .gallery_delete', function() { 

			var confirm_message = confirm(rt_variables.delete_image);		
			var $this = $(this) ;

	 			var list = $("#rt-gallery-images");
	 			var list_array = list.val().split(",");
	 			var this_image_holder = $this.parent("li");
	 			var item_to_delete = this_image_holder.find("img:eq(0)").attr("data-rel");
	 			 
 					if(confirm_message){

						//delete the url from the input
						list_array = jQuery.grep(list_array, function(value) {
						  return value != item_to_delete;
						});

						//update the list
						var new_list = list_array.join();
						list.val(new_list);

						//remove the holder		 			  
						$this.parent("li").remove();
						return true;
					}					   

			return false;    

		});
})(jQuery);
 		 

/*
*
*	SHOW / HIDE HIDDEN OPTIONS
*
*/	
 
(function($){

	$(document).on('change', '.div_controller' ,function() { 

		var selected_option = $('option:selected', this).val();
		var options_set = $(this).parents(".options_set_holder:eq(0)").find(".hidden_options_set:eq(0)");

		if( selected_option === "new" || selected_option === "boxed-body" || selected_option === "half-boxed" || selected_option === "disabled_parallax" ){
			options_set.slideDown("fast");
		}else{
			options_set.slideUp("fast");
		}
	});
 
	$(".div_controller").trigger("change");
})(jQuery);

/*
*
*	ICON SELECTION FOR THEME OPTIONS
*
*/	

jQuery(function($){  

	$(document.body).on('keyup', '#rt_icon_search', function() {  
		// Retrieve the input field text and reset the count to zero
		var filter = $(this).val(), count = 0;

		// Loop through the comment list
		$(".list-icons li").each(function(){

			// If the list item does not contain the text phrase fade it out
			if ($(this).find("span").text().search(new RegExp(filter, "i")) < 0) {
				$(this).fadeOut();

			// Show the list item if the phrase matches and increase the count by 1
			} else {
				$(this).show();
				count++;
			}
		});

		// Update the count
		var numberItems = count;
		$("#rt_icon_search_result").text(count + " icons found");
	});

	function rt_icon_selection( event ) { 
 
	  	purpose = event.data.purpose;
	  	thisField = $(event.target); 
		iconSelector = $(".icon-selection");

		if( purpose == "item" ){ 
			$(".icon-selection").removeClass("admin_bar"); 
		}else{ 
			$(".icon-selection").addClass("admin_bar"); 
		}

		if (iconSelector.length == 0){ 
 
			$('<div class="rt_loading_bar"></div>').appendTo("body");//create loading bar

			data = 'action=my_action&iconSelector=true';
			$.post(ajaxurl, data, function(response) {			   
				$('.rt_loading_bar').remove();  

					if( purpose == "item" ){
						$(response).appendTo("body").fadeIn(500);  
						$(".icon-selection .blank").show();
					}else{
						$(response).addClass("admin_bar").appendTo("body").fadeIn(500); 
						$(".icon-selection .blank").hide();
					} ;

			});		
		} else{
			$(iconSelector).fadeIn(500);  

			if( purpose == "item" ){ 
				$(".icon-selection .blank").show();
			}else{ 
				$(".icon-selection .blank").hide();
			}			
		}	


		$(document.body).on('click', '.icon_selection_close', function() {  	
			$(".icon-selection").hide();
			thisField.focus();
		}); 


		$(document.body).on('click', '.list-icons li', function() {  

			if( purpose == "item" ){
				var selectted_icon_name = $.trim($(this).attr('class')); 
				var thisField 	= $(event.target); 
				var thisFieldVal  = $(thisField).val();

				var classNames = thisFieldVal.split(" ");
				var newclassNames = "";
				var jump = 1;

 
				for (i = 0; i < classNames.length; i++ ) { 

						if( classNames[i].search(/icon-/i) == 0 && selectted_icon_name == "blank" ) { //found & deleted
							newclassNames += "";  
						}else if( classNames[i].search(/icon-/i) == 0 && selectted_icon_name != "blank" && jump == 1) { //found & replaced
							newclassNames += selectted_icon_name;	 
							jump = jump+1; 

						}else if( classNames[i].search(/icon-/i) < 0 && selectted_icon_name != "blank" && jump == 1) { // not found & added
							newclassNames += " " + classNames[i] + " " + selectted_icon_name;	 

							jump = jump+1;		
						}else{
							newclassNames += " " + classNames[i]; 	
						}

				}
 
				$(thisField).val( $.trim(newclassNames) );  
			 
					
				$(".icon-selection").hide(); 

				$(document.body).off('click', '.list-icons li');
			}

		});


	} 
 
	$(document.body).on('click', '.button_icon,.icon_name,.icon_selection,.edit-menu-item-classes', { purpose: "item" }, rt_icon_selection ) ;
	$("#wp-admin-bar-rt_icons .ab-item div").on('click', { purpose: "admin_bar" }, rt_icon_selection ) ;
});
 

/*
*
*	START MULTIPLE SELECTION FOR WIDGETS
*
*/	
jQuery(document).ajaxSuccess(function(e, xhr, settings) {
	var widget_id_base 		= 'latest_posts';   // latest posts plugin
	var widget_id_base_2 	= 'popular_posts';   // popular posts plugin
	var widget_id_base_3 	= 'recent_posts_gallery';   // recent posts gallery plugin
	var widget_id_base_4 	= 'rt_products';   // products plugin

	if(settings.data) {    			
		if(typeof settings.data.search == 'function') {    
			if (settings.data){
				if(settings.data.search('action=save-widget') != -1 && ( settings.data.search('id_base=' + widget_id_base) != -1 || settings.data.search('id_base=' + widget_id_base_2) != -1  || settings.data.search('id_base=' + widget_id_base_3) != -1  || settings.data.search('id_base=' + widget_id_base_4) != -1 ) ) {
					var str 			= settings.data;
					var substr   		= str.split('widget-id=');
					var substr_2 		= substr[1].split('&id_base');
					var thisWidtedID 	= substr_2[0];
					
					jQuery("select[multiple]#widget-"+thisWidtedID+"-categories").asmSelect({
						addItemTarget	: 'bottom',
						animate		: true,
						highlight		: true,
						removeLabel	:'x'
					});
				}
			}
		}
	}
});


/*
*
*	GET URL PARAMATERS BY NAME
*
*/	

function getParameterByName(name) {
	name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
	return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}


/*
*
*	POST FORMATS
*
*/	
jQuery(document).ready(function() {  

	jQuery.fn.extend({
		ShowPostFormats: function () {
			  
			$this = jQuery(this);
			var theSelectedFormat  = $this.attr("id");

			//post formats / option pairs
			var post_formats = {};
			post_formats['post-format-0'] = "#rt_standart_post_custom_fields";
			post_formats['post-format-gallery'] = "#rt_gallery_post_custom_fields";
			post_formats['post-format-link'] = "#rt_link_post_custom_fields";
			post_formats['post-format-video'] = "#rt_video_post_custom_fields";
			post_formats['post-format-audio'] = "#rt_audio_post_custom_fields";
	
				for (var key in post_formats) {
					jQuery(post_formats[key]).css({"display":"none"});
				}
	
			jQuery(post_formats[theSelectedFormat]).show().effect("highlight", 700);
	 
		}
	});

	jQuery("#post-formats-select input:checked").ShowPostFormats();
	
		jQuery("#post-formats-select").on("change", function(event){
			jQuery("#post-formats-select input:checked").ShowPostFormats();
		});
});

/*
*
*	PORFOLIO POST FORMATS
*
*/	
(function($){
	$.fn.rt_portfolio_formats= function() { 
		var groups = {
					"rttheme_portfolio_post_format-1": "rttheme_image_format_options",
					"rttheme_portfolio_post_format-2": "rttheme_video_format_options",
					"rttheme_portfolio_post_format-3": "rttheme_audio_format_options"
				};

		//hide all options
		for (var key in groups) {
			var value = groups[key]; 
			$("#"+value).hide();
		}

		//show selected one
		var selectedContainerID = $("#"+groups[$(this).attr("id")]);
		selectedContainerID.slideDown(400).effect("highlight", 700);

	}; 
	
})(jQuery);

jQuery(window).load(function() {  

	if (jQuery("#rttheme_portfolio_post_format input:checked").length>0){
		jQuery("#rttheme_portfolio_post_format input:checked").rt_portfolio_formats();
	}else{
		jQuery("#rttheme_portfolio_post_format-1").attr('checked',true).rt_portfolio_formats();
	}

	jQuery("#rttheme_portfolio_post_format").on("change", function(event){
		jQuery("#rttheme_portfolio_post_format input:checked").rt_portfolio_formats();
	}); 
});
 