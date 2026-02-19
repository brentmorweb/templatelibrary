<tplOptions caption="Options" order="1">
	<dl class="mwDialog">
		<dt>Layout:</dt>
		<dd>
			<input type="radio" class="cell-50 _tpl-checkbox-img" name="custom_layout" value="is-layout-img-content" cap="Image | Content (default)" style="background-image: url('/images/static/template-options/image_and_content.style_1_image-content.png');" checked="checked" />
			<input type="radio" class="cell-50 _tpl-checkbox-img" name="custom_layout" value="is-layout-content-img" cap="Content | Image" style="background-image: url('/images/static/template-options/image_and_content.style_1_content-image.png');" />
		</dd>
		<dt>Image:</dt>
		<dd>
			<input name="custom_image" from="galleryFiles" />
		</dd>
		<dt>Image Alt:</dt>
		<dd>
			<input type="text" name="custom_image_alt"/>
		</dd>
		<dt>Background Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color-empty" name="custom_bg_color" value="" cap="None" checked="checked" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_bg_color" value="_bg-primary" cap="Primary" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_bg_color" value="_bg-secondary" cap="Secondary" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_bg_color" value="_bg-third" cap="Third" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_bg_color" value="_bg-fourth" cap="Fourth" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_bg_color" value="_bg-white" cap="White" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_bg_color" value="_bg-light" cap="Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_bg_color" value="_bg-gray" cap="Gray" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_bg_color" value="_bg-dark" cap="Dark" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-light" name="custom_bg_color" value="_bg-primary-light" cap="Primary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-light" name="custom_bg_color" value="_bg-secondary-light" cap="Secondary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-light" name="custom_bg_color" value="_bg-third-light" cap="Third Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-light" name="custom_bg_color" value="_bg-fourth-light" cap="Fourth Light" />
		</dd>
	</dl>
</tplOptions>

<tplOptions caption="Advanced" order="2">
	<dl class="mwDialog">
		<dt>Anchor ID:</dt>
		<dd>
			<input type="text" name="custom_id" />
		</dd>
		<dd class="_tpl-info">Example: <strong>anchor-id</strong> (no space, no # hash, no uppercase)</dd>
	</dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="img-content img-content-style-1 {custom_layout} {custom_bg_color} _content-style" data-tpl-tooltip="Image and Content - Style 1">
	<div id="{custom_id}" class="img-content-wrap">
		<div class="img-content-img">
			<picture>
				<source data-srcset="/get/files/image/galleries/{custom_image}?resize=960x0" media="(min-width: 600px)" />
				<source data-srcset="/get/files/image/galleries/{custom_image}?resize=600x0" media="(max-width: 599px)" />
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
				     data-src="/get/files/image/galleries/{custom_image}?resize=600x0"
				     class="lazyload _img-fluid"
				     alt="{custom_image_alt}" width="960" height="540" />
			</picture>
		</div>
		<div class="container">
			<div class="row _gutter-120">
				<div class="img-content-content-area col-lg-6">
					<div class="img-content-content">
						<mwPageArea rel="mainContent" info="Content Area" sortable="page"></mwPageArea>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>