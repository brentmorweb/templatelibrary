<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
    <dl class="mwDialog _tpl-box">
	    <dt class="formGroup">Layout</dt>
        <dt>Layout:</dt>
        <dd>
            <select name="custom_layout">
	            <option value="">Horizontal, align top</option>
	            <option value="_align-items-center" selected>Horizontal, align middle (default)</option>
	            <option value="_align-items-end">Horizontal, align bottom</option>
	            <option value="_flex-column">Vertical, align left</option>
	            <option value="_flex-column _align-items-center _text-center">Vertical, align center</option>
	            <option value="_flex-column _align-items-end _text-right">Vertical, align right</option>
            </select>
        </dd>
    </dl>
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup">Icon</dt>
		<dt>Icon File:</dt>
		<dd><input name="custom_icon" from="galleryFiles"/></dd>
		<dt>Icon Alt</dt>
		<dd><input type="text" name="custom_icon_alt"/></dd>
	</dl>
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup">Size</dt>
		<dt>Icon Size:</dt>
		<dd>
			<select name="custom_size">
				<option value="36">36 pixel</option>
				<option value="40">40 pixel</option>
				<option value="50">50 pixel</option>
				<option value="60">60 pixel</option>
				<option value="70" selected="selected">70 pixel (default)</option>
				<option value="80">80 pixel</option>
				<option value="90">90 pixel</option>
				<option value="100">100 pixel</option>
				<option value="120">120 pixel</option>
			</select>
		</dd>
		<dd><input type="checkbox" name="custom_enable_custom_size" cap="or use a custom size" data-toggle-form=".<?= $tpl_id ?>-custom-size"/></dd>
		<dt class="<?= $tpl_id ?>-custom-size">Specify a Custom Size:</dt>
		<dd class="<?= $tpl_id ?>-custom-size"><input type="number" name="custom_custom_size"/></dd>
	</dl>
</tplOptions>

<div id="<?= $tpl_id ?>" class="icon-text icon-text-style-1" data-tpl-tooltip="Icon and Text - Style 1">
    <div class="icon-text-wrap {custom_layout}">
	    <img class="icon-text-icon _img-fluid" alt="" src="" width="" height=""/>
	    <div class="icon-text-text">
		    <mwWidget rel="iconTextContent" info="Icon Text Content" widget="Content">
			    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel hendrerit dui, nec vestibulum ligula.</p>
		    </mwWidget>
	    </div>
    </div>
</div>

<script type="text/javascript">
	(function () {
		const $el = $('#<?= $tpl_id ?>');
		const $img = $el.find('.icon-text-icon');

		// Check if custom sizes are enabled
		//
		const enableCustomSize = !!+'{custom_enable_custom_size}';

		// Resolve file
		//
		const file = '{custom_icon}';
		if (!file) {
			console.warn('No icon specified for #<?= $tpl_id ?>.');
			return;
		}

		// Resolve alt text
		//
		let alt = '{custom_icon_alt}';
		if (!alt.length) {
			console.warn('Icon is missing an alt for #<?= $tpl_id ?>.');
			alt = file;
		}

		// Decide which size to use, then double for the cache
		//
		const size = enableCustomSize ? '{custom_custom_size}' : '{custom_size}';
		const cacheSize = parseInt(size, 10) * 2;

		// Use template strings for the path
		//
		const path = '/get/files/image/galleries/' + file + '?resize=' + cacheSize + 'x0'

		// Update the <img/>
		//
		$img.attr({
			src: path,
			width: size,
			height: size,
			alt: alt
		});
	})();
</script>