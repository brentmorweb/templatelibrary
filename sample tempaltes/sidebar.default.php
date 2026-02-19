<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
    <dl class="mwDialog">
	    <dt>Layout:</dt>
	    <dd>
		    <input type="radio" class="cell-50 _tpl-checkbox-img" name="custom_layout" value="is-left" cap="Side | Main" style="background-image: url('/images/static/template-options/sidebar.style_1_left.png');" checked="checked" />
		    <input type="radio" class="cell-50 _tpl-checkbox-img" name="custom_layout" value="is-right" cap="Main | Side" style="background-image: url('/images/static/template-options/sidebar.style_2_right.png');" />
	    </dd>
    </dl>
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup">General Options</dt>
		<dt>Border:</dt>
		<dd>
			<select name="custom_border">
				<option value="no-border" selected="selected">Disable (default)</option>
				<option value="has-border">Enable</option>
			</select>
		</dd>
		<dt>Gap Between the Side Area and the Main Area:</dt>
		<dd>
			<select name="custom_gap">
				<option value="_gutter-10">Small</option>
				<option value="_gutter-30" selected="selected">Medium (default)</option>
				<option value="_gutter-60">Large</option>
				<option value="_gutter-80">Extra Large</option>
			</select>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup">Side Area</dt>
		<dt>Side Area Size:</dt>
		<dd>
			<select name="custom_size">
				<option value="col-xl-3 col-lg-4">Small</option>
				<option value="col-lg-4" selected="selected">Medium (default)</option>
				<option value="col-lg-5">Large</option>
			</select>
		</dd>
		<dt>Side Area Background Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color-empty" name="custom_side_bg" value="" cap="None" checked="checked"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_side_bg" value="_bg-primary" cap="Primary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_side_bg" value="_bg-secondary" cap="Secondary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_side_bg" value="_bg-third" cap="Third"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_side_bg" value="_bg-fourth" cap="Fourth"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_side_bg" value="_bg-white" cap="White"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_side_bg" value="_bg-light" cap="Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_side_bg" value="_bg-gray" cap="Gray"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_side_bg" value="_bg-dark" cap="Dark"/>
		</dd>
	</dl>
</tplOptions>
<tplOptions caption="Advanced" order="2">
	<dl class="mwDialog">
		<dt>Enable Sticky Side Area:</dt>
		<dd>
			<select name="custom_sticky">
				<option value="not-sticky" selected="selected">Disable (default)</option>
				<option value="is-sticky">Enable</option>
			</select>
		</dd>
		<dt>Collapse the Side Area on Mobile Devices:</dt>
		<dd>
			<select name="custom_coll_sidebar">
				<option value="">Disable</option>
				<option value="_js-coll-sidebar" selected="selected">Enable (default)</option>
			</select>
		</dd>
		<dt>Collapsed Button Label:</dt>
		<dd>
			<input type="text" name="custom_coll_btn_label" value="Open Sidebar"/>
		</dd>
	</dl>
</tplOptions>

<!-- Sidebar -->
<div id="<?= $tpl_id ?>" class="sidebar sidebar-default {custom_layout} {custom_border} {custom_sticky} {custom_coll_sidebar}" data-tpl-tooltip="Sidebar - Style 1">
	<div class="row {custom_gap}">

		<!-- Side Area -->
		<div class="sidebar-side {custom_size}">
			<div class="sidebar-side-wrap">

				<!-- Open Button -->
				<button class="sidebar-open-btn" aria-expanded="false" aria-controls="<?= $tpl_id ?>-dialog"><i class="fa-solid fa-bars" aria-hidden="true"></i><span>{custom_coll_btn_label}</span></button>

				<!-- Side Inner -->
				<div id="<?= $tpl_id ?>-dialog" class="sidebar-inner {custom_side_bg}" role="dialog" aria-modal="true">

					<!-- Close Button -->
					<button class="sidebar-close-btn" aria-label="Close Sidebar"><i class="fa-solid fa-times" aria-hidden="true"></i></button>

					<!-- Side mwPageArea -->
					<mwPageArea rel="Column1" info="Side Area" sortable="page"></mwPageArea>
				</div>
			</div>
		</div>

		<!-- Main Area -->
		<div class="sidebar-main col">
			<div class="sidebar-main-wrap">

				<!-- Main Inner -->
				<div class="sidebar-inner">

					<!-- Main mwPageArea -->
					<mwPageArea rel="Column2" info="Main Area" sortable="page"></mwPageArea>
				</div>
			</div>
		</div>
	</div>
</div>