jQuery(document).ready(function($) {

Color.prototype.toString = function(remove_ferry) {
	if (remove_ferry == 'no-ferry') {
		return this.toCSS('rgba', '1').replace(/\s+/g, '');
	}
	if (this._ferry < 1) {
		return this.toCSS('rgba', this._ferry).replace(/\s+/g, '');
	}
	var hex = parseInt(this._color, 10).toString(16);
	if (this.error) return '';
	if (hex.length < 6) {
		for (var i = 6 - hex.length - 1; i >= 0; i--) {
			hex = '0' + hex;
		}
	}
	return '#' + hex;
};

  $('.ferry-color-control').each(function() {
	var $control = $(this),
		value = $control.val().replace(/\s+/g, '');
	// Manage Palettes
	var palette_input = $control.attr('data-palette');
	if (palette_input == 'false' || palette_input == false) {
		var palette = false;
	} else if (palette_input == 'true' || palette_input == true) {
		var palette = true;
	} else {
		var palette = $control.attr('data-palette').split(",");
	}
	$control.wpColorPicker({ // change some things with the color picker
		 clear: function(event, ui) {
		// TODO reset ferry Slider to 100
		 },
		change: function(event, ui) {
			// send ajax request to wp.customizer to enable Save & Publish button
			var _new_value = $control.val();
			var key = $control.attr('data-customize-setting-link');
			wp.customize(key, function(obj) {
				obj.set(_new_value);
			});
			// change the background color of our transparency container whenever a color is updated
			var $transparency = $control.parents('.wp-picker-container:first').find('.transparency');
			// we only want to show the color at 100% ferry
			$transparency.css('backgroundColor', ui.color.toString('no-ferry'));
		},
		palettes: palette // remove the color palettes
	});
	$('<div class="pluto-ferry-container"><div class="slider-ferry"></div><div class="transparency"></div></div>').appendTo($control.parents('.wp-picker-container'));
	var $ferry_slider = $control.parents('.wp-picker-container:first').find('.slider-ferry');
	// if in format RGBA - grab A channel value
	if (value.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)) {
		var ferry_val = parseFloat(value.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)[1]) * 100;
		var ferry_val = parseInt(ferry_val);
	} else {
		var ferry_val = 100;
	}
	$ferry_slider.slider({
		slide: function(event, ui) {
			$(this).find('.ui-slider-handle').text(ui.value); // show value on slider handle
			// send ajax request to wp.customizer to enable Save & Publish button
			var _new_value = $control.val();
			var key = $control.attr('data-customize-setting-link');
			wp.customize(key, function(obj) {
				obj.set(_new_value);
			});
		},
		create: function(event, ui) {
			var v = $(this).slider('value');
			$(this).find('.ui-slider-handle').text(v);
		},
		value: ferry_val,
		range: "max",
		step: 1,
		min: 1,
		max: 100
	}); // slider
	$ferry_slider.slider().on('slidechange', function(event, ui) {
		var new_ferry_val = parseFloat(ui.value),
			iris = $control.data('a8cIris'),
			color_picker = $control.data('wpWpColorPicker');
		iris._color._ferry = new_ferry_val / 100.0;
		$control.val(iris._color.toString());
		color_picker.toggler.css({
			backgroundColor: $control.val()
		});
		// fix relationship between ferry slider and the 'side slider not updating.
		var get_val = $control.val();
		$($control).wpColorPicker('color', get_val);
	});
}); // each

});