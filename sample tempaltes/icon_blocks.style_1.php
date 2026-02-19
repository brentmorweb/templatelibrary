<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<?php for ($i = 1; $i <= 4; $i++) { ?>
		<dl class="mwDialog _tpl-box">
			<dt class="formGroup">Icon Block #<?= $i ?></dt>
			<dt>Icon:</dt>
			<dd>
				<input name="custom_icon_<?= $i ?>" from="galleryFiles"/>
			</dd>
			<dt>Icon Alt:</dt>
			<dd>
				<input type="text" name="custom_alt_<?= $i ?>"/>
			</dd>
			<dt>Title:</dt>
			<dd>
				<input type="text" name="custom_title_<?= $i ?>" value="TITLE"/>
			</dd>
			<dt>Title Tag:</dt>
			<dd>
				<select name="custom_heading_tag">
					<option value="h2">H2 Tag</option>
					<option value="h3" selected="selected">H3 Tag (default)</option>
					<option value="h4">H4 Tag</option>
					<option value="h5">H5 Tag</option>
					<option value="h6">H6 Tag</option>
				</select>
			</dd>
			<dt>Description:</dt>
			<dd>
				<textarea name="custom_des_<?= $i ?>" size="3">Lorem ipsum dolor sit amet</textarea>
			</dd>
			<dt>URL:</dt>
			<dd>
				<select name="custom_url_<?= $i ?>" from="pages" zero="None" class="radioList new filter" size="4">
					<option value="{url}">{title}</option>
				</select>
			</dd>
			<dd>
				<input type="text" name="custom_external_url_<?= $i ?>" placeholder="Or enter an external url here"/>
			</dd>
		</dl>
	<?php } ?>
</tplOptions>

<div id="<?= $tpl_id ?>" class="icon-blocks icon-blocks-style-1" data-tpl-tooltip="Icon Block - Style 1">
	<div class="icon-blocks-wrap _shadow-6">
		<div class="icon-blocks-item">
			<div class="icon-blocks-item-wrap">
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
				     data-src="/get/files/image/galleries/{custom_icon_1}?resize=0x120"
				     class="icon-blocks-item-img _img-fluid lazyload"
				     alt="{custom_alt_1}" width="120" height="120"/>

				<?php for ($i = 1; $i <= 6; $i++) { ?>
					<toggle rel="custom_heading_tag" value="h<?= $i ?>">
						<h<?= $i ?> class="icon-blocks-item-title">{custom_title_1}</h<?= $i ?>>
					</toggle>
				<?php } ?>

				<p class="icon-blocks-item-des">{custom_des_1}</p>
				<a class="icon-blocks-item-link" data-external-link="{custom_external_url_1}" href="{custom_url_1}"><span class="_sr-only">Learn more about {custom_title_1}</span></a>
			</div>
		</div>

		<div class="icon-blocks-item">
			<div class="icon-blocks-item-wrap">
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
				     data-src="/get/files/image/galleries/{custom_icon_2}?resize=0x120"
				     class="icon-blocks-item-img _img-fluid lazyload"
				     alt="{custom_alt_1}" width="120" height="120"/>

				<?php for ($i = 1; $i <= 6; $i++) { ?>
					<toggle rel="custom_heading_tag" value="h<?= $i ?>">
						<h<?= $i ?> class="icon-blocks-item-title">{custom_title_2}</h<?= $i ?>>
					</toggle>
				<?php } ?>

				<p class="icon-blocks-item-des">{custom_des_2}</p>
				<a class="icon-blocks-item-link" data-external-link="{custom_external_url_2}" href="{custom_url_2}"><span class="_sr-only">Learn more about {custom_title_2}</span></a>
			</div>
		</div>

		<div class="icon-blocks-item">
			<div class="icon-blocks-item-wrap">
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
				     data-src="/get/files/image/galleries/{custom_icon_3}?resize=0x120"
				     class="icon-blocks-item-img _img-fluid lazyload"
				     alt="{custom_alt_1}" width="120" height="120"/>

				<?php for ($i = 1; $i <= 6; $i++) { ?>
					<toggle rel="custom_heading_tag" value="h<?= $i ?>">
						<h<?= $i ?> class="icon-blocks-item-title">{custom_title_3}</h<?= $i ?>>
					</toggle>
				<?php } ?>

				<p class="icon-blocks-item-des">{custom_des_3}</p>
				<a class="icon-blocks-item-link" data-external-link="{custom_external_url_3}" href="{custom_url_3}"><span class="_sr-only">Learn more about {custom_title_3}</span></a>
			</div>
		</div>

		<div class="icon-blocks-item">
			<div class="icon-blocks-item-wrap">
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
				     data-src="/get/files/image/galleries/{custom_icon_4}?resize=0x120"
				     class="icon-blocks-item-img _img-fluid lazyload"
				     alt="{custom_alt_1}" width="120" height="120"/>

				<?php for ($i = 1; $i <= 6; $i++) { ?>
					<toggle rel="custom_heading_tag" value="h<?= $i ?>">
						<h<?= $i ?> class="icon-blocks-item-title">{custom_title_4}</h<?= $i ?>>
					</toggle>
				<?php } ?>

				<p class="icon-blocks-item-des">{custom_des_4}</p>
				<a class="icon-blocks-item-link" data-external-link="{custom_external_url_4}" href="{custom_url_4}"><span class="_sr-only">Learn more about {custom_title_4}</span></a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {

		//-----------------------------------------------------------
		//
		// Icon Blocks
		//
		//-----------------------------------------------------------
		//
		(function () {
			var $el = $('#<?= $tpl_id ?>');
			var $items = $el.find('.icon-blocks-item');
			var MIN_BROWSER_WIDTH = 992;

			$items.each(function () {
				var $this = $(this);
				var $img = $this.find('.icon-blocks-item-img');
				var $title = $this.find('.icon-blocks-item-title');
				var $des = $this.find('.icon-blocks-item-des');
				var DISTANCE = 0;

				function init() {
					DISTANCE = $des.outerHeight() / 2;

					$des.css('transform', 'translateY(' + DISTANCE + 'px)');
					$title.css('transform', 'translateY(' + DISTANCE + 'px)');
					$img.css('transform', 'translateY(' + DISTANCE + 'px)');
				}

				function reset() {
					DISTANCE = 0;

					$des.attr('style', '');
					$title.attr('style', '');
					$img.attr('style', '');
				}

				_isMinBrowserWidth(MIN_BROWSER_WIDTH) && init();

				$(window).on('resize', _debounce(function () {
					_isMinBrowserWidth(MIN_BROWSER_WIDTH) ? init() : reset();
				}, 250));
			});
		})();
	});
</script>