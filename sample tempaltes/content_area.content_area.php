<tplOptions caption="Options" order="1">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Spacing</dt>
		<dd>
			<select name="custom_space">
				<option value="is-sm">Small</option>
				<option value="is-md">Medium</option>
				<option value="is-lg" selected="selected">Large (default)</option>
				<option value="is-xl">Extra Large</option>
			</select>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Background</dt>
		<dt>Background Color:</dt>
		<dd><input type="radio" class="cell-10 _tpl-checkbox-color-empty" name="custom_bg_color" value="" cap="None" checked="checked"/></dd>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_bg_color" value="_bg-white" cap="White"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_bg_color" value="_bg-light" cap="Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_bg_color" value="_bg-gray" cap="Gray"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_bg_color" value="_bg-dark" cap="Dark"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_bg_color" value="_bg-primary" cap="Primary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_bg_color" value="_bg-secondary" cap="Secondary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_bg_color" value="_bg-third" cap="Third"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_bg_color" value="_bg-fourth" cap="Fourth"/>
		</dd>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-light" name="custom_bg_color" value="_bg-primary-light" cap="Primary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-light" name="custom_bg_color" value="_bg-secondary-light" cap="Secondary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-light" name="custom_bg_color" value="_bg-third-light" cap="Third Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-light" name="custom_bg_color" value="_bg-fourth-light" cap="Fourth Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-dark" name="custom_bg_color" value="_bg-primary-dark" cap="Primary Dark" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-dark" name="custom_bg_color" value="_bg-secondary-dark" cap="Secondary Dark" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-dark" name="custom_bg_color" value="_bg-third-dark" cap="Third Dark" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-dark" name="custom_bg_color" value="_bg-fourth-dark" cap="Fourth Dark" />
		</dd>
	</dl>
</tplOptions>
<tplOptions caption="Advanced" order="2">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Anchor ID</dt>
		<dd>
			<input type="text" name="custom_id"/>
		</dd>
		<dd class="_tpl-info">Example: <strong>anchor-id</strong> (no space, no # hash, no uppercase)</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Border</dt>
		<dd>
			<select name="custom_border">
				<option value="" selected="selected">None (default)</option>
				<option value="_border-top">Add a border at top</option>
				<option value="_border-bottom">Add a border at bottom</option>
				<option value="_border-top _border-bottom">Add borders at top and bottom</option>
			</select>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Custom Spacing</dt>
		<dt>Remove Padding:</dt>
		<dd>
			<select name="custom_remove_padding">
				<option value="" selected="selected">Disable (default)</option>
				<option value="_pt-0">Remove Top Padding</option>
				<option value="_pb-0">Remove Bottom Padding</option>
				<option value="_pt-0 _pb-0">Remove Top & Bottom Padding</option>
			</select>
		</dd>
		<dt>Fullwidth:</dt>
		<dd>
			<select name="custom_fullwidth">
				<option value="" selected>Disable (default)</option>
				<option value="is-fullwidth">Enable Fullwidth</option>
			</select>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup">Offset</dt>
		<dt>Offset Top:</dt>
		<dd>
		    <select name="custom_offset_top">
		        <option value="" selected="selected">Disable (default)</option>
		        <option value="is-offset-top-sm">Small (30px)</option>
		        <option value="is-offset-top-md">Medium (60px)</option>
		        <option value="is-offset-top-lg">Large (90px)</option>
		    </select>
		</dd>
	</dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="content-area _content-style {custom_space} {custom_bg_color} {custom_border} {custom_offset_top} {custom_fullwidth}" data-tpl-tooltip="Content Area">
	<div id="{custom_id}" class="content-area-wrap {custom_remove_padding}">
		<div class="container">
			<mwPageArea rel="mainContent" info="Content Area" sortable="page"></mwPageArea>
		</div>
	</div>
</div>