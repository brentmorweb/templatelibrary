<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Image</dt>
		<dd>
			<input type="checkbox" name="custom_enable_img" cap="Enable Image" checked="checked" data-toggle-form=".<?= $tpl_id ?>-enable-img"/>
		</dd>
		<dt class="<?= $tpl_id ?>-enable-img">Image File:</dt>
		<dd class="<?= $tpl_id ?>-enable-img"><input name="custom_img" from="galleryFiles"/></dd>
		<dt class="<?= $tpl_id ?>-enable-img">Image Alt:</dt>
		<dd class="<?= $tpl_id ?>-enable-img"><input type="text" name="custom_img_alt"/></dd>
		<dt>Image Ratio:</dt>
		<dd>
			<select name="custom_ratio">
				<option value="_ratio-34">Portrait</option>
				<option value="_ratio-169" selected="selected">Landscape (default)</option>
				<option value="_ratio-43">Square</option>
			</select>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Headings</dt>
		<dd>
			<input type="checkbox" name="custom_enable_headings" cap="Enable Headings" checked="checked" data-toggle-form=".<?= $tpl_id ?>-enable-headings"/>
		</dd>
		<dt class="<?= $tpl_id ?>-enable-headings">Heading:</dt>
		<dd class="<?= $tpl_id ?>-enable-headings"><textarea name="custom_heading" size="2"></textarea></dd>
		<dt class="<?= $tpl_id ?>-enable-headings">Subheading:</dt>
		<dd class="<?= $tpl_id ?>-enable-headings"><textarea name="custom_subheading" size="2"></textarea></dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Link</dt>
		<dd>
			<input type="checkbox" name="custom_enable_link" cap="Enable Link" checked="checked" data-toggle-form=".<?= $tpl_id ?>-enable-link"/>
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
	</dl>
</tplOptions>

<div id="<?= $tpl_id ?>" class="megamenu-addon megamenu-addon-intro" data-tpl-tooltip="Megamenu Addon - Intro">
	<div class="megamenu-addon-wrap">
		<toggle rel="custom_enable_img">
			<div class="megamenu-addon-img {custom_ratio}">
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
				     data-src="/get/files/image/galleries/{custom_img}?600x528"
				     class="lazyload _img-fluid"
				     alt="{custom_img_alt}" width="600" height="528"/>
			</div>
		</toggle>
		<toggle rel="custom_enable_headings">
			<div class="megamenu-addon-headings">
				<p>
					<span class="megamenu-addon-heading _pre-line">{custom_heading}</span>
					<span class="megamenu-addon-subheading _pre-line">{custom_subheading}</span>
				</p>
			</div>
		</toggle>
		<toggle rel="custom_enable_link">
			<a class="megamenu-addon-link" href="{custom_btn_url}" data-external-link="{custom_btn_external_url}" target="{custom_btn_target}"><span class="_sr-only">{custom_heading}</span></a>
		</toggle>
	</div>
</div>