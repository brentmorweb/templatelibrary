<tplOptions caption="Options" order="1">
	<dl class="mwDialog">
		<dt>CTA Size:</dt>
		<dd>
			<select name="custom_size">
				<option value="is-sm">Small</option>
				<option value="is-md">Medium</option>
				<option value="is-lg" selected="selected">Large (default)</option>
			</select>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup"><h3>Image</h3></dt>
		<dt>Image File:</dt>
		<dd>
		    <input name="custom_img" from="galleryFiles"/>
		</dd>
		<dt>Image Alt:</dt>
		<dd>
		    <input type="text" name="custom_img_alt"/>
		</dd>
		<dt>Image Alignment:</dt>
		<dd>
			<select name="custom_img_align">
				<option value="is-img-center" selected="selected">Center (default)</option>
				<option value="is-img-top">Top</option>
				<option value="is-img-bottom">Bottom</option>
			</select>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Text Area</dt>
		<dt>Text Area Position:</dt>
		<dd>
			<select name="custom_text_area_position">
				<option value="_justify-content-center">Center</option>
				<option value="_justify-content-start" selected="selected">Left (default)</option>
				<option value="_justify-content-end">Right</option>
			</select>
		</dd>
		<dt>Background Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_text_area_bg_color" value="_bg-primary" cap="Primary" checked="checked" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_text_area_bg_color" value="_bg-secondary" cap="Secondary" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_text_area_bg_color" value="_bg-third" cap="Third" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_text_area_bg_color" value="_bg-fourth" cap="Fourth" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_text_area_bg_color" value="_bg-white" cap="White" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_text_area_bg_color" value="_bg-light" cap="Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_text_area_bg_color" value="_bg-gray" cap="Gray" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_text_area_bg_color" value="_bg-dark" cap="Dark" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-light" name="custom_text_area_bg_color" value="_bg-primary-light" cap="Primary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-light" name="custom_text_area_bg_color" value="_bg-secondary-light" cap="Secondary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-light" name="custom_text_area_bg_color" value="_bg-third-light" cap="Third Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-light" name="custom_text_area_bg_color" value="_bg-fourth-light" cap="Fourth Light" />
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Buttons</dt>
		<dt>Button #1</dt>
		<dd>
		    <select name="custom_enable_btn_1">
		        <option value="1" selected>Enable (default)</option>
		        <option value="0">Disable</option>
		    </select>
		</dd>
		<dt>Button #2</dt>
		<dd>
			<select name="custom_enable_btn_2">
				<option value="1" selected>Enable (default)</option>
				<option value="0">Disable</option>
			</select>
		</dd>
	</dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="cta cta-style-1 {custom_size} {custom_img_align} {custom_text_area_bg_color} _content-style" data-tpl-tooltip="CTA - Style 1">
	<div class="cta-wrap">

		<!-- Image -->
		<div class="cta-img">
			<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
			     data-src="/get/files/image/galleries/{custom_img}?resize=1920x0"
			     class="lazyload _img-fluid"
			     alt="{custom_img_alt}" width="1920" height="480"/>
		</div>

		<!-- Text Area -->
		<div class="cta-text-area">
			<div class="content-area">
				<div class="content-area-wrap">
					<div class="container">
						<div class="row {custom_text_area_position}">
							<div class="col-lg-6">
								<div class="cta-inner {custom_text_area_bg_color}">
									<div class="cta-content">
										<mwWidget rel="ctaContent" info="CTA Content" widget="Content">
											<h2>Support Our <br/> Students!</h2>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel hendrerit dui, nec vestibulum ligula. In vitae ipsum a sem dictum convallis.</p>
										</mwWidget>
									</div>
									<div class="cta-btns btn-group">
										<toggle rel="custom_enable_btn_1">
											<mwWidget rel="ctaBtn1" info="CTA Button #1" widget="Button" link_text="DONATE ONLINE" template="rectangle.rectangle_solid.php" button_size="medium" align="mwBtnLeft"></mwWidget>
										</toggle>
										<toggle rel="custom_enable_btn_2">
											<mwWidget rel="ctaBtn2" info="CTA Button #2" widget="Button" link_text="OTHER WAYS TO HELP" template="rectangle.rectangle_outline.php" button_size="medium" align="mwBtnLeft"></mwWidget>
										</toggle>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
