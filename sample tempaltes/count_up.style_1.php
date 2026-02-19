<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Settings</dt>
	    <dt>Alignment:</dt>
	    <dd>
	        <select name="custom_alignment">
	            <option value="_text-center" selected>Center (default)</option>
	            <option value="_text-left">Left</option>
	            <option value="_text-right">right</option>
	        </select>
	    </dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Number</dt>
		<dt>Number:</dt>
		<dd>
			<input type="text" name="custom_num" value="1000"/>
		</dd>
		<dd>
			<div class="cell-50">
				<label>Prefix (optional):</label>
				<input type="text" name="custom_prefix"/>
			</div>
			<div class="cell-50">
				<label>Suffix (optional):</label>
				<input type="text" name="custom_suffix"/>
			</div>
		</dd>
		<dt>Number Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_num_color" value="_text-primary" cap="Primary" checked="checked"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_num_color" value="_text-secondary" cap="Secondary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_num_color" value="_text-third" cap="Third"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_num_color" value="_text-fourth" cap="Fourth"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_num_color" value="_text-white" cap="White"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_num_color" value="_text-light" cap="Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_num_color" value="_text-gray" cap="Gray"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_num_color" value="_text-dark" cap="Dark"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-light" name="custom_num_color" value="_text-primary-light" cap="Primary Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-light" name="custom_num_color" value="_text-secondary-light" cap="Secondary Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-light" name="custom_num_color" value="_text-third-light" cap="Third Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-light" name="custom_num_color" value="_text-fourth-light" cap="Fourth Light"/>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Label</dt>
		<dt>Label Text:</dt>
		<dd><textarea name="custom_label" size="2">Please Add a Label</textarea></dd>
		<dt>Label Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_label_color" value="_text-primary" cap="Primary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_label_color" value="_text-secondary" cap="Secondary" checked="checked"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_label_color" value="_text-third" cap="Third"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_label_color" value="_text-fourth" cap="Fourth"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_label_color" value="_text-white" cap="White"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_label_color" value="_text-light" cap="Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_label_color" value="_text-gray" cap="Gray"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_label_color" value="_text-dark" cap="Dark"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-light" name="custom_label_color" value="_text-primary-light" cap="Primary Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-light" name="custom_label_color" value="_text-secondary-light" cap="Secondary Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-light" name="custom_label_color" value="_text-third-light" cap="Third Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-light" name="custom_label_color" value="_text-fourth-light" cap="Fourth Light"/>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Icon (optional)</dt>
		<dt>Icon File:</dt>
		<dd>
			<input name="custom_icon_path" from="galleryFiles"/>
		</dd>
		<dt>Icon Alt:</dt>
		<dd>
			<input type="text" name="custom_icon_alt"/>
		</dd>
	</dl>
</tplOptions>
<tplOptions caption="Accessibility" order="2">
	<dl class="mwDialog">
		<dd>
			<div class="alert alert-style-1 is-info _mb-0">
				<div class="alert-wrap">
					<i class="alert-icon fa-solid fa-bell"></i>
					<div class="alert-content">
						<p><b>Accessibility Compliance</b></p>
						<p>As per <a href="https://www.w3.org/WAI/tutorials/page-structure/headings/" target="_blank">WAI guidelines</a>, Ensure you use the following option(s) to set the appropriate tag for your heading. Non-compliance risks rendering the page inaccessible.</p>
					</div>
				</div>
			</div>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Heading Hierarchy</dt>
		<dt>Set an H Tag for the Heading:</dt>
		<dd>
			<select name="custom_heading_tag">
				<option value="h2">H2 Tag</option>
				<option value="h3" selected="selected">H3 Tag (default)</option>
				<option value="h4">H4 Tag</option>
				<option value="h5">H5 Tag</option>
				<option value="h6">H6 Tag</option>
			</select>
		</dd>
	</dl>
</tplOptions>

<div id="<?= $tpl_id ?>" class="count-up count-up-style-1 _js-count-up {custom_alignment}" data-tpl-tooltip="Count Up - Style 1">
	<div class="count-up-wrap">

		<!-- Icon -->
		<toggle rel="custom_icon_path">
			<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
			     data-src="/get/files/image/galleries/{custom_icon_path}?resize=0x120"
			     class="count-up-icon _img-fluid lazyload"
			     alt="{custom_icon_alt}" width="120" height="120"/>
		</toggle>

		<?php for ($i = 1; $i <= 6; $i++) { ?>
			<toggle rel="custom_heading_tag" value="h<?= $i ?>">
				<h<?= $i ?>>

					<!-- Number -->
					<span class="count-up-number {custom_num_color}">
						<toggle rel="custom_prefix"><span class="count-up-prefix">{custom_prefix}</span></toggle>
						<span class="count-up-num">{custom_num}</span>
						<toggle rel="custom_suffix"><span class="count-up-suffix">{custom_suffix}</span></toggle>
					</span>

					<!-- Label -->
					<span class="count-up-label {custom_label_color}">{custom_label}</span>

				</h<?= $i ?>>
			</toggle>
		<?php } ?>
	</div>
</div>