<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Background</dt>
		<dt>Background Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_bg_color" value="_bg-white" cap="White"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_bg_color" value="_bg-light" cap="Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_bg_color" value="_bg-gray" cap="Gray"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_bg_color" value="_bg-dark" cap="Dark"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_bg_color" value="_bg-primary" cap="Primary" checked="checked"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_bg_color" value="_bg-secondary" cap="Secondary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_bg_color" value="_bg-third" cap="Third"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_bg_color" value="_bg-fourth" cap="Fourth"/>
		</dd>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-light" name="custom_bg_color" value="_bg-primary-light" cap="Primary Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-light" name="custom_bg_color" value="_bg-secondary-light" cap="Secondary Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-light" name="custom_bg_color" value="_bg-third-light" cap="Third Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-light" name="custom_bg_color" value="_bg-fourth-light" cap="Fourth Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-dark" name="custom_bg_color" value="_bg-primary-dark" cap="Primary Dark"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-dark" name="custom_bg_color" value="_bg-secondary-dark" cap="Secondary Dark"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-dark" name="custom_bg_color" value="_bg-third-dark" cap="Third Dark"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-dark" name="custom_bg_color" value="_bg-fourth-dark" cap="Fourth Dark"/>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Image</dt>
		<dt>Image:</dt>
		<dd>
			<input name="custom_img" from="galleryFiles"/>
		</dd>
		<dt>Image Alt:</dt>
		<dd>
			<input type="text" name="custom_img_alt"/>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Content</dt>
		<dt>Title:</dt>
		<dd><textarea name="custom_title" size="3">Please Add a Title</textarea></dd>
		<dt>Title Tag:</dt>
		<dd>
			<select name="custom_title_tag">
				<option value="h2">H2 Tag</option>
				<option value="h3" selected="selected">H3 Tag (default)</option>
				<option value="h4">H4 Tag</option>
				<option value="h5">H5 Tag</option>
				<option value="h6">H6 Tag</option>
			</select>
		</dd>
		<dt>Description:</dt>
		<dd><textarea name="custom_des" size="8" class="richEdit compact"></textarea></dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Link</dt>
		<dd>
			<input type="checkbox" name="custom_enable_link" cap="Enable Link" checked="checked" data-toggle-form=".<?= $tpl_id ?>-enable-link"/>
		</dd>
		<dt class="<?= $tpl_id ?>-enable-link">Button Label:</dt>
		<dd class="<?= $tpl_id ?>-enable-link">
			<input type="text" name="custom_btn_label" value="Learn More"/>
		</dd>
		<dt class="<?= $tpl_id ?>-enable-link">Button URL:</dt>
		<dd class="<?= $tpl_id ?>-enable-link">
			<select name="custom_btn_url" from="pages" zero="None" class="radioList new filter" size="4">
				<option value="{url}">{title}</option>
			</select>
		</dd>
		<dd class="<?= $tpl_id ?>-enable-link">
			<input type="text" name="custom_btn_external_url" placeholder="Or enter an external URL"/>
		</dd>
		<dt class="<?= $tpl_id ?>-enable-link">Open in New Window:</dt>
		<dd class="<?= $tpl_id ?>-enable-link">
			<select name="custom_btn_target">
				<option value="_self" selected>Disable (default)</option>
				<option value="_blank">Enable</option>
			</select>
		</dd>
		<dt>Button Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_btn_color" value="is-white" cap="White" checked="checked"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_btn_color" value="is-light" cap="Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_btn_color" value="is-gray" cap="Gray"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_btn_color" value="is-dark" cap="Dark"/>
		</dd>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_btn_color" value="is-primary" cap="Primary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_btn_color" value="is-secondary" cap="Secondary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_btn_color" value="is-third" cap="Third"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_btn_color" value="is-fourth" cap="Fourth"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-light" name="custom_btn_color" value="is-primary-light" cap="Primary Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-light" name="custom_btn_color" value="is-secondary-light" cap="Secondary Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-light" name="custom_btn_color" value="is-third-light" cap="Third Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-light" name="custom_btn_color" value="is-fourth-light" cap="Fourth Light"/>
		</dd>
	</dl>

</tplOptions>

<div id="<?= $tpl_id ?>" class="img-card img-card-style-2" data-tpl-tooltip="Image Card - Style 2" tabindex="0">

	<div class="img-card-wrap" data-mh="img-card-style-2-body">
		<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
		     data-src="/get/files/image/galleries/{custom_img}?resize=650x0"
		     class="img-card-img lazyload _img-fluid"
		     alt="{custom_img_alt}" width="650" height="488"/>
		<div class="img-card-bg {custom_bg_color}"></div>
		<div class="img-card-inner {custom_bg_color}">

			<?php for ($i = 1; $i <= 6; $i++) { ?>
				<toggle rel="custom_title_tag" value="h<?= $i ?>">
					<h<?= $i ?> class="h4 img-card-title"><span>{custom_title}</span></h<?= $i ?>>
				</toggle>
			<?php } ?>

			<div class="img-card-des">{custom_des}</div>
			<toggle rel="custom_enable_link" value="1">
				<div class="img-card-btn btn is-outline {custom_btn_color}">
					<a href="{custom_btn_url}" class="small" data-external-link="{custom_btn_external_url}" target="{custom_btn_target}"><span>{custom_btn_label}</span></a>
				</div>
			</toggle>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		(function () {

			// Stop executing if on a touch device
			//
			if (_isTouchDevice()) return;

			var $el = $('#<?= $tpl_id ?>');
			var $wrap = $('.img-card-wrap', $el);
			var $bg = $('.img-card-bg', $el);
			var $heading = $('.img-card-title', $el);
			var $headingSpan = $('.img-card-title > span', $el);
			var $des = $('.img-card-des', $el);
			var $btn = $('.img-card-btn', $el);

			var DISTANCE = 0;
			var OFFSET_X = 30;
			var OFFSET_Y = 30;

			function init() {
				DISTANCE = ($wrap.offset().top + $wrap.outerHeight()) - ($heading.offset().top + $heading.outerHeight()) - OFFSET_Y;
				$headingSpan.css('transform', 'translateY(' + DISTANCE + 'px)');
				$bg.css({
					'height': OFFSET_X * 2 + $heading.outerHeight(),
					'left': OFFSET_X,
					'right': OFFSET_X
				});
				$des.add($btn).css('opacity', 0);
			}

			$(window).on('load', init);

			$(window).on('resize', _debounce(init, 250));

			$el.on('mouseenter focus', function () {
				$headingSpan.css('transform', 'translateY(0)');
				$bg.css({
					'height': '100%',
					'left': 0,
					'right': 0
				});
				$des.add($btn).css('opacity', 1);
			});

			$el.on('mouseleave', init);
		})();
	});
</script>