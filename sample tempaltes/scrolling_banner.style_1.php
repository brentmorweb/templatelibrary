<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<dl class="mwDialog">
		<dt>Banner Size:</dt>
		<dd>
			<select name="custom_size">
				<option value="480">Small</option>
				<option value="600">Medium</option>
				<option value="750" selected="selected">Large (default)</option>
			</select>
		</dd>
		<dt>Background Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color-empty" name="custom_bg_color" value="" cap="None" checked="checked"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_bg_color" value="_bg-white" cap="White"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_bg_color" value="_bg-light" cap="Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_bg_color" value="_bg-gray" cap="Gray"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_bg_color" value="_bg-dark" cap="Dark"/>
		</dd>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_bg_color" value="_bg-primary" cap="Primary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_bg_color" value="_bg-secondary" cap="Secondary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_bg_color" value="_bg-third" cap="Third"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_bg_color" value="_bg-fourth" cap="Fourth"/>
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
</tplOptions>
<tplOptions caption="Image Group 1" order="2">
	<?php for ($i = 1; $i <= 4; $i++) { ?>
		<dl class="mwDialog _tpl-box">
			<dt class="formGroup">Image <?= $i ?></dt>
			<dt>Image File:</dt>
			<dd><input name="custom_group1_img<?= $i ?>" from="galleryFiles"/></dd>
			<dt>Image Alt:</dt>
			<dd><input type="text" name="custom_group1_img<?= $i ?>_alt"/></dd>
		</dl>
	<?php } ?>
</tplOptions>
<tplOptions caption="Image Group 2" order="3">
	<?php for ($i = 1; $i <= 4; $i++) { ?>
		<dl class="mwDialog _tpl-box">
			<dt class="formGroup">Image <?= $i ?></dt>
			<dt>Image File:</dt>
			<dd><input name="custom_group2_img<?= $i ?>" from="galleryFiles"/></dd>
			<dt>Image Alt:</dt>
			<dd><input type="text" name="custom_group2_img<?= $i ?>_alt"/></dd>
		</dl>
	<?php } ?>
</tplOptions>

<style type="text/css">
	#<?= $tpl_id ?> { --scrolling-banner-1-height:{custom_size}px; }
</style>

<div id="<?= $tpl_id ?>" class="scrolling-banner scrolling-banner-style-1 _content-style {custom_size} {custom_bg_color}" data-tpl-tooltip="Scrolling Banner - Style 1">
	<div class="scrolling-banner-wrap">
		<div class="container">
			<div class="row _align-items-center">
				<div class="col-xl-6 scrolling-banner-content">
					<mwPageArea rel="mainContent" info="Default Content Area" sortable="page"></mwPageArea>
				</div>
				<div class="col-xl-6 scrolling-banner-imgs">
					<div class="scrolling-banner-imgs-wrap">
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group1_img1}?resize=600x0" alt="{custom_group1_img1_alt}" width="300" height="400"/></div>
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group1_img2}?resize=600x0" alt="{custom_group1_img2_alt}" width="300" height="400"/></div>
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group1_img3}?resize=600x0" alt="{custom_group1_img3_alt}" width="300" height="400"/></div>
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group1_img4}?resize=600x0" alt="{custom_group1_img4_alt}" width="300" height="400"/></div>
						<!-- Duplicates for Scrolling Animations -->
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group1_img1}?resize=600x0" alt="{custom_group1_img1_alt}" width="300" height="400"/></div>
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group1_img2}?resize=600x0" alt="{custom_group1_img2_alt}" width="300" height="400"/></div>
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group1_img3}?resize=600x0" alt="{custom_group1_img3_alt}" width="300" height="400"/></div>
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group1_img4}?resize=600x0" alt="{custom_group1_img4_alt}" width="300" height="400"/></div>
					</div>
					<div class="scrolling-banner-imgs-wrap">
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group2_img1}?resize=600x0" alt="{custom_group2_img1_alt}" width="300" height="400"/></div>
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group2_img2}?resize=600x0" alt="{custom_group2_img2_alt}" width="300" height="400"/></div>
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group2_img3}?resize=600x0" alt="{custom_group2_img3_alt}" width="300" height="400"/></div>
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group2_img4}?resize=600x0" alt="{custom_group2_img4_alt}" width="300" height="400"/></div>
						<!-- Duplicates for Scrolling Animations -->
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group2_img1}?resize=600x0" alt="{custom_group2_img1_alt}" width="300" height="400"/></div>
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group2_img2}?resize=600x0" alt="{custom_group2_img2_alt}" width="300" height="400"/></div>
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group2_img3}?resize=600x0" alt="{custom_group2_img3_alt}" width="300" height="400"/></div>
						<div class="scrolling-banner-img"><img class="_img-fluid" src="/get/files/image/galleries/{custom_group2_img4}?resize=600x0" alt="{custom_group2_img4_alt}" width="300" height="400"/></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>