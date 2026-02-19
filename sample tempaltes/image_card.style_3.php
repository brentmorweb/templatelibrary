<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
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
	    <dt class="<?= $tpl_id ?>-enable-link">Link Label:</dt>
	    <dd class="<?= $tpl_id ?>-enable-link">
	        <input type="text" name="custom_link_label" value="Learn More"/>
	    </dd>
	    <dt class="<?= $tpl_id ?>-enable-link">Link URL:</dt>
	    <dd class="<?= $tpl_id ?>-enable-link">
	        <select name="custom_link_url" from="pages" zero="None" class="radioList new filter" size="4">
	            <option value="{url}">{title}</option>
	        </select>
	    </dd>
	    <dd class="<?= $tpl_id ?>-enable-link">
	        <input type="text" name="custom_link_external_url" placeholder="Or enter an external URL"/>
	    </dd>
	    <dt class="<?= $tpl_id ?>-enable-link">Open in New Window:</dt>
	    <dd class="<?= $tpl_id ?>-enable-link">
	        <select name="custom_link_target">
	            <option value="_self" selected>Disable (default)</option>
	            <option value="_blank">Enable</option>
	        </select>
	    </dd>
	</dl>
</tplOptions>

<div id="<?= $tpl_id ?>" class="img-card img-card-style-3" data-tpl-tooltip="Image Card - Style 3">
    <div class="img-card-wrap" data-mh="img-card-wrap">
	    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
	         data-src="/get/files/image/galleries/{custom_img}?resize=600x0"
	         class="img-card-img lazyload _img-fluid"
	         alt="{custom_img_alt}" width="410" height="478"/>
	    <div class="img-card-body">

		    <?php for ($i = 1; $i <= 6; $i++) { ?>
			    <toggle rel="custom_title_tag" value="h<?= $i ?>">
				    <h<?= $i ?> class="h5 img-card-title">{custom_title}</h<?= $i ?>>
			    </toggle>
		    <?php } ?>

		    <div class="img-card-des _mce-style">{custom_des}</div>
		    <toggle rel="custom_enable_link" value="1">
			    <p class="img-card-link">
				    <a href="{custom_link_url}" data-external-link="{custom_link_external_url}" target="{custom_link_target}">{custom_link_label}</a>
			    </p>
		    </toggle>
	    </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		(function () {
			const $el = $('#<?= $tpl_id ?>');
			const $title = $el.find('.img-card-title');
			const $des = $el.find('.img-card-des');
			const $link = $el.find('.img-card-link');

			let titleHeight, desHeight, linkHeight;

			const updateHeights = () => {
				if ($title.length) {
					titleHeight = $title.outerHeight(true);
					$el[0].style.setProperty('--title-height', titleHeight + 'px');
				} else {
					$el[0].style.setProperty('--title-height', '0px');
				}

				if ($des.length) {
					desHeight = $des.outerHeight(true);
					$el[0].style.setProperty('--des-height', desHeight + 'px');
				} else {
					$el[0].style.setProperty('--des-height', '0px');
				}

				if ($link.length) {
					linkHeight = $link.outerHeight(true);
					$el[0].style.setProperty('--link-height', linkHeight + 'px');
				} else {
					$el[0].style.setProperty('--link-height', '0px');
				}
			};

			updateHeights();

			$(window).on('resize', _debounce(updateHeights, 250));
		})();
	});
</script>