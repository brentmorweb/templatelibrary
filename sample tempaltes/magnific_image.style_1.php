<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup"><h3>Image</h3></dt>
		<dt>Image:</dt>
		<dd>
			<input name="custom_img" from="galleryFiles"/>
		</dd>
		<dt>Image Alt</dt>
		<dd>
			<input type="text" name="custom_img_alt"/>
		</dd>
	</dl>
    <dl class="mwDialog _tpl-box">
        <dt class="formGroup"><h3>Thumbnail</h3></dt>
	    <dd>
		    <div class="cell-even"><input type="radio" name="custom_thumb_type" value="" cap="Same as image (above)" checked="checked"/></div>
		    <div class="cell-even"><input type="radio" name="custom_thumb_type" value="1" cap="Custom thumbnail" data-toggle-form=".<?= $tpl_id ?>-thumb-custom"/></div>
	    </dd>
	    <dt class="<?= $tpl_id ?>-thumb-custom">Thumbnail Image:</dt>
	    <dd class="<?= $tpl_id ?>-thumb-custom"><input name="custom_thumb" from="galleryFiles"/></dd>
	    <dt class="<?= $tpl_id ?>-thumb-custom">Thumbnail Alt</dt>
	    <dd class="<?= $tpl_id ?>-thumb-custom"><input type="text" name="custom_thumb_alt"/></dd>
	    <dt>Thumbnail Ratio (optional):</dt>
	    <dd>
		    <select name="custom_thumb_ratio">
			    <option value="" selected="selected">Unset (default)</option>
			    <option value="_ratio-34">Portrait</option>
			    <option value="_ratio-169">Landscape</option>
			    <option value="_ratio-43">Square</option>
		    </select>
	    </dd>
    </dl>
</tplOptions>

<div id="<?= $tpl_id ?>" class="magnific-img magnific-img-style-1 is-lg" data-tpl-tooltip="Magnific Image - Style 1">
	<div class="magnific-img-wrap">

		<!-- Thumbnail -->
		<div class="magnific-img-thumb {custom_thumb_ratio}">
			<toggle rel="custom_thumb_type" value="">
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
				     data-src="/get/files/image/galleries/{custom_img}?resize=600x0"
				     class="lazyload _img-fluid"
				     alt="{custom_img_alt}" width="600" height="450"/>
			</toggle>
			<toggle rel="custom_thumb_type" value="1">
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
				     data-src="/get/files/image/galleries/{custom_thumb}?resize=600x0"
				     class="lazyload _img-fluid"
				     alt="{custom_thumb_alt}" width="600" height="450"/>
			</toggle>
			<div class="magnific-img-thumb-overlay"><i class="fas fa-magnifying-glass-plus" aria-hidden="true"></i></div>
			<button id="<?= $tpl_id ?>-open-btn"
			        class="magnific-img-open-btn"
			        aria-expanded="false"
			        aria-controls="<?= $tpl_id ?>-dialog">
				<span class="_sr-only">View larger image</span>
			</button>
		</div>

		<!-- Container -->
		<div id="<?= $tpl_id ?>-container" class="magnific-img-container">

			<!-- Dialog -->
			<div id="<?= $tpl_id ?>-dialog"
			     class="magnific-img-dialog"
			     role="dialog"
			     aria-modal="true">

				<!-- Close Button -->
				<button id="<?= $tpl_id ?>-close-btn" class="magnific-img-close-btn" aria-label="Close Dialog">
					<i class="fa-solid fa-times" aria-hidden="true"></i>
				</button>

				<!-- Inner -->
				<div class="magnific-img-inner">
					<picture>
						<source data-srcset="/get/files/image/galleries/{custom_img}?resize=1200x0" media="(min-width: 600px)" />
						<source data-srcset="/get/files/image/galleries/{custom_img}?resize=600x0" media="(max-width: 599px)" />
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
						     data-src="/get/files/image/galleries/{custom_img}?resize=600x0"
						     class="lazyload _img-fluid"
						     alt="{custom_img_alt}"  width="1920" height="1440" />
					</picture>
				</div>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		(function () {
			var $body = $('body');
			var $el = $('#<?= $tpl_id ?>');
			var $openBtn = $('#<?= $tpl_id ?>-open-btn');
			var $closeBtn = $('#<?= $tpl_id ?>-close-btn');
			var $dialog = $('#<?= $tpl_id ?>-dialog');
			var $container = $('#<?= $tpl_id ?>-container');

			var $focusableEls = $dialog.find('a, button, :input, [tabindex]:not([tabindex="-1"])');
			var $firstFocusable = $focusableEls.first();
			var $lastFocusable = $focusableEls.last();

			//--------------------------------
			// Functions
			//--------------------------------
			//
			function openDialog() {
				$body.addClass('_overflow-hidden');
				$el.addClass('active');
				$container.fadeIn(360);
				$openBtn.attr('aria-expanded', 'true');
				$closeBtn.focus();
			}

			function closeDialog() {
				$body.removeClass('_overflow-hidden');
				$container.fadeOut(360, function () {
					$el.removeClass('active');
				});
				$openBtn.attr('aria-expanded', 'false');
				$openBtn.focus();
			}

			//--------------------------------
			// Toggle Dialog
			//--------------------------------
			//
			$openBtn.on('click', function () {
				openDialog();
			});

			$closeBtn.on('click', function () {
				closeDialog();
			});

			$container.on('click', function (e) {
				if (e.target === this) {
					closeDialog();
				}
			});

			//--------------------------------
			// Keyboard Trap
			//--------------------------------
			//
			$dialog.on('keydown', function(e) {
				switch (e.key) {
					case 'Tab':
						if (e.shiftKey && document.activeElement === $firstFocusable[0]) {
							e.preventDefault();
							$lastFocusable.focus();
						} else if (!e.shiftKey && document.activeElement === $lastFocusable[0]) {
							e.preventDefault();
							$firstFocusable.focus();
						}
						break;
					case 'Escape':
						closeDialog();
						break;
				}
			});
		})();
	});
</script>
