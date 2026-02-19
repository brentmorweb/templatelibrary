<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<dl class="mwDialog">
		<dt>Type:</dt>
		<dd>
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_type" value="is-default" cap="Default (default)" style="background-image: url('/images/static/template-options/social_media.style_1_default.png');" checked="checked" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_type" value="is-circle" cap="Circle" style="background-image: url('/images/static/template-options/social_media.style_1_circle.png');" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_type" value="is-square" cap="Square" style="background-image: url('/images/static/template-options/social_media.style_1_square.png');" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_type" value="is-square is-rounded" cap="Rounded Square" style="background-image: url('/images/static/template-options/social_media.style_1_rounded_square.png');" />
		</dd>
		<dd>
			<div class="cell-50">
				<label>Alignment:</label>
				<select name="custom_align">
					<option value="is-left">Left</option>
					<option value="is-center" selected>Center (default)</option>
					<option value="is-right">Right</option>
					<option value="is-stretch">Stretch</option>
				</select>
			</div>
			<div class="cell-50">
				<label>Size:</label>
				<select name="custom_size">
					<option value="is-sm">Small</option>
					<option value="is-md" selected>Medium (default)</option>
					<option value="is-lg">Large</option>
					<option value="is-xl">X-Large</option>
					<option value="is-xxl">XX-Large</option>
				</select>
			</div>
		</dd>
		<dt>Colors:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color-empty" name="custom_color" value="" cap="None" checked="checked"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_color" value="is-primary" cap="Primary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_color" value="is-secondary" cap="Secondary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_color" value="is-third" cap="Third"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_color" value="is-fourth" cap="Fourth"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_color" value="is-white" cap="White"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_color" value="is-light" cap="Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_color" value="is-gray" cap="Gray"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_color" value="is-dark" cap="Dark"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-light" name="custom_color" value="is-primary-light" cap="Primary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-light" name="custom_color" value="is-secondary-light" cap="Secondary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-light" name="custom_color" value="is-third-light" cap="Third Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-light" name="custom_color" value="is-fourth-light" cap="Fourth Light" />
		</dd>
	</dl>

	<!-- Facebook -->
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup _d-flex _justify-content-between _gap-30"><i class="fab fa-facebook"></i> Order</dt>
		<dd>
			<div class="cell-80">
				<input type="text" name="custom_facebook" placeholder="Facebook URL"/>
			</div>
			<div class="cell-20">
				<select name="custom_facebook_order">
					<option value="1" selected>1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
				</select>
			</div>
		</dd>
	</dl>

	<!-- X (Twitter) -->
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup _d-flex _justify-content-between _gap-30"><i class="fab fa-x-twitter"></i> Order</dt>
		<dd>
			<div class="cell-80">
				<input type="text" name="custom_x" placeholder="X (Twitter) URL"/>
			</div>
			<div class="cell-20">
				<select name="custom_x_order">
					<option value="1">1</option>
					<option value="2" selected>2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
				</select>
			</div>
		</dd>
	</dl>

	<!-- Instagram -->
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup _d-flex _justify-content-between _gap-30"><i class="fab fa-instagram"></i> Order</dt>
		<dd>
			<div class="cell-80">
				<input type="text" name="custom_instagram" placeholder="Instagram URL"/>
			</div>
			<div class="cell-20">
				<select name="custom_instagram_order">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3" selected>3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
				</select>
			</div>
		</dd>
	</dl>

	<!-- Tiktok -->
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup _d-flex _justify-content-between _gap-30"><i class="fab fa-tiktok"></i> Order</dt>
		<dd>
			<div class="cell-80">
				<input type="text" name="custom_tiktok" placeholder="Tiktok URL"/>
			</div>
			<div class="cell-20">
				<select name="custom_tiktok_order">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4" selected>4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
				</select>
			</div>
		</dd>
	</dl>

	<!-- Linkedin -->
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup _d-flex _justify-content-between _gap-30"><i class="fab fa-linkedin-in"></i> Order</dt>
		<dd>
			<div class="cell-80">
				<input type="text" name="custom_linkedin" placeholder="Linkedin URL"/>
			</div>
			<div class="cell-20">
				<select name="custom_linkedin_order">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5" selected>5</option>
					<option value="6">6</option>
					<option value="7">7</option>
				</select>
			</div>
		</dd>
	</dl>

	<!-- Youtube -->
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup _d-flex _justify-content-between _gap-30"><i class="fab fa-youtube"></i> Order</dt>
		<dd>
			<div class="cell-80">
				<input type="text" name="custom_youtube" placeholder="Youtube URL"/>
			</div>
			<div class="cell-20">
				<select name="custom_youtube_order">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6" selected>6</option>
					<option value="7">7</option>
				</select>
			</div>
		</dd>
	</dl>

	<!-- Pinterest -->
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup _d-flex _justify-content-between _gap-30"><i class="fab fa-pinterest"></i> Order</dt>
		<dd>
			<div class="cell-80">
				<input type="text" name="custom_pinterest" placeholder="Pinterest URL"/>
			</div>
			<div class="cell-20">
				<select name="custom_pinterest_order">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7" selected>7</option>
				</select>
			</div>
		</dd>
	</dl>
</tplOptions>

<div id="<?= $tpl_id ?>" class="sns sns-style-1 {custom_type} {custom_align} {custom_size} {custom_color}" data-tpl-tooltip="Social Media - Style 1">
    <nav class="sns-wrap" aria-label="Social Media List">
	    <ul>
		    <toggle rel="custom_facebook">
			    <li class="sns-facebook" style="order:{custom_facebook_order};">
				    <a href="{custom_facebook}" target="_blank"><span class="_sr-only">Facebook</span><i class="fab fa-facebook-f" aria-hidden="true"></i><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
			    </li>
		    </toggle>
		    <toggle rel="custom_x">
			    <li class="sns-x" style="order:{custom_x_order};">
				    <a href="{custom_x}" target="_blank"><span class="_sr-only">X (Twitter)</span><i class="fab fa-x-twitter" aria-hidden="true"></i><i class="fab fa-x-twitter" aria-hidden="true"></i></a>
			    </li>
		    </toggle>
		    <toggle rel="custom_instagram">
			    <li class="sns-instagram" style="order:{custom_instagram_order};">
				    <a href="{custom_instagram}" target="_blank"><span class="_sr-only">Instagram</span><i class="fab fa-instagram" aria-hidden="true"></i><i class="fab fa-instagram" aria-hidden="true"></i></a>
			    </li>
		    </toggle>
		    <toggle rel="custom_tiktok">
			    <li class="sns-tiktok" style="order:{custom_tiktok_order};">
				    <a href="{custom_tiktok}" target="_blank"><span class="_sr-only">Tiktok</span><i class="fab fa-tiktok" aria-hidden="true"></i><i class="fab fa-tiktok" aria-hidden="true"></i></a>
			    </li>
		    </toggle>
		    <toggle rel="custom_linkedin">
			    <li class="sns-linkedin" style="order:{custom_linkedin_order};">
				    <a href="{custom_linkedin}" target="_blank"><span class="_sr-only">Linkedin</span><i class="fab fa-linkedin-in" aria-hidden="true"></i><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
			    </li>
		    </toggle>
		    <toggle rel="custom_youtube">
			    <li class="sns-youtube" style="order:{custom_youtube_order};">
				    <a href="{custom_youtube}" target="_blank"><span class="_sr-only">Youtube</span><i class="fab fa-youtube" aria-hidden="true"></i><i class="fab fa-youtube" aria-hidden="true"></i></a>
			    </li>
		    </toggle>
		    <toggle rel="custom_pinterest">
			    <li class="sns-pinterest" style="order:{custom_pinterest_order};">
				    <a href="{custom_pinterest}" target="_blank"><span class="_sr-only">Pinterest</span><i class="fab fa-pinterest-p" aria-hidden="true"></i><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
			    </li>
		    </toggle>
	    </ul>
    </nav>
</div>