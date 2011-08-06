/*
*	jQuery dynamicField plugin
*	Copyright 2009, Matt Quackenbush (http://www.quackfuzed.com/)
*
*	Find usage demos at http://www.quackfuzed.com/demos/jQuery/dynamicField/index.cfm)
*
*	Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
*	and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
*
*	Version: 1.0
*	Date:	 8/13/2009
*/
;(function($) {
	$.fn.dynamicField = function(options) {
		if ( $(this).attr("id") == undefined ) {
			alert("The dynamicField plugin could not be initialized.\n\nPlease check the selector.");
			return $;
		}
		
		var f = $(this);
		
		var settings = $.extend({
			maxFields: 5,
			removeImgSrc: "/commonassets/images/icons/cross.png",
			spacerImgSrc: "/commonassets/images/spacer.gif",
			addTriggerClass: "add-field-trigger",
			removeImgClass: "remove-field-trigger",
			hideClass: "hide",
			cloneContainerId: f.attr("id").replace(/^(.+)([_-][0-9]+)$/,"$1"),
			rowContainerClass: f.attr("class"),
			labelText: f.children("label")
							.html(),
			baseName: f.children("input")
								.attr("name")
								.replace(/^(.+[_-])([0-9]+)$/,"$1"),
			addContainerId: "add-" + f.children("input")
								.attr("name")
								.replace(/^(.+)([_-][0-9]+)$/,"$1")
								.replace(/_/g,"-") + "-container"
		},options);
		
		var getFields = function() {
			return $("div." + settings.rowContainerClass);
		};
		
		// handle hide/show, etc
		var addRemoveBtnCk = function() {
			var fields = getFields();
			var len = fields.length;
			
			fields.each(function(i,elem) {
				$(elem)
					.children("img")
					.attr({
						"src":(len == 1) ? settings.spacerImgSrc : settings.removeImgSrc,
						"class":(len == 1) ? "" : settings.removeImgClass
					});
			});
			
			if ( len > (settings.maxFields-1) ) {
				$("div#" + settings.addContainerId).addClass(settings.hideClass);
			} else {
				$("div#" + settings.addContainerId).removeClass(settings.hideClass);
			}
		};
		
		// handle field removal
		$("img." + settings.removeImgClass).live("click",function() {
			// remove the selected row
			$(this).parent("div." + settings.rowContainerClass).remove();
			
			// rebrand the remaining fields sequentially
			getFields().each(function(i,elem) {
				var pos = new Number(i+1);
				var d = $(elem)
							.attr("id",settings.cloneContainerId + "-" + pos);
				
				d.children("label")
							.attr("for",settings.baseName + pos)
							.html((pos > 1) ? "" : settings.labelText);
				
				d.children("input")
							.attr({
								"id":settings.baseName + pos,
								"name":settings.baseName + pos
							});
			});
			
			addRemoveBtnCk();
		});
		
		// handle field add
		$("div#" + settings.addContainerId + " span." + settings.addTriggerClass).click(function() {
			var len = getFields().length;
			var pos = new Number(len+1);
			var newDiv = f
							.clone()
							.attr("id",settings.cloneContainerId + "-" + pos)
							.addClass(settings.rowContainerClass);
			
			newDiv.children("label")
							.attr("for",settings.baseName + pos)
							.html("");
			
			newDiv.children("input")
							.attr({
								"id":settings.baseName + pos,
								"name":settings.baseName + pos,
								"value":""
							});
			
			newDiv.children("img")
							.attr("src",settings.removeImgSrc);
			
			if ( len > 0 ) {
				$("div#" + settings.cloneContainerId + "-" + len).after(newDiv);
			} else {
				$("div#" + settings.addContainerId).before(newDiv);
			}
			
			addRemoveBtnCk();
		});
	};
})(jQuery);
