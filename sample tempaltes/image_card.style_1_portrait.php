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
	</dl>
</tplOptions>

<div id="<?= $tpl_id ?>" class="img-card img-card-style-1-portrait" data-mh="img-card-style-1-portrait" data-tpl-tooltip="Image Card - Style 1 Portrait">
	<div class="img-card-wrap">
		<div class="img-card-header">
			<div class="img-card-img">
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
				     data-src="/get/files/image/galleries/{custom_img}?resize=520x0"
				     class="lazyload _img-fluid"
				     alt="{custom_img_alt}" width="520" height="347"/>
			</div>
		</div>
		<div class="img-card-body" data-mh="img-card-body">

			<?php for ($i = 1; $i <= 6; $i++) { ?>
				<toggle rel="custom_title_tag" value="h<?= $i ?>">
					<h<?= $i ?> class="h5 img-card-title">{custom_title}</h<?= $i ?>>
				</toggle>
			<?php } ?>

			<div class="img-card-des _font-16">{custom_des}</div>
			<toggle rel="custom_enable_link" value="1">
				<div class="img-card-btn btn is-rounded is-outline is-primary">
					<a href="{custom_btn_url}" class="small" data-external-link="{custom_btn_external_url}" target="{custom_btn_target}"><span>{custom_btn_label}</span></a>
				</div>
			</toggle>
		</div>
	</div>
</div>