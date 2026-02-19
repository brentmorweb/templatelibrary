<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Images #1</dt>
		<dt>Image File:</dt>
		<dd>
			<input name="custom_img_1" from="galleryFiles"/>
		</dd>
		<dt>Image Alt</dt>
		<dd>
			<input type="text" name="custom_img_alt_1"/>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Images #2</dt>
		<dt>Image File:</dt>
		<dd>
			<input name="custom_img_2" from="galleryFiles"/>
		</dd>
		<dt>Image Alt</dt>
		<dd>
			<input type="text" name="custom_img_alt_2"/>
		</dd>
	</dl>
</tplOptions>
<tplOptions caption="Advanced" order="2">
	<dl class="mwDialog">
		<dt>Image Ratio:</dt>
		<dd>
			<select name="custom_ratio">
				<option value="_ratio-43">4:3 Landscape</option>
				<option value="_ratio-169" selected="selected">16:9 Landscape (default)</option>
				<option value="_ratio-34">3:4 Portrait</option>
				<option value="_ratio-916">9:16 Portrait</option>
				<option value="_ratio-11">1:1 Square</option>
			</select>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup">Slider</dt>
		<dt>Slider Label - Left</dt>
		<dd><input type="text" name="custom_slider_label_left" value="OLD"/></dd>
		<dt>Slider Label - Right</dt>
		<dd><input type="text" name="custom_slider_label_right" value="NEW"/></dd>
	</dl>
</tplOptions>

<div id="<?= $tpl_id ?>" class="img-comp img-comp-style-1" data-tpl-tooltip="Image Comparison - Style 1">
	<div class="img-comp-wrap {custom_ratio}">
		<div class="img-comp-img">
			<picture>
				<source data-srcset="/get/files/image/galleries/{custom_img_1}?resize=1600x0" media="(min-width: 600px)"/>
				<source data-srcset="/get/files/image/galleries/{custom_img_1}?resize=600x0" media="(max-width: 599px)"/>
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
				     data-src="/get/files/image/galleries/{custom_img_1}?resize=600x0"
				     class="lazyload"
				     alt="{custom_img_alt_1}" width="1290" height="726"/>
			</picture>
		</div>
		<div class="img-comp-img img-comp-overlay">
			<picture>
				<source data-srcset="/get/files/image/galleries/{custom_img_2}?resize=1600x0" media="(min-width: 600px)"/>
				<source data-srcset="/get/files/image/galleries/{custom_img_2}?resize=600x0" media="(max-width: 599px)"/>
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
				     data-src="/get/files/image/galleries/{custom_img_2}?resize=600x0"
				     class="lazyload"
				     alt="{custom_img_alt_2}" width="1290" height="726"/>
			</picture>
		</div>
		<div class="img-comp-slider">
			<div class="img-comp-slider-wrap">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.364 68.243">
					<path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" d="m36.243 2.121-32 32 32 32"/>
				</svg>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.364 68.243">
					<path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" d="m2.121 2.121 32 32-32 32"/>
				</svg>
				<span class="img-comp-slider-left">{custom_slider_label_left}</span>
				<span class="img-comp-slider-right">{custom_slider_label_right}</span>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		(function () {

			//--------------------------------
			// Variables
			//--------------------------------
			//
			const $el = $('#<?= $tpl_id ?>');
			const $wrap =  $el.find('.img-comp-wrap');
			const $slider =  $el.find('.img-comp-slider');
			const $overlay =  $el.find('.img-comp-overlay');

			let width = $wrap.width();
			let height = $wrap.height();
			let clicked = false;

			//--------------------------------
			// Helper Functions
			//--------------------------------
			//
			// Start Slide
			function startSlide(e) {
				e.preventDefault();
				clicked = true;
				$(window).on("mousemove touchmove", moveSlide);
			}

			// Stop Slide
			function stopSlide() {
				clicked = false;
				$(window).off("mousemove touchmove", moveSlide);
			}

			// Move Slide
			function moveSlide(e) {
				if (!clicked) return;

				const pos = getCursorPos(e);
				resizeOverlay(pos);
			}

			// Get Slide
			function getCursorPos(e) {
				const event = e.originalEvent.touches ? e.originalEvent.touches[0] : e;
				const rect = $wrap[0].getBoundingClientRect();
				return Math.max(0, Math.min(event.pageX - rect.left - $(window).scrollLeft(), width));
			}

			// Resize Overlay
			function resizeOverlay(x) {
				$overlay.css("width", width - x + "px");
				$slider.css("left", x - $slider.outerWidth() / 2 + "px");
			}

			// Position Slider
			function positionSlider() {
				$slider.css({
					left: width / 2 - $slider.outerWidth() / 2 + "px"
				});
			}

			// Initialize Overlay Width
			function initOverlayWidth() {
				$overlay.css("width", width / 2 + "px");
			}

			//--------------------------------
			// Event Listeners
			//--------------------------------
			//
			$slider.on("mousedown touchstart", startSlide);
			$(window).on("mouseup touchend", stopSlide);

			$(window).on('resize', _debounce(function () {
				width = $wrap.width();
				height = $wrap.height();
				positionSlider();
				initOverlayWidth();
			}, 250));

			//--------------------------------
			// Executions
			//--------------------------------
			//
			positionSlider();
			initOverlayWidth();
		})();
	});
</script>